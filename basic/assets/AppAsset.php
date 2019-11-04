<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/nprogress.css',
        'css/blue.css',
        'css/bootstrap-progressbar-3.3.4.min.css',
        'css/jqvmap.min.css',
        'css/daterangepicker.css',
        'css/custom.min.css',

    ];
    public $js = [
        'js/main.js',
        'js/jquery/dist/jquery.min.js',
        'js/bootstrap/dist/js/bootstrap.min.js',
        'js/fastclick/lib/fastclick.js',
        'js/nprogress/nprogress.js',
        'js/Chart.js/dist/Chart.min.js',
        'js/gauge.js/dist/gauge.min.js',
        'js/bootstrap-progressbar/bootstrap-progressbar.min.js',
        'js/iCheck/icheck.min.js',
        'js/skycons/skycons.js',
        'js/Flot/jquery.flot.js',
        'js/Flot/jquery.flot.pie.js',
        'js/Flot/jquery.flot.time.js',
        'js/Flot/jquery.flot.stack.js',
        'js/Flot/jquery.flot.resize.js',
        'js/flot.orderbars/js/jquery.flot.orderBars.js',
        'js/flot-spline/js/jquery.flot.spline.min.js',
        'js/flot.curvedlines/curvedLines.js',
        'js/DateJS/build/date.js',
        'js/jqvmap/dist/jquery.vmap.js',
        'js/jqvmap/dist/maps/jquery.vmap.world.js',
        'js/jqvmap/examples/js/jquery.vmap.sampledata.js',
        'js/moment/min/moment.min.js',
        'js/bootstrap-daterangepicker/daterangepicker.js',
        'js/custom.min.j',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
        'yii\bootatrap\BootstrapPluginAsset',
    ];
}
