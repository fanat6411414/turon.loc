<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

use dosamigos\fileupload\FileUpload;
use kartik\file\FileInput;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

?>
<?php Pjax::begin()?>
<div class="site-login pb-2">
    <?php $form = ActiveForm::begin(); ?>
    <div class="book-form col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Universitet</a></li>
                    <li class="nav-item"><a class="nav-link" href="#system" data-toggle="tab">Tizim</a></li>
                    <li class="nav-item"><a class="nav-link" href="#sms" data-toggle="tab">Sms</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pdfkey" data-toggle="tab">PDF key</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <?= $form->field($model, 'univer_name')->textInput(['autofocus' => true]) ?>
                        <?= $form->field($model, 'univer_rektor')->textInput(['autofocus' => true]) ?>
                        <?= $form->field($model, 'univer_call')->textInput(['autofocus' => true]) ?>
                        <?= $form->field($model, 'univer_adres')->textInput(['autofocus' => true]) ?>
                        <div class="row">
                            <div class="col-md-6">
                                <?php if($model->univer_letsinziya): ?>
                                    <div class="card card-outline card-success">
                                        <div class="card-header">
                                            <h3 class="card-title"><?=$model->getAttributeLabel('univer_letsinziya')?></h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?= Html::img(['files/get-image', 'name' => $model->univer_letsinziya], ['class' => 'img-fluid'])?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?= $form->field($model, 'univer_letsinziya')
                                    ->fileInput(['class' => 'custom-file-input', 'id' => 'letFile'])
                                    ->label(null, ['class' => 'custom-file-label m-2', 'for' => 'letFile']) ?>
                                <?=Html::a('Delete: '. $model->getAttributeLabel('univer_letsinziya'),
                                    ['delete-letsinziya', 'name' => $model->univer_letsinziya], ['class' => 'btn btn-sm btn-danger col-12', 'data' => ['method' => 'post']])?>
                            </div>
                            <div class="col-md-6">
                                <?php if($model->univer_guvohnoma): ?>
                                    <div class="card card-outline card-success">
                                        <div class="card-header">
                                            <h3 class="card-title"><?=$model->getAttributeLabel('univer_guvohnoma')?></h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?= Html::img(['files/get-image', 'name' => $model->univer_guvohnoma], ['class' => 'img-fluid'])?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?= $form->field($model, 'univer_guvohnoma')
                                    ->fileInput(['class' => 'custom-file-input', 'id' => 'guvFile'])
                                    ->label(null, ['class' => 'custom-file-label m-2', 'for' => 'guvFile']) ?>
                                <?=Html::a('Delete: '. $model->getAttributeLabel('univer_letsinziya'),
                                    ['delete-guvohnoma'], ['class' => 'btn btn-sm btn-danger col-12', 'data' => ['method' => 'post']])?>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane" id="system">
                        <?= $form->field($model, 'file_upload_size')->textInput(['autofocus' => true]) ?>
                    </div>

                    <div class="tab-pane" id="sms">
                        <?= $form->field($model, 'sms_eskiz_email')->textInput(['autofocus' => true]) ?>
                        <?= $form->field($model, 'sms_eskiz_password')->textInput(['autofocus' => true]) ?>
                        <?= $form->field($model, 'sms_eskiz_time')->textInput(['autofocus' => true]) ?>
                        <?= $form->field($model, 'sms_eskiz_token')->textInput(['autofocus' => true, 'disabled' => 'disabled']) ?>
                    </div>
                    <div class="tab-pane" id="pdfkey">
                        <?= $form->field($model, 'pdf_conver_key')->textInput(['autofocus' => true]) ?>
                        <p>Ruyhatdan o'tish (free 10000-request): https://app.pdf.co</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group text-right">
                    <?= Html::a('<i class="fa fa-caret-left"></i> Orqaga', ['index'], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= Html::submitButton('<i class="fa fa-save"></i> Saqlash', ['class' => 'btn btn-sm btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php Pjax::end()?>