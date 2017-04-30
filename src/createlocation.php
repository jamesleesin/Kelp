<?php
	// get the usernames and passwords from the database
	$pdo = new PDO('mysql:host=localhost;dbname=kelpinfo',
	'kelpadmin', 'kelpadmin');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	var_dump ($_FILES);
	// handle picture input
	// if there is no picture
	if (empty($_FILES['picture']['name'])){
		$pic = NULL;
	}
	else {
		// if there is a picture
		// error checking
		if (!isset($_FILES['picture']['error'])
			|| ($_FILES['picture']['error'] != UPLOAD_ERR_OK)) {
			echo 'Error uploading file.';
			return;
		}
		// make sure file type is in fact jpeg
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		if ($finfo->file($_FILES['picture']['tmp_name']) === "image/jpeg"){
			$fileextension = "jpg";
		} else{
			echo 'Uploaded file was not a valid image.';
			return;
		}
		// give image unique filename
		$filehash = sha1_file($_FILES['picture']['tmp_name']);
		$filename = $filehash . "." . $fileextension;

		// 	include library and bucket name/access keys
		$awsAccessKey = "AKIAJW6MJTOE6OLAJGLQ";
		$awsSecretKey = "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";
		$bucketName = "kelpbucket";

		require("S3.php");
		$s3 = new S3($awsAccessKey, $awsSecretKey);

		// upload file
		$ok = $s3->putObjectFile($_FILES['picture']['tmp_name'], $bucketName, $filename, S3::ACL_PUBLIC_READ);

		// error handling, if successful then include a link
		if ($ok){
			$pic = 'https://s3.amazonaws.com/' . $bucketName . '/' . $filename;
			//echo '<p>File upload successful: <a href="' . $url . '">' . $url . '</a></p><img src="' . $url . '" />';
		} else{
			echo 'Error uploading file.';
		}
	}
	
	// variables to hold the post data
	$lname = $_POST['locname'];
	$desc = $_POST['locdesc'];
	$rat = $_POST['rating'];
	$long = $_POST['loclong'];
	$lat = $_POST['loclat'];
	
	// create a new sql entry
	try {
		$result = $pdo->query("INSERT INTO locations (locationname, description, rating, longitude, latitude, picture) VALUES ('$lname', '$desc', '$rat', '$long', '$lat', '$pic')");
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	// submission complete page with links
	header('Location: submissioncomplete.php');
?>