<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Foydali havolalar', 'url' => ['/usefull/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="book-create pb-2 row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
                <div id="selectShowImage" class="mb-2 text-center" style="width: 200px"></div>
                <?= \frontend\widgets\imageSelect\ImageSelect::widget([
                    'buttonTitle' => 'Rasm',
                    'url' => ['/file-manager/index', 'select' => true],
                ])?>
                <?= $form->field($model, 'img_id')->hiddenInput()->label(false) ?>
            </div>
            <div class="card-footer">
                <div class="form-group text-right">
                    <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/usefull/index'], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<div class="clearfix"></div>
<?php
$js_select = <<< JS
    var img = $('#usefull-img_id');
    if(img.val() > 0){
        $.ajax({
            url: '/admin/file-manager/id-to-url?id='+img.val(),
            method: 'GET',
            dataType: 'json',
            processData: false,
            contentType: false,
            success:function (data) {
                console.log(data);
                $('#selectShowImage').html("<img src='"+data+"' width='100%'>");
            }
        });
    }
JS;
$this->registerJs($js_select, View::POS_END);
?>