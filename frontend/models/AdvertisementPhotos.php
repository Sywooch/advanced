<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "advertisement_photos".
 *
 * @property integer $advertisement_photos_id
 * @property string $photo_url
 * @property integer $advertisement_id
 *
 * @property Advertisement $advertisement
 */
class AdvertisementPhotos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'advertisement_photos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo_url', 'advertisement_id'], 'required'],
            [['advertisement_id'], 'integer'],
            [['photo_url'], 'string', 'max' => 1000],
            [['advertisement_id'], 'exist', 'skipOnError' => true, 'targetClass' => Advertisement::className(), 'targetAttribute' => ['advertisement_id' => 'advertisement_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'advertisement_photos_id' => 'Advertisement Photos ID',
            'photo_url' => 'Photo Url',
            'advertisement_id' => 'Advertisement ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvertisement()
    {
        return $this->hasOne(Advertisement::className(), ['advertisement_id' => 'advertisement_id']);
    }
}
