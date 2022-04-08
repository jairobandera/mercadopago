<?php
require 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken("TEST-3710472280139261-042720-838510aef6dd97380c437c18dc12d32d-84286365");
$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->id = "1234";
$item->title = "Descripcion del producto";
$item->quantity = 1;
$item->currency_id = "ARS";
$item->unit_price = 1500;
$preference->items = array($item);

$preference->back_urls = array(
    "success" => "https://jairobandera.herokuapp.com/success.php",
    "failure" => "https://jairobandera.herokuapp.com/failure.php",
    "pending" => "https://jairobandera.herokuapp.com/pending.php"
);
$preference->auto_return = "approved";
$preference->binary_mode = true;

$preference->save();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>Document</title>
    <!-- SDK MercadoPago.js V2-->
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>

<body class="is-preload">
    <!-- 
    $access_token = "TEST-3710472280139261-042720-838510aef6dd97380c437c18dc12d32d-84286365";
    $access_token2 = "APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398";-->
    <!-- Nav -->
    <nav id="nav">
        <ul class="container">
        <i class="fa-brands fa-whatsapp"></i><li><a href="#">Whatsapp</a></li>
        <i class="fa-brands fa-instagram"></i><li><a href="#">Instagram</a></li>
        <i class="fa-brands fa-tiktok"></i><li><a href="#">Tiktok</a></li>
        <i class="fa-brands fa-facebook"></i><li><a href="#">Facebook</a></li>
        </ul>
    </nav>

<!--<div class="checkout-btn"></div>-->

    <!-- Home -->
    <article id="top" class="wrapper style1">
        <div class="container">
            <div class="row">
                <div class="col-4 col-5-large col-12-medium">
                    <span class="image fit"><img src="images/logo.jpeg" alt="" /></span>
                </div>
                <div class="col-8 col-7-large col-12-medium">
                    <header>
                        <h1><strong>@conteniluz</strong>.</h1>
                    </header>
                    <p><strong>CREAMOS CONTENIDOS PARA EDIFICAR</strong></p>
                    <div class="checkout-btn"></div>
                </div>
            </div>
        </div>
    </article>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>



    <script>
    const mp = new MercadoPago('TEST-f93a4602-9a8e-40f9-aee8-0a7dcbfa07b1', {
        locale: 'es-AR'
    });

    mp.checkout({
        preference: {
            id: '<?php echo $preference->id; ?>'
        },
        render: {
            container: '.checkout-btn',
            label: 'Pagar con Mercado Pago'
        }
    })
    </script>
</body>

</html>