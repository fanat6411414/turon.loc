<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Html;

$this->title = $name;
?>
<section class="banner-inner-area sub-bg bg-image" data-background="assets/images/bg/banner-inner-bg.png" style="background-image: url(&quot;assets/images/bg/banner-inner-bg.png&quot;);">
    <div class="container">
        <div class="banner-inner__content ">
            <h2><?=$this->title ?></h2>
        </div>
    </div>
</section>

<section class="blog-detals-area pt-40 pb-80 border">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-12 order-2 order-lg-1">
                <div class="blog-details__item-left">
                    <div class="alert alert-danger">
                        <?= nl2br(Html::encode($message)) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>