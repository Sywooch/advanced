<?php
namespace frontend\models;

use yii\base\Model;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use common\models\User;
class ChangePassword extends Model {
    //const STATUS_DELETED = 0;
    //const STATUS_ACTIVE = 10;
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    public function rules()
    {
        return [
           // ['status', 'default', 'value' => self::STATUS_ACTIVE],
           // ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],

            [['currentPassword','newPassword','confirmPassword'],'required'],
            [['currentPassword'] , 'validateCurrentPassword'],
            [['newPassword','confirmPassword'], 'string' ,'min'=>6],
            [['newPassword','confirmPassword'] , 'filter' , 'filter' =>'trim'],
            [['confirmPassword'] , 'compare', 'compareAttribute'=>'newPassword' , 'message'=>'password do not match'],
        ];
    }

    public function validateCurrentPassword(){
        if(!$this->verifyPassword($this->currentPassword)){
            $this->addError("currentPassword","current password incorect ");
        }
    }
    public function verifyPassword($password){
        $dbpassword  = User::findOne(['username'=>yii::$app->user->identity->username ])->password_hash;
        return yii::$app->security->validatePassword($password,$dbpassword);
    }

    public static function findIdentity($id)
    {
        return User::findOne(['id' => $id]);
    }
}