<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\widgets\Pjax;

?>
<?php Pjax::begin()?>
<div class="site-login pb-2">
    <?php $form = ActiveForm::begin(); ?>
    <div class="book-form col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'path')->widget(Select2::className(), [
                            'data' => $model->actionNoAdd(),
                            'language' => 'uz',
                            'options' => ['placeholder' => $model->getAttributeLabel('path')],
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group text-right">
                    <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['pages'], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php Pjax::end()?>