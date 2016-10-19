<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "askdubarji".
 *
 * @property integer $ask_id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 */
class AskDubarji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'askdubarji';
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
            'ask_id' => 'Ask ID',
            'name' => 'Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'message' => 'Message',
        ];
    }
}
