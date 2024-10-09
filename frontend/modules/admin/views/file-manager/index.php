<?php

use kartik\select2\Select2;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

/* @var $searchModel */
$this->title = 'Fayl menejeri';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="book-index">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card card-body pb-0">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($searchModel, 'name')->label(false)
                    ->textInput(['placeholder' => $searchModel->getAttributeLabel('name')]) ?>
            </div>
            <div class="col-md-6">
                <p class="text-right">
                    <?= Html::a('<i class="fa fa-plus-circle"></i>', ['/file-manager/add'], ['class' => 'btn btn-sm btn-success']) ?>
                    <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= Html::a('<i class="fa fa-filter"></i>', ['/file-manager/index'], ['class' => 'btn btn-sm btn-default']) ?>
                </p>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <div class="">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_single',
        'itemOptions' => ['class' => 'item col-md-2'],
        'layout' => "<div class='col-12 mb-2'>{pager}</div>\n{items}\n<div class='col-12'>{summary}</div>",
        'options' => ['class' => 'row'],
        'pager' => [
            'linkOptions' => ['class' => 'page-link'],
            'linkContainerOptions' => ['class' => 'page-item'],
            'options' => ['class' => 'pagination pagination-circle pg-blue mb-0'],
            'firstPageLabel' => '«',
            'lastPageLabel' => '»',
            'prevPageLabel' => false,
            'nextPageLabel' => false
        ],
    ]); ?>
    </div>
</div>
<?php
$js = <<< JS
    var mvar = "";
    $(".page-link").each(function() {
    var url = $(this).attr('href').substring(6);
    $(this).attr('href', url)
    console.log(url);
    mvar += $(this);
    });
    console.log(mvar);
JS;
$this->registerJs($js, View::POS_END);
?>