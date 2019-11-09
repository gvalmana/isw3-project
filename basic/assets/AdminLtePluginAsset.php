<?php
namespace app\assets;
use yii\web\AssetBundle;
class AdminLtePluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/';
    public $js = [
        'datatables/dataTables.bootstrap.min.js',
        'plugins/iCheck/icheck.min.js',
        //'bower_components/jquery/dist/jquery.min.js',
        'bower_components/jquery-ui/jquery-ui.min.js',
        //'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'bower_components/raphael/raphael.min.js',
        'bower_components/morris.js/morris.min.js',
        'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'bower_components/jquery-knob/dist/jquery.knob.min.js',
        'bower_components/moment/min/moment.min.js',
        'bower_components/bootstrap-daterangepicker/daterangepicker.js',
        'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'bower_components/fastclick/lib/fastclick.js',
        'dist/js/pages/dashboard.js',


        // more plugin Js here
    ];
    public $css = [
        'datatables/dataTables.bootstrap.css',
        //'bower_components/bootstrap/dist/css/bootstrap.min.css',
        'bower_components/Ionicons/css/ionicons.min.css',
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/morris.js/morris.css',
        'bower_components/jvectormap/jquery-jvectormap.css',
        'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        'bower_components/bootstrap-daterangepicker/daterangepicker.css',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'plugins/iCheck/square/blue.css',
        // more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}
