<?php include ('includes/header.php'); ?>
<?php include('db.php'); ?>


<?php
$id=$_GET["id"];
$empid="";
$empname="";
$gender="";
$address="";
$tel="";
$age="";



$res=mysqli_query($con,"SELECT * FROM `employee` WHERE id=$id");  
while($row=mysqli_fetch_array($res))
{
    
    $id=$row["id"];
    $empid=$row["emp_id"];
    $empname=$row["name"];
    $gender=$row["gender"];
    $address=$row["address"];
    $tel=$row["tel"];
    $age=$row["age"];
 
}

?>

<div class="container-fluid px-4">
    <h1>
        <center>Add Employee
    </h1>
    <hr>
    <?php if(isset($_GET['msg'])) echo $_GET['msg'];?>
    <div class="alert-success" id="success" style="display:none">
        Successfully!
    </div>
    <form class="row g-3" method="post">
        <div class="col-md-6">
            <label for="manager name" class="form-label">EMP ID</label>
            <input type="text" class="form-control" name="empid" value="<?php echo $empid; ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="entrance name" class="form-label" required>EMP Name</label>
            <input type="text" class="form-control" name="empname" value="<?php echo $empname;?>">
        </div>


        <div class="col-md-6">
            <label for="entrance name" class="form-label" required>Gender</label>

            <!-- <select class="form-select" aria-label="Default select example" name="gender" value="<?php echo $gender;?>">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select> -->


            <select class="form-select" aria-label="Default select example" name="gender" value="<?php echo $gender;?>">
                <option value="<?php echo $gender;?>"><?php echo $gender;?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>

            </select>
        </div>


        <div class="col-md-6">
            <label class="form-label" required>Address</label>
            <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
        </div>

        <div class="col-md-6">
            <label for="contact no" class="form-label" required>Contact No</label>
            <input type="text" class="form-control" name="contact" value="<?php echo $tel;?>">
        </div>
        <div class="col-6">
            <label for="inputAddress" class="form-label" required>Age</label>
            <input type="text" class="form-control" name="age" value="<?php echo $age;?>">
        </div>

        <br><br>

        <div>
            <center>
                <div class="button">
                    <input type="submit" value="Register" name="submit" id="submit" class="btn btn-primary">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a type="button" class="btn btn-primary" href="employee.php">Back</a>
                </div>

            </center>
        </div>
    </form>

</div>

<?php
if(isset($_POST["submit"]))
{    

    mysqli_query($con,"UPDATE `employee` SET `name`='$_POST[empname]',`gender`='$_POST[gender]',`address`='$_POST[address]',
    `tel`='$_POST[contact]',`age`='$_POST[age]' WHERE id=$id") or die(mysqli_error($con));  

?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 2000);
</script>
<?php
exit();
}
?>


<?php include ('includes/script.php'); ?>
<?php include ('includes/footer.php'); ?>