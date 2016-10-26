<?php

namespace frontend\models;
use common\models\User;
use Yii;

/**
 * This is the model class for table "wishlists".
 *
 * @property integer $wishlist_id
 * @property integer $user_id
 * @property integer $advertisement_id
 *
 * @property User $user
 * @property Advertisement $advertisement
 */
class Wishlists extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wishlists';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'advertisement_id'], 'required'],
            [['user_id', 'advertisement_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['advertisement_id'], 'exist', 'skipOnError' => true, 'targetClass' => Advertisement::className(), 'targetAttribute' => ['advertisement_id' => 'advertisement_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wishlist_id' => 'Wishlist ID',
            'user_id' => 'User ID',
            'advertisement_id' => 'Advertisement ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvertisement()
    {
        return $this->hasOne(Advertisement::className(), ['advertisement_id' => 'advertisement_id']);
    }
}
