<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $price
 * @property int|null $discount
 * @property string|null $image
 * @property int|null $status
 * @property int $category_id
 * @property int $brand_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Brand $brand
 * @property Category $category
 * @property ProductLang[] $productLangs
 */
class Product extends ActiveRecord
{
    use MultilingualLabelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description1', 'description2', 'specification'], 'string'],
            [['price', 'discount'], 'integer', 'min'=>1],
            [['status', 'category_id', 'brand_id', 'created_at', 'updated_at'], 'integer'],
            [['category_id', 'brand_id'], 'required'],
            [['image'], 'string', 'max' => 100],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'timestamp' => [

                'class' => 'yii\behaviors\TimestampBehavior',

                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],

            ],
            'multilingual' => [
                'class' => MultilingualBehavior::className(),
                'languages' => [
                    'uz' => 'Uzbek',
                    'ru' => 'Ruscha',
                    'en' => 'Inglizcha',
                ],
                'attributes' => [
                    'name',
                    'description1',
                    'description2',
                    'specification'
                ]

            ]

        ];
    }

    public static function find()
    {
        $query = new MultilingualQuery(get_called_class());
        return $query->multilingual();
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'discount' => 'Discount',
            'image' => 'Image',
            'status' => 'Status',
            'category_id' => 'Category ID',
            'brand_id' => 'Brand ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\BrandQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CategoryQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getImages(){
        $images = explode(',', $this->image);
        $link = [];
        for ($i = 0; $i < count($images); $i++){
            $link [] = 'http://online/frontend/web/img/product/'.$images[$i];
        }
        return $link;
    }

}
