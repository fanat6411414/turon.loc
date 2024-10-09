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
            <?= $form->field($model, 'tg_channel')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'fb_channel')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'tw_channel')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'in_channel')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'youtube_channel')->textInput() ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'instagram_channel')->textInput() ?>
        </div>
    </div>
</div>
<div class="form-group text-right">
    <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/'], ['class' => 'btn btn-sm btn-default']) ?>
    <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>