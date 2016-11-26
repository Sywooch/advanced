
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fields';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fields-index">


<table class="table table-striped">
    <thead>
    <tr>
        <th>Category Name English</th>
        <th>Category Name Arabic</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>


    <?php
    foreach ($categories as $item){
        echo '<tr>';
        echo '<td>'.$item->cms_category_name_en.'</td>';
        echo '<td>'.$item->cms_category_name_ar.'</td>';
        echo '<td><a href="index.php?r=cms-category/view&id='.$item->cms_category_id.'"><span class="glyphicon glyphicon-eye-open"></span></a></td> ';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>

</div>
