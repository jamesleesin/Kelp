<!-- Navigation menu on the left of the screen with links for the user to click -->
<nav>
	<!-- fieldset for styling borders -->
	<fieldset id="navigation">
		<a href="search.php"> Back to Main </a
		
		<!-- Searching options -->
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
		
		<!-- display user information -->
		<h4>
		<!-- php to show user info -->
		<?php
		if (isset($_COOKIE['firstname']) && isset($_COOKIE['lastname']) && isset($_COOKIE['userpw'])) {
			echo 'Logged in as: ' . $_COOKIE['firstname'] . " " . $_COOKIE['lastname'];
		}
		?>
		</h4>
	</fieldset>
</nav>
