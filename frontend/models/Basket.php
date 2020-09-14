<?php


namespace frontend\models;


use common\models\Product;
use yii\base\Model;

class Basket extends Model
{
    public function addBasket(Product $product, $qty = 1)
    {
        if(isset($_SESSION['basket'][$product->id])){
            $_SESSION['basket'][$product->id]['qty'] += $qty;
        } else {
            $_SESSION['basket'][$product->id] = [
              'name'=>$product->name,
                'price'=>$product->price,
                'qty'=>$qty,
            ];
        }
        $_SESSION['basket.qty']=isset($_SESSION['basket.qty']) ? $_SESSION['basket.qty'] +$qty:$qty;
        $_SESSION['basket.sum']=isset($_SESSION['basket.sum']) ? $_SESSION['basket.sum'] +$qty*$product->price:$qty*$product->price;
    }

    public function recalc($id)
    {
        if(!isset($_SESSION['basket'][$id])){
            return false;
        }

        $qtyMinus = $_SESSION['basket'][$id]['qty'];
        $sumMinus = $_SESSION['basket'][$id]['qty'] * $_SESSION['basket'][$id]['price'];
        $_SESSION['basket.qty'] -= $qtyMinus;
        $_SESSION['basket.sum'] -= $sumMinus;
        unset($_SESSION['basket'][$id]);
        return true;
    }

}