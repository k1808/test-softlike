<?php

//debug($_SESSION['basket']);
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

if(!empty($_SESSION['basket'])): ?>
    <?php
    $form = ActiveForm::begin([
    'method' => 'get',
     'action'=>Url::toRoute(['/user/'.Yii::$app->user->id]),
    ]) ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['basket'] as $id => $item):?>
                <tr>
                    <td><?= $item['name']?></td>
                    <td><?= $item['qty']?></td>
                    <td><?= $item['price']?></td>
                    <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach?>
            <tr>
                <td colspan="4">Total: </td>
                <td id="basket-qty"><?= $_SESSION['basket.qty']?></td>
            </tr>
            <tr>
                <td colspan="4">Sum: </td>
                <td id="basket-sum">$<?= $_SESSION['basket.sum']?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-basket_btn">
        <?php
        echo Html::submitButton('Save changes', ['class' => 'btn btn-primary']);
        echo  Html::resetButton('Reset', ['class' => 'btn btn-danger',
                                                    'id'=>'basket-reset']);
        ?>
    </div>
    <?php ActiveForm::end() ?>
<?php else: ?>
    <h3>Basket is empty</h3>
<?php endif;?>


