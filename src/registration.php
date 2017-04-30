<!DOCTYPE html>
<html>
	<!-- php for the head of the page -->
	<?php $pageTitle="Account Registration"; include 'head.inc.php';?></title>
	<!-- What is shown on the webpage -->
	<body>
		<!-- php rendering the header -->
		<?php include 'header.inc.php'; ?>
		<!-- php rendering navigation -->
		<?php include 'nav.inc.php'; ?>
		
		<!-- Main content shown in middle of screen -->
		<main>
			<!-- fieldset and legend -->
			<fieldset id="accountinfo">
				<legend>Create an Account</legend>
					<!-- A form for the user to fill out -->
					<form name="registrationForm" method="POST" action="createaccount.php" enctype="multipart/form-data">
						<!-- Text box for First Name -->
						<p>First Name</p>
						<input type= "text" name="firstname">
						<span id="firstNameErrorMsg"></span><br>
						<!-- Text box for Last Name -->
						<p>Last Name</p>
						<input type= "text" name="lastname">
						<span id="lastNameErrorMsg"></span><br>
						<!-- Starred out text box for password -->
						<p>Password</p>
						<input type="password" name="userpw">
						<span id="passwordErrorMsg"></span><br>
						<!-- Text box for email -->
						<p>Email</p>
						<input type="email" name="useremail">
						<span id="emailErrorMsg"></span><br>								
						<!-- Date form for the date of birth -->
						<p>Date of Birth</p>
						<input type="date" name="userdob">
						<span id="dobErrorMsg"></span><br>
						<!-- Radio buttons for gender -->
						<p>Gender</p>
						<input id="r-male" type="radio" name="gender" value="Male"><label for="r-male">Male</label>
						<input id="r-female" type="radio" name="gender" value="Female"><label for="r-female">Female</label>
						<span id="genderErrorMsg"></span><br>
						<!-- Dropdown select form for city -->
						<div>
							<p>City</p>
							<select name="city">
							<option value="None">Select a City</option>
							<option value="Hamilton">Hamilton</option>
							<option value="Toronto">Toronto</option>
							<option value="Markham">Markham</option>
							<option value="Other">Other</option>
							</select>						
							<span id="cityErrorMsg"></span><br><br>
						</div>
						<input type="reset" value="Reset"><br>
						<input type="button" value="Submit" onclick="validateRegistrationForm();"/>
					</form>
			</fieldset>
		</main>
		
		<!-- Footer crediting the author and date -->
		<?php include 'footer.inc.php'; ?>
	</body>
</html>