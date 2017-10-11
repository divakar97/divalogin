<?php
require  'connect.php';
session_start();
?>
<!DOCTYPE html>


<head>
	
	<title>Login</title>

	<link rel="stylesheet" href="css/style.css">


</head>

<body>
	<div class="container">
		
		<div class="box">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<form method="post" action="index.php">
			<label for="username">Username</label>
			<br/>
			<input type="text" id="username" name="username">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password" name="password">
			<br/>
			<input type="submit" value="Login" name="login" class="button1">
			<a href="registration.php"><input class="button1" type="button" value="Register" name="register"></a>
			<br/>
			<a href="#"><p class="small">Forgot your password?</p></a>
			</form>
		</div>
	</div>
</body>

<?php
		if (isset($_POST['login'])) {
			$username=$_POST['username'];
			$password=$_POST['password'];
			$query="SELECT * FROM user_info";
			$query_run=mysqli_query($conn,$query);
				if(mysqli_num_rows($query_run)>0){
			$row=mysqli_fetch_array('$query_run',MYSQLI_ASSOC);
            
            $_SESSION['username']=$username;
                    header('location:home.php');
			    }
				else{
					echo $_SESSION='Incorrect username/password';
                    header('location:index.php');
				}
		}
		?>

</html>
