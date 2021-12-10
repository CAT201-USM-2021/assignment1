<?php
$upload_dir = "uploads/";
$file_name =  str_replace(" ", "_", basename($_FILES["uploaded_file"]["name"]));
$target_dir = $upload_dir . $file_name;
$upload_status = 1;

session_start();
$_SESSION["message"]  = "";
$_SESSION["error"] = "";
$_SESSION["file_dir"] = "";

// check if no file is uploaded
if ( $_FILES["uploaded_file"]["error"] == UPLOAD_ERR_NO_FILE) {
	$_SESSION["error"] =  "A file is needed!  <br />";
	$upload_status = 0;
}
else{

	// Check if file is PDF format
	if ($_FILES["uploaded_file"]["type"] != "application/pdf") {
		$_SESSION["error"] = "Sorry, only PDF files are allowed. <br />";
		$upload_status = 0;
	}

	// Check if file size whether larget than 100MB
	if ($_FILES["uploaded_file"]["size"] > 100000000) {
		$_SESSION["error"]  =  "File size exceeds 100MB. Please upload a PDF file less than 100MB! <br />";
		$upload_status = 0;
	}
}

// Start uploading files based on the status
if ($upload_status == 0) {
	$_SESSION["message"]  =  "Something went wrong. Please try again. ! <br />";
} else {

	// If everything is ok, then upload the file
	if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_dir)) {
		$_SESSION["file_dir"] = $target_dir;
		$_SESSION["message"]  =  "Your file " . htmlspecialchars($file_name) . " has been uploaded successfully. <br />";
	} else {
		$_SESSION["message"]  =  "PDF file upload failed! Please try again! XD <br />";
	}
}

// Stay at home page
header("Location: index.php");

?> 