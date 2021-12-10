<?php

    // Get the file that is uploaded to the server through GET method
    $filename = basename($_GET["file"]);
    $filepath = $_GET["file"];

    //For HTTP Headers
    header("Content-Type: application/octet-stream");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");

    readfile($filepath);
    exit;

?>