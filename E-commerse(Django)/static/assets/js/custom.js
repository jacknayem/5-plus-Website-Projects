$(document).ready(function (){
    //Add to cart
    $(document).on('click',".add-to-cart",function(){
        var _vm = $(this);
        var _index = _vm.attr('data-index')
        var _qty= $('.prduct_qty-'+_index).val();
        var _ProductID= $('.prduct_id-'+_index).val();
        var _ProductImage= $('.prduct_image-'+_index).val();
        var _ProductTitle= $('.prduct_title-'+_index).val();
        var _ProductPrice= $('.product_price-'+_index).text();
        $.ajax({
            url: '/add_to_cart',
            data: {
                'id': _ProductID,
                'image': _ProductImage,
                'qty': _qty,
                'title': _ProductTitle,
                'price':_ProductPrice
            },
            dataType:'json',
            beforeSend:function (){
                _vm.attr('disable',true);
            },
            success:function (res){
                $('.cart-list').text(res.totalitems);
                _vm.attr('disable',false);
            }
        });
    });
    // End add to cart

    //Delete item from cart
    $(document).on('click',"#deleteitem",function(){
        var _pID = $(this).attr('data-item');
        var _vm = $(this);
        $.ajax({
            url: '/delete_from_cart',
            data: {
                'id': _pID,
            },
            dataType:'json',
            beforeSend:function (){
                _vm.attr('disable',true);
            },
            success:function (res){
                $('.cart-list').text(res.totalitems);
                _vm.attr('disable',false);
                $('#cartlist').html(res.data)
            }
        });
    }); //End delete from items

    //Update item to cart
    $(document).on('click',"#UpdateItems",function(){
        var _pID = $(this).attr('data-item');
        var _pqty = $('.product-qty-'+_pID).val();
        var _vm = $(this);
        $.ajax({
            url: '/update_from_cart',
            data: {
                'id': _pID,
                'qty': _pqty,
            },
            dataType:'json',
            beforeSend:function (){
                _vm.attr('disable',true);
            },
            success:function (res){
                //$('.cart-list').text(res.totalitems);
                _vm.attr('disable',false);
                $('#cartlist').html(res.data)
            }
        });
    });//End Update item to cart

//Delivery Cost
    $(document).on('click',"#AddDeliveryCost",function(){
        $("select#AddDeliveryCost").change(function(){
            var _vmm = $('#AddDeliveryCost')
            var _selecteCost = $(this).children("option:selected");
            var _totalcost = $('.itemstotalcost').text()
            $('#deliverycostresult').text(_selecteCost.val());
            $('.totalamountcost').text(parseInt(_selecteCost.val()) + parseInt(_totalcost));
            $('.totalamountcostinput').val(parseInt(_selecteCost.val()) + parseInt(_totalcost));
        });
    });
})