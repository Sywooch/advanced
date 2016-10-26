<?php

namespace frontend\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "apply".
 *
 * @property integer $apply_id
 * @property integer $advertisement_id
 * @property integer $user_id
 * @property string $name
 * @property string $message
 * @property string $file
 *
 * @property Advertisement $advertisement
 * @property User $user
 */
class Apply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file; 
    public static function tableName()
    {
        return 'apply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['advertisement_id', 'user_id', 'name', 'message'], 'required'],
            [['advertisement_id', 'user_id'], 'integer'],
            [['message', 'attach'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['file'],'file'],
            [['advertisement_id'], 'exist', 'skipOnError' => true, 'targetClass' => Advertisement::className(), 'targetAttribute' => ['advertisement_id' => 'advertisement_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'apply_id' => 'Apply ID',
            'advertisement_id' => 'Advertisement ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'message' => 'Message',
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvertisement()
    {
        return $this->hasOne(Advertisement::className(), ['advertisement_id' => 'advertisement_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
