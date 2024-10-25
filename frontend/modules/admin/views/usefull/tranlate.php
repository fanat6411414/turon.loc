<?php

use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Tarjima';
$this->params['breadcrumbs'][] = ['label' => 'Foydali havolalar', 'url' => ['/usefull/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="book-create pb-2 row">
    <div class="col-md-9">
        <div class="card card-outline card-primary">
            <div class="card-header"><b>Ўзбекча</b></div>
            <div class="card-body">
                <?= $form->field($model, 'nameUz')
                    ->label($model->getAttributeLabel('name'))
                    ->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-header"><b>Русский</b></div>
            <div class="card-body">
                <?= $form->field($model, 'nameRu')
                    ->label($model->getAttributeLabel('name'))
                    ->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-header"><b>English</b></div>
            <div class="card-body">
                <?= $form->field($model, 'nameEn')
                    ->label($model->getAttributeLabel('name'))
                    ->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'col btn btn-sm btn-success']) ?>
        <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/usefull/index'], ['class' => 'col mt-2 btn btn-sm btn-default']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
<div class="clearfix"></div>