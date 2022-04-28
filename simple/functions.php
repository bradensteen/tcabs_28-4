<?php

function check_login($con)
{

	if(isset($_SESSION['uID']))
	{

		$id = $_SESSION['uID'];
		$query = "select * from user where uID = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}

    function createTempPassword($birthday) {
        $formatpw = date("m-d-Y", strtotime($_POST["birthday"]));
        $result  = str_replace('-', '', $formatpw);
        $result = password_hash($result, PASSWORD_DEFAULT);
        return $result;
    }