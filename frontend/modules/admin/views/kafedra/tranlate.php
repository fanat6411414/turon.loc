<?php

use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Tarjima';
$this->params['breadcrumbs'][] = ['label' => 'Kafedralar', 'url' => ['/kafedra/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="book-create pb-2 row">
    <div class="col-md-9">
        <div class="card card-outline card-primary">
            <div class="card-header"><b>Ўзбекча</b></div>
            <div class="card-body">
                <?= $form->field($model, 'nameUz')
                    ->label($model->getAttributeLabel('name'))
                    ->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'aboutUz')
                    ->label($model->getAttributeLabel('about'))
                    ->widget(CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'basic'
                    ])
                ?>
            </div>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-header"><b>Русский</b></div>
            <div class="card-body">
                <?= $form->field($model, 'nameRu')
                    ->label($model->getAttributeLabel('name'))
                    ->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'aboutRu')
                    ->label($model->getAttributeLabel('about'))
                    ->widget(CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'basic'
                    ])
                ?>
            </div>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-header"><b>English</b></div>
            <div class="card-body">
                <?= $form->field($model, 'nameEn')
                    ->label($model->getAttributeLabel('name'))
                    ->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'aboutEn')
                    ->label($model->getAttributeLabel('about'))
                    ->widget(CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'basic'
                    ])
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="sticky-top">
            <div class=" card card-outline card-primary card-body">
                <?= Html::a(Yii::t('app', 'Image'), ['/file-manager/index'], [
                    'class' => 'btn btn-primary',
                    'id' => 'imageShow',
                ]) ?>
            </div>
            <div class="form-group text-right">
                <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/kafedra/index'], ['class' => 'btn btn-sm btn-default']) ?>
                <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<div class="modal fade" id="modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?=Yii::t('app', 'Image')?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php
$js = <<< JS
        $('#imageShow').click(function (e) {
            e.preventDefault();
            $('#modal').modal('show');
            myAjax($(this).attr('href'));
        });
        function myAjax(myurl) {
            $.ajax({
                url: myurl,
                method: 'GET',
                dataType: 'json',
                processData: false,
                contentType: false,
                success:function (data) {
                    $('#modal').find('.modal-body').html(data);
                    $('#modal').modal('hide');
                },
            });
        }
JS;
$this->registerJs($js, View::POS_END);
?>