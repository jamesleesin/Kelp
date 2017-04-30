<?php
	// get the usernames and passwords from the database
	$pdo = new PDO('mysql:host=ec2-54-186-68-108.us-west-2.compute.amazonaws.com;dbname=kelpinfo',
	'root', 'kelpadmin');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	try {
		$result = $pdo->query('SELECT * FROM `userlist`');
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	$error = true;
	// check to see if there are values inputted
	if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['userpw'])) {
		// go through database to see if names and passwords match
		// first name and last name are case insensitive, password is case sensitive
		foreach($result as $user){
			if (strcasecmp($_POST['firstname'], $user['firstname']) == 0 && strcasecmp($_POST['lastname'], $user['lastname']) == 0 && ($_POST['userpw'] == $user['password'])){
				// set a cookie
				setcookie('firstname', $user['firstname'], false, '/');
				setcookie('lastname', $user['lastname'], false, '/');
				setcookie('userpw', md5($_POST['password']), false, '/');
				$error = false;
				// after login go back to main page
				header('Location: search.php');
			}
		}
	}

	// if there is a login error keep them on login page
	if ($error == true){
		header('Location: login.php');
	}
?>