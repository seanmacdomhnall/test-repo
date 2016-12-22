<?php
include 'response/header.html';
include 'response/mainBody.html';
?>
<?php

require_once ('vendor/autoload.php');
 
use com\realexpayments\hpp\sdk\domain\HppResponse;
use com\realexpayments\hpp\sdk\RealexHpp;
 
$realexHpp = new RealexHpp("secret");
$responseJson = $_POST['hppResponse'];
$hppResponse = $realexHpp->responseFromJson($responseJson); // responseJson will be the PHP variable containing the JSON response string

$result = $hppResponse->getResult();
$message = $hppResponse->getMessage();
$authCode = $hppResponse->getAuthCode();
?>
<!-- Begin HTML Content -->          
<div class="outer">
<div class="responseInner" style="text-align:center">
<?php if ($result == "00") { ?>
<img src="response/sucess.png"><h2 style="color:#666666;font-weight:100">Thank you for your custom!</h2><h3 style="color:#339900;font-weight:100">Your payment was successfull</h3><a href="checkout.html" class="btn btn-info">Continue browsing</a></div>
<?php } else {?>
<div class="responseInner" style='text-align:center'><img src='response/failure.png' /><h2 style='color:#cc0033;font-weight:100'>There was an error processing your transaction.</h2><a href='checkout.html' class='btn btn-info'>Please Try Again</a><br><br></div>
<?php }?>
</div>
<!-- End HTML Content -->
<?php include 'response/footer.html';?>