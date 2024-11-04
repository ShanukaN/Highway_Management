<?php 
 require_once('header.php'); 
?>
<?php 
$nic1 = $_SESSION['nic'];
$res=mysqli_query($con,"SELECT * FROM `vehicle` WHERE nic='$nic1'");?>

<div class="content-header">
    <div class="container-fluid ">
        <form class="border shadow p-4 fm" method="GET" action="">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 ">Vehicle</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="add_vehicle.php" class="btn btn-primary ">Add Vehicle</a>
                    </div>
                </div>
            </div>
            <hr>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="50px">ID</th>
                        <th width="350px">NIC</th>
                        <th width="300px">Vehicle Number</th>
                        <th width="80px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $row)
                            {
                    ?>
                    <tr>
                        <td width="50px"><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["nic"]; ?></td>
                        <td><?php echo $row["vehicle_no"]; ?></td>
                        <td><a href="edite_vehicle.php?id=<?php echo $row["id"]; ?>" class="btn btn-success ">View</a>
                        </td>

                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>

        </form>
    </div>
</div>

<?php require_once('footer.php'); ?>