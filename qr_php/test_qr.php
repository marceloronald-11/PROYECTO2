<?php

include_once dirname(__FILE__)."/phpqrcode/qrlib.php";

// --- url
$url = "httops://es.wikipedia.org";
$codigo = $url;

// --- sms y telefono
//$codigo = "sms:568999666";
//$codigo = "tel:568999666";

// -- email
$email="sandritascs@gmail.com";
$subject="Test qr";
$body = "Comprobación del test qr";
//$codigo="mailto:".$email."?subject=".urlencode($subject)."&body=".urlencode($body);

// --- skype
//$codigo = "skype:".urlencode("usuarioSkype")."?call";

// --- generar imagen
QRcode::png($codigo,"temp/01.png",QR_ECLEVEL_L,3,1);

echo '<img src="temp/01.png"/>';

?>