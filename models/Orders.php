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
 * @property int $age
 * @property string $comment
 * @property string $date
 * @property string $time
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $reCaptcha;
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age'], 'integer'],
            [['comment'], 'string'],
            [['date', 'time'], 'safe'],
            [['name', 'email', 'city'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 50],
            [['email'], 'email', 'message'=>'Введите корректный email'],
            [['name', 'phone', 'age', 'city'], 'required', 'message'=>'Поле не может быть пустым'],
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6Lfc6Z8UAAAAAElZT7mFgmuRC8UNjL6a8fwqRu-i', 'uncheckedMessage' => 'Пожалуйста, пройдите проверку, что вы не робот'],
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
