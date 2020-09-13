<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
/* @var $city \common\models\City */
/* @var $country \common\models\Country */

use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
$cityArray = ArrayHelper::getColumn($city, 'name');
$countryArray = ArrayHelper::getColumn($country, 'name');
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    <div class="row">
        <div class="col-lg-5">
           <?= $form->field($model, 'gender')->dropDownList(['Mr'=>'Mr', 'Mrs'=>'Mrs'],['autofocus' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'first_name')->textInput() ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'last_name')->textInput() ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'city_id')->widget(\kartik\select2\Select2::class,['data'=>ArrayHelper::getColumn(\common\models\City::find()->all(), 'name')])->label('City'); ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'country_id')->widget(\kartik\select2\Select2::class,['data'=>ArrayHelper::getColumn(\common\models\Country::find()->all(), 'name')])->label('Country'); ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'birth_date')->widget(DatePicker::class,[
              'name' => 'check_issue_date',
              'options' => ['placeholder' => 'Select issue date ...'],
              'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
              ]
            ]); ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'email')->input('email') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
              'mask' => '999-999-9999',
            ]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>


</div>
