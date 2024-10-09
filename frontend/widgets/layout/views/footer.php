<?php

/* @var $model */
/* @var $config \common\models\SysConfig */

?>
<!--Footer-->
<footer class="footer-two-area">
    <div class="container">
        <div class="footer__wrp pt-100 pb-100">
            <div class="footer__item footer-about wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms"
                 style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                <a href="/" class="logo mb-30">
                    <img src="/logo.jpg" alt="logo">
                </a>
                <p>Sifatli ta’lim va kelajak sari ingtiling</p>
                <div class="social-icons mt-16">
                    <?php
                    if($config->fb_channel) echo '<a href="'.$config->fb_channel.'"><i class="fa-brands fa-facebook-f"></i></a>';
                    if($config->tg_channel) echo '<a href="'.$config->tg_channel.'"><i class="fa-brands fa-telegram"></i></a>';
                    if($config->instagram_channel) echo '<a href="'.$config->instagram_channel.'"><i class="fa-brands fa-instagram"></i></a>';
                    if($config->youtube_channel) echo '<a href="'.$config->youtube_channel.'"><i class="fa-brands fa-youtube"></i></a>';
                    if($config->tw_channel) echo '<a href="'.$config->tw_channel.'"><i class="fa-brands fa-twitter"></i></a>';
                    if($config->in_channel) echo '<a href="'.$config->in_channel.'"><i class="fa-brands fa-linkedin"></i></a>';
                    ?>
                </div>
            </div>
            <div class="footer__item item-sm wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms"
                 style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: fadeInUp;">
                <h3 class="footer-title"><?=Yii::t('app', 'Menu')?></h3>
                <ul>
                    <?php foreach ($model as $value):?>
                    <li>
                        <a href="<?= \common\models\MenuType::getUrl($value)?>">
                            <i class="fa-solid fa-angles-right" style="color: #F79009;"></i> <?=$value->getName()?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="footer__item footer-touch wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms"
                 style="visibility: visible; animation-duration: 1500ms; animation-delay: 600ms; animation-name: fadeInUp;">
                <h3 class="footer-title"><?=Yii::t('app', 'Contact')?></h3>
                <ul class="mt-25">
                    <li style="display: flex; align-items: center; gap: 10px;">
                        <i class="fa-solid fa-phone" style="color: #F79009;"></i>
                        <a href="tel:+998<?= $config->phone ?>" class="p-0">+998<?= $config->phone ?></a>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px;">
                        <i class="fa-solid fa-envelope" style="color: #F79009;"></i>
                        <a href="mail:<?= $config->email ?>" class="p-0"><?= $config->email ?></a>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px;">
                        <i class="fa-solid fa-location-dot" style="color: #F79009;"></i>
                        <a href="#" class="p-0"><?=$config->getLocation()?></a>
                    </li>
                </ul>

<!--                <div class="get-app mt-30">-->
<!--                    <a href="#0"><img src="assets/images/icon/apple-store.png" alt="icon"></a>-->
<!--                    <a href="#0"><img src="assets/images/icon/play-store.png" alt="icon"></a>-->
<!--                </div>-->
            </div>
        </div>
    </div>
    <div class="footer__copyright" style="border-top: 1px solid #999;">
        <div class="container">
            <div class="d-flex gap-1 flex-wrap align-items-center justify-content-md-between justify-content-center">
                <p class="wow fadeInDown" data-wow-delay="00ms" data-wow-duration="1500ms"
                   style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInDown;">
                    © 2024 <?=Yii::t('app', 'All Copyright')?>.
                    <a href="#0" class="primary-color">Turon Universiteti</a>
                </p>
                <p class="wow fadeInDown" data-wow-delay="00ms" data-wow-duration="1500ms"
                   style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInDown;">
                    Developed by
                    <a href="http://createsoft.uz" class="primary-color">CreateSoft LLC</a>
                </p>
            </div>
        </div>
    </div>
</footer>