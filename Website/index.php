<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>Welcome</h2>
		<h3>Sign in to Continue!</h3>
		<img class="img-logo" src="image/medicalLogo.png" alt="mylogo">
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User</label>
     	<input type="text" name="uname" placeholder="Phone Number / University ID"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Sign in</button>
		<div class="pass">Forgot Password?</div>
		
     </form>
</body>
</html>