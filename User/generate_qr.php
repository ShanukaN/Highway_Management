<?php 

require_once('header.php'); 
include('db.php');


?>


<link rel="stylesheet" href="css/all.css">

<!-- Content Header (Page header) -->


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 ">Your QR Code</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content-header">
    <div class="container-fluid ">
        <div class="border shadow p-4 fm">
            <center>
                <div class="qr">
                    <header>

                    </header>
                    <div class="form aa">
                        <select class="form-control" id="" name="v_typ">

                            <option selected>Select Vehicle</option>
                            <?php
                                            $resul=mysqli_query($con,"SELECT users.nic,vehicle.vehicle_no FROM users INNER JOIN vehicle ON users.nic =vehicle.nic WHERE users.nic='$_SESSION[nic]'");  
                                            while($rows = $resul->fetch_assoc())
                                            {
                                                $vehicle = $rows['vehicle_no'];
                                                echo "<option value = '$vehicle'>$vehicle</option> ";
                                            }
                                        ?>
                        </select>
                        <!-- <input type="text" spellcheck="false" placeholder="Enter text or url"
                            value="<?php echo $$v_type ?>"> -->
                        <button>Generate QR Code</button>
                    </div>
                    <div class="qr-code">
                        <img src="" alt="qr-code">
                    </div>
                </div>
            </center>
        </div>
    </div><!-- /.container-fluid -->
</div>





<script src="js/qr.js"></script>