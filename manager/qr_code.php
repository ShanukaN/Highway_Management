<?php include ('includes/header.php'); ?>
<link href="css/btn.css" rel="stylesheet" />


<div class="container-fluid px-4">

    <div class="container bo">

        <button class="btn-1" onclick="window.location.href='qr/entrance.php';">Entrance</button>
        <button type="submit" class="btn-2" onclick="window.location.href='qr/exit.php';">Exit</button>

    </div>
</div>


<?php 
    if(isset($_SESSION['username'])){
        echo $_SESSION['username'];
        echo $_SESSION['manager_id'];
    }
    
    ?>



<?php include ('includes/script.php'); ?>
<?php include ('includes/footer.php'); ?>