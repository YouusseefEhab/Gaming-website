<?php

@include '../dbAccess.php';

session_start();

if(!isset($_SESSION['developer_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>developer page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body> 
   
<div class="container">

   <div class="content">
      <h3>hi, <span>developer</span></h3>
      <h1>welcome <span><?php echo $_SESSION['developer_name'] ?></span></h1>
      <p>this is an developer page</p>
      <a href="login_form.php" class="btn">login</a>
      <a href="register_form.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>