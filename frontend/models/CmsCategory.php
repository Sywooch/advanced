<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cms_category".
 *
 * @property integer $cms_category_id
 * @property string $cms_category_name_en
 * @property string $cms_category_name_ar
 */
class CmsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cms_category_name_en', 'cms_category_name_ar'], 'required'],
            [['cms_category_name_en', 'cms_category_name_ar'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cms_category_id' => 'Cms Category ID',
            'cms_category_name_en' => 'Cms Category Name En',
            'cms_category_name_ar' => 'Cms Category Name Ar',
        ];
    }
}
