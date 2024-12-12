<?php @include '../dbAccess.php'; session_start(); ?>

<!DOCTYPE html>
<html>
	<head> 
		<meta charset="UTF-8"/>
		<title>Send</title>
	</head>
	<body>
		<?php
			$tableName = 'feedback';
			$complaint = $_POST["complaint"];
			$user = $_SESSION["user"];

			$conn ->query("INSERT INTO $tableName (user, complaint) VALUES ('$user', '$complaint')");

			header("location:../../main.php");
		?>
	</body>
</html>