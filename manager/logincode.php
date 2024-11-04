<?php

include ('db.php');
session_start();

    if(isset($_POST['login']))
    {       $username = $_POST["u_name"]; 
            $password = md5($_POST["pass"]);
            $query="SELECT * FROM manager_details WHERE username='$username' and password='$password' LIMIT 1";
            $result = mysqli_query($con,$query);


            if(mysqli_num_rows($result) == 1)
            {

                $user=mysqli_fetch_assoc($result);
                $_SESSION['manager_id'] = $user['manager_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['entrance'] = $user['entrance'];
                header("location: dashboard.php");
            }
            else
            {
                
                header("location: index.php?Invalid= Please Enter Correct User Name and Password");
            }
        
  
    }

?>