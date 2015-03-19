<?php

namespace app\assets;

use yii\web\AssetBundle;

class HighlightJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/highlightjs';
    public $css = [
        'styles/ir_black.css',
    ];
    public $js = [
        'highlight.pack.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
