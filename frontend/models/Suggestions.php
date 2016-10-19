<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "suggestions".
 *
 * @property integer $suggestion_id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 */
class Suggestions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'suggestions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'message'], 'required'],
            [['message'], 'string'],
            [['name', 'email', 'subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'suggestion_id' => 'Suggestion ID',
            'name' => 'Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'message' => 'Message',
        ];
    }
}
