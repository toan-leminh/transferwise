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
                <h1 class="page-header"><small>1.ナビ情報</small>
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
                <form class="form-horizontal" method="post" action="charge_fee_confirm.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="item_amount">Item amount:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="item_amount" placeholder="Item Amount">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="item_currency">Item Amount Currency:</label>
                        <div class="col-sm-10">
<!--                            <input type="text" class="form-control" name="item_currency" placeholder="Item Amount Currency">-->
                            <select class="form-control" name="item_currency" placeholder="Item Amount Currency">
                                <option value="JPY">JPY</option>
                                <option value="JPY">USD</option>
                                <option value="JPY">VND</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="shipping_fee">Shipping fee:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="shipping_fee" placeholder="Shipping fee">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="item_currency">Shipping Fee Currency:</label>
                        <div class="col-sm-10">
<!--                            <input type="text" class="form-control" name="shipping_fee_currency" placeholder="Shipping fee Currency">-->
                            <select class="form-control" name="shipping_fee_currency">
                                <option value="JPY">JPY</option>
                                <option value="JPY">USD</option>
                                <option value="JPY">VND</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="buyer_email">Buyer email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="buyer_email" placeholder="Buyer email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="seller_email">Seller email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="seller_email" placeholder="Seller email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="seller_email">Shipping company account:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="shipping_company_account" placeholder="Shipping company account">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
        <?php require_once 'common/footer.php'?>
    </div>
    <!-- /.container -->
</body>

</html>