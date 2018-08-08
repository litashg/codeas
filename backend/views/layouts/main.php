<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\BackendAsset;
use yii\helpers\Html;

BackendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <meta name="description" content="OneUI - Admin Dashboard Template & UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <?php $this->head() ?>

</head>
<body>

<div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
    <?php echo $this->render("//layouts/partials/aside"); ?>

    <?php echo $this->render("//layouts/partials/sidebar"); ?>

    <?php echo $this->render("//layouts/partials/header"); ?>

    <main id="main-container">
        <!-- Page Header -->
        <div class="content bg-image overflow-hidden" style="background-image: url('assets/img/photos/photo3@2x.jpg');">
            <div class="push-50-t push-15">
                <h1 class="h2 text-white animated zoomIn">Dashboard</h1>
                <h2 class="h5 text-white-op animated zoomIn">Welcome Administrator</h2>
            </div>
        </div>
        <!-- END Page Header -->

        <!-- Page Content -->
        <div class="content">
            <div class="row">
                <?php echo $content;?>
            </div>
        </div>
        <!-- END Page Content -->
    </main>

    <?php echo $this->render("//layouts/partials/footer"); ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
