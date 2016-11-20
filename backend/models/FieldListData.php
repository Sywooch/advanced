<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "field_list_data".
 *
 * @property integer $field_list_data_id
 * @property integer $field_id
 * @property string $arabic_content
 * @property string $english_content
 * @property integer $field_order
 *
 * @property Fields $field
 */
class FieldListData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'field_list_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['field_id', 'arabic_content', 'english_content', 'field_order'], 'required'],
            [['field_id', 'field_order'], 'integer'],
            [['arabic_content', 'english_content'], 'string', 'max' => 255],
            [['field_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fields::className(), 'targetAttribute' => ['field_id' => 'field_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'field_list_data_id' => 'Field List Data ID',
            'field_id' => 'Field ID',
            'arabic_content' => 'Arabic Content',
            'english_content' => 'English Content',
            'field_order' => 'Field Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getField()
    {
        return $this->hasOne(Fields::className(), ['field_id' => 'field_id']);
    }
}
