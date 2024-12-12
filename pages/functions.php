<?php
	function checkExists($connection, $functionTableName, $column, $value)
	{
		$select = " SELECT * FROM $functionTableName WHERE $column = '$value'";

		$result = mysqli_query($connection, $select);

		if(mysqli_num_rows($result) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function insertHeader()
	{
		echo '
			<header>
				<nav class = "hGridContainer">
					<div class = "hGridItem">
						<a href="../../main.php"><h2>Store</h2></a>
					</div>
					<div class = "hGridItem">
						<a href="../profile/profile.php"><h2>Profile</h2></a>
					</div>
					<div class = "hGridItem">
						<a href="../cart/cart.php"><h2>Cart</h2></a>
					</div>
					<div class = "hGridItem">
						<a href="../register_login/logout.php"><h2>Logout</h2></a>
					</div>
				</nav>
			</header>
		';
	}
	
	function insertFooter()
	{
		echo '
			<footer>
					<nav class = "fGridContainer">
						<div class = "fGridItem">
							<a href="../about/about.php"><h2>About Us</h2></a>
						</div>
						<div class = "fGridItem">
							<a href="../feedback/feedback.php"><h2>Feedback</h2></a>
						</div>
					</nav>
			</footer>
		';
	}
?>