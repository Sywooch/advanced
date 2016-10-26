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
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/main.css',
        'css/owl.carousel.css',
        'css/responsive.css',
        'css/presets/preset1.css',
        //'css/presets/preset2.css',
        //'css/presets/preset3.css',
        //'css/presets/preset4.css',
    ];
    public $js = [
    'js/jquery.min.js',
    'js/modernizr.min.js',
    'js/scrollup.min.js',
    'js/bootstrap.min.js',
    'js/custom.js',
    //'http://maps.google.com/maps/api/js?sensor=true',
    'js/gmaps.min.js',
    'js/gomap.js',
    'js/map.js',
    'js/owl.carousel.min.js',
    'js/smoothscroll.min.js',
    'js/price-range.js',
    'js/main.js',
    //'js/magnific-popup.min.js',
    //'js/switcher.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
