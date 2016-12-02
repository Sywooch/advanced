
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CmsItem */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="http://cdn.ckeditor.com/4.6.0/full/ckeditor.js"></script>
<?= Html::csrfMetaTags() ?>
<div class="cms-category-form" style="margin-top: 7%;">

<div class="section seller-info">
  <h4>Ad Details</h4>
<form method="POST" action="index.php?r=cms-item/create">
  <?php
    foreach ($fields as $field) {
      switch ($field['cms_field_type']) {
        case 'text':
          $field_id = $field['cms_category_field_id'];
          echo '<div class="row form-group">
            <label class="col-sm-3 label-title">'.$field['cms_field_name'].'</label>';
            echo'<div class="col-sm-9">
              <input type="text" name="field_'.$field_id.'" class="form-control">
              </div>
            </div>';
          break;
        case 'area':
          $field_id = $field['cms_category_field_id'];
          $field_id = $field['cms_category_field_id'];
          echo '<div class="row form-group">
            <label class="col-sm-3 label-title">'.$field['cms_field_name'].'</label>';
            echo'<div class="col-sm-9">
              <textarea class="form-control" name="field_'.$field_id.'" rows="5" id="comment"></textarea>
              </div>
            </div>';
          break;
        case 'html':
        $field_id = $field['cms_category_field_id'];
        echo '<div class="row form-group">
          <label class="col-sm-3 label-title">'.$field['cms_field_name'].'</label>';
          echo'<div class="col-sm-9">
          <textarea name="field_'.$field_id.'"></textarea>
                <script>
                    CKEDITOR.replace( "field_'.$field_id.'" );
                </script>
            </div>
          </div>';
          break;
        case 'img':
        $field_id = $field['cms_category_field_id'];
        echo '<div class="row form-group">
          <label class="col-sm-3 label-title">'.$field['cms_field_name'].'</label>';
          echo'<div class="col-sm-9">
            <input type="text" name="field_'.$field_id.'" class="form-control">
            </div>
          </div>';

        break;
        }
    }
  ?>
  <input type="hidden" name="category" value="<?=$field['cms_category_id'];?>" />
  <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
  <button class="btn btn-success" type="submit">Submit</button>
</form>

</div><!-- section -->
</div><!-- section -->
