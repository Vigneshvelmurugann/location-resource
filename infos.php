<?php $db = mysqli_connect('localhost', 'root', '', 'locationresource');?>
<?php 
	include('functions.php');

if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="login.php" style="color: red;">logout</a>
					</small>
<?php  include('Edit.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM business WHERE id=$id");

		if (@count(array($record))== 1) {
			$n = mysqli_fetch_array($record);
      $name=  $n['Name']; 
        $mail= $n['Mail']; 
        $phone= $n['Phone']; 
        $address = $n['Address']; 
        $pincode = $n['Pincode']; 
        $work=$n['Work']; 
		}
  
	}
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #eceffc;
}

.btn {
  padding: 8px 20px;
  border-radius: 0;
  overflow: hidden;

  &::before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(
      120deg,
      transparent,
      var(--primary-color),
      transparent
    );
    transform: translateX(-100%);
    transition: 0.6s;
  }

  &:hover {
    background: transparent;
    box-shadow: 0 0 20px 10px hsla(204, 70%, 53%, 0.5);

    &::before {
      transform: translateX(100%);
    }
  }
}

.form-input-material {
  --input-default-border-color: white;
  --input-border-bottom-color: white;
  
  input {
    color: white;
  }
}

.login-form {
  display: flex;
  width: 100%;
  flex-direction: column;
  align-items: center;
  padding: 50px 40px;
  color: white;
  background: rgba(0, 0, 0, 0.8);
  border-radius: 10px;
  box-shadow: 0 0.4px 0.4px rgba(128, 128, 128, 0.109),
    0 1px 1px rgba(128, 128, 128, 0.155),
    0 2.1px 2.1px rgba(128, 128, 128, 0.195),
    0 4.4px 4.4px rgba(128, 128, 128, 0.241),
    0 12px 12px rgba(128, 128, 128, 0.35);

  h1 {
    margin: 0 0 24px 0;
  }
  #tty{
    clear: both;
    float:left;
    margin-right:15px;
  }

  .form-input-material {
    margin: 12px 0;
  }

  .btn {
    width: 100%;
    margin: 18px 0 9px 0;
  }
}

</style>
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<?php $x=ucfirst($_SESSION['user']['id']);    ?>
<?php $results = mysqli_query($db, "SELECT * FROM business WHERE id=$x"); ?>

<table class="login-form">
	<thead>
		<tr>
      
			<th>NAME</th>
			<th>EMAIL</th>
			<th>PHONE</th>
			<th>ADDRESS</th>
		  <th>PINCODE</th>
      <th>WORK</th>
      <th>EDIT</th>
      <th>DELETE</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
      <td style="align:center; word-wrap: break-all;"><?php echo $row['Name']; ?></td>
			<td style="align:center; word-wrap: break-all;"><?php echo $row['Mail']; ?></td>
			<td style="align:center; word-wrap: break-all;"><?php echo $row['Phone']; ?></td>
      <td style="align:center; word-wrap: break-all;"><?php echo $row['Address']; ?></td>
      <td style="align:center; word-wrap: break-all;"><?php echo $row['Pincode']; ?></td>
			<td style="align:center; word-wrap: break-all;"><?php echo $row['Work']; ?></td>
			<td>
				<a href="infos.php?edit=<?php echo $row['id'];?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="Edit.php?del=<?php echo $row['id'];?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<br>
<br>

   	    <form class="login-form" method="post" action="Edit.php" >
		   <div class="form-input-material">

		   <input type="hidden" name="id" value="<?php echo $x; ?>">
		   

    <input type="text" name="Name" value="<?php echo $name; ?>" placeholder="Name">
    <br>
  </div>
  <div class="form-input-material">
      <input id="text" name="Mail" value="<?php echo $mail; ?>" placeholder="Email">
    <br>
  </div>
  <div class="form-input-material">
      <input type="number" name="Phone" value="<?php echo $phone;?>" placeholder="Phone Number">
    <br>
  </div>
  <div class="form-input-material">
      <input type="text" name="Address" value="<?php echo $address; ?>" placeholder="Address">
    <br>
  </div>
  <div class="form-input-material">
  
    <input type="text" name="Pincode" value="<?php echo $pincode; ?>" placeholder="Pincode">
  <br>  
  </div>
  <div class="form-input-material">
  
    <input type="text" name="Work"value="<?php echo $work; ?>" placeholder="Work">
    <br>
  </div>
  
<br>
		    <div class="form-input-material">
			<?php if ($update == true): ?>
	<button class="btn btn-primary btn-ghost" type="submit" name="update" style="background: #556B2F;" >update</button>
  <?php else: ?>
	<button class="btn btn-primary btn-ghost" type="submit" name="save" >Add</button>
  
<?php endif ?>

		    </div>
	    </form>
      <?php endif ?>
      </div>
      </div>
      </div>
      <br>
      <center>
      <form action="map1.php" method="post">
      <input type="hidden" name="id" value="<?php echo $x; ?>">  
      <input type="submit" value="Location Change or Add" name="jj">
  </form>
  <?php 

$db = mysqli_connect('localhost', 'root', '', 'locationresource');
  $lat ="";
  $long =""; 
  if (isset($_POST['like'])) {
      $id=$_POST['iddd'];
      $lat =  $_POST['latu']; 
      $long = $_POST['longu'];
      mysqli_query($db, "UPDATE business SET Lat='$lat',Longu='$long'  WHERE id=$id");
  }
?> 
</body>
</html>