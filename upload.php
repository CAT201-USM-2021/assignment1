<?php
$upload_dir = "pdfBox/src/uploads/";
$file_name =  str_replace(" ", "_", basename($_FILES["uploaded_file"]["name"]));
$target_dir = $upload_dir . "toBeConverted.pdf";
$upload_status = 1;
$output = "";

session_start();
$_SESSION["message"]  = "";
$_SESSION["error"] = "";
$_SESSION["file_dir"] = "";
$_SESSION["convert_message"] = "";

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
		$_SESSION["message"]  =  "Your file " . htmlspecialchars($file_name) . " has been uploaded successfully. <br />";
	} else {
		$_SESSION["message"]  =  "PDF file upload failed! Please try again! XD <br />";
	}
}

// Start converting .pdf to .txt
exec('javac -cp "pdfBox/java-lib/pdfbox-app-2.0.24.jar" pdfBox/src/main/pdfbox_code.java', $output);
exec('java -cp "pdfBox/java-lib/pdfbox-app-2.0.24.jar" pdfBox/src/main/pdfbox_code.java', $output);

// Saving the converted text file
if(file_exists("pdfBox/src/uploads/converted.txt")){
	// Change the file directory to txt file
	$_SESSION["file_dir"] = $upload_dir."converted.txt";
	$_SESSION["convert_message"] = "The pdf file is successfully converted to text file.";
}else{
	$_SESSION["convert_message"] = "Something went wrong. Unable to convert pdf to txt.";
}

// Stay at home page
header("Location: index.php");

?> 