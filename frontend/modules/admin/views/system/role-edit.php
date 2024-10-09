<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\widgets\Pjax;

?>
<?php Pjax::begin()?>
<div class="site-login pb-2">
    <?php $form = ActiveForm::begin(); ?>
    <div class="book-form col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><?=$this->title?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
            </div>
            <div class="card-footer">
                <div class="form-group text-right m-0">
                    <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['roles'], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php Pjax::end()?>