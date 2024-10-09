<?php foreach ($models as $k => $model):?>
<div class="swiper-slide swiper-slide-next"
     style="width: 374px; margin-right: 24px;" role="group" aria-label="<?= ($k+1)/3 ?> / 3" data-swiper-slide-index="0">
    <div class="event__item">
        <div class="courses-two__image image">
            <img src="<?= $model->img->getUrl() ?>" alt="image">
        </div>
        <ul class="d-flex align-items-center gap-4 mb-15 mt-4">
            <li>
                <i class="fa-regular fa-calendar"></i>
                <a class="primary-hover fs-14 fw-500" href="#0"><?= date('d.m.Y', $model->created_at) ?></a>
            </li>
        </ul>
        <div class="courses__content p-0">
            <h4>
                <a href="<?= \yii\helpers\Url::to(['news/view', 'id' => $model->alias])?>" class="primary-hover">
                    <?= $model->getName() ?>
                </a>
            </h4>
<!--            <p>--><?php //= \yii\helpers\StringHelper::truncate(strip_tags($model->getContent()), 50)  ?><!--</p>-->
        </div>
    </div>
</div>
<?php endforeach; ?>