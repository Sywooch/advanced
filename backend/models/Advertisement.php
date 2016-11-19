<?php

namespace backend\models;

use Yii;
use common\models\User;
use common\models\Categories;
use frontend\models\AdvertisementPhotos;

/**
 * This is the model class for table "advertisement".
 *
 * @property integer $advertisement_id
 * @property integer $user_id
 * @property integer $category_id
 * @property string $category_related
 * @property integer $status
 * @property string $title
 * @property string $description
 * @property string $country
 * @property string $city
 * @property string $phone
 * @property string $email
 * @property string $created_at
 *
 * @property User $user
 * @property Categories $category
 * @property AdvertisementPhotos[] $advertisementPhotos
 * @property Apply[] $applies
 * @property Wishlists[] $wishlists
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
            [['user_id', 'category_id', 'category_related', 'title', 'description', 'country', 'city'], 'required'],
            [['user_id', 'category_id', 'status'], 'integer'],
            [['category_related', 'description'], 'string'],
            [['created_at'], 'safe'],
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
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'category_related' => 'Category Related',
            'status' => 'Status',
            'title' => 'Title',
            'description' => 'Description',
            'country' => 'Country',
            'city' => 'City',
            'phone' => 'Phone',
            'email' => 'Email',
            'created_at' => 'Created At',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplies()
    {
        return $this->hasMany(Apply::className(), ['advertisement_id' => 'advertisement_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlists()
    {
        return $this->hasMany(Wishlists::className(), ['advertisement_id' => 'advertisement_id']);
    }
}
