<?php include ('db.php'); ?>
<?php include ('includes/header.php'); ?>




<div class="container-fluid">
    <div class="border shadow p-4 mt-3">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="m-0 ">Price List between 2 Interchanges</h2>
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <a href="add_price.php" class="btn btn-primary ">Add Prices</a>
                </div>
            </div>
        </div><br>
        <form action="" method="POST">
            <div class="row">
                <div class="col-sm-4">
                    </label><input type="text" name="search_ent" id="search_ent" placeholder="Search By Name"
                        class="form-control">
                </div>
                <div class="col-sm-4">
                    <div class="float-sm-right">
                        </label><input type="text" name="search_exit" id="search_exit" placeholder="Search By Name"
                            class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="float-sm-right">
                        <button type="submit" name="search" class="btn btn-primary">Search</button>
                        <button type="submit" href="price.php" class="btn btn-primary">Reset</button>

                    </div>
                </div>
            </div>
        </form>
        <hr>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50px">ID</th>
                    <th width="350px">Entrance Name</th>
                    <th width="300px">Exit Name</th>
                    <th width="300px">Price (Rs.)</th>
                    <th width="80px"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                            if(isset($_POST['search'])){
                                $search_1 = $_POST['search_ent'];
                                $search_2 = $_POST['search_exit'];

                                $sql1 = "SELECT * FROM `price_list` WHERE `entrance`='$search_1' AND `ex`='$search_2'";
                                $sql2 = "SELECT * FROM `price_list` WHERE `entrance`='$search_2' AND `ex`='$search_1'";
                                $query1 = mysqli_query($con,$sql1);
                                $query2 = mysqli_query($con,$sql2);
                                while($row = mysqli_fetch_array($query1))
                                {
                                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["entrance"]; ?></td>
                    <td><?php echo $row["ex"]; ?></td>
                    <td>Rs. <?php echo $row["price"]; ?></td>
                    <td><a href="edit_interchanges.php?id=<?php echo $row["id"]; ?>" class="btn btn-success ">Edit</a>
                    </td>
                </tr>
                <?php

                                }while($row = mysqli_fetch_array($query2))
                                {
                                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>

                    <td><?php echo $row["ex"]; ?></td>
                    <td><?php echo $row["entrance"]; ?></td>
                    <td>Rs. <?php echo $row["price"]; ?></td>
                    <td><a href="edit_interchanges.php?id=<?php echo $row["id"]; ?>" class="btn btn-success ">Edit</a>
                    </td>
                </tr>
                <?php

                            }exit();

                        }else{
                            $res=mysqli_query($con,"SELECT * FROM `price_list`");
                            while($row=mysqli_fetch_array($res))
                            {
                        ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["entrance"]; ?></td>
                    <td><?php echo $row["ex"]; ?></td>
                    <td>Rs. <?php echo $row["price"]; ?></td>
                    <td><a href="edit_interchanges.php?id=<?php echo $row["id"]; ?>" class="btn btn-success ">Edit</a>
                    </td>
                </tr>
                <?php
                        
                            }

                        }
                    ?>
            </tbody>
        </table>
    </div>
</div>




<?php include ('includes/script.php'); ?>
<?php include ('includes/footer.php'); ?>