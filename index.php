<?php 
    session_start();

    // This is used to make sure when starting fresh, we don't have session variable & clear the session variable after refreshing
    session_destroy();
    $message = isset($_SESSION["message"])? $_SESSION["message"]: "";
    $convert_message = isset($_SESSION["convert_message"])? $_SESSION["convert_message"]: "";
    $error = isset($_SESSION["error"])? $_SESSION["error"]: "";
    $file_dir = isset($_SESSION["file_dir"])? $_SESSION["file_dir"]: "";

    // will add another button, to delete the file first, then refresh the page, then upload another file, to make sure file naming is standardised, and the file transfer easier
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>PDF to TXT Converter</title>
    <link rel="icon" type="image/png" href="images/favicon-32x32.png">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header container">
        <div class="container">
            <h1>PDF to TXT Converter</h1>
        </div>
    </div>

    <div class="main">
        <div class="container">
            <h2>Convert PDF files to Text files</h2>
            <h3>Please upload your PDF file</h3>
            <form action="upload.php" method="post", enctype="multipart/form-data">
                <input type="file" id="myFile" class="file-upload" name="uploaded_file", value="uploaded_file">
                <div> <?php echo $message; ?> </div>
                <!--- Can create a red text box for the error --->
                <div> <?php if($error) echo "Error: $error"; ?> </div>
                <br>
                <button type="submit" class="submit">Submit</button>
            </form>
        </div>
        <p>Continue to put whatever you want</p>
        <!--- Can create a download box for the converted file --->
        <p> <a href=<?php echo "download.php?file=$file_dir"; ?>> <?php if($file_dir) echo "click here to download uploaded file"; ?></a> </p>
    </div>
</body>

<footer class="footer">
    <p>Credits:</p>
    <ul>
        <li>Liew Man Hong 151807</li>
        <li>Liew Hui Lek 151496</li>
        <li>Teh Zhen Jun 153566</li>
        <li>Shaun Liew Xin Hong 154746</li>
    </ul>
    <p>&copy; CAT201 Assignment 1 2021-2022</p>
</footer>

</html>