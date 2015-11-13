<?php

namespace comdvas\jasnybootstrap;

use yii\web\AssetBundle;

class JasnyBootstrapAsset extends AssetBundle
{
    public $sourcePath = '@bower/jasny-bootstrap/dist';

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public $css = [
        'css/jasny-bootstrap.min.css'
    ];

    public $js = [
        'js/jasny-bootstrap.min.js'
    ];
}
