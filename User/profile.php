<?php 
 require_once('header.php'); 

 ?>

<style>
input {
    border-top-style: hidden;
    border-right-style: hidden;
    border-left-style: hidden;
    border-bottom-style: hidden;
    background-color: white;
}

.no-outline:focus {
    outline: none;
}
</style>

<?php

$id=$_SESSION['user_id'];
$f_name="";
$l_name="";
$nic="";
$tel_no="";
$gender="";
$address="";
$email="";
$v_no="";
$v_type="";
$lic="";
$u_name="";
$province="";


$res=mysqli_query($con,"SELECT * FROM `users` WHERE user_id=$id");  
while($row=mysqli_fetch_array($res))
{
    
    $f_name=$row["f_name"];
    $l_name=$row["l_name"];
    $nic=$row["nic"];
    $tel_no=$row["tel_no"];
    $gender=$row["gender"];
    $address=$row["address"];
    $email=$row["email"];
    $v_no=$row["v_number"];
    $v_type=$row["v_type"];
    $province=$row["province"];
    $lic=$row["licen_number"];
    $u_name=$row["u_name"];
    
}

?>



<div class="content-header">
    <div class="container-fluid ">
        <form class="border shadow p-4 fm" method="post" action="">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 ">View Profile</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="edit_profile.php" class="btn btn-primary ">Edite Profile</a>
                    </div>
                </div>
            </div>
            <hr>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input type="text" class="form-control" value="<?php echo $f_name;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Last Name</label>
                    <input type="text" class="form-control" value="<?php echo $l_name;?>" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>NIC</label>
                    <input type="text" class="form-control" value="<?php echo $nic;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Tel No</label>
                    <input type="text" class="form-control" value="0<?php echo $tel_no;?>" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Gender</label>
                    <input type="text" class="form-control" value="<?php echo $gender;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Address</label>
                    <input type="text" class="form-control" value="<?php echo $address;?>" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="text" class="form-control" value="<?php echo $email;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Vehical No</label>
                    <input type="text" class="form-control" value="<?php echo $v_no;?>" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Vehical Type</label>
                    <input type="text" class="form-control" value="<?php echo $v_type;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Province</label>
                    <input type="text" class="form-control" value="<?php echo $province;?>" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Licence Number</label>
                    <input type="text" class="form-control" value="<?php echo $lic;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>User Name</label>
                    <input type="text" class="form-control" value="<?php echo $u_name;?>" readonly>
                </div>
            </div>


        </form>
    </div>
</div><!-- /.container-fluid -->




<?php require_once('footer.php'); ?>