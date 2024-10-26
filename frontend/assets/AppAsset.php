<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700',
        'images/favicon.png',
        'css/bootstrap.min.css',
        'css/meanmenu.css',
        'css/all.min.css',
        'css/swiper-bundle.min.css',
        'css/magnific-popup.css',
        'css/animate.css',
        'css/nice-select.css',
        'css/style.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css',
        'css/site.css',
    ];
    public $js = [
        'js/jquery-3.7.1.min.js',
        'js/bootstrap.min.js',
        'js/meanmenu.js',
        'js/swiper-bundle.min.js',
        'js/jquery.counterup.min.js',
        'js/wow.min.js',
        'js/magnific-popup.min.js',
        'js/nice-select.min.js',
        'js/parallax.js',
        'js/jquery.waypoints.js',
        'js/scripts.js',
        'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js',
        'https://code.jquery.com/jquery-3.2.1.slim.min.js',
        'https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js',
        'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js',
        'js/main.js',
    ];
    public $depends = [];
}
