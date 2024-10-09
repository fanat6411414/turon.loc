<?php

/* @var $model */
/* @var $config \common\models\SysConfig */

?>
<div class="header-top-area d-none d-lg-block">
    <div class="header__container">
        <div class="container">
            <div class="header-top__wrp">
                <ul class="socila-link">
                    <?php
                        if($config->fb_channel) echo '<li><a href="'.$config->fb_channel.'"><i class="fa-brands fa-facebook-f"></i></a></li>';
                        if($config->tg_channel) echo '<li><a href="'.$config->tg_channel.'"><i class="fa-brands fa-telegram"></i></a></li>';
                        if($config->instagram_channel) echo '<li><a href="'.$config->instagram_channel.'"><i class="fa-brands fa-instagram"></i></a></li>';
                        if($config->youtube_channel) echo '<li><a href="'.$config->youtube_channel.'"><i class="fa-brands fa-youtube"></i></a></li>';
                        if($config->tw_channel) echo '<li><a href="'.$config->tw_channel.'"><i class="fa-brands fa-twitter"></i></a></li>';
                        if($config->in_channel) echo '<li><a href="'.$config->in_channel.'"><i class="fa-brands fa-linkedin"></i></a></li>';
                    ?>
                </ul>
                <ul class="info">
                    <li>
                        <i class="fa-regular fa-envelope"></i> <a href="#"><?=$config->email?></a>
                    </li>
                    <li><span></span></li>
                    <li>
                        <i class="fa-solid fa-phone"></i> <a href="#">+998<?=$config->phone?></a>
                    </li>
                    <li><span></span></li>
                    <li>
                        <i class="fa-solid fa-location-dot"></i> <a href="#"><?=$config->getLocation()?></a>
                    </li>
                </ul>
                <ul class="socila-link">
                    <?=\frontend\widgets\language\Language::widget()?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- MODAL OYNA end-->
<div class="sidebar-area offcanvas offcanvas-end" id="menubar">
    <div class="offcanvas-header">
        <a href="/" class="logo">
            <img src="/logo.jpg" alt="logo">
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="offcanvas-body sidebar__body">
        <div class="mobile-menu">

        </div>
        <div class="d-none d-lg-block">
            <h5 class="text-white mb-20">About Us</h5>
            <p class="paragraph-light fs-16">
                Unleash the full potential of your website and elevate its online presence with our comprehensive
                online courses.
            </p>
        </div>

        <div class="sidebar__search d-block d-lg-none">
            <input type="text" placeholder="<?=Yii::t('app', 'Enter search keyword')?>"/>
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="sidebar__contact-info mt-30">
            <h5 class="text-white mb-20"><?= Yii::t('app', 'Contact')?></h5>
            <ul>
                <li>
                    <a href="#"><i class="fa-solid fa-location-dot"></i> <?=$config->getLocation()?></a>
                </li>
                <li class="py-2">
                    <a href="tel:+998<?=$config->phone?>"><i class="fa-solid fa-phone-volume"></i> +998<?=$config->phone?></a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-paper-plane"></i> <?=$config->email?></a>
                </li>
            </ul>
        </div>
        <div class="sidebar__socials mt-4">
            <ul>
                <?php
                    if($config->fb_channel) echo '<li><a href="'.$config->fb_channel.'"><i class="fa-brands text-white fa-facebook-f"></i></a></li>';
                    if($config->tg_channel) echo '<li><a href="'.$config->tg_channel.'"><i class="fa-brands text-white fa-telegram"></i></a></li>';
                    if($config->instagram_channel) echo '<li><a href="'.$config->instagram_channel.'"><i class="fa-brands text-white fa-instagram"></i></a></li>';
                    if($config->youtube_channel) echo '<li><a href="'.$config->youtube_channel.'"><i class="fa-brands text-white fa-youtube"></i></a></li>';
                    if($config->tw_channel) echo '<li><a href="'.$config->tw_channel.'"><i class="fa-brands text-white fa-twitter"></i></a></li>';
                    if($config->in_channel) echo '<li><a href="'.$config->in_channel.'"><i class="fa-brands text-white fa-linkedin"></i></a></li>';
                ?>
            </ul>
        </div>
    </div>
</div>