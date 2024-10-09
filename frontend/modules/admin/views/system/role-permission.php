<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $model */
/* @var $dataProvider */

$this->params['breadcrumbs'][] = ['label' => 'Rollar', 'url' => ['roles']];
?>
<?php Pjax::begin()?>
<div class="book-index card card-body">
    <p class="text-right m-0">
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
                'format' => 'raw',
            ],
            [
                'label' => 'P.',
                'value' => function($mod) use ($model){
                    if($model->isAction($mod->id))
                        return Html::a('<i class="fa fa-toggle-on text-success"></i>', ['role-permission', 'id' => $model->id, 'a'=>$mod->id]);
                    else
                        return Html::a('<i class="fa fa-toggle-off text-default"></i>', ['role-permission', 'id' => $model->id, 'a'=>$mod->id]);
                },
                'format' => 'raw',
                'options' => ['style' => 'width: 50px'],
            ],
        ],
        'pager' => [
            'linkOptions' => ['class' => 'page-link'],
            'linkContainerOptions' => ['class' => 'page-item'],
        ],
    ]); ?>
</div>
<?php Pjax::end()?>