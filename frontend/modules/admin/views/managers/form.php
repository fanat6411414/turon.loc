<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var $model \common\models\Managers */

$this->title = 'Qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Xodimlar', 'url' => ['/managers/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="book-create pb-2 row">
    <div class="col-md-9">
        <div class="card card-outline card-primary card-body">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'about')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'basic'
            ]) ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class=" card card-outline card-primary card-body">
            <div id="selectShowImage" class="mb-2"></div>
            <?= \frontend\widgets\imageSelect\ImageSelect::widget([
                'buttonTitle' => 'Asosiy rasm',
                'url' => ['/file-manager/index', 'select' => true],
            ])?>
            <?= $form->field($model, 'img')->hiddenInput()->label(false) ?>
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'visiting_day')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-group text-right">
            <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/managers/index'], ['class' => 'btn btn-sm btn-default']) ?>
            <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<div class="clearfix"></div>
<?php
$js_select = <<< JS
    var img = $('#managers-img');
    if(img.val() > 0){
        $.ajax({
            url: '/admin/file-manager/id-to-url?id='+img.val(),
            method: 'GET',
            dataType: 'json',
            processData: false,
            contentType: false,
            success:function (data) {
                console.log(data);
                $('#selectShowImage').html("<img src='"+data+"' width='100%' height='170'>");
            }
        });
    }
JS;
$this->registerJs($js_select, View::POS_END);
?>