<?php
function debug($arr){
	echo '<pre>';
	print_r($arr);
	echo '</pre><hr>';
}

function getSumBasket($session){
    if(empty($session)){
        return "<span class='cart-sum'> 0 $</span>";
    }
    return "<span class=\"cart-sum\">$". $_SESSION['basket.sum']."</span>";
}
