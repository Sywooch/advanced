<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CmsCategory */

$this->title = $model->cms_category_name_en;
$this->params['breadcrumbs'][] = ['label' => 'Cms Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-category-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cms_category_id',
            'cms_category_name_en',
            'cms_category_name_ar',
        ],
    ]) ?>

</div>



<table class="table table-striped">
    <thead>
    <tr>
        <th>Field Name</th>
        <th>Field Type</th>
    </tr>
    </thead>
    <tbody>


    <?php
    foreach ($CmsCategoryField as $item){
        echo '<tr>';
        echo '<td>'.$item->cms_field_name.'</td>';
        echo '<td>'.$item->cms_field_type.'</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
