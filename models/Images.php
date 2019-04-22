<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $img
 * @property string $alt
 * @property int $id_news
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alt'], 'string'],
            [['alt'], 'required', 'message'=>'Поле не может быть пустым'],  
            [['id_news'], 'integer'],
            [['img'], 'string', 'max' => 256],
            ['img', 'file', 'extensions' => ['jpg'], 'message'=>'Допустимые расширения: jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'alt' => 'Alt',
            'id_news' => 'Id News',
        ];
    }
}
