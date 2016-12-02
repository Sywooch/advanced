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



<a class="btn btn-success" href="index.php?r=cms-item/custom&cat=<?= $model->cms_category_id ?>">Create New stories</a>

<table class="table table-striped" style="margin-top:2%;">
    <thead>
    <tr>
        <th>Item ID</th>
<?php
foreach ($CmsCategoryField as $item){
    echo '<th>'.$item->cms_field_name.'</th>';
}
?>

<th>Action</th>

 </tr>
    </thead>
    <tbody>
    <?php


    $i = 1;
    foreach ($items as $item){
        echo '<tr>';
        echo '<td>'.($item[0]['cms_item_id']).'</td>';
        foreach ($item as $value) {
            echo '<td>'.$value['cms_value'].'</td>';
        }
        echo '</tr>';
        $i++;
    }
    ?>
    </tbody>
</table>
