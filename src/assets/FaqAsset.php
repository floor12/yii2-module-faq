<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 07/11/2018
 * Time: 22:08
 */

namespace floor12\faq\assets;

use yii\web\AssetBundle;

class FaqAsset extends AssetBundle {
    public $sourcePath = '@vendor/floor12/yii2-module-faq/src/assets';

    public $css = [
        'f12.faq.css'
    ];

    public $js = [

    ];

    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset'
    ];
}