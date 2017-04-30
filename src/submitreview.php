<?php
	// get the usernames and passwords from the database
	$pdo = new PDO('mysql:host=localhost;dbname=kelpinfo',
	'kelpadmin', 'kelpadmin');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// create a new sql entry
	try {
		// variable to hold the post data
		$qid = $_SERVER['QUERY_STRING'];
		$review = $_POST['userreviewbox'];
		$userfn = $_COOKIE['firstname'];
		$userln = $_COOKIE['lastname'];
		
		echo $qid;
		echo $review;
		echo $userfn;
		echo $userln;
	
		$result = $pdo->query("INSERT INTO reviews (locationid, userfirstname, userlastname, userreview) VALUES ('$qid', '$userfn', '$userln', '$review')");
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	// return to main page
	header('Location: individualresult.php?' . $qid);
?>
