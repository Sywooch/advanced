<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cms_item".
 *
 * @property integer $cms_item_id
 * @property integer $cms_category_id
 * @property string $date_time
 */
class CmsItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cms_category_id', 'date_time'], 'required'],
            [['cms_category_id'], 'integer'],
            [['date_time'], 'safe'],
            [['cms_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CmsCategory::className(), 'targetAttribute' => ['cms_category_id' => 'cms_category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cms_item_id' => 'Cms Item ID',
            'cms_category_id' => 'Cms Category ID',
            'date_time' => 'Date Time',
        ];
    }
}
