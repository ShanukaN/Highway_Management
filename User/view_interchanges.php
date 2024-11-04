<?php require_once('header.php'); ?>

<?php
$id=$_GET["id"];
$inter_name="";
$rout_name="";
$lati="";
$longi="";



$res=mysqli_query($con,"SELECT * FROM `interchanges` WHERE id=$id");  
while($row=mysqli_fetch_array($res))
{
    
    $id=$row["id"];
    $inter_name=$row["inter_name"];
    $rout_name=$row["router_name"];
    $lati=$row["latitude"];
    $longi=$row["longitude"];
    
}

?>


<div class="content-header">
    <div class="container-fluid ">
        <form class="border shadow p-4 fm" method="GET">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 ">Interchanges</h1>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card-deck">
                        <div class="card-body">
                            <div class="col-md-12 alert alert-success" id="success" style="display:none">
                                Updated Successfully!
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabelLg"
                                    class="col-sm-4 col-form-label col-form-label-lg">Interchange Name
                                    :</label>
                                <div class="col-sm-6">
                                    <label for="colFormLabelLg"
                                        class="col-sm-2 col-form-label col-form-label-lg"><?php echo $inter_name;?></label>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Route
                                    No :</label>
                                <div class="col-sm-6">
                                    <label for="colFormLabelLg"
                                        class="col-sm-4 col-form-label col-form-label-lg"><?php echo $rout_name;?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card-deck">
                        <div class="card-body">
                            <p><iframe
                                    src='https://www.google.com/maps?q=<?php echo $lati;?>,<?php echo $longi;?>&hl=es;z=14&output=embed'
                                    width="500" height="450" frameborder="0"></iframe></p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<?php require_once('footer.php'); ?>