<?php
use yii\helpers\Html;
?>
<div class="login-logo">
    <a href="<?=Yii::$app->homeUrl?>"><b class="text-uppercase"><?= $this->title ?></b></a>
</div>
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Admin qismiga kirish</p>
        <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'login-form']) ?>

        <?= $form->field($model,'username', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-4">
                <?= Html::submitButton('Kirish', ['class' => 'btn btn-sm btn-primary btn-block']) ?>
            </div>
        </div>
        <?php \yii\bootstrap4\ActiveForm::end(); ?>
    </div>
</div>