<?php

use common\models\DayMarkup;
use yii\helpers\Html;

/* @var $index */
/* @var $model */
?>
<div class="team-details__item mb-4">
    <div class="row g-4 align-items-center">
        <div class="col-lg-4">
            <div class="image">
                <?= Html::img($model->manager->files->getUrl(), ['width' => '100%', 'alt' => $model->manager->getName()])?>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="team-details__content">
                <span class="text-uppercase"><?= $model->getName() ?></span>
                <h3><?= $model->manager->getName() ?></h3>
                <p class="mt-25"><?= $model->manager->getAbout() ?></p>
                <ul class="pt-10 pb-20">
                    <li>
                        <span>Qabul kunlari:</span>
                        <h4><?= $model->manager->visiting_day ?></h4>
                    </li>
                    <li>
                        <span>Telefon:</span>
                        <h4><?= $model->manager->phone ?></h4>
                    </li>
                </ul>
<!--                <div class="team-details__social">-->
<!--                    <div class="social-icons">-->
<!--                        <a href="#0"><i class="fa-brands fa-facebook-f"></i></a>-->
<!--                        <a href="#0"><i class="fa-brands fa-twitter"></i></a>-->
<!--                        <a href="#0"><i class="fa-brands fa-linkedin-in"></i></a>-->
<!--                        <a href="#0"><i class="fa-brands fa-youtube"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>