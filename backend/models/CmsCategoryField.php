<?php

namespace backend\models;

use Yii;
use frontend\models\CmsCategory;

/**
 * This is the model class for table "cms_category_field".
 *
 * @property integer $cms_category_field_id
 * @property integer $cms_category_id
 * @property string $cms_field_name
 * @property string $cms_field_type
 */
class CmsCategoryField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_category_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cms_category_id'], 'integer'],
            [['cms_field_type'], 'string'],
            [['cms_field_name'], 'string', 'max' => 100],
            [['cms_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CmsCategory::className(), 'targetAttribute' => ['cms_category_id' => 'cms_category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cms_category_field_id' => 'Cms Category Field ID',
            'cms_category_id' => 'Cms Category ID',
            'cms_field_name' => 'Cms Field Name',
            'cms_field_type' => 'Cms Field Type',
        ];
    }
}
