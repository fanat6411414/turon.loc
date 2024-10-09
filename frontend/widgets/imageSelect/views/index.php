<?php

use yii\bootstrap5\Html;
use yii\web\View;

/* @var $model */

?>
<?= Html::a($model->buttonTitle, $model->url, [
    'class' => 'btn btn-primary',
    'id' => 'imageShow1',
]) ?>
<?= \frontend\widgets\modal\ModalWidget::widget([
    'id' => 'modal',
    'title' => $model->buttonTitle,
    'size' => 'modal-lg'
])?>
<?php
$js = <<< JS
    $('#imageShow1').click(function (e) {
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
                var model = $('#modal');
                model.find('.modal-body').html(data);
                model.modal('hide');
            }
        });
    }
JS;
$this->registerJs($js, View::POS_END);
?>