<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendors/bootstrap/bootstrap.min.css',
        "vendors/fontawesome/css/all.min.css",
        "vendors/themify-icons/themify-icons.css",
        "vendors/linericon/style.css",
        "vendors/nice-select/nice-select.css",
        "vendors/owl-carousel/owl.theme.default.min.css",
        "vendors/owl-carousel/owl.carousel.min.css",
        "vendors/nouislider/nouislider.min.css",
        "css/style.css",
        [
            'href'=>'img/Fevicon.png',
            'rel'=>'icon',
            'type'=>'image/png',
        ]
    ];
    public $js = [
        "vendors/jquery/jquery-3.2.1.min.js",
        "vendors/bootstrap/bootstrap.bundle.min.js",
        "vendors/skrollr.min.js",
        "vendors/owl-carousel/owl.carousel.min.js",
        "vendors/nice-select/jquery.nice-select.min.js",
        "vendors/jquery.ajaxchimp.min.js",
        "vendors/mail-script.js",
        "js/main.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap4\BootstrapAsset',
    ];
}
