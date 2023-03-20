<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Category;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $content
 * @property float $price
 * @property float $old_price
 * @property string|null $description
 * @property string|null $keywords
 * @property string $img
 * @property int $is_offer
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory() {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'content'], 'required'],
            [['category_id', 'is_offer'], 'integer'],
            [['content'], 'string'],
            [['price', 'old_price'], 'number'],
            [['title', 'description', 'keywords', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ товара',
            'category_id' => 'Категория',
            'title' => 'Наименование товара',
            'content' => 'Описание товара',
            'price' => 'Цена',
            'old_price' => 'Старая цена',
            'description' => 'Примечание',
            'keywords' => 'Ключевые слова',
            'img' => 'Изображение',
            'is_offer' => 'Оффер',
        ];
    }
}
