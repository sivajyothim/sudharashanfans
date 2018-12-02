<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Sudharshan Fans</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <!-- Bootstrap core CSS -->
        <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="jumbotron-narrow.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <style>
        /* Everything but the jumbotron gets side spacing for mobile first views */
        .header,
        .marketing,
        .footer {
            padding-right: 15px;
            padding-left: 15px;
        }

        /* Make the masthead heading the same height as the navigation */
        .header h3 {
            margin-top: 0;
            margin-bottom: 0;
            line-height: 40px;
        }

        .table {
            margin-bottom: 0px;
        }

        .invoice-title h2, .invoice-title h3 {
            display: inline-block;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }

        /* Customize container */
        @media (min-width: 768px) {
            .container {
                max-width: 730px;
                background:#ffffff;
            }
        }
        .container-narrow > hr {
            margin: 30px 0;
            background:#ffffff;
        }

        .main {
            background:#f1f1f1;
        }

        /* Supporting marketing content */
        .marketing {
            margin: 20px 0 0 0;
        }
        .marketing p + h4 {
            margin-top: 28px;
        }

        /* Responsive: Portrait tablets and up */
        @media screen and (min-width: 768px) {
            /* Remove the padding we set earlier */
            .header,
            .marketing,
            .footer {
                padding-right: 0;
                padding-left: 0;
            }
            /* Space out the masthead */
            .header {
                margin-bottom: 30px;
            }
            /* Remove the bottom border on the jumbotron for visual effect */
            .jumbotron {
                border-bottom: 0;
            }
        }

        body {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .panel-title {display: inline;font-weight: bold;}
        .checkbox.pull-right { margin: 0; }
        .pl-ziro { padding-left: 0px; }

        .panel {
            border: 0px solid transparent;
            background: #f1f1f1;
        }

        .panel-default>.panel-heading .badge {
            color: #ffffff;
            background-color: transparent;
        }

        .container {
            background: #ffffff;
            border-radius:10px;
            margin-top:20px;
            margin-bottom:20px;
        }

        .panel-heading {
            border-bottom: 0px solid #555555 !important;
        }

        .panel-default>.panel-heading {
            color: #ffffff;
            background-color: #428bca;
            padding-bottom: 1px !important;
        }
    </style><div class="container">

            <div class="row marketing">
                <?php
                $order_req = json_decode($order_details);
                $item_req = json_decode($order_item_details);
                $order_res = $order_req->order_result;
                ?>
                <div class="col-lg-12">
                    <img src="<?php echo LOGO_PATH; ?>"/>
                    <hr />

                    <div>
                        <center>  
                            <h4>Success - your order is confirmed!</h4>
                            <h5>Order number: #<?php echo $order_res->order_number; ?></h5>
                            <hr />  
                    </div>
                    </center>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <strong>Shipping Address:</strong><br>
                                    <?php echo $order_res->shipping_name; ?><br>
                                    <?php echo $order_res->shipping_email; ?><br>
                                    <?php echo $order_res->shipping_mobile; ?><br>
                                    <?php echo $order_res->shipping_address . ',' . $order_res->shipping_area; ?><br>
                                    LandMark:<?php echo $order_res->shipping_landmark; ?><br>
                                    <?php echo $order_res->shipping_city . ',' . $order_res->shipping_state; ?>,India-<?php echo $order_res->shipping_pincode; ?><br>
                                </address>

                            </div>
                            <div class="col-xs-6 text-right">
                                <h1><span class="glyphicon glyphicon glyphicon-cloud-download" aria-hidden="true"></span></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <td><strong>Sr.No</strong></td>
                                                <td><strong>Product Name</strong></td>
                                                <td class="text-right"><strong>Product Image</strong></td>
                                                <td class="text-right"><strong>Product color</strong></td>
                                                <td class="text-right"><strong>Qty</strong></td>
                                                <td class="text-right"><strong>Price</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $srno=1;
                                        foreach($item_req->item_result as $item_res):
                                            ?>
                                             <tr>
                                                <td><?php echo $srno;?></td>
                                                <td><?php echo $item_res->item_name;?></td>
                                                <td class="text-right"><img src="<?php echo $item_res->product_image; ?>" width="20%"/></td>
                                                <td><?php echo $item_res->item_color;?></td>
                                                <td class="text-right">(<?php echo $item_res->item_qty.'x'.$item_res->item_price;?>)</td>
                                                <td class="text-right">Rs.<?php echo $item_res->sub_total;?>/-</td>
                                            </tr>
                                           
                                           
                                        <?php $srno++;endforeach;
?>                                           
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-right"><strong>Shipping</strong></td>
                                                <td class="no-line text-right">Free.</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-right"><strong>Total</strong></td>
                                                <td class="no-line text-right">Rs.<?php echo $order_res->price;?>/-</td>
                                            </tr>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    <body class="main">

         <!-- /container -->


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>