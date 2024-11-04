<?php require_once('header.php'); 
include('db.php');?>

<link rel="stylesheet" href="css/all.css">
<!-- Content Header (Page header) -->
<style>
@keyframes blinking {
    0% {
        background-color: #e40712;
        border: 3px solid #666;
        border-radius: 20px;
    }

    100% {
        background-color: #d1ce06;
        border: 3px solid #666;
        border-radius: 20px;
    }
}

#blink {
    width: 100%;
    height: 50px;
    animation: blinking 2s infinite;
}
</style>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 ">Dashboard</h1>
            </div><!-- /.col -->

        </div><!-- /.row -->
        <?php $id=$_SESSION['user_id'];

            $res=mysqli_query($con,"SELECT account FROM `users` WHERE user_id=$id");  
            while($row=mysqli_fetch_array($res))
            {
                $account=$row["account"];
                if($account < 1000)
                { ?>

        <div id="blink">
            <center>
                <h2>Less than your account balance is Rs.1000. Top up your account.</h2>
            </center>
        </div></br>
        <?php 
                }
            }
        ?>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content p-4">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-2 ">

            </div>
            <div class="col-lg-4 col-6 ">
                <!-- small box -->
                <a href="account.php">
                    <div class="small-box  bx p-3">
                        <div class="inner ">

                            <?php
                                $id=$_SESSION['user_id'];
                                $f_name="";

                                $res=mysqli_query($con,"SELECT * FROM `users` WHERE user_id=$id");  
                                while($row=mysqli_fetch_array($res))
                                {
                                    $a=$row["account"];

                                }
                            ?>

                            <h1> Current Balance </h1>
                            <h2>Rs. <?php echo $a; ?></h2>
                        </div>
                        <div class="icon">
                            <center>
                                <iconify-icon icon="subway:usd" width="50" height="50"
                                    style="margin-top: 5px; color: black; ">
                                </iconify-icon>
                            </center>
                        </div>

                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <a href="generate_qr.php">
                    <div class="small-box  bx1 p-3">
                        <center>
                            <div class="inner">
                                <h1>Get Your QR Code</h1>
                            </div>
                            <div class="icon">
                                <iconify-icon icon="ion:qr-code-sharp" width="100" height="100"
                                    style="margin-top: 20px; color: black;"></iconify-icon>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

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


<script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>


<?php require_once('footer.php'); ?>