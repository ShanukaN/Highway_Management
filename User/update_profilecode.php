<?php include('db.php');

?>

<?php
    if(isset($_POST["submit"]))
{
    
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $nic = $_POST["nic"];
    $tel = $_POST["tel"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $v_no = $_POST["v_no"];
    $v_type = $_POST["v_typ"];
    $province = $_POST["province"];
    $licen = $_POST["li_name"];
    $u_name = $_POST["u_na"];
    $password = md5($_POST["pass"]);
    $cpass = md5($_POST["cpass"]);


    $emailValid = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $number = "/^[0-9]+$/";
    $v_number = "/^[0-8]+$/";


    if(empty($f_name) || empty($l_name) || empty($nic) || empty($tel) || empty($email) || empty($gender) || empty($address) || empty($v_no) 
        || empty($v_type) || empty($province) || empty($licen)  || empty($u_name)  || empty($password)  || empty($cpass)  ){

        header("Location: edit_profile.php?error=Fill all field");
    exit();
    }else{
        if(!preg_match($emailValid,$email)){
            header("Location: edit_profile.php?error=Enter Valid Email");
            exit();
        }
        if(!preg_match($number,$tel)){
            header("Location: edit_profile.php?error=Enter Valid Mobile Number");
            exit();
        }
        if(!(strlen($tel) == 10)){
            header("Location: edit_profile.php?error=Mobile number must be 10 digit");
            exit();
        }
        if(!(strlen($licen) <9)){
            header("Location: edit_profile.php?error=Mobile number must be 10 digit");
            exit();
        }
        if(!(strlen($v_no) <8)){
            header("Location: edit_profile.php?error=Enter correct Vehicle number");
            exit();
        }
        $sql = "SELECT user_id FROM users WHERE v_number='$v_no' LIMIT 1";
        $check_query = mysqli_query($con,$sql);
        $check_vehicle = mysqli_num_rows($check_query);
        if($check_vehicle > 0){
            header("Location: edit_profile.php?error=Vehicle number is alrady available");
            exit();
        }
        $sql1 = "SELECT user_id FROM users WHERE nic='$nic' LIMIT 1";
        $check_query = mysqli_query($con,$sql1);
        $check_vehicle = mysqli_num_rows($check_query);
        if($check_vehicle > 0){
            header("Location: edit_profile.php?error=NIC is alrady available");
            exit();
        }
        $sql2 = "SELECT user_id FROM users WHERE email='$email' LIMIT 1";
        $check_query = mysqli_query($con,$sql2);
        $check_email = mysqli_num_rows($check_query);
        if($check_email > 0){
            header("Location: edit_profile.php?error=Email address already exists");
            exit();
        }else{
            
            $sql3 = "UPDATE `users` SET `f_name`='$f_name',`l_name`='$l_name',
            `nic`='$nic',`tel_no`='$tel',`gender`='$gender',`address`='$address',`email`='$email',
            `v_number`='$v_no',`v_type`='$v_type',`province`='$province',`licen_number`='$licen',
            `u_name`='$u_name',`password`='$password' WHERE id=$id";
            $run_query = mysqli_query($con,$sql3);
            if($run_query){
                header("window.location.href = window.location.href");
                exit();
            }
        }
    }
    
}
    

?>