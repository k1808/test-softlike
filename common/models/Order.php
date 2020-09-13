<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $date
 * @property int $item
 * @property int $price
 *
 * @property Product $item0
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'item', 'price'], 'required'],
            [['date'], 'safe'],
            [['item', 'price'], 'integer'],
            [['item'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['item' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'item' => 'Item',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Item0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem0()
    {
        return $this->hasOne(Product::className(), ['id' => 'item']);
    }
}
