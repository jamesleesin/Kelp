<!DOCTYPE html>
<html>
	<!-- php for the head of the page -->
	<?php $pageTitle="Login"; include 'head.inc.php';?></title>
	<!-- What is shown on the webpage -->
	<body>
		<!-- php rendering the header -->
		<?php include 'header.inc.php'; ?>
		<!-- php rendering navigation -->
		<?php include 'nav.inc.php'; ?>
		
		<!-- Main content shown in middle of screen -->
		<main>
			<fieldset id="newlocationinfo">
				<legend>Log in</legend>
					<!-- A form for the user to log in with-->
					<form name="loginForm" method="post" action="validateLogin.php">
						<!-- Text box for First Name -->
						<p>First Name</p>
						<input type= "text" name="firstname">
						<!-- Text box for Last Name -->
						<p>Last Name</p>
						<input type= "text" name="lastname">
						<!-- Starred out text box for password -->
						<p>Password</p>
						<input type="password" name="userpw"><br><br>
						<!-- submission -->
						<input type="submit" value="Submit"/>
					</form>
			</fieldset>
		</main>
		
		<!-- Footer crediting the author and date -->
		<?php include 'footer.inc.php'; ?>
	</body>
</html>