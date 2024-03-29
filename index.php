<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bill 24 | Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <link type="text/css" rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
<div class="container">
    <br><br>
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php
                    $order_code = '061386082';
                    $customer_name = 'Jennifer Williams';
                    $order_date = date("m-d-y");
                    $amount = '5';
                    $description = 'Checkout from e-commerce website.';
                    $api_token = '915001ee060142b4995498057d6f90ff';
                    ?>
                    <h1 class="text-center text-primary">Order Confirmation</h1>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div id="order_code-barcode"></div>
                            <h2> <?php echo $order_code ?></h2>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="text-right">
                                <?php echo $customer_name ?>
                                <i class="fa fa-user-tie" style="width: 32px;"></i>
                            </h6>
                            <h6 class="text-right">
                                <?php echo $order_date ?>
                                <i class="fa fa-calendar-alt" style="width: 32px;"></i>
                            </h6>
                        </div>
                    </div>
                    <br><br>

                    <form action="checkout.php" method="post">

                        <input type="hidden" id="order_code" name="order_code" value="<?php echo $order_code ?>">
                        <input type="hidden" id="order_date" name="order_date" value="<?php echo $order_date ?>">
                        <input type="hidden" id="customer_name" name="customer_name"
                               value="<?php echo $customer_name ?>">
                        <div class="form-group row">
                            <label for="api_token" class="col-sm-3 col-form-label">API Token</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="api_token" name="api_token"
                                       value="<?php echo $api_token ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="amount" name="amount"
                                       value="<?php echo $amount ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="currency" class="col-sm-3 col-form-label">Currency</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="currency" name="currency">
                                    <option value="USD">USD</option>
                                    <option value="KHR">KHR</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="description"
                                          name="description"><?php echo $description ?></textarea>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Check Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="static/scripts/jsbarcode.all.min.js"></script>
<script type="text/javascript" src="static/scripts/jquery-barcode.js"></script>

<?php
echo "
        <script type='text/javascript'>
        $(document).ready(function () {
            $('#order_code-barcode').barcode(
                '$order_code',
                'code128',
                {
                    barHeight: 40,
                    fontSize: 15,
                    bgColor: '#eee'
                }
            );
        });
        </script>
        ";
?>

</html>

