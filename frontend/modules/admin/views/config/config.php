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
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Fayl</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"></button>
                    </div>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'file_upload_size')->textInput() ?>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Bot</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"></button>
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'tg_bot_token')->textInput() ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'tg_channel')->textInput() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">SEO</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"></button>
                    </div>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'seo_keywords')->textarea() ?>
                    <?= $form->field($model, 'seo_description')->textarea() ?>
                </div>
            </div>
        </div>
    </div>
<div class="form-group text-right">
    <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/'], ['class' => 'btn btn-sm btn-default']) ?>
    <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>