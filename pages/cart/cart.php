<?php
	@include '../dbAccess.php';
	@include '../functions.php';
	session_start();
	
	$query = 'SELECT * FROM carts WHERE user = "' . $_SESSION['user'] . '";';
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) > 0)
	{
		$cart = explode(',', mysqli_fetch_assoc($result)['cart']);
		$cartCount = count($cart);
		
		$price = array();
		for($i = 0; $i < $cartCount; $i++)
		{
			$query = 'SELECT * FROM games WHERE name = "' . $cart[$i] . '";';
			$result = mysqli_query($conn, $query);
			array_push($price, mysqli_fetch_assoc($result)['price']);
		}
		$priceTotal = array_sum($price);
	}
	else
	{
		$cartCount = 0;
		$priceTotal = 0;
	}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
		<link rel="stylesheet" href="../../css/mainStyle.css">
		<link rel="stylesheet" href="../../css/cartStyle.css">
    </head>

    <body class='bgColor'>
		<?php insertHeader(); ?>
		<div id = 'games'>
			<form action = "removeFromCart.php" method = "POST">
			<table>
				<tr>
					<th><h1>Game</h1></th>
					<th><h1>Price</h1></th>
					<th></th>
					<th></th>
				</tr>
				<?php
					if($cartCount > 0)
					{
						for($i = 0; $i < $cartCount; $i++)
						{
							echo '
								<tr>
									<td class = "photo">
										<img width = "100%" height = "100%" src = "../../gameImages/' . str_replace(':', '', str_replace(' ', '_', $cart[$i])) . '.jpg">
									</td>
									<td class = "price">
										<h1>Price:<br>' . $price[$i] . '$</h1>
									</td>
									<td class = "empty">
									</td>
									<td class = "remove-btn">
										<button class = "hover secondaryColor" type = "submit" name = "gameName" value = "' . $cart[$i] . '"><br><h3>Remove</h3><br></button>
									</td>
								</tr>
							';
						}
					}
					else
					{
						echo '
							<tr>
								<td class = "empty">
									<h1>Your cart is empty</h1>
								</td>
								<td class = "photo">
								</td>
								<td class = "price">
								</td>
								<td class = "remove-btn">
								</td>
							</tr>
						';
					}
				?>
				</form>
				<tr>
					<td class = 'photo' id = 'totalNum'>
						<h2>Total Games:<br><?php echo $cartCount; ?></h2>
					</td>
					<td class = "price" id = 'totalPrice'>
						<h2>Total Price:<br><?php echo $priceTotal; ?></h2>
					</td>
					<td class = "empty">
					</td>
					<td class = "proceed-btn">
						<a href = '../payment/payment.php'><div class = "hover primaryColor"><br><h3>Proceed to<br>checkout</h3><br></div></a>
					</td>
				</tr>
			</table>
		</div>
		<?php insertFooter(); ?>
    </body>
</html>