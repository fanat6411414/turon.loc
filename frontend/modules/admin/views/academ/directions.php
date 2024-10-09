<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $searchModel */
/* @var $dataProvider */

$this->title = 'Ta\'lim yo\'nalishlari';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(['id' => 'items-grid', 'timeout' => false, 'options' => ['data-pjax' => false], 'enablePushState' => false]) ?>
<div class="row">
    <div class="col col-md-8 col-lg-8">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        [
                            'attribute' => 'shifr',
                            'options' => ['style' => 'width: 100px'],
                        ],
                        [
                            'attribute' => 'name',
                            'format' => 'raw',
                            'value' => function ($data) use ($model) {
                                return Html::a($data->name, ['directions', 'id' => $data->id]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
    <div class="col col-md-4" id="sidebar">
        <?php $form = ActiveForm::begin(['enableAjaxValidation' => false, 'validateOnSubmit' => false, 'options' => ['data-pjax' => 1]]); ?>
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title"><?=$this->title?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body pb-0">
                <?= $form->field($model, 'shifr')->textInput() ?>
                <?= $form->field($model, 'name')->textInput() ?>
            </div>
            <div class="card-footer text-right">
                <?php if (!$model->isNewRecord): ?>
                    <?= Html::a('Cancel', ['directions'], ['class' => 'btn btn-sm btn-default btn-flat']) ?>
                    <?= Html::a('Delete', ['directions', 'id' => $model->id, 'delete' => 1], ['class' => 'btn btn-sm btn-danger btn-flat btn-delete', 'data-pjax' => 0]) ?>
                <?php else: ?>
                <?php endif; ?>
                <?= Html::submitButton('<i class="fa fa-check"></i> Save' , ['class' => 'btn btn-sm btn-primary btn-flat']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php Pjax::end() ?>