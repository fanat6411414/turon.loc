<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ListView;

?>
<section class="banner-inner-area sub-bg bg-image" data-background="assets/images/bg/banner-inner-bg.png" style="background-image: url(&quot;assets/images/bg/banner-inner-bg.png&quot;);">
    <div class="container">
        <div class="banner-inner__content ">
            <h2 class="text-uppercase"><?= $model->getName() ?></h2>
        </div>
    </div>
</section>
<section class="team-details-area pt-120 pb-120">
    <div class="container">
        <div class="team-details__item mb-4">
            <div class="row g-4 align-items-center">
                <div class="col-lg-4">
                    <div class="image">
                        <?= Html::img($model->manager->files->getUrl(), ['width' => '100%', 'alt' => $model->manager->getName()])?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="team-details__content">
                        <span class="text-uppercase"><?= Yii::t('app', 'Dean of the faculty')?></span>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4 align-items-center">
            <div class="col-md-12">
                <?= $model->getAbout() ?>
            </div>
        </div>
    </div>
</section>