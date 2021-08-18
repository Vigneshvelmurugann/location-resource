<?php 

	$db = mysqli_connect('localhost', 'root', '', 'locationresource');
    $lat ="";
    $long =""; 
    if (isset($_POST['like'])) {
        $id=$_POST['id'];
        $lat =  $_POST['latu']; 
        $long = $_POST['longu'];
        mysqli_query($db, "UPDATE business SET Lat='$lat',Long='$long'  WHERE id=$id");
    }
?>