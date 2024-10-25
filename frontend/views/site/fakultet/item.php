<?php

use common\models\DayMarkup;
use yii\helpers\Html;

/* @var $index */
/* @var $model */
?>
<div class="team-details__item mb-4 p-3">
    <div class="row g-4 align-items-center">
        <div class="col-md-12">
            <a href="<?= \yii\helpers\Url::to(['site/fakultet-view', 'id' => $model->alias])?>">
                <div class="team-details__content">
                    <h3 class="text-uppercase link-offset-2-hover">
                        <i class="fa-solid fa-angles-right" style="color: #F79009;"></i>
                        <?= $model->getName() ?>
                    </h3>
                </div>
            </a>
        </div>
    </div>
</div>