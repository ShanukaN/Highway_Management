<?php include ('includes/header.php'); ?>
<?php include('db.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




<div class="container">
    <div class="content-header">
        <div class="container-fluid">

            <div class="table_title">
                <h1>Monthly Income Chart</h1>



            </div>
            <hr>



            <?php


$res=mysqli_query($con,"SELECT MONTHNAME(exit_date) as mname, sum(price) as total FROM entrance GROUP BY MONTH(exit_date)");
$amount = array();
$month = array();

                while($row=mysqli_fetch_array($res))
                {
                    
$amount[] = $row["total"];
$month[] = $row["mname"];

                }


?>




            <div class="patient_month">

                <canvas id="pmonth" height="120"></canvas>

            </div>
            <script>
            const amount = <?php echo json_encode($amount); ?>



            const data = {
                labels: <?php echo json_encode($month); ?>,
                datasets: [{
                    label: 'Net Price',
                    data: amount,
                    backgroundColor: [
                        '#219B4E',
                    ],

                    borderWidth: 1
                }]
            };


            const config = {
                type: 'bar',
                data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };



            const pmonth = new Chart(document.getElementById('pmonth'),
                config);
            </script>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        </div>
    </div>
</div>



















<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js">
</script>






<?php include ('includes/script.php'); ?>
<?php include ('includes/footer.php'); ?>