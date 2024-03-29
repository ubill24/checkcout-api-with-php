<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bill 24 | Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <link type="text/css" rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
    <link rel="stylesheet" href="../static/css/style.css">
    <script type="text/javascript" src="../static/scripts/jquery-qrcode-0.14.0.min.js"></script>
</head>
<body>
<?php require_once 'pay_later.php' ?>
<div class="container">
    <br><br>
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 logo">
                            <?php
                            echo "<img src='../static/images/logo.jpg' alt='logo' />";
                            ?>
                            <br>
                            <div>
                                <span><b>Invoice No :</b></span>
                                <span class="bill-code"><?php echo $data->bill_code ?></span>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right invoice-header">
                            <h4>WR Phone Shop</h4>
                            <br>
                            <p>
                                #88F, st.218, Sangkat Toek Loark 3,
                                <br>Khan Toul Kork, Phnom Penh
                                <br>012 345 678/ 096 765 432
                                <br>wr.phoneshop@gmail.com
                            </p>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Ref No.</th>
                            <th scope="col">Bill Date</th>
                            <th scope="col">Description</th>
                            <th scope="col">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row"><?php echo $data->reference_id ?></th>
                            <td><?php echo $data->bill_date ?></td>
                            <td><?php echo $data->description ?></td>
                            <td><?php echo $data->amount ?> <span
                                        class="badge badge-primary"><?php echo $data->currency ?></span></td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="payment-box">
                        <div class="qrcode">
                            <div id="payment-url-qrcode"></div>
                            <strong class="payment-title">Payment Link:</strong><br/>
                            <span class="payment-description">You can use this QR code to mak a payment via B24 online app.</span>
                        </div>
                        <div class="agencies">
                            <strong class="agencies-title">Pay with App or agencies:</strong>
                            <div class="agencies-img">
                                <?php
                                $agencies = $data->app_or_agency_payment_methods;
                                foreach ($agencies as $agency) {
                                    echo "<img src='$agency->logo'>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="print text-center">
                        <a href="#"> <?php echo "<img src='../static/images/printer.png'​​>" ?></a>
                        <a href="#"><?php echo "<img src='../static/images/pdf.png'>" ?></a>
                        <a href="../index.php"> <?php echo "<img src='../static/images/home.png'>" ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
    echo "
        <script type='text/javascript'>
            $(document).ready(function () {
                $('#payment-url-qrcode').qrcode({
                    render: 'div',
                    size: '120',
                    text: '$data->payment_url'
                });
        
            });
        </script>
        ";
?>
</body>
</html>
