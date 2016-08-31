<?php

namespace soap\jasnybootstrap;

use yii\web\AssetBundle;

class PlaceHolderAsset extends AssetBundle
{

    public $sourcePath = '@bower/holderjs/';

    public $depends = [

    ];

    public $css = [
    ];

    public $js = [
        'js/holder.js'
    ];
}