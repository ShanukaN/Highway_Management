<?php

include ('db.php');
session_start();



    if(isset($_POST['login']))
    {        
        $email = $_POST["email"];
        $pass = md5($_POST["pass"]);


        $emailValid = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
        if(empty($email) || empty($pass) ){
        
                header("Location: login.php?error=Fill all field");
        exit();
        }else{
            if(!preg_match($emailValid,$email)){
                header("Location: login.php?error=Enter Valid Email");
                exit();
            }
            $query="SELECT * FROM users WHERE email='$email' and password='$pass' LIMIT 1";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) == 1)
                {
                    $user=mysqli_fetch_assoc($result);
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['f_name'] = $user['f_name'];
                    $_SESSION['l_name'] = $user['l_name'];
                    $_SESSION['nic'] = $user['nic'];
                    $_SESSION['account'] = $user['account'];
                    $_SESSION['email'] = $user['email'];
                    header("location: dashboard.php");
                }else{
                    header("Location: login.php?error=Invalid Username or password");
                }
 

        }
    }
?>