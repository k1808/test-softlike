<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
      'dataProvider' => $dataProvider,
      'itemView' => '_list_item',
      'pager' => [
        'hideOnSinglePage'=> true,
        'maxButtonCount' => 3,
      ],

    ]) ?>

    <?php Pjax::end(); ?>

</div>
