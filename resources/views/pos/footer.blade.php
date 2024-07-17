<script type="text/javascript">
    var cartList = []
    var totalMoney = 0
    var cash =0
    var refund = 0


    $(function() {
        var json = localStorage.getItem('cartList')
        if(json != null && json != '') {
            cartList = JSON.parse(json)
            showCart()
        }

        $('.item').click(function() {
            var id = $(this).attr('field-id')
            var thumb = $(this).attr('field-thumbnail')
            var description = $(this).attr('field-title')
            var price = $(this).attr('field-price')

            var isFind = false

            for(i=0;i<cartList.length;i++) {
                if(cartList[i].id == id) {
                    cartList[i].num++
                    isFind = true
                    break
                }
            }

            if(!isFind) {
                cartList.push({
                    'id': id,
                    'thumb': thumb,
                    'description': description,
                    'price': price,
                    'num': 1
                })
            }

            showCart()
        })

        // $('[name=cash]').keyup(function() {
        //     cash = $(this).val()
        //     cashback = cash - totalMoney
        //     $('#cashback').html(cashback)
        // })
        $('[name=cash]').keyup(function (){
            cash = $(this).val();
            if(totalMoney != 0){
                refund = cash -totalMoney;
            }else{
                refund =0;
            }

            $('#cashback').html(refund);
        })
    })

    function showCart() {
        $('#card_list').empty();
        money = 0;
        totalMoney =0;
        refund =0;
        if(cartList.length !=0){
            for(i=0;i<cartList.length;i++) {
                money = cartList[i].price * cartList[i].num

                $('#card_list').append(`
                    <table class="table table-bordered table-striped bg-white table-responsive">
                        <thea>
                            <tr>
                                <th>Name</th>
                                <th>description</th>
                                <th>Num</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>      </th>
                            </tr>
                          </thea>
                           <tbody>
                                <tr>
                                    <td><img src="${cartList[i].thumb}" style="width: 90px"/></td>
                                    <td>${cartList[i].description}</td>
                                    <td><input type="number" onchange="changeAmount(this, ${cartList[i].id})" class="form-control" value="${cartList[i].num}" style="width: 60px"/></td>
                                    <td>${cartList[i].price}</td>
                                    <td name="total_money">${money}</td>
                                    <td><button class="btn btn-danger btn-sm" onclick="deleteItem(${cartList[i].id})">X</button></td>
                                </tr>
                          </tbody>
                    </table>`)

                totalMoney += money


            }
            refund = cash -totalMoney
            $('#cashback').html(refund);
        }else{
            totalMoney =0;
            refund = 0;
            $('#cashback').html(refund);
            $('[name=cash]').val(0);
        }


        localStorage.setItem('cartList', JSON.stringify(cartList))
        $('#total_money').html(totalMoney)
    }

    function changeAmount(that, productId) {
        var currentAmount = $(that).val()
        var money1 = 0
        totalMoney = 0;
        for(i=0;i<cartList.length;i++) {

            if(cartList[i].id == productId) {
                cartList[i].num = currentAmount
                //update giao dien
                money = currentAmount * cartList[i].price
                // console.log($(that).parent().parent().html())
                // console.log($(that).parent().parent().find('[name=total_money]').html())
                $(that).parent().parent().find('[name=total_money]').html(money)


            }
            money1 = cartList[i].price * cartList[i].num
            totalMoney += money1;
        }
        $('#total_money').html(totalMoney)
        localStorage.setItem('cartList', JSON.stringify(cartList))
            // showCart();
    }

    function deleteItem(id) {
        //$('#total_money').html(totalMoney)

        var money1 =0;
        for(i=0;i<cartList.length;i++) {

            if(cartList[i].id == id) {
                 money1 = cartList[i].price * cartList[i].num;
                cartList.splice(i, 1);
                break;
            }

        }

        showCart();
    }

    function submitOrder1() {
        var json = localStorage.getItem('cartList')
        if(json != null && json != '') {
            $.post('{{ route('pos_save') }}', {
                data: json,
                total_money: totalMoney,
                '_token': '{{ csrf_token() }}'
            }, function(data) {
                alert(data)
                localStorage.removeItem('cartList')
                location.reload()
            })
        }
    }
    function submitOrder(){
        var json = localStorage.getItem('cartList');
        $.post('{{ route('pos_save') }}',
            {
                data:json,
                totalMoney : totalMoney,
                '_token':'{{ csrf_token() }}'
            },function(response){
               if(!response.error){
                   alert(response.message);
                   localStorage.removeItem('cartList')
                   location.reload()
               }

            });
    }
</script>
