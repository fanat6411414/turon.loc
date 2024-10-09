<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $searchModel */
/* @var $dataProvider */

$this->title = 'Rollar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index card card-body">
    <p class="text-right m-0">
        <?= Html::a('<i class="fa fa-plus-circle"></i>', ['role-create'], ['class' => 'btn btn-sm btn-success']) ?>
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
                    return Html::a($model->name, ['role-create', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            [
                'label' => 'Per.',
                'value' => function($model){
                    return Html::a('<i class="fa fa-list-ol"></i>', ['role-permission', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']);
                },
                'format' => 'raw',
                'options' => ['style' => 'width: 50px'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['style' => 'width: 50px'],
                'template' => '{role-delete}',
                'buttons' => [
                    'role-delete' => function ($url, $model) {
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
