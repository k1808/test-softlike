<?php

namespace common\models;


use common\models\City;
use common\models\Country;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $gender
 * @property string $first_name
 * @property string $last_name
 * @property int $country_id
 * @property int $city_id
 * @property string $birth_date
 * @property string|null $phone
 * @property int|null $qty_orders
 * @property int|null $total_income
 *
 * @property User $user
 * @property City $city
 * @property Country $country
 */
class Profile extends \yii\db\ActiveRecord
{

    public $email;
    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender', 'email', 'password', 'first_name', 'last_name', 'country_id', 'city_id', 'birth_date'], 'required'],
            [['user_id', 'country_id', 'city_id', 'qty_orders', 'total_income'], 'integer'],
            [['birth_date'], 'safe'],
            [['gender'], 'string', 'max' => 5],
            [['first_name', 'last_name', 'phone'], 'string', 'max' => 128],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'gender' => 'Gender',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'country_id' => 'Country ID',
            'city_id' => 'City ID',
            'birth_date' => 'Birth Date',
            'phone' => 'Phone',
            'qty_orders' => 'Qty Orders',
            'total_income' => 'Total Income',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    public static function create($user_id, $gender, $first_name, $last_name,
        $city_id, $country_id, $phone, $birth_date){
        $profile = new static();
        $profile->user_id = $user_id;
        $profile->gender = $gender;
        $profile->first_name = $first_name;
        $profile->last_name = $last_name;
        $profile->city_id = $city_id;
        $profile->country_id = $country_id;
        $profile->phone = $phone;
        $profile->birth_date = $birth_date;
        return $profile;
    }
}
