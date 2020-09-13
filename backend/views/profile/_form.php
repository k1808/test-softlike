<?php

use common\models\User;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php // $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'gender')->dropDownList(['Mr'=>'Mr', 'Mrs'=>'Mrs'],['autofocus' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'country_id')->widget(\kartik\select2\Select2::class,['data'=>ArrayHelper::getColumn(\common\models\Country::find()->all(), 'name')])->label('Country'); ?>

    <?= $form->field($model, 'city_id')->widget(\kartik\select2\Select2::class,['data'=>ArrayHelper::getColumn(\common\models\City::find()->all(), 'name')])->label('City'); ?>

    <?= $form->field($model, 'birth_date')->widget(DatePicker::class,[
      'name' => 'check_issue_date',
      'options' => ['placeholder' => 'Select issue date ...'],
      'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true
      ]
    ]); ?>
    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
      'mask' => '999-999-9999',
    ]) ?>


    <?= $form->field($model, 'qty_orders')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'total_income')->textInput(['disabled' => 'disabled']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
