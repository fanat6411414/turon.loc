<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $searchModel */
/* @var $dataProvider */

$this->title = 'Sahifalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index card card-body">
    <p class="text-right m-0">
        <?= Html::a('<i class="fa fa-plus-circle"></i>', ['page-create'], ['class' => 'btn btn-sm btn-success']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Administrator', ['users'], ['class' => 'btn btn-sm btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'options' => ['style' => 'width: 50px'],
            ],
            [
                'attribute' => 'name',
                'value' => function($model){
                    return Html::a($model->name, ['page-create', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['style' => 'width: 50px'],
                'template' => '{page-delete}',
                'buttons' => [
                    'page-delete' => function ($url, $model) {
                        return Html::a(
                            '<i class="fa fa-trash"></i>', $url, [
                            'class' => 'btn btn-sm btn-danger',
                            'style' => 'margin-left: 5px',
                            'data' => ['confirm' => 'Ma’lumotni o‘chishga rozimisiz?', 'method' => 'post']]);
                    },
                ],
            ],
        ],
        'pager' => [
            'linkOptions' => ['class' => 'page-link'],
            'linkContainerOptions' => ['class' => 'page-item'],
        ],
    ]); ?>
</div>
