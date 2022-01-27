<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $images
 */
class Gallery extends ActiveRecord
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
            [['title'], 'string', 'max' => 30],
            [['images'], 'string', 'max' => 255],
            ['status', 'boolean']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'images' => 'Images',
            'status'=>'Status'
        ];
    }

    public function getImages(){
        $images = explode(',', $this->images);
        $link = [];
        for ($i = 0; $i < count($images); $i++){
            $link [] = 'http://online/frontend/web/img/gallery/'.$images[$i];
        }
        return $link;
    }
}
