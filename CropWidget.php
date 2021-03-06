<?php
/**
 * Created by PhpStorm.
 * User: shoxabbos
 * Date: 8/3/17
 * Time: 13:57
 */

namespace shoxabbos\imagecrop;

use yii\base\Widget;
use yii\web\NotFoundHttpException;

class CropWidget extends Widget
{
    /**
     * Image url
     * @var string
     */
    public $image;

    /**
     * Full image path
     * @var string
     */
    public $modelId;
    public $path;
    public $width;
    public $height;
    public $action;
    public $ratio = "6 / 4";

    public function run()
    {
        return $this->render("crop", [
            'widget' => $this,
        ]);
    }
}