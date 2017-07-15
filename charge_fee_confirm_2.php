<?php
require_once 'common/config.php';
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <?php require_once 'common/header.php' ?>
</head>

<body>
    <!-- Navigation -->
    <?php require_once 'common/navigation.php'?>

    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><small>2_1.商品代金、輸送料、送金手数料 確認(ログイン前)</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">About</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" method="post" action="temporary_quotes.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="item_amount">Item amount:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="item_amount" name="item_amount" placeholder="Item Amount" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="item_currency">Item Amount Currency:</label>
                        <div class="col-sm-10">
<!--                            <input type="text" class="form-control" name="item_currency" placeholder="Item Amount Currency">-->
                            <select class="form-control" id="item_currency" name="item_currency" placeholder="Item Amount Currency" required>
                                <option value="JPY">JPY</option>
                                <option value="JPY">USD</option>
                                <option value="JPY">VND</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="shipping_fee">Shipping fee:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control " id="shipping_fee" name="shipping_fee" placeholder="Shipping fee" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="shipping_currency">Shipping Fee Currency:</label>
                        <div class="col-sm-10">
<!--                            <input type="text" class="form-control" name="shipping_fee_currency" placeholder="Shipping fee Currency">-->
                            <select class="form-control" id="shipping_currency" name="shipping_currency" required>
                                <option value="JPY">JPY</option>
                                <option value="USD">USD</option>
                                <option value="VND">VND</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <button type="button" class="btn btn-default calculate">計算</button>
                        </div>
                        <div class="col-sm-4 pull-right">
                            <p><label class="control-label" style="width: 200px">Source Amount：</label><span id="result_source_amount"></span></p>
                            <p><label class="control-label" style="width: 200px">Target Amount：</label><span id="result_target_amount"></span></p>
                            <p><label class="control-label" style="width: 200px">手数料：</label><span id="result_fee"></span></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
        <?php require_once 'common/footer.php'?>
    </div>
    <!-- /.container -->

    <script>
        // Initial jquery validate
        $('form').validate();

        $('.calculate').on('click', function () {
            // Validate
            if($('form').valid()){
                var itemCurrency = $('#item_currency').val();
                var shippingCurrency = $('#shipping_currency').val();

                // Call temporary quotes API using Ajax
                $.ajax({
                    method: "GET",
                    url: "api_temporary_quotes.php",
                    data: {
                        source: itemCurrency,
                        target: shippingCurrency,
                        amount:  parseInt($('#item_amount').val()) + parseInt($('#shipping_fee').val())
                    }
                })
                    .done(function( response ) {
                        response = JSON.parse(response);
                        if(response.status.code == 0){
                            // Set result value
                            $('#result_source_amount').text(response.data.sourceAmount + ' ' + itemCurrency);
                            $('#result_target_amount').text(response.data.targetAmount + ' ' + shippingCurrency);
                            $('#result_fee').text(response.data.fee + ' ' + itemCurrency);
                        }else{
                            // Alert error message
                            alert(response.status.message);
                        }
                })
                    .fail(function (response) {
                        alert('Fail to call server api')
                    })
                ;
            }
        })

    </script>
</body>

</html>