function showCart(basket){
    $('#w2 .modal-body').html(basket);
    $('#w2').modal();
    let basketSum = $('#basket-sum').text() ? $('#basket-sum').text() : '$0';
    if(basketSum){
        $('.cart-sum').text(basketSum);
    }
}

$(".product-link").on('click', function () {
    let id = $(this).data('id');

    $.ajax({

        url: 'order/add',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            if(!res) {
                window.alert('Error res!');
            }
            showCart(res);
        },
        error: function(){
            window.alert('Error!');
        }
    });
    return false;
});

$(".modal-basket").on('click', function (){
    $.ajax({
        url: 'order/show',
        type: 'GET',
        success: function (res) {
            if(!res) {
                window.alert('Error res!');
            }
            showCart(res);
        },
        error: function(){
            window.alert('Error!');
        }
    });
});

$('#w2 .modal-body').on('click', '.del-item', function (){
    let id = $(this).data('id');

    $.ajax({

        url: 'order/del-item',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            if(!res) {
                window.alert('Error res!');
            }
            showCart(res);
        },
        error: function(){
            window.alert('Error!');
        }
    });
});



$('#basket-reset').on('click', function() {
    window.console.log('sdf');
    $.ajax({
        url: 'order/clear',
        type: 'GET',
        success: function (res) {
            if(!res) {
                window.alert('Error res!');
            }
            showCart(res);
        },
        error: function(){
            window.alert('Error!');
        }
    });
});