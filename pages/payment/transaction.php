<?php
	@include '../dbAccess.php';
	session_start();
	
	$query = 'INSERT INTO transactions (user, CCName, CCNum, expMonth, expYear, CVV) VALUES ("' . $_SESSION['user'] . '", "' . $_POST['CCName'] . '", "' . md5($_POST['CCNum']) . '", "' . $_POST['expMonth'] . '", "' . $_POST['expYear'] . '", "' . $_POST['CVV'] . '");';
	mysqli_query($conn, $query);
	
	$query = 'SELECT * FROM carts WHERE user = "' . $_SESSION['user'] . '";';
	$result = mysqli_query($conn, $query);
	
	$cart = mysqli_fetch_assoc($result)['cart'];
	
	$query = 'SELECT * FROM ownedGames WHERE name = "' . $_SESSION['user'] . '";';
	$result = mysqli_query($conn, $query);
	
	if(mysqli_num_rows($result) > 0)
	{
		$games = mysqli_fetch_assoc($result)['games'];
	
		$query = 'UPDATE ownedGames SET games = "' . $games . ',' . $cart . '" WHERE name = "' . $_SESSION['user'] . '";';
		mysqli_query($conn, $query);
	}
	else
	{
		$query = 'INSERT INTO ownedGames (name, games) VALUES ("' . $_SESSION['user'] . '", "' . $cart . '");';
		mysqli_query($conn, $query);
	}
	
	$query = 'DELETE FROM carts WHERE user = "' . $_SESSION['user'] . '";';
	mysqli_query($conn, $query);

	header('location:../store/storePage.php');
?>