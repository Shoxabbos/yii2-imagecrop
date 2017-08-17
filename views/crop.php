<?php
/**
 * Created by PhpStorm.
 * User: shoxabbos
 * Date: 8/3/17
 * Time: 12:24
 */

/**
 * @var $widget \shoxabbos\imagecrop\CropWidget
 */

\shoxabbos\imagecrop\CropAsset::register($this);


if (!is_file($widget->path) || empty($widget->image)) {
    echo \yii\helpers\Html::img($widget->image);
    return;
}

$script = <<<JS
$(function () {
  var previews = $('.preview');

  $("#photoFilePath").val("$widget->path"); 

  $('#image').cropper({
      aspectRatio: $widget->ratio,
      ready: function (e) {
        var clone = $(this).clone().removeClass('cropper-hidden');

        clone.css({
          display: 'block',
          width: '100%',
          minWidth: 0,
          minHeight: 0,
          maxWidth: 'none',
          maxHeight: 'none'
        });

        previews.css({
          width: '100%',
          overflow: 'hidden'
        }).html(clone);
      },

      crop: function (e) {
        var imageData = $(this).cropper('getImageData');
        var previewAspectRatio = e.width / e.height;

        previews.each(function () {
          var preview = $(this);
          var previewWidth = preview.width();
          var previewHeight = previewWidth / previewAspectRatio;
          var imageScaledRatio = e.width / previewWidth;

          preview.height(previewHeight).find('img').css({
            width: imageData.naturalWidth / imageScaledRatio,
            height: imageData.naturalHeight / imageScaledRatio,
            marginLeft: -e.x / imageScaledRatio,
            marginTop: -e.y / imageScaledRatio
          });
        });
        
        $("#photoX").val(e.x);
        $("#photoY").val(e.y);
        $("#photoWidth").val(e.width);
        $("#photoHeight").val(e.height);
        $("#photoRotate").val(e.rotate);
        $("#photoScaleX").val(e.scaleX);
        $("#photoScaleY").val(e.scaleY);
      }
    });
});
JS;

$this->registerJs($script);
?>

<div class="row">
    <div class="col-sm-6">
        <img id="image" style="width: 100%" src="<?=$widget->image?>" alt="">
    </div>


    <div class="col-sm-6">
        <div style="width: 300px; height: 200px">
            <div class="preview"></div>
        </div>
    </div>

    <div class="col-sm-12 text-center"><br>
        <div class="form-group">
            <?php $form = \kartik\form\ActiveForm::begin(['action' => $widget->action]) ?>
            <input type="hidden" id="modelId" name="modelId" value="<?=$widget->modelId?>">
            <input type="hidden" id="photoX" name="DynamicModel[x]" value="">
            <input type="hidden" id="photoY" name="DynamicModel[y] value="">
            <input type="hidden" id="photoWidth" name="DynamicModel[width] value="">
            <input type="hidden" id="photoHeight" name="DynamicModel[height] value="">
            <input type="hidden" id="photoRotate" name="DynamicModel[rotate] value="">
            <input type="hidden" id="photoScaleX" name="DynamicModel[scaleX] value="">
            <input type="hidden" id="photoScaleY" name="DynamicModel[scaleY] value="">
            <input type="hidden" id="photoFilePath" name="DynamicModel[path] value="">

            <input type="submit" class="btn btn-lg bg-primary" value="Send">
            <?php \kartik\form\ActiveForm::end() ?>
        </div>
    </div>
</div>


