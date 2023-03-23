<?php
/**
 * @var $select_date
 */

$this->addJSFromContext('templates/' . $this->name . '/controllers/content/js/developer_resource.js', 'комментарий');
?>


<div class="devreource-wrap"></div>

<button id="devresource_btn" data-select-date="<?=$select_date;?>">
    <?= LANG_WD_DEVELOPER_RESOURCE_BTN_TITLE; ?>
</button>