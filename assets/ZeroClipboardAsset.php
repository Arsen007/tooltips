<?php

namespace app\assets;

use yii\web\AssetBundle;

class ZeroClipboardAsset extends AssetBundle
{
    public $sourcePath = '@bower/zeroclipboard/dist';
    public $css = [

    ];
    public $js = [
        'ZeroClipboard.min.js',
    ];
}
