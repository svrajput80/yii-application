<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AboutAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        
        'https://cdn.datatables.net/v/dt/dt-1.10.12/se-1.2.0/datatables.min.css',
        'https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.7/css/dataTables.checkboxes.css',
        'https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css',
        'https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css',
    ];
    public $js = [
        
        'https://code.jquery.com/jquery-3.5.1.js',
        'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js',
        'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js',
        'https://cdn.datatables.net/v/dt/dt-1.10.12/se-1.2.0/datatables.min.js',
        'https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.7/js/dataTables.checkboxes.min.js',
        // 'https://code.jquery.com/jquery-3.5.1.js',
        // 'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js',
        'https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js',

        // 'https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js',
        // 'https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js',


        'https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',
        'https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js',
        'https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
    
}
