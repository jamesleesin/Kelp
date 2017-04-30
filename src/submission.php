<!DOCTYPE html>
<html>
	<!-- php for the head of the page -->
	<?php $pageTitle="Submit New Location"; include 'head.inc.php';?></title>
	<!-- What is shown on the webpage -->
	<body>
		<!-- php rendering the header -->
		<?php include 'header.inc.php'; ?>
		<!-- php rendering navigation -->
		<?php include 'nav.inc.php'; ?>
		
		<!-- main content shown in middle of screen -->
		<main>
			<fieldset id="newlocationinfo">
				<legend>Submit new Location</legend>
					<form name="locationForm" method="POST" action="createlocation.php" enctype="multipart/form-data">
						<!-- user must be logged in to submit -->
						<h4>
						<?php
						if (isset($_COOKIE['firstname']) && isset($_COOKIE['lastname']) && isset($_COOKIE['userpw'])) { ?>
						
						<!-- Text box for Location Name -->
						<div>
							<p>Location Name</p>
							<input type= "text" name="locname" required>
						</div>
						<!-- Text box for Description -->
						<div>
							<p>Description</p>
							<input type="text" name="locdesc" required>
						</div
						<!-- Text box for rating -->
						<div>
							<p>Rating</p>
							<input type="number" name="rating" placeholder = "1 to 5" min= "1" max = "5" required>
						</div>
						
						<!-- Text box for longitude -->
						<div>
							<p>Longitude</p>
							<input type="number" name="loclong" placeholder="-180 to 180" step="any" value="" min="-180" max="180" required>
						</div>
						
						<!-- Text box for latitude -->
						<div>
							<p>Latitude</p>
							<input type="number" name="loclat" placeholder="-90 to 90" step = "any" value="" min="-90" max="90" required>
						</div>
						<!-- Submit based on user location -->
						<p>Or detect current location</p>
						<button type="button" id="userlocationsearch" onclick="getUserLocation()">Get My Location</button>
						<!-- File upload for pictures -->
						<div>
							<p>Picture</p>
							<input type="file" name="picture">
						</div>
						<!-- Reset and Done buttons -->
						<div>
							<input type="reset">
							<input type="submit" value="Done">
						</div>
						
						<!-- user must be logged in -->
						<?php
						}
						else{
							echo 'You must be logged in to submit a location!';
							echo '<br>';
							echo '<a href="login.php">Log In</a>';
						}
						?>
						</h4>
					</form>
			</fieldset>
		</main>
		<!-- Footer crediting the author and date -->
		<?php include 'footer.inc.php'; ?>
	</body>
</html>