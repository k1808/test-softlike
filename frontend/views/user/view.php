<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $profile common\models\Profile */

$this->title = $user->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $user,
        'attributes' => [
            'username',
            'email:email',
            'created_at',
            'updated_at',
        ],
    ]) ?>


    <?= DetailView::widget([
      'model' => $profile,
      'attributes' => [
        'gender',
        'first_name',
        'last_name',
        'user.email',
        'country_id',
        'city_id',
        'birth_date',
        'phone',
        'qty_orders',
        'total_income',
      ],
    ]) ?>

</div>
