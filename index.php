<?php 
    session_start();
    $message = $_SESSION["message"];

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
    <div class="header">
        <div class="container">
            <h1>PDF to TXT Converter</h1>
            <h2>Convert your pdf files to txt files</h2>
        </div>

    </div>
    <div class="main">
        <div class="container">
            <h3>Please upload your pdf file</h3>
            <form action="upload.php" method="post", enctype="multipart/form-data">
                <input type="file" id="myFile" class="file-upload" name="uploaded_file", value="uploaded_file">
                <div> <?php echo $message; ?> </div>
                <br>
                <button type="submit" class="submit">Submit</button>
            </form>
        </div>
        <p>continue to put whatever you want</p>
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
    <p>&copy; CAT201 assignment 1 2021-2022</p>
</footer>

</html>