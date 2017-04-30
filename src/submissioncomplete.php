<!DOCTYPE html>
<html>
	<!-- php for the head of the page -->
	<?php $pageTitle="Submission complete"; include 'head.inc.php';?></title>
	<!-- What is shown on the webpage -->
	<body>
		<!-- php rendering the header -->
		<?php include 'header.inc.php'; ?>
		<!-- php rendering navigation -->
		<?php include 'nav.inc.php'; ?>
		
		<!-- Main content shown in middle of screen -->
		<main>
			<fieldset id="newlocationinfo">
				<legend>Submission Complete!</legend>
					<!-- feedback to show submission successful -->
					<h4>Your submission has been added to the database. Thank you!</h4><br>
					<a href="search.php">Back to Main </a> or 
					<a href="submission.php"> Submit another Location</a>
			</fieldset>
		</main>
		
		<!-- Footer crediting the author and date -->
		<?php include 'footer.inc.php'; ?>
	</body>
</html>