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
        'js/kladr/jquery.kladr.min.css',
        'js/lightgallery/dist/css/lightgallery.css',
        'js/owlcarousel/docs/assets/owlcarousel/assets/owl.carousel.css',
        'js/owlcarousel/docs/assets/owlcarousel/assets/owl.theme.green.css',
    ];
    public $js = [
        'js/lightgallery/dist/js/lightgallery.min.js',
        'js/owlcarousel/docs/assets/owlcarousel/owl.carousel.min.js',
        'js/phone/jquery.mask.min.js',
        'js/kladr/jquery.kladr.min.js',
        'js/site.js',
        'js/admin.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
