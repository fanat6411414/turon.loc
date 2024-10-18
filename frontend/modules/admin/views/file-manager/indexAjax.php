<?php

use yii\web\View;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $searchModel */
/** @var $select */

$this->title = 'Fayl menejeri';
$this->params['breadcrumbs'][] = $this->title;

Pjax::begin(['id' => 'items-grid',]);
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_singleAjax',
    'itemOptions' => ['class' => 'item col-md-2'],
    'layout' => "<div class='col-12 mb-2'>{pager}</div>\n{items}\n<div class='col-12'>{summary}</div>",
    'options' => ['class' => 'row'],
    'pager' => [
        'linkOptions' => ['class' => 'page-link'],
        'linkContainerOptions' => ['class' => 'page-item'],
        'options' => ['class' => 'pagination pagination-circle pg-blue mb-0'],
        'firstPageLabel' => '«',
        'lastPageLabel' => '»',
        'prevPageLabel' => false,
        'nextPageLabel' => false
    ],
]);
$js = <<< JS
    var mvar = "";
    $(".page-link").each(function() {
    var url = $(this).attr('href').substring(6);
    $(this).attr('href', url)
    console.log(url);
    mvar += $(this);
    });
JS;
$this->registerJs($js, View::POS_END);
if($select){
    $js_select = <<< JS
    $('.select-image').on('click', function (e){
        $('#managers-img').val($(this).attr('data-id'));
        $('#news-image').val($(this).attr('data-id'));
        $('#selectShowImage').html($(this));
        $("#modal .close").click();
    });
    JS;
    $this->registerJs($js_select, View::POS_END);
}
Pjax::end();
?>