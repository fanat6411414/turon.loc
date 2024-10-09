<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Kategoriya', 'url' => ['/news-type/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="book-create pb-2 row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'status')->widget(Select2::className(), [
                    'data' => $model->getStatus(),
                    'language' => 'uz',
                    'options' => ['placeholder' => 'Tanlang ...'],
                ]) ?>
            </div>
            <div class="card-footer">
                <div class="form-group text-right">
                    <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/news-type/index'], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<div class="clearfix"></div>