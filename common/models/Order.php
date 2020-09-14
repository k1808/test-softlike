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
 * @property int $user_id
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
            [['date', 'item', 'price', 'user_id'], 'required'],
            [['date'], 'safe'],
            [['item', 'price', 'user_id'], 'integer'],
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
            'user_id' => 'User ID',
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

    public static function create($item, $email, $password){
        $order = new static();
        $user->username = $name;
        $user->email = $email;
        $user->setPassword($password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $customer = Yii::$app->authManager;
        $customerRole = $customer->getRole('customer');
        $customer->assign($customerRole, $user->getId());
        return $user;
    }
}
