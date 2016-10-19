<?php

namespace frontend\models;
use common\models\User;
use common\models\Categories;
use frontend\models\AdvertisementPhotos;

use Yii;

/**
 * This is the model class for table "advertisement".
 *
 * @property integer $advertisement_id
 * @property integer $user_id
 * @property integer $category_id
 * @property string $category_related
 * @property string $title
 * @property string $description
 * @property string $country
 * @property string $city
 * @property string $phone
 * @property string $email
 *
 * @property User $user
 * @property Categories $category
 * @property AdvertisementPhotos[] $advertisementPhotos
 */
class Advertisement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advertisement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'category_related', 'title', 'description', 'country', 'city'],'required'],
            [['user_id', 'category_id'], 'integer'],
            [['category_related', 'description'], 'string'],
            [['title', 'country', 'city', 'phone', 'email'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'advertisement_id' => 'Advertisement ID',
            'user_id' => 'Posted By',
            'category_id' => 'Category',
            'category_related' => 'Details',
            'title' => 'Title',
            'description' => 'Description',
            'country' => 'Country',
            'city' => 'City',
            'phone' => 'For Contact  ',
            'email' => 'For Contact',
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
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvertisementPhotos()
    {
        return $this->hasMany(AdvertisementPhotos::className(), ['advertisement_id' => 'advertisement_id']);
    }
}
