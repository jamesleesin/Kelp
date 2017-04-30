<?php
	// get the usernames and passwords from the database
	$pdo = new PDO('mysql:host=localhost;dbname=kelpinfo',
	'kelpadmin', 'kelpadmin');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// variables to hold the post data
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$pw = $_POST['userpw'];
	$email = $_POST['useremail'];
	$dob = $_POST['userdob'];
	$gender = $_POST['gender'];
	$city = $_POST['city'];
	
	// create a new sql entry
	try {
		$result = $pdo->query("INSERT INTO userlist (firstname, lastname, password, email, dateofbirth, gender, city) VALUES ('$fname', '$lname', '$pw', '$email', '$dob', '$gender', '$city')");
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	// return to main page
	header('Location: search.php');
?>
