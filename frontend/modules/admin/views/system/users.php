<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $searchModel */
/* @var $dataProvider */

$this->title = 'Administrator';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index card card-body">
    <p class="text-right">
        <?= Html::a('<i class="fa fa-user-plus"></i> Admin yaratish', ['user-create'], ['class' => 'btn btn-sm btn-success']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Rollar', ['roles'], ['class' => 'btn btn-sm btn-primary']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Sahifalar', ['pages'], ['class' => 'btn btn-sm btn-primary']) ?>
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
                'value' => function($model){ return Html::a($model->name, ['user-create', 'id' => $model->id]); },
                'format' => 'raw',
            ],
            [
                'attribute' => 'role_id',
                'value' => function($model){ return $model->role->name; },
                'options' => ['style' => 'width: 50px'],
            ],
            [
                'label' => 'Per.',
                'value' => function($model){
                    return Html::a('<i class="fa fa-list-ol"></i>', ['directions-permission', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']);
                },
                'format' => 'raw',
                'options' => ['style' => 'width: 50px'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['style' => 'width: 50px'],
                'template' => '{user-delete}',
                'buttons' => [
                    'user-delete' => function ($url, $model) {
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
