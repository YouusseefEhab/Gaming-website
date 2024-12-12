<?php
	@include '../dbAccess.php';
	session_start();
	
	$query = 'SELECT * FROM carts WHERE user = "' . $_SESSION['user'] . '";';
	$result = mysqli_query($conn, $query);
	
	$cart = explode(',', mysqli_fetch_assoc($result)['cart']);
	unset($cart[array_search($_POST['gameName'], $cart)]);
	if(empty($cart))
	{
		$query = 'DELETE FROM carts WHERE user = "' . $_SESSION['user'] . '";';
		mysqli_query($conn, $query);
		header('location:cart.php');
	}
	$cart = implode(',', $cart);
	$query = 'UPDATE carts SET cart = "' . $cart . '" WHERE user = "' . $_SESSION['user'] . '";';
	mysqli_query($conn, $query);

	header('location:cart.php');
?>