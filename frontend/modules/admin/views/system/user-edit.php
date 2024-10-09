<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

use kartik\password\PasswordInput;
use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\widgets\Pjax;

?>
<?php Pjax::begin()?>
<div class="site-login pb-2">
    <?php $form = ActiveForm::begin(); ?>
    <div class="book-form col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><?=$this->title?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'name')->label(false)
                            ->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('name')]) ?>
                        <?= $form->field($model, 'phone')->label(false)
                            ->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('phone')]) ?>
                        <?= $form->field($model, 'descreptions')->label(false)
                            ->textarea(['autofocus' => true, 'rows' => 6, 'placeholder' => $model->getAttributeLabel('descreptions')]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'role_id')->label(false)->widget(Select2::className(), [
                            'data' => $model->getRoles(),
                            'language' => 'uz',
                            'options' => ['placeholder' => $model->getAttributeLabel('role_id')],
                        ]) ?>
                        <?= $form->field($model, 'status')->label(false)->widget(Select2::className(), [
                            'data' => $model->getStatus(),
                            'language' => 'uz',
                            'options' => ['placeholder' => $model->getAttributeLabel('status')],
                        ]) ?>
                        <?= $form->field($model, 'login')->label(false)
                            ->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('login')]) ?>
                        <?=$form->field($model, 'password')->widget(PasswordInput::classname(), [
                            'pluginOptions' => [
                                'showMeter' => true,
                                'toggleMask' => true
                            ]
                        ])?>
                        <?= $form->field($model, 'password_repeat')->label(false)
                            ->passwordInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('password_repeat')]) ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group text-right m-0">
                    <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['users'], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php Pjax::end()?>