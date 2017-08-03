IMage Crop
========
Crop image with croppic.js lib

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist shoxabbos/yii2-imagecrop "*"
```

or add

```
"shoxabbos/yii2-imagecrop": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Add this action to your controller
```php 
public function actions()
{
    return [
        'crop' => [
            'class' => \shoxabbos\imagecrop\CropAction::className(),
            'width' => 900,
            'height' => 600,
        ]
    ];
}
```

Add this code to your view file
```php
\shoxabbos\imagecrop\CropWidget::widget([
    'action' => Url::to(['crop']),
    'image' => $model->photoUrl,
    'path' => Yii::getAlias('@webroot')."/".$model->photo,
]);
```