<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/popup.css',
    ];
    public $js = [
		'js/apples.js',
		'js/popup.js',
    ];
    public $depends = [
		'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
