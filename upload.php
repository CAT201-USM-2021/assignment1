<?php
$upload_dir = "uploads/";
$file_name =  str_replace(" ", "_", basename($_FILES["uploaded_file"]["name"]));
$target_dir = $upload_dir . $file_name;
$upload_status = 1;

session_start();
$_SESSION["message"]  = "";

// check if the submit value is provided when clicked submit
if (isset($_POST["submit"])) {

	// check if empty file is given
	if (empty($_FILES["uploaded_file"])) {
		$_SESSION["message"] =  "A file is needed!  <br />";
		$upload_status = 0;
	} else {
		$_SESSION["message"] = "File is valid. <br />";
		$upload_status = 1;
	}
}


// check if file is PDF format
if ($_FILES["uploaded_file"]["type"] != "application/pdf") {

	$_SESSION["message"] = "Sorry, only PDF files are allowed. <br />";
	$upload_status = 0;
}

// check file size whether larget than 100MB
if ($_FILES["uploaded_file"]["size"] > 100000000) {
	$_SESSION["message"]  =  "File size exceeds 100MB. Please upload a PDF file less than 100MB! <br />";
	$upload_status = 0;
}

// Start uploading files based on the status
if ($upload_status == 0) {
	$_SESSION["message"]  =  "Your file is not valid. Please try again. ! <br />";
} else {

	// If everything is ok, then upload the file
	if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_dir)) {
		$_SESSION["message"]  =  "Your file " . htmlspecialchars($file_name) . " has been uploaded successfully. <br />";
		// file_put_contents($file_name, file_get_contents($target_dir)); // for donwloading file

		header("Location: index.php");
	} else {
		$_SESSION["message"]  =  "PDF file upload failed! Please try again! XD <br />";
	}
}
