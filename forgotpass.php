<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset PHP</title>
	<style>
    body {
	background: #3b5998;
	font-size: 1.1em;
	font-family: sans-serif;
}
a {
	text-decoration: none;
}
form {
	width: 25%;
	margin: 70px auto;
	background: white;
	padding: 10px;
	border-radius: 3px;
}
h2.form-title {
	text-align: center;
}
input {
	display: block;
	box-sizing: border-box;
	width: 100%;
	padding: 8px;
}
form .form-group {
	margin: 10px auto;
}
form button {
	width: 100%;
	border: none;
	color: white;
	background: #3b5998;
	padding: 15px;
	border-radius: 5px;
}
.msg {
	margin: 5px auto;
	border-radius: 5px;
	border: 1px solid red;
	background: pink;
	text-align: left;
	color: brown;
	padding: 10px;
}
    </style>
</head>
<body>
	<form class="login-form" action="enter_email.php" method="post">
		<h2 class="form-title">Reset password</h2>
		<!-- form validation messages -->
				<div class="form-group">
			<label>Your email address</label>
			<input type="email" name="email">
		</div>
        <div class="form-group ">
			<label>User type</label>
			<select name="user_type">
				<option value="business">Buisness</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="form-group">
			<button type="submit" name="reset-password" class="login-btn">Submit</button>
		</div>
	</form>
</body>
</html>
