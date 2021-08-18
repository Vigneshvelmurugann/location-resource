<?php
$a=$_POST['email'];
    $x=$_POST['user_type'];

	$generator = "1357902468";
  
   $n=6;
  
    $result = "";
  
    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
    }

 $db = mysqli_connect('localhost', 'root','', 'locationresource');
    $e=md5($result);
    if(mysqli_query($db,"UPDATE users SET password='$e' WHERE user_type='$x' AND email='$a'"))
	{echo "Password Updated and Mailed to you!";}
?>
	<div style="display:none">
<?php
use PHPMailer\PHPMailer\PHPMailer;

	

	$token = bin2hex(random_bytes(50));
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
$mail = new PHPMailer(true);
  

    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com;';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'vigneshvelmurugann@gmail.com';                 
    $mail->Password   = 'williamvicky081040';                        
    $mail->SMTPSecure = 'tls';                              
    $mail->Port       = 587;  
  
    $mail->setFrom('vigneshvelmurugann@gmail.com', 'Name');           
    $mail->addAddress($a, 'Name');
       
    $mail->isHTML(true);                                  
    $mail->Subject = 'Subject';
    $mail->Body    ='Your New Password Is '.$result;
    $mail->send();
   
	?>

	</div>