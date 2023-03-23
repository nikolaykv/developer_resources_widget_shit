<?php

class actionContentDevresource extends cmsAction
{
    public function run()
    {

        $result = [];
        $test = [];

        $model = new cmsModel();

        // $prefixes = cmsCore::getInstance()->db->prefix . $model->table_prefix;

        $types = array_column(cmsCore::getModel('content')->getContentTypes(), 'name');

        foreach ($types as $type) {
            $rows[] = $model->filterEqual('is_pub', 1)
                ->get($model->table_prefix . $type, function ($item) use ($type) {
                    return [
                        'title' => $item['title'],
                        'date_pub' => explode(' ', $item['date_pub'])[0],
                        'slug' => "/" . $type . "/" . $item['slug'] . ".html"
                    ];
                });
        }

        foreach ($rows as $row) {
            foreach ($row as $item) {
                $result[] = $item;
            }
        }

        if ($_GET['date']) {

            $parts = explode('-', $_GET['date']);
            $nextDay = date(end($parts)) + 1;

            $resultDate = $parts[0] . "-" . $parts[1] . "-" . $nextDay;

            $result = array_filter($result, function ($value) use ($resultDate) {
                return $value['date_pub'] == $resultDate;
            });

        }

        foreach ($result as $res) {
            $test[] = $res;
        }


        echo json_encode(['data' => $test]);
        die();

    }
}