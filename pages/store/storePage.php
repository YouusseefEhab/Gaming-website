
<?php
	@include '../dbAccess.php';
	@include '../functions.php';
	
	session_start();

	$allCategories = array("Action", "Adventure", "Casual", "Multiplayer", "Racing", "RPG", "Sports", "Strategy");
	
	#layout:
	if(isset($_POST['list']))
	{
		if ($_POST['list'] == "true") {
			$_SESSION["listView"] = true;
		}
		else
		{
			$_SESSION["listView"] = false;
		}
	}
	else if(!isset($_SESSION['listView']))
	{
		$_SESSION["listView"] = true;
	}
				
	#links:
	$gamePage = "gamePage.php";
	
	#Parameters:
	if(!isset($_SESSION["search"]))
		$_SESSION["search"] = "";
	if(!isset($_SESSION["category"]))
		$_SESSION["category"] = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(array_key_exists("category", $_POST))
		{
			$_SESSION["category"] = $_POST["category"];
			$_SESSION["search"] = "";
		}
		else if(array_key_exists("search", $_POST))
		{
			$_SESSION["search"] = $_POST["search"];
			$_SESSION["category"] = "";
		}
	}
	
	#Fetch from Database:
	$gamesTable = "games";
	$table = array();
	
	#$conn = mysqli_connect($host, $username, "", $dbName);
	
	if (!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$query = "SELECT * FROM " . $gamesTable . " WHERE name LIKE '%" . $_SESSION["search"] . "%' AND categories LIKE '%" . $_SESSION["category"] . "%' ORDER BY name ASC;";
	
	$result = mysqli_query($conn, $query);
	
	while($row = mysqli_fetch_assoc($result))
	{
		array_push($table, $row);
	}
	$gameCount = count($table);
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Store </title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" href="../../css/mainStyle.css">
		<link rel = "stylesheet" type = "text/css" href = "../../css/storeStyle.css">
	</head>
	<body class = 'bgColor'>
		<?php insertHeader(); ?>
		<div id = 'all'>
		<form class = 'secondaryColor' id = "search" action="" method="post">
			<input style = 'color: black;' type = "text" name = "search" value = "" placeholder = "Search Bar">
			<input style = 'color: black;' type = 'submit' value = 'Search'>
		</form>
		<br>
		<form class = 'secondaryColor' id = "layoutButtons" action="" method="post">
			<button style = 'color: black;' type="submit" name="list" value="true"> List View </button>
			<button style = 'color: black;' type="submit" name="list" value="false"> Grid View </button>
		</form>
		
		<?php
			if($_SESSION["listView"])
			{
				echo "<table>
					<tr class = 'secondaryColor head'>
						<th></th>
						<th> Game </th>
						<th> Description </th>
						<th> Price </th>
						<th> Developer </th>
					</tr>";
				for($i = 0; $i < $gameCount; $i++)
				{
					echo "<form action = '" . $gamePage . "' method = 'POST'>
							<tr class = 'rows'>
								<td class = 'photoCell'><button class = 'invisButton tableButton' type = 'submit' name = 'gameName' value = '" . $table[$i]['name'] . "'><img class = 'photo' src = '../../gameImages/" . str_replace(':', '', str_replace(' ', '_', $table[$i]['name'])) . ".jpg'></button></td>
								<td class = 'nameCell'><button class = 'nameCell invisButton tableButton' type = 'submit' name = 'gameName' value = '" . $table[$i]['name'] . "'><h2>" . $table[$i]['name'] . "</h2></button></td>
								<td class = 'descriptionCell'>" . $table[$i]['description'] . "</td>
								<td class = 'priceCell'>" . $table[$i]['price'] . "$" . "</td>
								<td class = 'developerCell'>" . $table[$i]['developer'] . "</td>
							</tr>
					</form>";
				}
				echo "</table>";
			}
			else
			{
				echo "<div id = 'gridContainer'>";
				for($i = 0; $i < $gameCount; $i++)
				{
					echo "<form action = '" . $gamePage . "' method = 'POST'>
						<div class = 'gridItem'>
							<button class = 'gridPhoto invisButton' type = 'submit' name = 'gameName' value = '" . $table[$i]['name'] . "'><img class = 'photo' src = '../../gameImages/" . str_replace(':', '', str_replace(' ', '_', $table[$i]['name'])) . ".jpg'></button>
							<button class = 'gridName invisButton' type = 'submit' name = 'gameName' value = '" . $table[$i]['name'] . "'><h2>" . $table[$i]['name'] . "</h2></button>
						</div>
					</form>";
				}
				echo "</div>";
			}
		?>
		
		<div class = 'secondaryColor' id = 'categoryBlock'>
			<h1> Categories </h1>
			<form action = '<?php echo $_SERVER['PHP_SELF']; ?>' method = 'POST'>
				<?php
					for($i = 0; $i < count($allCategories); $i++)
					{
						echo "<button class = 'categoryOption invisButton' type = 'submit' name = 'category' value = '" . $allCategories[$i] . "'><h2>" . $allCategories[$i] . "</h2></button><br>";
					}
				?>
			</form>
		</div>
		</div>
		<?php insertFooter(); ?>
	</body>
</html>