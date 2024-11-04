<?php include ('includes/header.php'); 
include ('db.php');
?>

<link rel="stylesheet" href="css/dash.css">
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <hr>

    <div class="row">

        <div class="col-xl-3 col-md-6">
            <center>
                <div class="small-box  bx1 p-3">
                    <div class="inner ">
                        <h1> Daily Income </h1>
                        <hr>
                        <h2>Rs. 6250 /=</h2>
                    </div><br>
                    <div class="icon">

                        <iconify-icon icon="subway:usd" width="50" height="50"
                            style="margin-top: 5px; color: #f2e40f; ">
                        </iconify-icon>

                    </div>
                </div>
            </center>
        </div>

        <div class="col-xl-3 col-md-6">
            <center>
                <div class="small-box  bx2 p-3">
                    <div class="inner ">
                        <h1> Total Income </h1>
                        <hr>
                        <h2>Rs. 45450 /=</h2>
                    </div><br>
                    <div class="icon">

                        <iconify-icon icon="emojione:money-bag" width="50" height="50"
                            style="margin-top: 5px; color: black; ">
                        </iconify-icon>

                    </div>
                </div>
            </center>
        </div>

        <div class="col-xl-3 col-md-6">
            <center>
                <div class="small-box  bx3 p-3">
                    <div class="inner ">

                        <?php
                        date_default_timezone_set('Asia/Colombo');
                        $time=date('H:i:s');
                        $cdate=date('Y-m-d');

                        $query = "SELECT id FROM entrance WHERE ent_date='$cdate'";
                        $Query_run = mysqli_query($con, $query);
                        $row = mysqli_num_rows($Query_run);
                        
                        ?>

                        <h1>Daily Vehicles</h1>
                        <hr>
                        <h2><?php  echo $row; ?></h2>
                    </div><br>
                    <div class="icon">

                        <iconify-icon icon="map:car-wash" width="50" height="50"
                            style="margin-top: 5px; color: #0938F9; ">
                        </iconify-icon>

                    </div>
                </div>
            </center>
        </div>

        <div class="col-xl-3 col-md-6">
            <center>
                <div class="small-box  bx4 p-3">
                    <div class="inner ">

                        <?php 
                        $query = "SELECT id FROM entrance ORDER BY id";
                        $Query_run = mysqli_query($con, $query);
                        $row = mysqli_num_rows($Query_run);
                        
                        ?>

                        <h1> Total Vehicles </h1>
                        <hr>
                        <h2><?php  echo $row; ?></h2>
                    </div><br>
                    <div class="icon">
                        <iconify-icon icon="emojione:sport-utility-vehicle" width="50" height="50"
                            style="margin-top: 5px; color: black; ">
                        </iconify-icon>
                    </div>
                </div>
            </center>
        </div>

        <!-- <div class="col-xl-3 col-md-6">
            <div class="card bx4 text-white mb-4">
                <div class="card-body">
                    <h2>Total Vehicles</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between" id="number">
                    <?php 
                        $query = "SELECT id FROM entrance ORDER BY id";
                        $Query_run = mysqli_query($con, $query);
                        $row = mysqli_num_rows($Query_run);
                        echo '<h1>'.$row.'</h1>'
                        ?>
                </div>
            </div>
        </div> -->


        <!-- <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Today Vehicle Out</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Total Earning</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div> -->
    </div>
</div>


<section class="content p-4">
    <center>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="datetime ">
                        <div class="date">
                            <span id="dayname">Day</span>,
                            <span id="month">Month</span>
                            <span id="daynum">00</span>,
                            <span id="year">Year</span>
                        </div>
                        <div class="time">
                            <span id="hour">00</span>:
                            <span id="minutes">00</span>:
                            <span id="seconds">00</span>
                            <span id="period">AM</span>
                        </div>
                    </div>


                    <!--digital clock end-->

                    <script type="text/javascript">
                    function updateClock() {
                        var now = new Date();
                        var dname = now.getDay(),
                            mo = now.getMonth(),
                            dnum = now.getDate(),
                            yr = now.getFullYear(),
                            hou = now.getHours(),
                            min = now.getMinutes(),
                            sec = now.getSeconds(),
                            pe = "AM";

                        if (hou >= 12) {
                            pe = "PM";
                        }
                        if (hou == 0) {
                            hou = 12;
                        }
                        if (hou > 12) {
                            hou = hou - 12;
                        }

                        Number.prototype.pad = function(digits) {
                            for (var n = this.toString(); n.length < digits; n = 0 + n);
                            return n;
                        }

                        var months = ["January", "February", "March", "April", "May", "June", "July", "Augest",
                            "September",
                            "October",
                            "November", "December"
                        ];
                        var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                        var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
                        var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
                        for (var i = 0; i < ids.length; i++)
                            document.getElementById(ids[i]).firstChild.nodeValue = values[i];
                    }

                    function initClock() {
                        updateClock();
                        window.setInterval("updateClock()", 1);
                    }
                    </script>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </center>
</section>



<?php include ('includes/script.php'); ?>
<?php include ('includes/footer.php'); ?>