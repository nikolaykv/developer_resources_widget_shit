<?php

class formWidgetContentDeveloperResourceOptions extends cmsForm {
    public function init() {
        return [
            [
                'type' => 'fieldset',
                'title' => LANG_OPTIONS,
                'childs' => [
                    new fieldDate('options:devresource_date', [
                       'title' => LANG_WD_DEVELOPER_SELECT_DATE
                    ]),
                ]
            ]
        ];
    }
}