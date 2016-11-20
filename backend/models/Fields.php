<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fields".
 *
 * @property integer $field_id
 * @property string $arabic_name
 * @property string $english_name
 * @property string $field_type
 * @property integer $is_required
 * @property integer $field_order
 * @property integer $list_page
 * @property integer $filter_page
 *
 * @property CategoriesFields[] $categoriesFields
 * @property FieldListData[] $fieldListDatas
 */
class Fields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arabic_name', 'english_name', 'field_type', 'is_required', 'field_order', 'list_page', 'filter_page'], 'required'],
            [['field_type'], 'string'],
            [['is_required', 'field_order', 'list_page', 'filter_page'], 'integer'],
            [['arabic_name', 'english_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'field_id' => 'Field ID',
            'arabic_name' => 'Arabic Name',
            'english_name' => 'English Name',
            'field_type' => 'Field Type',
            'is_required' => 'Is Required',
            'field_order' => 'Field Order',
            'list_page' => 'List Page',
            'filter_page' => 'Filter Page',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriesFields()
    {
        return $this->hasMany(CategoriesFields::className(), ['field_id' => 'field_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFieldListDatas()
    {
        return $this->hasMany(FieldListData::className(), ['field_id' => 'field_id']);
    }
}
