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
class CommonAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/checkbox.min.css',
    ];
    public $js = [
        'js/common/site.min.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
    ];
    public $depends = [
        'app\assets\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
}
