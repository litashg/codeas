<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 *   OneUI backend application asset bundle.
 */
class BackendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700',
        'OneUI/js/plugins/slick/slick.min.css',
        'OneUI/js/plugins/slick/slick-theme.min.css',
        'OneUI/css/bootstrap.min.css',
        'OneUI/css/oneui.css'
    ];

    public $js = [
        'OneUI/js/core/bootstrap.min.js',
        'OneUI/js/core/jquery.slimscroll.min.js',
        'OneUI/js/core/jquery.scrollLock.min.js',
        'OneUI/js/core/jquery.appear.min.js',
        'OneUI/js/core/jquery.countTo.min.js',
        'OneUI/js/core/jquery.placeholder.min.js',
        'OneUI/js/core/js.cookie.min.js',
        'OneUI/js/app.js',
        'OneUI/js/plugins/slick/slick.min.js',
        'OneUI/js/plugins/chartjs/Chart.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $jsOptions = [
        'position' => View::POS_END
    ];
}
