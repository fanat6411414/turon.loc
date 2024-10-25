<?php

/** @var yii\web\View $this */

use yii\widgets\ListView;

?>
<!-- Banner area start here -->
<section class="banner-inner-area sub-bg bg-image" data-background="assets/images/bg/banner-inner-bg.png" style="background-image: url(&quot;assets/images/bg/banner-inner-bg.png&quot;);">
    <div class="container">
        <div class="banner-inner__content ">
            <h2><?= Yii::t('app', 'Faculties')?></h2>
        </div>
    </div>
</section>
<section class="team-details-area pt-120 pb-120">
    <div class="container">
        <?= ListView::widget([
            'layout' => "{items}\n{pager}",
            'dataProvider' => $dataProvider,
            'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('item', ['model' => $model, 'index' => $index, 'view' => $this]);
            },
        ]); ?>
    </div>
</section>