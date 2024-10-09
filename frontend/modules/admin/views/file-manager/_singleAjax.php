<?php

/* @var $model \common\models\Files */

use yii\helpers\Html;
use yii\web\View;

?>
<div class="card card-primary card-outline direct-chat direct-chat-primary" title="<?=$model->name?>">
    <div class="card-body">
        <?= Html::img($model->getUrl(), [
            'class' => 'w-100 select-image',
            'alt' => $model->name,
            'height' => 80,
            'data-id' => $model->id,
        ])?>
    </div>
    <div class="card-header">
        <div class="card-tools">
            <a href="<?=$model->getUrl()?>" class="btn btn-tool copy" title="Copy" data-widget="chat-pane-toggle">
                <i class="fas fa-link text-primary"></i>
            </a>
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