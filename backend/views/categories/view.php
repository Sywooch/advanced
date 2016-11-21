<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Fields;

/* @var $this yii\web\View */
/* @var $model common\models\Categories */

$this->title = $model->category_id;
$items = [
    ['id' => 1, 'name' => 'Item 1'],
    ['id' => 2, 'name' => 'Item 2'],
    ['id' => 3, 'name' => 'Item 3'],
    ['id' => 4, 'name' => 'Item 4'],
    ['id' => 5, 'name' => 'Item 5']
];
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->category_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'category_id',
            'arabic_name',
            'english_name',
            'parent_category_id',
            'arabic_description:ntext',
            'english_description:ntext',
            'icon',
        ],
    ]) ?>


        <select multiple="multiple" data-source="http://geodan.github.io/duallistbox/sample/sample-100.json"></select>

        <script>
            $('select').DualListBox();
        </script>



</div>
