<?php
require  'connect.php';
?>
<!DOCTYPE html>


<head>

	<title>Register</title>

	<link rel="stylesheet" href="css/style.css">


</head>

<body>
	<div class="container">
		
		<div class="box">
			<div class="box-header">
				<h2>REGISTER</h2>
			</div>
			<form method="post" action="registration.php">
			<label for="username">Username</label>
			<br/>
			<input type="text" id="username" name="username">
			<br/>
            <label for="email">E-mail</label>
			<br/>
			<input type="email" id="email" name="email">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password" name="password">
			<br/>
            <label for="password">Re-enter Password</label>
			<br/>
			<input type="password" id="cpassword" name="cpassword">
			<br/>
			<input type="submit" name="register" value="Register" class="button1">
			<br/>
			<a href="#"><p class="small">Already Registered?<a href="index.php">Login here!</a></p></a>
			</form>
		</div>
	</div>
</body>

<?php
		if (isset($_POST['register'])) {
			$username=$_POST['username'];
            $email=$_POST['email'];
			$password=$_POST['password'];
			$cpassword=$_POST['cpassword'];

			if($password==$cpassword)
			{
				$query="SELECT * FROM user_info WHERE username='$username'";
				$query_run= mysqli_query($conn,$query);

				if(mysqli_num_rows($query_run)>0){
					echo '<script type="text/javascript">alert("User already exists.. try another username")</script>';
			    }

			   else{

					$query="INSERT INTO user_info(username,password,email) VALUES 
                    ('$username','$password','$email')";
                    

					if($conn->query($query))
					{
					echo '<script type="text/javascript">alert("Registered successfully!")</script>';


                    }
                    else{
					echo '<script type="text/javascript">alert("Error!")</script>';

                    }

				}
			}
			else{
					echo '<script type="text/javascript">alert("The two password are not correct!")</script>';

                    }
		}
		?>

</html>
