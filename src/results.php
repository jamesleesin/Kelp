<!DOCTYPE html>
<html>
	<!-- Head of the document, specifying basic HTML information -->
	<head>
		<title>Search Results</title>
		<!-- Encoding -->
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0">
		<!-- Referencing the the CSS file to use for styling -->
		<link href="style.css"
			type="text/css"
			rel="stylesheet" />
		<!-- initialize the live map for the user search using the longitude and latitude -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7FfwcrJrpnzqQm43nykwSSGNAT5KCorI&callback=initMapSearch" async defer></script>
		<script type ="text/javascript" src="script.js"></script>
	</head>
	<!-- What is shown on the webpage -->
	<body>
		<!-- php rendering the header -->
		<?php include 'header.inc.php'; ?>
		<!-- php rendering navigation -->
		<?php include 'nav.inc.php'; ?>
		
		<!-- Main content shown in middle of screen -->
		<main>
			<!-- search results -->
			<?php include 'searchdatabase.php'; ?>

		</main>
		<!-- Footer crediting the author and date -->
		<?php include 'footer.inc.php'; ?>
	</body>
</html>