<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $category_id
 * @property string $arabic_name
 * @property string $english_name
 * @property integer $parent_category_id
 * @property string $arabic_description
 * @property string $english_description
 * @property string $icon
 *
 * @property Advertisement[] $advertisements
 * @property CategoriesFields[] $categoriesFields
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }
    public $file;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arabic_name', 'english_name', 'arabic_description', 'english_description'], 'required'],
            [['parent_category_id'], 'integer'],
            [['arabic_description', 'english_description'], 'string'],
            [['arabic_name', 'english_name', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'arabic_name' => 'Arabic Name',
            'english_name' => 'English Name',
            'parent_category_id' => 'Main Category',
            'arabic_description' => 'Arabic Description',
            'english_description' => 'English Description',
            'icon' => 'Icon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvertisements()
    {
        return $this->hasMany(Advertisement::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriesFields()
    {
        return $this->hasMany(CategoriesFields::className(), ['category_id' => 'category_id']);
    }
}
