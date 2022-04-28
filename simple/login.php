<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$uID = $_POST['uID'];
		$pword = $_POST['pword'];

		if(!empty($uID) && !empty($pword))
		{

			//read from database
			$query = "select * from user where uID = '$uID' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['pWord'] === $pword)
					{

						$_SESSION['uID'] = $user_data['uID'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<div class="container">
	<h1 class="center">Welcome to TCABS</h1>
	        <div id="login">
	          <form method="POST">
                <div class="label">User ID: <input type="text" name="uID"></div>
                <div class="label">Password: <input type="password" name="pword"></div>
                <div class="submit"><input type="submit" name="login" value="Login" /></div>
				
				<a href="signup.php">Click to Register<a/><br><br>
				</form>
        </div>

</div>
</body>
</html>