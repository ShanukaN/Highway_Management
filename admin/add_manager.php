<?php include('db.php'); ?>
<?php include ('includes/header.php'); ?>


<?php
$query1 = "SELECT * FROM manager_details order by manager_id desc limit 1";
$result = mysqli_query($con,$query1);
$row = mysqli_fetch_array($result);
$lastid = $row['manager_id'];
if($lastid == " ")
{
    $manid = "MANAGER - 1";
}
else
{
    $manid = substr($lastid,9);
    $manid = intval($manid);
    $manid = "MANAGER - " . ($manid + 1);
}
?>


<div class="container-fluid px-4">
    <h1>
        <center>Add Manager
    </h1>
    <hr>


    <form class="row g-3" method="post">
        <div class="alert-danger" id="error" style="display:none">
            Fill all Field!
        </div>
        <div class="alert-danger" id="error_email" style="display:none">
            Email address is already entered
        </div>
        <div class="alert-success" id="success" style="display:none">
            Successfully!
        </div>
        <div class="col-md-6">
            <label for="manager name" class="form-label">Manager ID</label>
            <input type="text" class="form-control" name="mid" value="<?php echo $manid; ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="entrance name" class="form-label" required>Entrance Name</label>
            <div class="col-sm-10">
                <select id="inter_name" name="inter_name">
                    <?php
                              $resul=mysqli_query($con,"SELECT inter_name FROM `interchanges`");  
                                while($rows = $resul->fetch_assoc())
                                {
                                  $inter_name = $rows['inter_name'];
                                  echo "<option value = '$inter_name'>$inter_name</option> ";
                                }
                              ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <label for="manager name" class="form-label" required>Manager Name</label>
            <input type="text" class="form-control" name="mname">
        </div>
        <div class="col-md-6">
            <label class="form-label" required>User Name</label>
            <input type="text" class="form-control" name="uname">
        </div>


        <input type="hidden" class="form-control" name="password" value="123456789">


        <div class="col-md-6">
            <label for="contact no" class="form-label" required>Contact No</label>
            <input type="text" class="form-control" name="contact">
        </div>
        <div class="col-6">
            <label for="inputAddress" class="form-label" required>Address</label>
            <input type="text" class="form-control" name="address">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label" required>E-mail</label>
            <input type="email" class="form-control" name="email">
        </div>
        <br><br>

        <div>
            <center>
                <div class="button">
                    <input type="submit" value="Register" name="submit" id="submit" class="btn btn-primary">
                </div><br>
                <a type="button" class="btn btn-primary" href="manager.php">Back</a><br>
            </center>
        </div>
    </form>


    <?php

    if (isset($_POST['submit']))
    {
        $entname = $_POST['inter_name'];
        $managerid = $_POST['mid'];
        $mname = $_POST['mname'];
        $pass = md5($_POST["password"]);
        $tel = $_POST['contact'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $uname = $_POST['uname'];

        if(empty($entname) || empty($mname) || empty($tel) || empty($address) || empty($email) ){
            ?>
    <script type="text/javascript">
    document.getElementById("error").style.display = "block";
    setTimeout(function() {
        window.location.href = window.location.href;
    }, 2000);
    </script>
    <?php
            exit();
        }else{
            $sql2 = "SELECT manager_id FROM manager_details WHERE email='$email' LIMIT 1";
            $check_query = mysqli_query($con,$sql2);
            $check_email = mysqli_num_rows($check_query);
            if($check_email > 0){
                ?>
    <script type="text/javascript">
    document.getElementById("error_email").style.display = "block";
    setTimeout(function() {
        window.location.href = window.location.href;
    }, 2000);
    </script>
    <?php
            exit();
        }
        else{
            $sql = "INSERT INTO `manager_details`(`id`, `manager_id`, `manager_name`, `username`, `password`, `entrance`, `contact`, `address`, `email`) 
            VALUES (NULL,'$managerid','$mname','$uname','$pass','$entname','$tel','$address','$email')";
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
    }
?>


</div>

<?php include ('includes/script.php'); ?>
<?php include ('includes/footer.php'); ?>