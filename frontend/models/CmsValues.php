<?php

namespace frontend\models;

use Yii;
use backend\models\CmsCategoryField;

/**
 * This is the model class for table "cms_values".
 *
 * @property integer $cms_values_id
 * @property integer $cms_item_id
 * @property integer $cms_category_field_id
 * @property string $cms_value
 */
class CmsValues extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cms_item_id', 'cms_category_field_id', 'cms_value'], 'required'],
            [['cms_item_id', 'cms_category_field_id'], 'integer'],
            [['cms_value'], 'string'],
            [['cms_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => CmsItem::className(), 'targetAttribute' => ['cms_item_id' => 'cms_item_id']],
            [['cms_category_field_id'], 'exist', 'skipOnError' => true, 'targetClass' => CmsCategoryField::className(), 'targetAttribute' => ['cms_category_field_id' => 'cms_category_field_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cms_values_id' => 'Cms Values ID',
            'cms_item_id' => 'Cms Item ID',
            'cms_category_field_id' => 'Cms Category Field ID',
            'cms_value' => 'Cms Value',
        ];
    }
}
