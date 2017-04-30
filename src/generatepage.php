<?php
	// get the usernames and passwords from the database
	$pdo = new PDO('mysql:host=localhost;dbname=kelpinfo',
	'kelpadmin', 'kelpadmin');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	try {
		$qid = $_SERVER['QUERY_STRING'];
		$result = $pdo->query("SELECT * FROM `locations` WHERE id LIKE '%" . $qid . "%'");
			
		// display the result
		// variables to hold info
		foreach ($result as $location){
			$lname = $location['locationname'];
			$desc = $location['description'];
			$long = $location['longitude'];
			$lat = $location['latitude'];
			$pic = $location['picture'];
			// display the info in HTML
			echo '<fieldset class="searchresult">';
			echo $lname . '<br>';
			echo $desc . '<br>';
			echo '<span>Longitude: </span>';
			echo '<span id="coordslong">' . $long . '</span><br>';
			echo '<span>Latitude: </span>';
			echo '<span id="coordslat">' . $lat . '</span><br><br>';
			
			echo '<div class="images"><img src="' . $pic . '" alt="restaurant image" /></div>';
			echo '</fieldset><br>';
		}
		
		// display user reviews
		$reviewresults = $pdo->query("SELECT * FROM `reviews` WHERE locationid LIKE '%" . $qid . "%'");
		$numReviews = $reviewresults->rowCount();
		echo $numReviews . " Review(s)! ";
		foreach ($reviewresults as $review){
			$fname = $review['userfirstname'];
			$lname = $review['userlastname'];
			$userreview = $review['userreview'];
			// display the info in HTML
			echo '<fieldset class="userreview">';
			echo $fname . " " . $lname . "<br>";
			echo $userreview;
			echo '</fieldset><br>';
		}
		
		echo 'Submit your own review of this location! (500 chars max)';
		// if user is logged in there is a
		// form to fill out user review
		echo '<fieldset class="userreview">';
		if (isset($_COOKIE['firstname']) && isset($_COOKIE['lastname']) && isset($_COOKIE['userpw'])) {
			echo '<form name="reviewform" method="post" action="submitreview.php?' . $qid . '">';
			echo '<p>Review</p>';
			echo '<textarea type= "text" name="userreviewbox" id="userreviewbox" maxlength="500" wrap="true" 	style="width: 300px; height: 100px;" ></textarea><br>';
		
			echo '<input type="submit" value="Submit" name=/>';
			echo '</form>';

		}
		else{
			echo 'You must be logged in to submit a review<br>';
			echo '<a href="login.php">Log in</a>';
			echo ' or ';
			echo '<a href="registration.php">Sign up now!</a>';
		}
		echo '</fieldset><br>';
		
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

?>