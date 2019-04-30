<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $city
 * @property string $age
 * @property string $comment
 * @property string $date
 * @property string $time
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const SCENARIO_CONTACTS = 'contacts';
    const SCENARIO_POPUP = 'popup';
    const SCENARIO_ABOUTUS = 'aboutus';

    public $reCaptcha;
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()             //'except' => self::SCENARIO_DEFAULT
    {
        return [            
            [['comment', 'age'], 'string'],
            [['comment'], 'required', 'message'=>'Поле не может быть пустым', 'on' => self::SCENARIO_ABOUTUS],             
            [['date', 'time'], 'safe'],
            [['name', 'email', 'city'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 50],
            [['email'], 'email', 'message'=>'Введите корректный email'],
            [['name', 'age', 'city'], 'required', 'message'=>'Поле не может быть пустым'],
            [['phone'], 'required', 'message'=>'Поле не может быть пустым', 'except' => self::SCENARIO_ABOUTUS],
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6Lfc6Z8UAAAAAElZT7mFgmuRC8UNjL6a8fwqRu-i', 'uncheckedMessage' => 'Пожалуйста, пройдите проверку, что вы не робот'],
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_CONTACTS => ['name', 'phone', 'email', 'city', 'age', 'comment', 'date', 'time','reCaptcha'],
            self::SCENARIO_POPUP => ['name', 'phone', 'email', 'date', 'time','reCaptcha'],            
            self::SCENARIO_ABOUTUS => ['name', 'phone', 'comment', 'date', 'time','reCaptcha'],      
        ];
    } 

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'city' => 'City',
            'age' => 'Age',
            'comment' => 'Comment',
            'date' => 'Date',
            'time' => 'Time',
        ];
    }
}
