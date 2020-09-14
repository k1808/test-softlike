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
    <?= Html::a('Buy', ['order/add', 'id' => $model->id], ['class' => 'product-link',
                                                                'data-id'=>$model->id]) ?>
</div>
