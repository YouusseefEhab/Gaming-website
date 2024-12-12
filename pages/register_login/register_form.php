<?php

@include '../dbAccess.php';
@include '../functions.php';

$error = array();

if(isset($_POST['registerNow'])){

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pass = md5($_POST['password']);
	$cpass = md5($_POST['cpassword']);
	$age = $_POST['age'];
	$user_type = $_POST['user_type'];

	$tableName = "accounts";
	
	if(checkExists($conn, $tableName, 'name', $name))
	{
		array_push($error, 'username already exists!');
	}
	else if(checkExists($conn, $tableName, 'email', $email))
	{
		array_push($error, 'email already exists!');
	}
	if(checkExists($conn, $tableName, 'name', $name) && checkExists($conn, $tableName, 'email', $email))
	{
		$error = array('user already exists!');
	}
	if($pass != $cpass)
	{
		$error = array('password not matched!');
	}
	if(count($error) == 0)
	{
		$insert = "INSERT INTO $tableName(name, email, password, age, user_type) VALUES('$name','$email','$pass', '$age' , '$user_type')";
		mysqli_query($conn, $insert);
		header('location:login_form.php');
	}
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../css/mainStyle.css">
   <link rel="stylesheet" href="../../css/register_loginStyle.css">

</head>
<body class = 'bgColor'>
   
<div class="form-container bgColor">

   <form class = 'secondaryColor' action="" method="post">
      <h3>register now</h3>
      <?php
		 if(count($error) > 0){
			foreach($error as $errorItem){
			   echo "<span class='primaryColor error-msg'>$errorItem</span>";
			}
		 }
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
	  <input type="number" name="age" required placeholder="enter your age">
      <select name="user_type">
         <option value="user">user</option>
         <option value="developer">developer</option>
      </select>
      <input style = 'color: #c5c3c0;' type="submit" name="registerNow" value="register now" class="bgColor form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>