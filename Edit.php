<?php 

	$db = mysqli_connect('localhost', 'root', '', 'locationresource');

	// initialize variables
	$name ="";
        $mail =""; 
        $phone = ""; 
        $address =""; 
        $pincode = ""; 
        $work="";
	$update = false;

	if (isset($_POST['save'])) {
        $id=$_POST['id'];
        $name =  $_POST['Name']; 
        $mail = $_POST['Mail']; 
        $phone =  $_POST['Phone']; 
        $address = $_POST['Address']; 
        $pincode = $_POST['Pincode']; 
        $work=$_POST['Work']; 
		

		mysqli_query($db, "INSERT INTO business (id,Name,Mail,Phone,Address,Pincode,Work) VALUES ('$id','$name','$mail','$phone','$address','$pincode','$work')"); 
		$_SESSION['message'] = "Business Added"; 
		header('location: infos.php');
	}
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name =  $_POST['Name']; 
        $mail = $_POST['Mail']; 
        $phone =  $_POST['Phone']; 
        $address = $_POST['Address']; 
        $pincode = $_POST['Pincode']; 
        $work=$_POST['Work'];    
        mysqli_query($db, "UPDATE business SET Name='$name',Mail='$mail',Phone='$phone',Address='$address',Pincode='$pincode',Work='$work' WHERE id=$id");
        $_SESSION['message'] = "Business Updated!"; 
        header('location: infos.php');
    }
    if (isset($_GET['del']))
    {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM business WHERE id=$id");
        $_SESSION['message'] = "Business deleted!"; 
        header('location: infos.php');
    }