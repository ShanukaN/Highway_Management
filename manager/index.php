<?php session_start(); ?>

<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="shotcut icon" href="img/Logo..png" type="x-icon">
    <title>Login</title>
</head>

<body class="body">
    <div class="center">
        <h1>Manager Login</h1>
        <form action="logincode.php" method="POST">
            <?php
	// if (isset($_POST['submit']))
	// 	{

    //         $username = $_POST['u_name'];
    //         $password = md5($_POST['pass']);
			
            
            
			
	// 		$query 		= mysqli_query($con, "SELECT * FROM `manager_details` WHERE `password`='$password' and `username`='$username'");
	// 		$row		= mysqli_fetch_array($query);
	// 		$num_row 	= mysqli_num_rows($query);
			
	// 		if ($num_row > 0) 
	// 			{			
	// 				$_SESSION['id']=$row['id'];
	// 				header('location:home.php');
					
	// 			}
	// 		else
	// 			{
	// 				echo result;
	// 			}
	// 	}
  ?>

            <?php
                    if(@$_GET['Empty']==true)
                    {
                ?>
            <div class="alert-light text-danger text-center"><?php echo $_GET['Empty'] ?></div>
            <?php
                    }
                ?>

            <?php
                    if(@$_GET['Invalid']==true)
                    {
                ?>
            <div class="alert-light text-danger text-center"><?php echo $_GET['Invalid'] ?></div>
            <?php
                    }
                ?>

            <div class="txt_field">
                <input type="text" name="u_name" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="pass" required>
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" value="Login" name="login">
            <br><br>
            <div class="pass">
                <center>Forgot Password?
            </div>

        </form>
    </div>

</body>

</html>