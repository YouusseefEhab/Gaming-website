<?php
	@include '../dbAccess.php';
	session_start();
	
	$query = 'SELECT * FROM carts WHERE user = "' . $_SESSION['user'] . '";';
	$result = mysqli_query($conn, $query);
	
	if(mysqli_num_rows($result) > 0)
	{
		$cart = mysqli_fetch_assoc($result)['cart'];
		$query = 'SELECT * FROM ownedGames WHERE name = "' . $_SESSION['user'] . '";';
		$result = mysqli_query($conn, $query);
		$games = mysqli_fetch_assoc($result)['games'];
		if(!in_array($_POST['gameName'], explode(',', $cart)) && !in_array($_POST['gameName'], explode(',', $games)))
		{
			$query = 'UPDATE carts SET cart = "' . $cart . ',' . $_POST['gameName'] . '" WHERE user = "' . $_SESSION['user'] . '";';
			mysqli_query($conn, $query);
		}
	}
	else
	{
		$query = 'SELECT * FROM ownedGames WHERE name = "' . $_SESSION['user'] . '";';
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0)
		{
			$games = mysqli_fetch_assoc($result)['games'];
			if(!in_array($_POST['gameName'], explode(',', $games)))
			{
				$query = 'INSERT INTO carts (user, cart) VALUES ("' . $_SESSION['user'] . '", "' . $_POST['gameName'] . '")';
				mysqli_query($conn, $query);
			}
		}
		else
		{
			$query = 'INSERT INTO carts (user, cart) VALUES ("' . $_SESSION['user'] . '", "' . $_POST['gameName'] . '")';
			mysqli_query($conn, $query);
		}
	}
	
	header('location:../cart/cart.php');
?>