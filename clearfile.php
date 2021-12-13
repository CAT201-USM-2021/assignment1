<?php 
    // clear the files in the upload folder of the server
    $uploaded_files = glob('pdfBox/src/uploads/*'); 
    foreach($uploaded_files as $file){
        if(is_file($file)) {
            unlink($file); 
        }
    }

    // Refresh the page and link back to the home page
    header("Refresh:0; url=index.php");     
?>