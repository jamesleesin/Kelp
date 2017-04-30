<?php
	// connect to database
	$pdo = new PDO('mysql:host=localhost;dbname=kelpinfo',
	'kelpadmin', 'kelpadmin');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$showMap = false;
	
	if (isset($_POST['textsearchsubmit'])){
		if (isset($_GET['go'])){
			// fend off sql injection
			if(preg_match("/^[A-Z|a-z]+/", $_POST['textsearchname'])){ 
				$name=$_POST['textsearchname']; 
				
				// search query
				try {
					$result = $pdo->query("SELECT * FROM `locations` WHERE locationname LIKE '%" . $name . "%'");
					
					if($result->rowCount() > 0){
						$showMap = true;
						echo '<div id = "livemap"></div><br>';
						// display the result
						foreach ($result as $location){
							// variables to hold info
							$lname = $location['locationname'];
							$desc = $location['description'];
							$long = $location['longitude'];
							$lat = $location['latitude'];
							$pic = $location['picture'];
							// display the info in HTML
							echo '<fieldset class="searchresult" name="' . $location['id'] . '">';
							echo '<p id="name">' . $lname . '</p>';
							echo '<p id="description">' . $desc . '</p>';
							echo '<span>Longitude: </span>';
							echo '<span id="coordslong">' . $long . '</span><br>';
							echo '<span>Latitude: </span>';
							echo '<span id="coordslat">' . $lat . '</span><br><br>';
							
							// provide a link to more detailed info
							echo '<a href =individualresult.php?' . $location['id'] . '>Details</a>';
							echo '</fieldset><br>';
						}
					}
					else{
						echo 'No results found!';
					}
				} catch (PDOException $e) {
					echo $e->getMessage();
				}
				
			} 
			else{
				echo 'Invalid Search Query';
			}
		}
	}
	else if (isset($_POST['ratingsearchsubmit'])){
		if (isset($_GET['go'])){
			// search query
			try {
				$rating =$_POST['ratingsearchname']; 
				
				$result = $pdo->query("SELECT * FROM `locations` WHERE rating LIKE '%" . $rating . "%'");
				
				// display the result
				if($result->rowCount() > 0){
					$showMap = true;
					echo '<div id = "livemap"></div><br>';
					foreach ($result as $location){
						// variables to hold info
						$lname = $location['locationname'];
						$desc = $location['description'];
						$long = $location['longitude'];
						$lat = $location['latitude'];
						$pic = $location['picture'];
						// display the info in HTML
						echo '<fieldset class="searchresult" name="' . $location['id'] . '">';
						echo '<p id="name">' . $lname . '</p>';
						echo '<p id="description">' . $desc . '</p>';
						echo '<span>Longitude: </span>';
						echo '<span id="coordslong">' . $long . '</span><br>';
						echo '<span>Latitude: </span>';
						echo '<span id="coordslat">' . $lat . '</span><br><br>';
						
						// provide a url to more detailed info
						echo '<a href =individualresult.php?' . $location['id'] . '>Details</a>';
						echo '</fieldset><br>';
					}
				}
				else{
					echo 'No results found!';
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}	
		}
	}
?>