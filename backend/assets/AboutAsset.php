<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AboutAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css',
    ];
    public $js = [
        'https://code.jquery.com/jquery-3.5.1.js',
        'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
    
}
