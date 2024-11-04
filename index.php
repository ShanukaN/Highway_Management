<?php 

include 'user/db.php';

error_reporting(0); // For not showing any error

if (isset($_POST['submit'])) { // Check press or not Post Comment Button
	$name = $_POST['name']; // Get Name from form
	$email = $_POST['email']; // Get Email from form
	$comment = $_POST['comment']; // Get Comment from form

	$sql = "INSERT INTO `comments`(`name`, `email`, `comment`)
			VALUES ('$name', '$email', '$comment')";
	$result = mysqli_query($con, $sql);
	if ($result) {
		echo "<script>alert('Comment added successfully.')</script>";
	} else {
		echo "<script>alert('Comment does not add.')</script>";
	}
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="user/images/lo.png" type="x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Highway System</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="User/css/index.css">

</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-shuttle-van"></i> Highway. </a>

        <nav class="navbar">
            <div id="nav-close" class="fas fa-times"></div>
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#packages">Feature</a>
            <a href="#Contact_US">Contact US</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <a href="user/login.php">Login</a>
        </div>

    </header>

    <!-- header section ends -->

    <!-- search form  -->

    <div class="search-form">

        <div id="close-search" class="fas fa-times"></div>

        <form action="">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>
    </div>

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="box" style="background: url(user/images/5.jpg) no-repeat;">
                        <div class="content">
                            <span>make tour</span>
                            <h3>amazing</h3>
                            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit unde ex molestias soluta
                                consequatur saepe aliquam, excepturi delectus consequuntur minus!</p> -->
                            <a href="user/registration.php" class="btn1">get started</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box second" style="background: url(user/images/4.jpg) no-repeat;">
                        <div class="content">
                            <span>never stop</span>
                            <h3>exploring</h3>
                            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit unde ex molestias soluta
                                consequatur saepe aliquam, excepturi delectus consequuntur minus!</p> -->
                            <a href="user/registration.php" class="btn1">get started</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box " style="background: url(user/images/3.jpg) no-repeat;">
                        <div class="content">
                            <span>explore the</span>
                            <h3>new world</h3>
                            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit unde ex molestias soluta
                                consequatur saepe aliquam, excepturi delectus consequuntur minus!</p> -->
                            <a href="user/registration.php" class="btn1">get started</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>


    <section class="about" id="about">

        <div class="image">
            <img src="user/images/ab.png" alt="">
        </div>

        <div class="content">
            <h3>Expressway</h3>
            <p>Our highways also contribute greatly to social growth and relations. Families are able to visit one
                another more easily & frequently, go on special trips and vacations, and travel for reasons other than
                work-related activities.</p>
            <p>By using this, it is possible to reduce the traffic near the interchanges in the highway.</p>
            <a href="#" class="btn">get started</a>
        </div>

    </section>


    <section class="packages" id="packages">

        <h1 class="heading">Feature</h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="user/images/6.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Reduce Traffic</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
                    <a href="#" class="btn">explore now</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="user/images/7.png" alt="">
                </div>
                <div class="content">
                    <h3>QR Code scan</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
                    <a href="#" class="btn">explore now</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="user/images/8.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Easy pay</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
                    <a href="#" class="btn">explore now</a>
                </div>
            </div>
        </div>

    </section>

    <section class="services">

        <h1 class="heading"> Type Your Comments </h1>
        <center>
            <div class="wrapper">
                <form action="" method="POST" class="form">
                    <div class="row">
                        <div class="input-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter your Name" required>
                        </div>
                        <div class="input-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter your Email" required>
                        </div>
                    </div>
                    <div class="input-group textarea">
                        <label for="comment">Comment</label>
                        <textarea id="comment" name="comment" placeholder="Enter your Comment" required></textarea>
                    </div>
                    <div class="input-group">
                        <button name="submit" class="btn">Post Comment</button>
                    </div>
                </form>
            </div>

    </section>

    <section class="services">

        <h1 class="heading"> Interchanges Location </h1>
        <center>

            <div id="map-canvas" style="width: 1000px; height: 600px;">
            </div>
        </center>

    </section>

    <section class="footer">

        <div class="box-container" id="Contact_US">

            <div class="box">
                <h3> </h3>
                <a href="#home"></a>
                <a href="#about"></a>
                <a href="#shop"></a>
                <a href="#packages"></a>
                <a href="#reviews"></a>
                <a href="#blogs"></a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +94717535244 </a>
                <a href="#"> <i class="fas fa-envelope"></i> Shanuka.nadee2020@gmail.com </a>
                <a href="#"> <i class="fas fa-map"></i> Sri Lankan </a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
                <a href="#"> <i class="fab fa-github"></i> github </a>
            </div>
        </div>

        <div class="credit">created by <span>mr. Shanuka</span> | all rights reserved!</div>

    </section>

    <script type="text/javascript">
    var map;
    var latlng;
    var infowindow;

    $(document).ready(function() {
        $.ajax({ //library for JS help front-end to talk back-end, without having to reload the page
            url: "user/map.php",
            async: true,
            dataType: 'json', // is a language
            success: function(data) {
                console.log(data);
                ViewCustInGoogleMap(data);
            }
        });
        ViewCustInGoogleMap(data);
    });

    function ViewCustInGoogleMap(data) {
        var gm = google.maps; //create instance of google map
        //add initial map option
        var mapOptions = {
            center: new google.maps.LatLng(7.0010222, 80.1842111),
            zoom: 10,
            //mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        //bine html tag to show the google map and bind mapoptions
        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        //create instance of google information windown
        infowindow = new google.maps.InfoWindow();
        var marker, i;
        //loop through all the locations and point the mark in the google map
        for (var i = 0; i < data.length; i++) {
            marker = new gm.Marker({
                position: new gm.LatLng(data[i]['latitude'], data[i]['longitude']),
                map: map,
                // icon: MarkerImg
            });
            //add info for popup tooltip
            google.maps.event.addListener(
                marker,
                'click',
                (
                    function(marker, i) {
                        return function() {
                            infowindow.setContent(data[i]['inter_name']);
                            infowindow.open(map, marker);
                        };
                    }
                )(marker, i)
            );
        }
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNEKofOd08dTGmjM4gcx9ERtMKDQOAh0Y&sensor=true"
        type="text/javascript"></script>
    <!-- custom js file link  -->
    <script src="commen/script.js"></script>


    <!-- footer section ends -->

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>


    <!-- custom js file link  -->
    <script src="user/js/index.js"></script>

</body>

</html>