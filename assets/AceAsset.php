<?php

namespace app\assets;

use yii\web\AssetBundle;

class AceAsset extends AssetBundle
{
    public $sourcePath = '@bower/ace-builds/src';
    public $css = [
    ];
    public $js = [
        'ace.js',
    ];
}
