<?php

namespace app\models;

use Yii;
use app\models\Images;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $img
 * @property string $head
 * @property string $content
 * @property string $preview
 * @property string $date
 * @property int $active
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */   
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['head', 'content', 'preview'], 'string'],
            [['date'], 'safe'],
            [['active'], 'integer'],
            [['img'], 'string', 'max' => 256],
            ['img', 'file', 'extensions' => ['jpg'], 'message'=>'Допустимые расширения: jpg']
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
            'head' => 'Head',
            'content' => 'Content',
            'preview' => 'Preview',
            'date' => 'Date',
            'active' => 'Опубликовать',
        ];
    }

    public function getImages()
    {
        return $this->hasMany(Images::className(), [ 'id_news' => 'id' ]);
    }
}
