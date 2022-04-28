<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$fname = $_POST['fname'];
		$sname = $_POST['sname'];
		$birthday = $_POST['birthday'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$password  = createTempPassword($birthday);
		
		if ($_POST["role"] == "admin") {
			$role = 1;
		}
		if ($_POST["role"] == "convenor") {
			$role = 2;
		}
		if ($_POST["role"] == "student") {
			$role = 3;
		}
		if ($_POST["role"] == "supervisor") {
			$role = 4;
		}

		if(!empty($fname) && !empty($sname) && !empty($birthday) && !empty($mobile) && !empty($email) && !empty($role))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into user (uID,uFName,uSName,birthday,uMobile,uEmail,rID,pWord) values ('$user_id','$fname','$sname','$$birthday','$mobile','$$email','$role','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

    <div class="container">
        <h3 class="center">Register a new User</h3>
        <div id="login">
            <form method="POST">
                <div class="label">First Name: <input type="text" name="fname"></div>
                <div class="label">Surname: <input type="text" name="sname"></div>
                <div class="label">D-O-B: <input type="text" name="birthday"></div>
                <div class="label">Mobile: <input type="text" name="mobile"></div>
                <div class="label">Email: <input type="text" name="email"></div>
                <div class="input-field">
                    <select class="display: block;" name="role">
                        <option value=" " disabled selected>Choose your option</option>
                        <option value="convenor">Convenor</option>
                        <option value="supervisor">Supervisor</option>
                        <option value="student">Student</option>
                        <option value="admin">Admin</option>
                    </select>
                    <label>Select Role</label>
                </div>
                <div class="submit"><input type="submit" name="add_user" value="Add User" /></div>
				<a href="login.php">Click to Login<a/><br><br>
        </div>
    </div>
</body>
</html>