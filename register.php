<?php include('functions.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Location Resource Register</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300&display=swap" rel="stylesheet">
	<style>
		{ margin: 0px; padding: 0px; }
body {
	font-size: 120%;
	font-family:Montserrat;
	background:#124E5B ;
	margin: 0px; padding: 0px;
	
}
.header {
	width: 100px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
	width: 35%;
	margin: 50px auto 0px;
	color: white;
	background:black;
	text-align: center;

	border-bottom: none;
		padding: 20px;
}
form, .content {
	width: 100px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
	width: 35%;
	margin: 0px auto;
	padding: 20px;

	background: white;
	
}
.input-group {
	margin: 10px 0px 10px 0px;
}
.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
#user_type {
	height: 40px;
	width: 96%;
	padding: 5px 10px;
	background: white;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.ikea{
	margin:15% auto ;
}
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: 	black;
	border: none;
	border-radius: 5px;
	
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.btn, .jkl{
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.1);
}

.btn:hover, .header:hover ,.jkl:hover {
	box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.8) 0px 30px 60px -30px;
}
.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}
.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}
.profile_info img {
	display: inline-block; 
	width: 50px; 
	height: 50px; 
	margin: 5px;
	float: left;
}
.profile_info div {
	display: inline-block; 
	margin: 5px;
}
.profile_info:after {
	content: "";
	display: block;
	clear: both;
}

	</style>
</head>
<body><div class="ikea">
	<div class="header">
		<h2>Registration Of Buisness And User</h2>
	</div>
	
	<form method="post" action="register.php" class="jkl">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group nmn">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="business">Buisness</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn">Sign Up</button>
		</div>
		<p>
			Already a member? <a href="login.php" style="text-decoration:none;">Sign In</a>
		</p>
	</form>
</div>
</body>
</html>