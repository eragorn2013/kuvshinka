<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password 
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface 
{   
    public static function tableName()
    {
        return 'user';
    }
   
    public function rules()
    {
        return [
            [['login'], 'string', 'max' => 256],
            [['login', 'password'], 'required', 'message'=>'Поле не может быть пустым'],            
            [['password'], 'string', 'max' => 32],
            [['password'], 'validateLogin'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',            
        ];
    }

    public function validateLogin($attribute, $params)
    {
        $user = self::findOne(['login' => $this->login, 'password'=>md5($this->password)]);
        if($user){        
            Yii::$app->user->login($user, 3600*24*30);
            return true;
        }
        else{        
            $this->addError($attribute, 'Неверные логин или пароль');
            return false;
        }
    }

    public static function findIdentity($id){return static::findOne($id);} 
    public function getId(){return $this->id;}
    public static function findIdentityByAccessToken($token, $type = null){}    
    public function getAuthKey(){}   
    public function validateAuthKey($authKey){}    
}
