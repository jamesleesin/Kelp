<!DOCTYPE html>
<html>
	<!-- php for the head of the page -->
	<?php $pageTitle="4WW3 Project Index"; include 'head.inc.php';?></title>
	
	<!-- What is shown on the webpage -->
	<body>
		<!-- php rendering the header -->
		<?php include 'header.inc.php'; ?>
		
		<!-- Navigation menu on the left of the screen with links for the user to click -->
		<!-- Log in and About us currently dead links -->
		<nav>
			<!-- fieldset for styling borders -->
			<fieldset id="navigation">
				<!-- placeholder for log in--> 
				<a href="login.php"> Log In! </a>
				
				<!-- display user information -->
				<h4>
				<!-- php to show user info -->
				<?php
				if (isset($_COOKIE['firstname']) && isset($_COOKIE['lastname']) && isset($_COOKIE['userpw'])) {
					echo 'Logged in as: ' . $_COOKIE['firstname'] . " " . $_COOKIE['lastname'];
				}
				?>
				</h4>
						
				<a href = "submission.php" > Submit a new Location! </a><br>

				<p id="noaccount"> Don't have an account? </p>
				
				<a href = "registration.php" > Create an Account! </a><br><br>

				<h4>Search:</h4>
				<form method="post" id = "locationsearch" action="results.php?go">
					<!-- Search by text -->
					<input type = "text" name="textsearchname">
					<input type = "submit" name="textsearchsubmit" value="Search"><br>
					<!-- Shows options with the number of stars (&#9733 is the code for a black star) -->
					<select id = "searchrating" name="ratingsearchname">
						<option value="1">&#9733;</option>
						<option value="2">&#9733;&#9733;</option>
						<option value="3">&#9733;&#9733;&#9733;</option>
						<option value="4">&#9733;&#9733;&#9733;&#9733;</option>
						<option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
					</select>
					<input type = "submit" name="ratingsearchsubmit" value="Search"><br>
				</form>
			</fieldset>
		</nav>
		<!-- Main content shown in middle of screen -->
		<main>
			<!-- Filler content  -->
			<div id="introboxes">
				<fieldset>
					<h3>What is Kelp? A place where seafood is reviewed by users, for users.</h3>
					<h3>New to Kelp?</h3>
					<a href = "registration.php" > Sign up now! </a>
				</fieldset>
				
				<fieldset>
					<h3>Get connected to the world of seafood with Kelp!</h3>
					<h3> Just visited a new seafood place? </h3>
					<a href="submission.php"> Submit a new location! </a>
				</fieldset>
			</div>
		</main>
		<!-- Footer crediting the author and date -->
		<?php include 'footer.inc.php'; ?>
	</body>
</html>