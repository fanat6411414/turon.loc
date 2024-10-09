<?php

/* @var $this \yii\web\View */
/* @var $content string */

use hail812\adminlte3\assets\AdminLteAsset;
use hail812\adminlte3\assets\FontAwesomeAsset;
use hail812\adminlte3\assets\PluginAsset;
use yii\helpers\Html;
use yii\web\View;

FontAwesomeAsset::register($this);
AdminLteAsset::register($this);
PluginAsset::register($this)->add(['sweetalert2', 'toastr']);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');

$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

$publishedRes = Yii::$app->assetManager->publish('@frontend/modules/admin/template/src/web/js');
$this->registerJsFile($publishedRes[1].'/control_sidebar.js', ['depends' => '\hail812\adminlte3\assets\AdminLteAsset']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <link rel="icon" type="image/x-icon" href="/logo.jpg"/>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">
    <!-- Navbar -->
    <?= $this->render('navbar', ['assetDir' => $assetDir]) ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->render('sidebar', ['assetDir' => $assetDir]) ?>

    <!-- Content Wrapper. Contains page content -->
    <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <?= $this->render('control-sidebar') ?>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?= $this->render('footer') ?>
</div>
<?= \lavrentiev\widgets\toastr\NotificationFlash::widget([
    'options' => [
        "progressBar" => true,
        "positionClass" => \lavrentiev\widgets\toastr\NotificationFlash::POSITION_TOP_RIGHT,
        "timeOut" => "2500",
    ]
]) ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>