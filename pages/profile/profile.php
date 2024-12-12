<?php
@include '../dbAccess.php';
@include '../functions.php';
session_start();
if(!$conn){echo'eror';}
$userName = $_SESSION['user'];

#User Data
$result = mysqli_query($conn,"SELECT * FROM accounts WHERE name = '$userName'");
$row = mysqli_fetch_assoc($result);
$email = $row['email'];
$age = $row['age'];

#User Games
$games = array();
$result = mysqli_query($conn,"SELECT * FROM ownedgames WHERE name = '$userName'");
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) > 0)
{
	$games = explode(',', $row['games']);
	$gamesCount = count($games);
}
else
{
	$gamesCount = 0;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../../css/mainStyle.css">
		<style>
			#block{
				float: left;
				width: 50%;
				height: 40%;
				margin-left: 25%;
				margin-top: 5%;
			}
			
			#title{
				width: 50%;
				height: 10%;
				margin-left:35%;
			}
			
			.dash {
				width: 190px;
				height: 5px;
				border-radius: 6px;
				margin-left: 35%;
			}
			
			.userdata{
				font-weight: 300;
				text-align: left;
				font-family: 'Poppins', sans-serif;
				width: 80%;
				height: 70%;
				line-height: 50px;
				margin-left: 30%;
			}

			.userdata data{
				font-weight: 200;
			}

			h2{
				font-size: 30px;
				font-weight: 400;
				font-family: 'Poppins', sans-serif;
			}
		</style>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>User Profile </title>
	</head>

	<body class = 'bgColor'>
	<?php insertHeader(); ?>
	<div id = 'block'>
		<div id = 'title'>
			<h2>Profile Screen</h2>
		</div>
		<div class='primaryColor dash'></div>

		<?php 
				echo "
				<div class='userdata'>
					<p id = 'first' style='font-size:26px;'>Name: $userName </p> 
					<p id = 'email' style='font-size:26px;'>E-mail: $email </p>
					<p id = 'age' style='font-size:26px;'>Age: $age </p>
					<p id = 'num-games' style='font-size:26px;'>My Games: $gamesCount </p>
				</div>
				";
		?>
	</div>
	<?php insertFooter(); ?>
	</body>
</html>