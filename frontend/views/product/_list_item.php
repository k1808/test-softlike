<?php
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model */

use yii\helpers\Html;
?>
<div class="product-item">
    <p><?=$model->name?></p>
    <span><?=$model->price?></span>
    <?= Html::a('Buy', ['user/view', 'id' => '$id'], ['class' => 'product-link']) ?>
</div>
