<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use frontend\models\City;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
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
        <div class="col-lg-6">
            <?= $form->field($model, 'city_id')->dropDownList($city)->label('City'); ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'birth_date')->input('date') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'email')->input('email') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'phone')->input('tel') ?>
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
