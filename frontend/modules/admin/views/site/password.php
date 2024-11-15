<?php

use kartik\password\PasswordInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Parolni yangilash';
?>
<div class="book-index card card-body col-md-6">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'old_password')->passwordInput()->label('Parol') ?>
    <?= $form->field($model, 'password')->widget(PasswordInput::classname(), [
        'pluginOptions' => ['showMeter' => true, 'toggleMask' => true],
        'options' => ['placeholder' => $model->getAttributeLabel('password')]
    ])->label('Yangi parol') ?>
    <?= $form->field($model, 'confirm_password')->widget(PasswordInput::classname(), [
        'pluginOptions' => ['showMeter' => true, 'toggleMask' => true],
        'options' => ['placeholder' => $model->getAttributeLabel('password')]
    ])->label('Parolni tasdiqlash') ?>
    <div class="form-group text-right">
        <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>