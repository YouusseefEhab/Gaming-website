<?php @include '../functions.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title> game store</title>
		<link rel="stylesheet" href="../../css/mainStyle.css">
        <link rel="stylesheet" href="../../css/feedbackStyle.css">
      </head>
    <body class = 'bgColor' align="center" dir="ltr">
		<?php insertHeader(); ?>
    <form action="add.php" class="feed"  method = "post" >
	<span class = 'bgColor' id = 'block'>
		<h3 class = 'secondaryColor'>feedback</h3>
		<textarea class = "secondaryColor text" name = "complaint" rows = "10" cols = "50" placeholder = 'Enter Your Complaint.'></textarea>
        <input class="primaryColor sub" type="submit">
	</span>
    </form>
    
    <?php insertFooter(); ?>
    </body>
</html>