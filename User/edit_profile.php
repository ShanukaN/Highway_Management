<?php 
 require_once('header.php'); 

 ?>


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
    $pass=$row["password"];


    
}

?>





<div class="content-header">
    <div class="container-fluid ">
        <form class="border shadow p-4 fm" method="post" action="">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 ">Edit Profile</h1>
                </div>
            </div>
            <hr>

            <div class="row mb-2">
                <div class="col-md-12" id="tsign">
                </div>
                <div class="col-md-12 alert alert-success" id="success" style="display:none">
                    Updated Successfully!
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="f_name" value="<?php echo $f_name;?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="l_name" value="<?php echo $l_name;?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>NIC</label>
                    <input type="text" class="form-control" name="nic" value="<?php echo $nic;?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Tel No</label>
                    <input type="text" class="form-control" name="tel" value="0<?php echo $tel_no;?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Gender</label>
                    <select class="form-control" id="" name="gender" value="<?php echo $gender;?>">
                        <<option value="<?php echo $gender;?>"><?php echo $gender;?></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email;?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Vehical No</label>
                    <input type="text" class="form-control" name="v_no" value="<?php echo $v_no;?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Vehical Type</label>
                    <select class="form-control" id="" name="v_typ" value="<?php echo $v_type;?>">
                        <<option value="<?php echo $v_type;?>"><?php echo $v_type;?></option>
                            <option value="car">Car</option>
                            <option value="van">Van</option>
                            <option value="suv/jeep">SUV/Jeep</option>
                            <option value="lorry">Lorry</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Province</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="province"
                        value="<?php echo $province;?>">
                        <<option value="<?php echo $province;?>"><?php echo $province;?></option>
                            <option value="north">Northern</option>
                            <option value="n_west">North Western</option>
                            <option value="n_cen">North Central</option>
                            <option value="west">Western</option>
                            <option value="cent">Central</option>
                            <option value="sab">Sabaragamuwa</option>
                            <option value="east">Eastern </option>
                            <option value="uva">Uva</option>
                            <option value="south">Southern</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Licence Number</label>
                    <input type="text" class="form-control" name="li_no" value="<?php echo $lic;?>">
                </div>
                <div class="form-group col-md-6">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="u_name" value="<?php echo $u_name;?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass" id="show" value="<?php echo $pass;?>">
                    <label for="">Show password <input type="checkbox" id="check" onclick="myFunction()"></label>
                </div>
                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="c_pass" value="<?php echo $pass;?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Update</button>
                </div>
            </div>


        </form>
    </div>
</div><!-- /.container-fluid -->

<script type="text/javascript">
function myFunction() {
    var show = document.getElementById('show');
    if (show.type == 'password') {
        show.type = 'text';
    } else {
        show.type = 'password';
    }
}
</script>

<?php
if(isset($_POST["submit"]))

{
    mysqli_query($con,"UPDATE `users` SET `f_name`='$_POST[f_name]',`l_name`='$_POST[l_name]'
    ,`nic`='$_POST[nic]',`tel_no`='$_POST[tel]',`gender`='$_POST[gender]',`address`='$_POST[address]'
    ,`email`='$_POST[email]',`v_number`='$_POST[v_no]',`v_type`='$_POST[v_typ]',`province`='$_POST[province]'
    ,`licen_number`='$_POST[li_no]',`u_name`='$_POST[u_name]',`password`='$_POST[pass]'WHERE user_id=$id") or die(mysqli_error($con));  

    ?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
setTimeout(function() {
    window.location = "profile.php";
}, 1000);
</script>
<?php
}

?>



<?php require_once('footer.php'); ?>