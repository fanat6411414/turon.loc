<?php

/* @var $model \common\models\News */

use yii\widgets\ListView;

$this->title = Yii::t('app', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Banner area start here -->
<section class="banner-inner-area sub-bg bg-image" data-background="assets/images/bg/banner-inner-bg.png" style="background-image: url(&quot;assets/images/bg/banner-inner-bg.png&quot;);">
    <div class="container">
        <div class="banner-inner__content ">
            <h2><?= $this->title ?></h2>
        </div>
    </div>
</section>
<!-- Banner area end here -->

<section class="event-area pt-120 pb-120">
    <div class="container">
        <div class="row g-4">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'options' => [
                    'id' => false,
                    'class' => 'row',
                ],
                'itemOptions' => [
                    'tag' => false
                ],
                'layout' => "{items}\n{pager}",
                'itemView' => function ($model, $key, $index, $widget) {
                    return $this->render('item', ['model' => $model, 'index' => $index, 'view' => $this]);
                },
                'pager' => [
                    'maxButtonCount' => 5,
                    'firstPageLabel' => '<i class="fa fa-chevron-left"></i>',
                    'lastPageLabel' => '<i class="fa fa-chevron-right"></i>',
                    'prevPageLabel' => '«',
                    'nextPageLabel' => '»',
                    'linkOptions' => ['class' => 'page-link'],
                    'disabledPageCssClass' => 'page-link',
                    'pageCssClass' => 'page-item',
                    'options' => ['class' => 'pagination mt-5']
                ],
            ]); ?>
        </div>
    </div>
</section>