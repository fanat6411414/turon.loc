<?php
/** @var $model \common\models\News */
?>
<div class="col-xl-4 col-md-6">
    <div class="event__item">
        <div class="courses-two__image image">
            <img src="<?= $model->img->getUrl() ?>" alt="<?= $model->getName() ?>">
        </div>
        <ul class="d-flex align-items-center gap-4 mb-15 mt-4">
            <li>
                <i class="fa-regular fa-calendar"></i>
                <a class="primary-hover fs-14 fw-500" href="#0"><?= date('d.m.Y H:i', $model->created_at) ?></a>
            </li>
        </ul>
        <div class="courses__content p-0">
            <h4>
                <a href="<?= \yii\helpers\Url::to(['news/view', 'id' => $model->alias])?>" class="primary-hover">
                    <?= $model->getName() ?>
                </a>
            </h4>
        </div>
    </div>
</div>