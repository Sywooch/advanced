<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\Fields */

$this->title = $model->field_id;
$this->params['breadcrumbs'][] = ['label' => 'Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fields-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->field_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->field_id], [
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
            'field_id',
            'arabic_name',
            'english_name',
            'field_type',
            'is_required',
            'field_order',
            'list_page',
            'filter_page',
        ],
    ]) ?>


    <?php
    $dataField = new \backend\models\FieldListData();
    if ($model->field_type == "list" || $model->field_type == "checkbox" || $model->field_type == "radio" )
    {
    ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Listing Content English</th>
            <th>Listing Content Arabic</th>
            <th>Field Order</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>


        <?php
        foreach ($filedList as $item){
            echo '<tr>';
            echo '<td>'.$item->english_content.'</td>';
            echo '<td>'.$item->arabic_content.'</td>';
            echo '<td>'.$item->field_order.'</td>';
            echo '<td><a href="index.php?r=field-list-data/view&id='.$item->field_list_data_id.'"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="index.php?r=field-list-data/update&id='.$item->field_list_data_id.'"><span class="glyphicon glyphicon-edit"></span></a> <a href="index.php?r=field-list-data/delete&id='.$item->field_list_data_id.'"><span class="glyphicon glyphicon-minus-sign"></span></a></td> ';
            echo '</tr>';
        }

        ?>
        </tbody>
    </table>
<hr>




    <h2>Add Field Data</h2>
    <div id="add-field-data">
        <div class="field-list-data-form">

            <?php $form = ActiveForm::begin(['action' => 'index.php?r=field-list-data/create-ajax','options' => ['method' => 'post']]) ?>

            <?= Html::activeHiddenInput($dataField, 'field_id',array('value'=>$model->field_id)) ;?>

            <?= $form->field( $dataField , 'arabic_content')->textInput(['maxlength' => true]) ?>

            <?= $form->field($dataField ,'english_content')->textInput(['maxlength' => true]) ?>

            <?= $form->field($dataField ,'field_order')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>


<?php
    }
    ?>

