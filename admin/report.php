<?php include ('db.php'); ?>
<?php include ('includes/header.php'); ?>

<div class="container">
    <div class="content-header">
        <div class="container-fluid">
            <div class="border shadow p-4 mt-3">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="m-0 ">Journey History</h2>
                    </div>
                </div><br>
                <?php
                if(isset($_SESSION['error'])){
                    echo"
                    <div class='alert alert-danger'>
                    <h4>error!</h4>
                    ".$_SESSION['error']."
                    </div>
                    ";
                    unset($_SESSION['error']);
                }

                if(isset($_SESSION['success'])){
                    echo"
                    <div class='alert alert-success'>
                    <h4>Success!</h4>
                    ".$_SESSION['success']."
                    </div>
                    ";
                    unset($_SESSION['success']);

                }
                ?>
                <form action="report_generate.php" method="post">
                    <div>
                        <input type="date" name="start_date">
                        <input type="date" name="end_date">
                        <button name="report" type="submit" class="btn btn-primary ">
                            Generate Report
                        </button>
                    </div>
                </form><br>
                <form action="daily_report.php" method="post">
                    <div>
                        <?php
                            date_default_timezone_set('Asia/Colombo');
                                $date=date('Y-m-d');
                        ?>

                        <input type="hidden" name="daily" value="<?php echo $date;  ?>">
                        <button name="report" type="submit" class="btn btn-primary ">
                            Today Report
                        </button>
                    </div>
                </form>
                <hr>

                <table id="datatablesSimple" class="table table-striped  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="">Customer Name</th>
                            <th width="">Vehicle Number</th>
                            <th width="">Entrance Name</th>
                            <th width="">Exit Name</th>
                            <th width="">Price (Rs.)</th>
                            <th width="">Distance (Km/h)</th>
                            <th width="">Speed</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                  $res=mysqli_query($con,"SELECT users.f_name,users.v_number,entrance.entrance,entrance.exit,entrance.price,entrance.speed,entrance.dis FROM entrance INNER JOIN users ON entrance.key =users.nic WHERE 1;");
                  while($row=mysqli_fetch_array($res))
                  {
                    ?>
                        <tr>
                            <td><?php echo $row["f_name"]; ?></td>
                            <td><?php echo $row["v_number"]; ?></td>
                            <td><?php echo $row["entrance"]; ?></td>
                            <td><?php echo $row["exit"]; ?></td>
                            <td><?php echo $row["price"]; ?></td>
                            <td><?php echo $row["dis"]; ?></td>
                            <td><?php echo $row["speed"]; ?></td>



                        </tr>
                        <?php
                  }
            ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <?php include ('includes/footer.php'); ?>

    <!-- date_default_timezone_set('Asia/Colombo');
    $time=date('H:i:s');
    $date=date('Y-m-d'); -->