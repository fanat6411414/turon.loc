<?php

use kartik\select2\Select2;
use kartik\widgets\SwitchInput;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Menyular', 'url' => ['/menus/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
    <div class="book-create pb-2 row">
        <div class="col-md-9">
            <div class="card card-outline card-primary card-body">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'parent')->widget(Select2::className(), [
                    'data' => $model->getParent(),
                    'language' => 'uz',
                    'options' => ['placeholder' => 'Tanlang ...'],
                ]) ?>
                <?= $form->field($model, 'type')->label(false)->widget(SwitchInput::class, [
                    'type' => SwitchInput::RADIO,
                    'items' => [
                        ['label' => 'Yopiq', 'value' => 1],
                        ['label' => 'Manzil (http://)', 'value' => 2],
                        ['label' => 'Sahifa', 'value' => 3],
                        ['label' => 'Ma\'lumotlar', 'value' => 4],
                    ],
                    'pluginEvents'=>[
                        "switchChange.bootstrapSwitch" => "function(item) { reloadSwitch(item.currentTarget.value); }"
                    ]
                ]) ?>
                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>


                <?= $form->field($model, 'page_id')->widget(Select2::className(), [
                    'data' => $model->getPage(),
                    'language' => 'uz',
                    'options' => ['placeholder' => 'Tanlang ...'],
                ]) ?>

                <?= $form->field($model, 'action')->widget(Select2::className(), [
                    'data' => $model->getAllControllerActions(),
                    'language' => 'uz',
                    'options' => ['placeholder' => 'Tanlang ...'],
                ]) ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class=" card card-outline card-primary card-body">
                <?= $form->field($model, 'status')->widget(Select2::className(), [
                    'data' => $model->getStatus(),
                    'language' => 'uz',
                    'options' => ['placeholder' => 'Tanlang ...'],
                ]) ?>

            </div>
            <div class="form-group text-right">
                <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/menus/index'], ['class' => 'btn btn-sm btn-default']) ?>
                <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<div class="clearfix"></div>
<?php
$js = <<< JS

reloadSwitch($("input[type='radio'][name='Menu[type]']:checked").val());

function reloadSwitch(e) {
  var urlModel = $('.field-menu-url');
  var actionModel = $('.field-menu-action');
  var pageModel = $('.field-menu-page_id');
  switch(e) {
      case '2':
          urlModel.show();
          actionModel.hide();
          pageModel.hide();
          break;
      case '3':
          urlModel.hide();
          actionModel.show();
          pageModel.hide();
          break;
      case '4':
          console.log(4);
          urlModel.hide();
          actionModel.hide();
          pageModel.show();
          break;
      default:
          urlModel.hide();
          actionModel.hide();
          pageModel.hide();
          break;
  }
}
JS;
$this->registerJs($js, View::POS_END);
?>