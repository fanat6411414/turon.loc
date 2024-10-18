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
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'create_year')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'students')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'edu')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'faculty')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'kafedra')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'teacher')->textInput() ?>
        </div>
    </div>
</div>
<div class="form-group text-right">
    <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/'], ['class' => 'btn btn-sm btn-default']) ?>
    <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>