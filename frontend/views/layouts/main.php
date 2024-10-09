<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use lavrentiev\widgets\toastr\NotificationFlash;
use yii\bootstrap5\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/x-icon" href="/logo.jpg"/>
    <meta content="" name="keywords">
    <meta content="" name="description">

<!--    <meta data-n-head="ssr" name="format-detection" content="telephone=no">-->
<!--    <meta data-n-head="ssr" name="telegram:channel" content="@createsoftuz">-->
<!--    <meta data-n-head="ssr" name="canonical" content="https://createsoft.uz">-->
<!--    <meta data-n-head="ssr" name="theme-color" content="#2e2d2d">-->
<!--    <meta data-n-head="ssr" data-hid="og:title" property="og:title" content="CreateSoft">-->
<!--    <meta data-n-head="ssr" data-hid="og:url" property="og:url" content="https://createsoft.uz">-->
<!--    <meta data-n-head="ssr" data-hid="og:image" property="og:image" content="https://createsoft.uz/logo_og.jpg">-->
<!--    <meta data-n-head="ssr" data-hid="og:image:secure_url" property="og:image:secure_url" content="https://createsoft.uz/logo_og.jpg"><meta data-n-head="ssr" data-hid="og:image:width" property="og:image:width" content="1200">-->
<!--    <meta data-n-head="ssr" data-hid="og:image:height" property="og:image:height" content="630">-->
<!--    <meta data-n-head="ssr" data-hid="og:type" property="og:type" content="website">-->
<!--    <meta data-n-head="ssr" data-hid="og:site_name" property="og:site_name" content="Unicon Soft">-->
<!--    <meta data-n-head="ssr" data-hid="description" name="description" content="Компания производитель программного продукта, внедрения и дальнейшего технического сопровождения.">-->
<!--    <meta data-n-head="ssr" data-hid="Description" name="Description" content="Компания производитель программного продукта, внедрения и дальнейшего технического сопровождения.">-->
<!--    <meta data-n-head="ssr" data-hid="og:description" property="og:description" content="Компания производитель программного продукта, внедрения и дальнейшего технического сопровождения."><meta data-n-head="ssr" data-hid="name" itemprop="name" content="https://createsoft.uz">-->
<!--    <meta data-n-head="ssr" data-hid="image" itemprop="image" content="https://createsoft.uz/logo_og.jpg">-->
<!--    <meta data-n-head="ssr" data-hid="image:width" property="image:width" content="1200">-->
<!--    <meta data-n-head="ssr" data-hid="image:height" property="image:height" content="630">-->

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= \frontend\widgets\layout\Layout::widget([
    'view' => 'header'
])?>
<!--Nav-->
<header class="header-area animated">
    <div class="header__container">
        <div class="container">
            <div class="header__main">
                <a href="/" class="logo">
                    <img src="/logo.jpg" alt="logo">
                </a>
                <?= \frontend\widgets\menu\Menu::widget()?>
                <div class="d-flex align-items-center gap-4 gap-xl-5">
                    <div class="menu-btns d-none d-lg-flex" style="align-items: center;">
                        <a class="active btn-one" href="" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa-solid fa-clipboard-list"></i> Hujjat topshirish</a>
                    </div>
                </div>
                <button class="menubars d-block d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#menubar">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- MODAL OYNA -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Qabulga yozilish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contact__item">

                    <form action="#">
                        <div class="row g-1">
                            <div class="col-12">
                                <label for="name">Ismingiz</label>
                                <input id="name" type="text" placeholder="Kiritish">
                            </div>
                            <div class="col-12">
                                <label for="phone">Telefon raqamingiz</label>
                                <input id="phone" type="text" placeholder="Kiritish">
                            </div>
                        </div>
                        <div class="" style="display: flex; justify-content: center;">
                            <a href="#0" class="btn-one">Yuborish</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn-one btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
<main>
    <?= $content ?>
</main>

<?php $this->beginBody() ?>
<?= \frontend\widgets\layout\Layout::widget([
    'view' => 'footer',
    'model' => \common\models\MenuFooter::findAll(['status' => \common\models\base\Base::STATUS_ACTIVE])
])?>


<?= NotificationFlash::widget([
    'options' => [
        "closeButton" => true,
        "debug" => false,
        "newestOnTop" => false,
        "progressBar" => false,
        "positionClass" => NotificationFlash::POSITION_TOP_RIGHT,
        "preventDuplicates" => false,
        "onclick" => null,
        "showDuration" => "300",
        "hideDuration" => "1000",
        "timeOut" => "5000",
        "extendedTimeOut" => "1000",
        "showEasing" => "swing",
        "hideEasing" => "linear",
        "showMethod" => "fadeIn",
        "hideMethod" => "fadeOut"
    ]
]) ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();