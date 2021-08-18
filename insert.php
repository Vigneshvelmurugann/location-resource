<!DOCTYPE html> 
<html> 
  
<head> 
    <title>Insert Page page</title> 
</head> 
  
<body> 
    <centre> 
        <?php

        $conn = mysqli_connect('localhost', 'root','', 'locationresource'); 
          
        // Check connection 
        if($conn === false){ 
            die("ERROR: Could not connect. " 
                . mysqli_connect_error()); 
        } 
          
        // Taking all 5 values from the form data(input) 
        $name =  $_REQUEST['name']; 
        $mail = $_REQUEST['mail']; 
        $phone =  $_REQUEST['phone']; 
        $gps=$_REQUEST['gps'];
        $address = $_REQUEST['address']; 
        $pincode = $_REQUEST['pincode']; 
        $work=$_REQUEST['work'];  
        $id=$_REQUEST['id'];
        // Performing insert query execution 
        // here our table name is college 
        $sql = "INSERT into business VALUES('$id','$name','$mail','$phone','$address','$pincode','$work','$gps')"; 
          
        if(mysqli_query($conn, $sql)){ 
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>";  
        } else{ 
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn); 
        } 
          
        // Close connection 
        mysqli_close($conn); 
        ?> 
    </centre> 
</body> 
  
</html> 