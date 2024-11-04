<?php include ('includes/header.php'); ?>
<?php include('db.php'); ?>


<?php
$query1 = "SELECT * FROM employee order by emp_id desc limit 1";
$result = mysqli_query($con,$query1);
$row = mysqli_fetch_array($result);
$lastid = $row['emp_id'];
if($lastid == " ")
{
    $manid = "EMP - 1";
}
else
{
    $manid = substr($lastid,5);
    $manid = intval($manid);
    $manid = "EMP - " . ($manid + 1);
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
            <input type="text" class="form-control" name="empid" value="<?php echo $manid; ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="entrance name" class="form-label" required>EMP Name</label>
            <input type="text" class="form-control" name="empname">
        </div>

        <div class="col-md-6">
            <label for="entrance name" class="form-label" required>Gender</label>
            <select class="form-select" aria-label="Default select example" name="gender" value="<?php echo $gender;?>">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>


        <div class="col-md-6">
            <label class="form-label" required>Address</label>
            <input type="text" class="form-control" name="address">
        </div>

        <div class="col-md-6">
            <label for="contact no" class="form-label" required>Contact No</label>
            <input type="text" class="form-control" name="contact">
        </div>
        <div class="col-6">
            <label for="inputAddress" class="form-label" required>Age</label>
            <input type="text" class="form-control" name="age">
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

if (isset($_POST['submit']))
{
    $empid = $_POST['empid'];
    $empname = $_POST['empname'];
    $gender = $_POST['gender'];
    $address = $_POST["address"];
    $tel = $_POST['contact'];
    $age = $_POST['age'];


    if(empty($empid) || empty($empname) || empty($gender) || empty($address) || empty($tel) || empty($age)){
        $msg="Fill all";
        echo"<div class='alert alert-danger'>$msg</div>";
        exit();
    }else{
        $sql = "INSERT INTO `employee`(`id`, `emp_id`, `name`, `gender`, `address`, `tel`, `age`) VALUES
         (NULL,'$empid','$empname','$gender','$address','$tel','$age')";
        $result = mysqli_query($con,$sql);
        
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
    }
?>




<?php include ('includes/script.php'); ?>
<?php include ('includes/footer.php'); ?>