<?php

/* @var $model \common\models\Files */

use yii\helpers\Html;
use yii\web\View;

?>
<div class="card card-primary card-outline direct-chat direct-chat-primary" title="<?=$model->name?>">
    <div class="card-body">
        <?= Html::img($model->getUrl(), [
            'class' => 'w-100',
            'alt' => $model->name,
            'height' => 120
        ])?>
    </div>
    <div class="card-header">
        <div class="card-tools">
            <a href="<?=$model->getUrl()?>" class="btn btn-tool copy" title="Copy" data-widget="chat-pane-toggle">
                <i class="fas fa-link text-primary"></i>
            </a>
            <?=Html::a('<i class="fas fa-trash text-danger"></i>', ['/file-manager/delete', 'id' => $model->alias], [
                'class' => 'btn btn-tool',
                'title' => Yii::t('yii', 'Delete'),
                'data' => [
                    'confirm' => Yii::t('app', 'confirmDelete'),
                    'method' => 'post',
                ]
            ])?>
        </div>
    </div>
</div>
<?php
$script = <<< JS
$('.copy').on('click', function (e){
        e.preventDefault();
        var aux = document.createElement("input");
        aux.setAttribute("value", $(this).attr('href'));
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);
        toastr['success']('Nusxa olindi');
    });
JS;
$this->registerJs($script, View::POS_END);
?>