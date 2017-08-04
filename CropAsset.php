<?php
/**
 * Created by PhpStorm.
 * User: shoxabbos
 * Date: 8/3/17
 * Time: 21:05
 */

namespace shoxabbos\imagecrop;

use yii\web\View;
use kartik\base\AssetBundle;

class CropAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('js', ['js/cropper']);
        $this->setupAssets('css', ['css/cropper.min']);
        parent::init();
    }
}
