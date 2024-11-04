<?php include ('db.php'); ?>
<?php include ('includes/header.php'); ?>


<div class="container-fluid px-4">
    <h1>
        <center>Interchanges Details
    </h1>
    <hr>
    <div>
        <a type="button" class="btn btn-primary" href="add_interchanges.php">Add Interchanges</a>
    </div><br>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Interchanges Details
        </div>

        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-bordered table-hover">
                <thead class="table">
                    <tr>
                        <th width="30px">ID</th>
                        <th>Interchanges Name</th>
                        <th>Route Name</th>
                        <th width="80px"></th>
                        <th width="80px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  $res=mysqli_query($con,"SELECT * FROM `interchanges`");
                  while($row=mysqli_fetch_array($res))
                  {
                    ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["inter_name"]; ?></td>
                        <td><?php echo $row["router_name"]; ?></td>
                        <td><a href="edit_interchanges.php?id=<?php echo $row["id"]; ?>"
                                class="btn btn-success ">Edit</a>
                        </td>
                        <td>
                            <input type="hidden" class="delete_id_value" value="<?php echo $row["id"]; ?>">
                            <a href="javascripit:void(0)" class="delete_btn_ajax btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php
                  }
            ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>


<script>
$(document).ready(function() {

    $('.delete_btn_ajax').click(function(e) {
        e.preventDefault();
        var deleteid = $(this).closest("tr").find('.delete_id_value').val();
        //console.log(deleteid);


        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        type: "POST",
                        url: "",
                        data: {
                            "delete_btn_set": 1,
                            "delete_id": deleteid,
                        },

                        success: function(response) {

                            swal("Supplier Delete Successfully.!", {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            });
                        }
                    });
                }
            });
    });

});
</script>

<?php
 
  if(isset($_POST['delete_btn_set']))

  {
      $del_id = $_POST['delete_id'];

      $reg_query = "DELETE FROM `interchanges` WHERE id='$del_id'";
      $reg_query_run = mysqli_query($con, $reg_query);
  }
?>

<?php include ('includes/footer.php'); ?>