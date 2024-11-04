<?php

include('db.php');


$location = mysqli_query($con,"SELECT * FROM `interchanges`");
while($current = mysqli_fetch_assoc($location)){
$locations[] =$current;
}

echo json_encode( $locations ); // displays the data 
//json is like converter between php and JS 
?>