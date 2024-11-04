<?php require_once('header.php'); ?>


<?php $res=mysqli_query($con,"SELECT * FROM `interchanges`");?>


<div class="content-header">
    <div class="container-fluid ">
        <form class="border shadow p-4 fm" method="GET" action="">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 ">View Profile</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                    </div>
                </div>
            </div>
            <hr>
            <label>
                <h3>Search</h3>

            </label><input type="text" name="search" id="search" placeholder="Search By Name" class="form-control">

            <br>
            <table class="table" id="table">
                <thead class="thead-dark">
                    <tr>
                        <th width="30px">ID</th>
                        <th>Interchanges Name</th>
                        <th>Route Name</th>
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
                        <td><?php echo $row["inter_name"]; ?></td>
                        <td><?php echo $row["router_name"]; ?></td>
                        <td><a href="view_interchanges.php?id=<?php echo $row["id"]; ?>"
                                class="btn btn-success ">View</a>
                        </td>

                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>


        </form>
    </div>
</div><!-- /.container-fluid -->

<script type="text/javascript">
var searchBox_1 = document.getElementById("search");
searchBox_1.addEventListener("keyup", function() {
    var keyword = this.value;
    keyword = keyword.toUpperCase();
    var table_1 = document.getElementById("table");
    var all_tr = table_1.getElementsByTagName("tr");
    for (var i = 0; i < all_tr.length; i++) {
        var name_column = all_tr[i].getElementsByTagName("td")[1];
        if (name_column) {
            var name_value = name_column.textContent || name_column.innerText;
            name_value = name_value.toUpperCase();
            if (name_value.indexOf(keyword) > -1) {
                all_tr[i].style.display = ""; // show
            } else {
                all_tr[i].style.display = "none"; // hide
            }
        }
    }
});
</script>


<?php require_once('footer.php'); ?>