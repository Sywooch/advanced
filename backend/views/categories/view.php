<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Fields;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Categories */

$this->title = $model->english_name;

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





    <table class="table table-striped">
        <thead>
        <tr>
            <th>English Field Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>


        <?php
        foreach ($categoriesFields as $item){
            echo '<tr>';
            echo '<td>'.$item['english_name'].'</td>';
            echo '<td><a href="index.php?r=categories-fields/delete&id='.$item['categories_fields_id'].'&cat='.$model->category_id.'"><span class="glyphicon glyphicon-minus-sign"></span></a></td> ';
            echo '</tr>';
        }

        ?>
        </tbody>
    </table>
    <hr>







    <div id="add-field-data">
        <div class="field-list-data-form">

            <?php
            $categoriesFields = new \backend\models\CategoriesFields();
            ?>
            <?php $form = ActiveForm::begin(['action' => 'index.php?r=categories-fields/create','options' => ['method' => 'post']]) ?>

            <?= Html::activeHiddenInput($categoriesFields, 'category_id',array('value'=>$model->category_id)) ;?>

            <?php

            $fields = Fields::find()->all();
            $fieldsList = ArrayHelper::map($fields,'field_id','english_name');
            ?>

            <?=   $form->field($categoriesFields, 'field_id')->widget(Select2::classname(), [
                'data' =>  $fieldsList,
                'value' => 'field_id',
                'language' => 'en',
                'options' => ['placeholder' => 'Select a state ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>



</div>
