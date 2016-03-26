<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        'plugins/datepicker/datepicker3.css',
        'plugins/daterangepicker/daterangepicker-bs3.css',
        'plugins/morris/morris.css',
        'css/checkbox.css',
    ];
    public $js = [
        'js/jquery-ui.min.js',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'plugins/knob/jquery.knob.js',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'plugins/sparkline/jquery.sparkline.min.js',
        'js/moment.min.js',
        'plugins/daterangepicker/daterangepicker.js',
        'plugins/datepicker/bootstrap-datepicker.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'js/raphael-min.js',
        'plugins/morris/morris.min.js',
        'js/pages/dashboard.js',
    ];
    public $depends = [
        'app\assets\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
}
