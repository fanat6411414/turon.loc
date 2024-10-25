<?php

use kartik\select2\Select2;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $searchModel */
$this->title = 'Foydali havolalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index card card-body">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12">
        <div class="card card-default collapsed-card">
            <div class="card-body" style="display: none;">
                <?= $form->field($searchModel, 'name')->label(false)
                    ->textInput(['placeholder' => $searchModel->getAttributeLabel('name')]) ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($searchModel, 'name')->label(false)
                ->textInput(['placeholder' => $searchModel->getAttributeLabel('name')]) ?>
        </div>

        <div class="col-md-6">
            <p class="text-right">
                <?= Html::a('<i class="fa fa-plus-circle"></i>', ['/usefull/add'], ['class' => 'btn btn-sm btn-success']) ?>
                <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a('<i class="fa fa-filter"></i>', ['/usefull/index'], ['class' => 'btn btn-sm btn-default']) ?>
            </p>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'options' => ['style' => 'width: 50px'],
            ],
            [
                'attribute' => 'img_id',
                'value' => function ($model){ return Html::img($model->img->getUrl(), ['style' => 'width: 100px']); },
                'format' => 'raw',
                'options' => ['style' => 'width: 100px'],
            ],
            [
                'attribute' => 'name',
                'value' => function ($model){ return Html::a($model->name, ['/usefull/add', 'id' => $model->alias]); },
                'format' => 'raw'
            ],
            [
                'attribute' => 'position',
                'options' => ['style' => 'width: 10px'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['style' => 'width: 100px'],
                'template' => '{translate}{delete}',
                'buttons' => [
                    'translate' => function ($url, $model) {
                        return Html::a('<i class="fa fa-language"></i>', ['/usefull/translate', 'id' => $model->alias],
                            ['class' => 'btn btn-sm btn-primary', 'style' => 'margin-left: 5px']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(
                            '<i class="fa fa-trash"></i>', ['/usefull/delete', 'id' => $model->alias], [
                            'class' => 'btn btn-sm btn-danger',
                            'style' => 'margin-left: 5px',
                            'data' => ['confirm' => 'Ma\'lumotni o`chishga rozimisiz?', 'method' => 'post']]);
                    },
                ],
            ],
        ],
        'pager' => [
            'linkOptions' => ['class' => 'page-link'],
            'linkContainerOptions' => ['class' => 'page-item'],
            'options' => ['class' => 'pagination pagination-circle pg-blue mb-0'],
            'firstPageLabel' => '«',
            'lastPageLabel' => '»',
            'prevPageLabel' => false,
            'nextPageLabel' => false
        ],
    ]); ?>
</div>