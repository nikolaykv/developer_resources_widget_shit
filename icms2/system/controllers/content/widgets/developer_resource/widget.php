<?php

class widgetContentDeveloperResource extends cmsWidget
{
    public function run() {
        return [
            'select_date' => ($this->getOption('devresource_date') ?: '')
        ];
    }
}