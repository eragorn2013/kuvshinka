<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property int $id
 * @property string $url
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $keywords
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'keywords'], 'string'],
            [['url', 'name'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'name' => 'Name',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
        ];
    }
}
