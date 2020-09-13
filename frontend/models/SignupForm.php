<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public $user_id;

    public $gender;
    public $first_name;
    public $last_name;
    public $country_id;
    public $city_id;
    public $birth_date;
    public $phone;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender'], 'string', 'max' => 5],
            ['gender', 'required'],

            [['first_name'], 'required'],
            [['first_name'], 'string', 'max' => 128],

            [['last_name'], 'string', 'max' => 128],
            [['last_name'], 'required'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            [['city_id'], 'required'],
            [['city_id'], 'integer'],

            [['country_id'], 'required'],
            [['country_id'], 'integer'],


            [['birth_date'], 'required'],
            [['birth_date'], 'safe'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $fullName = $this->gender.' '. $this->first_name . ' ' . $this->last_name;
        $user = User::create($fullName, $this->email, $this->password);
        $user->save();
        $profile = Profile::create($user->id, $this->gender, $this->first_name,
          $this->last_name, $this->city_id, $this->country_id, $this->phone, $this->birth_date);
        $profile->save();

        return $this->sendEmail($user);

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
