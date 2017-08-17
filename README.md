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

Demo
-----
![alt text](https://github.com/Shoxabbos/yii2-imagecrop/blob/master/demo.png)


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
            'whenCropped' => function () {
                // when file cropped!
            }
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
    'ration' => '4 / 3',
]);
```


Developer Team
http://www.qwerty.uz
