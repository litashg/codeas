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

<div id="page-container" class="header-navbar-fixed">
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <div class="row">
                <?php echo $content;?>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
