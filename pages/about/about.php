<?php
	@include '../functions.php';
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "database";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM members";
	$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../../css/mainStyle.css">
    <style>

   
body {
  font-family: Arial, sans-serif;
}
#block {
	float: left;
	width: 60%;
	height: 70%;
	border: 2px solid white;
	margin-left: 20%;
}
.header {
	color: #f7f7ff;
	text-align: center;
	padding:10px;
}
section {
    adding: 70px 0;
	border: 3px solid white;
	margin: 2%;
}
section h2 {
  margin-bottom: 10px;
}
section p {
  line-height:1;
}
section > * {
	margin: 2%;
}
#team {
	height: 80%;
}
#team > h2 {
	text-align: center;
}
#team > ul {
	width: 50%;
	margin-left: 25%;
}
#who{
	height: 20%;
}
ul {
	margin: 2%;
}
</style>
	<title>About</title>
</head>
<body class = 'bgColor'>
	<?php insertHeader(); ?>
	<div class = 'bgColor' id = 'block'>
		<div class = 'header secondaryColor'>
			<h1>About Us</h1>
		</div>
		<main'>
			<section id = 'who'>
				<h2>Who we are ? </h2>
				<p>We are students from Helwan University, Faculty of Computers and Artificial Intelligence.<br>This is our internet technology project , and we are proud to show it to you. </p>
			</section>
			
			<section id = 'team'>
				<?php
					if ($result->num_rows > 0) {
						echo '<h2>Our Team</h2>';
						echo '<ul>';
						while ($row = $result->fetch_assoc()) {
							echo '<li><strong>' . $row['name'] . '</strong> - ' . $row['id'] . ' - +2' . $row['number'] .'</li>';
						}
						echo '</ul>';
					} else {
						echo 'No team members found.';
					}
				$conn->close();
				?>
			</section>
		</main>
		<div class = 'footer'>
			<p style = 'margin: 2%;'>&copy; 2023 Game Store. All rights reserved.</p>
		</div>
	</div>
	<?php insertFooter(); ?>
</body>
</html>