<?php
    @include '../dbAccess.php';

    session_start();

    $error = array();

    if(isset($_POST['loginNow'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']);

        $tableName = 'accounts';

        $select = "SELECT * FROM $tableName WHERE email = '$email' AND password = '$pass';";
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){ 
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['user'] = $row['name'];
            $_SESSION['main'] = 'location:pages/store/default.php';

            // Let's add a session variable to indicate successful login
            $_SESSION['login_success'] = true;

            header('location:../../main.php');
        } else {
            array_push($error, 'incorrect email or password!');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../css/mainStyle.css">
    <link rel="stylesheet" href="../../css/register_loginStyle.css">
    
    <!-- Add a script tag to include JavaScript -->
    <script src="login_script.js" defer></script>
</head>
<body class='bgColor'>

    <div class="form-container bgColor">

        <form class='secondaryColor' action="" method="post" id="loginForm">
            <h3>login now</h3>
            <?php
                foreach($error as $errorItem){
                    echo "<span class='primaryColor error-msg'>$errorItem</span>";
                }
            ?>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input style='color: #c5c3c0;' type="submit" name="loginNow" value="login now" class="bgColor form-btn">
            <p>Don't have an account? <a href="register_form.php">register now</a></p>
        </form>

    </div>

</body>
</html>