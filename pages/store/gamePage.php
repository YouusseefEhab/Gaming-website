<?php
	@include '../dbAccess.php';
	@include '../functions.php';
	
	$query = 'SELECT * FROM games WHERE name = "' . $_POST['gameName'] . '";';
	$result = mysqli_query($conn, $query);
	$gameData = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php
				$title = $_POST["gameName"];
				echo $title;
			?>
		</title>
		<link rel="stylesheet" href="../../css/mainStyle.css">
		<link rel="stylesheet" href="../../css/gamePageStyle.css">
		
	</head>
	<body class = 'bgColor'>
		<?php insertHeader(); ?>
		
		<div id = 'block'>
			<div id = 'video'>
				<video width = '100%' height = '100%' controls>
					<source src = '../../gameVideos/<?php echo str_replace(':', '', str_replace(' ', '_', $gameData['name'])); ?>.mp4' type = 'video/mp4'>
					Error: Video not supported.
				</video>
			</div>
			
			<div id = 'photo'>
				<img class = 'photo' src = '../../gameImages/<?php echo str_replace(':', '', str_replace(' ', '_', $gameData['name'])); ?>.jpg'></img>
			</div>
			
			<div class = 'secondaryColor' id = 'desc'>
				<h4><?php echo $gameData['description']; ?></h4>
			</div>
			
			<div class = 'secondaryColor' id = 'price'>
				<h2 style = 'color: green;'><?php echo $gameData['price']; ?>$</h2>
			</div>
			
			<div id = 'add-btn'>
				<form action = 'addToCart.php' method = 'POST'>
					<button class = 'secondaryColor' type = 'submit' name = 'gameName' value = '<?php echo $gameData['name']; ?>'><br><h2>Add to cart</h2><br></button>
				</form>
			</div>
		</div>
		
		<?php insertFooter(); ?>
	</body>
</html>