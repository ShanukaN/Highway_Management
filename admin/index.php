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
        <h1>Admin Login</h1>
        <form method="post">
            <?php
	if (isset($_POST['submit']))
		{
			$username = mysqli_real_escape_string($con, $_POST['u_name']);
			$password = mysqli_real_escape_string($con, $_POST['password']);
			
			$query 		= mysqli_query($con, "SELECT * FROM `admin` WHERE  password='$password' and user_name='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0) 
				{			
					$_SESSION['id']=$row['id'];
					header('location:home.php');
					
				}
			else
				{
					echo 'Invalid Username or Password';
				}
		}
  ?>
            <div class="txt_field">
                <input type="text" name="u_name" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" value="Login" name="submit">
            <br><br>
            <div class="pass">
                <center>Forgot Password?
            </div>

        </form>
    </div>

</body>

</html>