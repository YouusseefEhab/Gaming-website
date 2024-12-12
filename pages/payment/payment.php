<?php
	@include '../dbAccess.php';
	@include '../functions.php';
?>

<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="UTF-8">
		<title>Payment</title>
            <!--CSS Style Link-->
		<link rel="stylesheet" href="../../css/mainStyle.css">
        <link rel="stylesheet" href="../../css/paymentStyle.css">
    </head>

    <body class = "bgColor">
	<?php insertHeader(); ?>
    <div class="container bgColor">

             <form class = "secondaryColor" action="transaction.php" method = 'POST'>

             <div class="row">

             <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox"> <!--ATM Image Code-->
                    <span>cards accepted :</span>
                    <img src="images/ATM.png" alt="Paypal - Master Card - American Express - Visa">
                </div>
                <div class="inputBox"> <!--Name on Card-->
                    <span>name on card :</span>
                    <input type="text" name = 'CCName' placeholder="Mr. Georgie">
                </div>

                <div class="inputBox"> <!--Credit Card Number-->
                    <span>credit card number :</span>
                    <input type="text" name = 'CCNum' placeholder="1111222233334444">
                </div>

                <div class="inputBox"> <!--EXP. Month-->
                    <span>exp month :</span>
                    <input type="text" name = 'expMonth' placeholder="06">
                </div>

                <div class="flex">

                    <div class="inputBox"> <!--EXP. Year-->
                        <span>exp year :</span>
                        <input type="text" name = 'expYear' placeholder="26">
                    </div>

                    <div class="inputBox"> <!--CVV-->
                        <span>CVV :</span>
                        <input type="text" name = 'CVV' placeholder="1234">
                    </div>
                    
                </div>

             </div>
    
             </div>

        <input type="submit" value="Buy" class="bgColor submit-btn1"/>

        <a style = 'text-decoration: none;' href="../cart/cart.php"> <!--Back to Cart-->
        <div class="bgColor submit-btn2">Back to your cart</div>
        </a>
             
    </form>

    </div>    
    <?php insertFooter(); ?>
    </body>
    
</html>