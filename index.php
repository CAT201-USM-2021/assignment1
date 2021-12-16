<?php
session_start();

// This is used to make sure when starting fresh, we don't have session variable & clear the session variable after refreshing
session_destroy();
$message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
$convert_message = isset($_SESSION["convert_message"]) ? $_SESSION["convert_message"] : "";
$error = isset($_SESSION["error"]) ? $_SESSION["error"] : "";
$file_dir = isset($_SESSION["file_dir"]) ? $_SESSION["file_dir"] : "";

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
            <form action="upload.php" method="post" , enctype="multipart/form-data">
                <input type="file" id="myFile" class="file-upload" name="uploaded_file" , value="uploaded_file">
                <?php echo "<div><b> $message </b></div>"; ?>
                <?php if ($error) echo "<div class='error'>  Error: $error  </div>"; ?>
                <br>
                <button type="submit" class="submit">Submit</button>
            </form>
        </div>

        <?php if ($file_dir) echo "<p><b> $convert_message </b></p> "; ?>
        <br>
        <?php if ($file_dir) echo
        "<p> <a href='download.php?file=$file_dir'>
                <button class ='download'> Download the Converted Text File </button> </a> </p>"; ?>
        <form action="clearfile.php" method="post">
            <?php if ($file_dir) echo "<button type='submit' class='clear'>Clear File</button>"; ?>
        </form>
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