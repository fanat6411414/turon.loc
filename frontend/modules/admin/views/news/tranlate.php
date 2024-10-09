<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Tarjima';
$this->params['breadcrumbs'][] = ['label' => 'Yangiliklar', 'url' => ['/news/index']];
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
                <?= $form->field($model, 'contentUz')
                    ->label($model->getAttributeLabel('content'))
                    ->widget(\froala\froalaeditor\FroalaEditorWidget::class, [
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
        <div class="card card-outline card-primary">
            <div class="card-header"><b>Русский</b></div>
            <div class="card-body">
                <?= $form->field($model, 'nameRu')
                    ->label($model->getAttributeLabel('name'))
                    ->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'contentRu')
                    ->label($model->getAttributeLabel('content'))
                    ->widget(\froala\froalaeditor\FroalaEditorWidget::class, [
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
        <div class="card card-outline card-primary">
            <div class="card-header"><b>English</b></div>
            <div class="card-body">
                <?= $form->field($model, 'nameEn')
                    ->label($model->getAttributeLabel('name'))
                    ->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'contentEn')
                    ->label($model->getAttributeLabel('content'))
                    ->widget(\froala\froalaeditor\FroalaEditorWidget::class, [
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
    </div>
    <div class="col-md-3">
        <div class="card card-body">
            <?= \frontend\widgets\imageShow\ImageShowWidget::widget([
                'buttonTitle' => Yii::t('app', 'Image'),
            ])?>
        </div>
        <div class="form-group text-right mb-0 mt-2">
            <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/news/index'], ['class' => 'btn btn-sm btn-default']) ?>
            <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<div class="clearfix"></div>