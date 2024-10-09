<?php

use dosamigos\chartjs\ChartJs;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/** @var $stats */
/** @var $chart */

$this->title = 'Dashboard';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<?php $form = ActiveForm::begin(); ?>
<div class="card card-body">
    <div class="row">
        <div class="col-md-3 col-12">
            <?= $form->field($model, 'phone', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '<div class="input-group-prepend"><span class="input-group-text border">+998</span></div>{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-phone"></span></div></div>',
                'template' => '{label}{beginWrapper}{input}{error}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])->textInput(['placeholder' => $model->getAttributeLabel('phone')]) ?>
        </div>
        <div class="col-md-4 col-12">
            <?= $form->field($model, 'email')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'locationOz')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'locationUz')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'locationRu')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'locationEn')->textInput() ?>
        </div>
    </div>
</div>
<div class="form-group text-right">
    <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/'], ['class' => 'btn btn-sm btn-default']) ?>
    <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>