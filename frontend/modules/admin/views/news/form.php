<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Yangiliklar', 'url' => ['/news/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
    <div class="book-create pb-2 row">
        <div class="col-md-9">
            <div class="card card-outline card-primary card-body">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'content')->widget(\froala\froalaeditor\FroalaEditorWidget::class, [
                    'options' => ['id' => 'content'],
                    'clientOptions' => [
                        'toolbarInline'     => false,
                        'height'            => 300,
                        'theme'             => 'dark', //optional: dark, red, gray, royal
                        'language'          => 'ru'
                    ]
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
                <?= $form->field($model, 'image')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'news_type')->widget(Select2::className(), [
                    'data' => $model->getType(),
                    'language' => 'uz',
                    'options' => ['placeholder' => 'Tanlang ...'],
                ]) ?>
                <?= $form->field($model, 'status')->widget(Select2::className(), [
                    'data' => $model->getStatus(),
                    'language' => 'uz',
                    'options' => ['placeholder' => 'Tanlang ...'],
                ]) ?>
                <?= \frontend\widgets\imageShow\ImageShowWidget::widget([
                    'buttonTitle' => Yii::t('app', 'Image'),
                ])?>
            </div>
            <div class="form-group text-right">
                <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/news/index'], ['class' => 'btn btn-sm btn-default']) ?>
                <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<div class="clearfix"></div>
<?php
$js_select = <<< JS
    var img = $('#news-image');
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