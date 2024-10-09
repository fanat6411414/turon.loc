<?php

use kartik\select2\Select2;
use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Yuklash';
$this->params['breadcrumbs'][] = ['label' => 'Fayl menejeri', 'url' => ['/file-manager/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="book-create">
    <div class="card card-outline card-primary">
        <div class="card-body">
            <?= $form->field($model, '_filename')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'previewFileType' => 'any',
                    'uploadUrl' => Url::to(['/file-manager/upload']),
                ]
            ]); ?>
        </div>
        <div class="card-footer">
            <div class="form-group text-right m-0">
                <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['/file-manager/index'], ['class' => 'btn btn-sm btn-default']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<div class="clearfix"></div>
<script>
    $(function() {

        var bStylesheetExists = false;
        $('link').each(function() {
            if($(this).attr('href') === 'plugin-style.css')) {
                bStylesheetExists = true;
            }
        });

        if(bStylesheetExists === false) {
            $('head').append('<link rel="stylesheet" href="plugin-styles.css" type="text/css" />');
        }

    });
</script>