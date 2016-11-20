<?php

namespace backend\models;

use Yii;
use common\models\Categories;
use common\models\Fields;


/**
 * This is the model class for table "categories_fields".
 *
 * @property integer $categories_fields_id
 * @property integer $category_id
 * @property integer $field_id
 *
 * @property Categories $category
 * @property Fields $field
 */
class CategoriesFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'field_id'], 'required'],
            [['category_id', 'field_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'category_id']],
            [['field_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fields::className(), 'targetAttribute' => ['field_id' => 'field_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categories_fields_id' => 'Categories Fields ID',
            'category_id' => 'Category ID',
            'field_id' => 'Field ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getField()
    {
        return $this->hasOne(Fields::className(), ['field_id' => 'field_id']);
    }
}
