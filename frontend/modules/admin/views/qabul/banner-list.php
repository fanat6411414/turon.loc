<?php

use kartik\select2\Select2;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $searchModel */
$this->title = 'Qabul banner';
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
        <div class="col-md-4">
            <?= $form->field($searchModel, 'name')->label(false)
                ->textInput(['placeholder' => $searchModel->getAttributeLabel('name')]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($searchModel, 'status')->widget(Select2::className(), [
                'data' => [],
                'language' => 'uz',
                'options' => ['placeholder' => $searchModel->getAttributeLabel('status')],
            ])->label(false) ?>
        </div>

        <div class="col-md-6">
            <p class="text-right">
                <?= Html::a('<i class="fa fa-plus-circle"></i>', ['/qabul/banner-add'], ['class' => 'btn btn-sm btn-success']) ?>
                <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a('<i class="fa fa-filter"></i>', ['/qabul/banner-list'], ['class' => 'btn btn-sm btn-default']) ?>
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
                'attribute' => 'name',
                'value' => function ($model){
                    return Html::a('<p class="small text-black-50 m-0">'.$model->title.'</p>'.$model->name, [
                        '/qabul/banner-add', 'id' => $model->alias
                    ]); },
                'format' => 'raw'
            ],
            [
                'attribute' => 'status',
                'value' => function ($model){
                    return $model->getStatus($model->status);
                },
                'format' => 'raw'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['style' => 'width: 100px'],
                'template' => '{translate}{delete}',
                'buttons' => [
                    'translate' => function ($url, $model) {
                        return Html::a('<i class="fa fa-language"></i>', ['/qabul/banner-translate', 'id' => $model->alias],
                            ['class' => 'btn btn-sm btn-primary', 'style' => 'margin-left: 5px']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(
                            '<i class="fa fa-trash"></i>', ['/qabul/banner-delete', 'id' => $model->alias], [
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