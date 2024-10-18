<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Sahifalar', 'url' => ['/pages/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="book-create pb-2 row">
    <div class="col-md-9">
        <div class="card card-outline card-primary card-body">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class=" card card-outline card-primary card-body">
            <?= $form->field($model, 'status')->widget(Select2::className(), [
                'data' => $model->getStatus(),
                'language' => 'uz',
                'options' => ['placeholder' => 'Tanlang ...'],
            ]) ?>
        </div>
        <div class="form-group text-right">
            <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/pages/index'], ['class' => 'btn btn-sm btn-default']) ?>
            <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<div class="clearfix"></div>