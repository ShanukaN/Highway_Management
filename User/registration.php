<?php include('db.php');?>



<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="css/registration.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="icon" href="images/lo.png" type="x-icon">
</head>


<body>
    <div class="container">
        <div class="title">Registration</div>

        <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <div class="content">
            <hr>
            <form method="POST" action="regcode.php">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" name="f_name" style="text-transform: capitalize;">
                    </div>

                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" name="l_name" style="text-transform: capitalize;">
                    </div>

                    <div class="input-box">
                        <span class="details">NIC</span>
                        <input type="text" name="nic">
                    </div>

                    <div class="input-box">
                        <span class="details">Tel No</span>
                        <input type="text" name="tel">
                    </div>

                    <div class="input-box form-group ">
                        <label for="exampleFormControlSelect1">Gender</label>
                        <select class="form-control" id="" name="gender" value="<?php echo $gender;?>">
                            <option value="">--Select gender--</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" name="address">
                    </div>

                    <div class="input-box">
                        <span class="details">E-Mail</span>
                        <input type="text" name="email">
                    </div>

                    <div class="input-box">
                        <span class="details">Vehicle Number</span>
                        <input type="text" name="v_no" placeholder="XXX-9020" style="text-transform: uppercase;">
                    </div>

                    <div class="input-box form-group ">
                        <label for="exampleFormControlSelect1">Vehicle Type</label>
                        <select class="form-control" id="" name="v_typ" value="<?php echo $v_type;?>">
                            <option value="">--Select Vehicle Type--</option>
                            <option value="car">Car</option>
                            <option value="van">Van</option>
                            <option value="suv/jeep">SUV/Jeep</option>
                            <option value="lorry">Lorry</option>
                        </select>
                    </div>

                    <div class="input-box form-group ">
                        <label for="exampleFormControlSelect1">Province</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="province"
                            value="<?php echo $province;?>">
                            <option>--Select Province--</option>
                            <option value="north">Northern</option>
                            <option value="n_west">North Western</option>
                            <option value="n_cen">North Central</option>
                            <option value="west">Western</option>
                            <option value="cent">Central</option>
                            <option value="sab">Sabaragamuwa</option>
                            <option value="east">Eastern </option>
                            <option value="uva">Uva</option>
                            <option value="south">Southern</option>
                        </select>
                    </div>

                    <div class="input-box">
                        <span class="details">Licence Number</span>
                        <input type="text" name="li_name">
                    </div>

                    <div class="input-box">
                        <span class="details">User Name</span>
                        <input type="text" name="u_na">
                    </div>

                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="pass" id="show">
                        <label for="">Show password <input type="checkbox" id="check" onclick="myFunction()"></label>

                    </div>

                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="cpass">
                    </div>

                </div>
                <center>
                    <div class="button">
                        <input type="submit" value="Register" name="submit" id="submit">


                    </div>
                    <!-- <div class="back">
                        <button onclick="location.href='../index.php'">Back to Home</button>
                    </div> -->
                </center>
            </form>
            <center>
                <div class="button">
                    <button onclick="location.href='../index.php'">Back to Home</button>
                </div>
            </center>
        </div>
    </div>

    <script type="text/javascript">
    function myFunction() {
        var show = document.getElementById('show');
        if (show.type == 'password') {
            show.type = 'text';
        } else {
            show.type = 'password';
        }
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


</body>

</html>