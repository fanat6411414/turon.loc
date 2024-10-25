<?php

/* @var $model \common\models\News */

$this->title = Yii::t('app', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="banner-inner-area sub-bg bg-image" data-background="assets/images/bg/banner-inner-bg.png" style="background-image: url(&quot;assets/images/bg/banner-inner-bg.png&quot;);">
    <div class="container">
        <div class="banner-inner__content ">
            <h2><?=$model->getName()?></h2>
        </div>
    </div>
</section>

<section class="blog-detals-area pt-40 pb-80 border">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-12 order-2 order-lg-1">
                <div class="blog-details__item-left">
<!--                    <h3 class="fs-30 mt-20 mb-20">--><?php //= $model->getName() ?><!--</h3>-->
                    <?= $model->getContent() ?>
                </div>
            </div>
        </div>
    </div>
</section>