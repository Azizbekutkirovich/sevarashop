<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $img
 * @property string $context
 * @property string $sum
 * @property string $date
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'img', 'context', 'sum'], 'required'],
            [['category_id'], 'integer'],
            [['date'], 'safe'],
            [['name', 'img', 'context', 'sum'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'img' => 'Img',
            'context' => 'Context',
            'sum' => 'Sum',
            'date' => 'Date',
        ];
    }
}
