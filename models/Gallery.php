<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $name
 * @property string $alt
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alt'], 'string'],
            [['alt'], 'required', 'message'=>'Поле не может быть пустым'],          
            [['name'], 'string', 'max' => 256],           
            ['name', 'file', 'extensions' => ['jpg'], 'message'=>'Допустимые расширения: jpg'],
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
            'alt' => 'Alt',
        ];
    }
}
