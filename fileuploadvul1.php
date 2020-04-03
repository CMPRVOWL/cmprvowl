<?php
    
	require('db.php');

	// initialize variables

	$FileDesc = "";
	
	$currentDir = getcwd();
    $uploadDirectory = "/uploads/";

    $errors = []; // Store all foreseen and unforseen errors here


    $FileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
	//build upload path
    $uploadPath = $currentDir . $uploadDirectory . basename($FileName); 

    if (isset($_POST['upload'])) {

        //if (! in_array($fileExtension,$fileExtensions)) {
         //   $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        //}

        if ($fileSize > 5000000) {
            $errors[] = "This file is more than 5MB. Sorry, it has to be less than or equal to 5MB";
        }

        if (empty($errors)) {
			
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
			
			    // removes backslashes
				
				$FileDesc = stripslashes ($_POST['FileDesc']);	
				
				//escapes special characters in a string
			$FileName = mysqli_real_escape_string($db,$FileName);	
				mysqli_query($db, "INSERT INTO documents (FileName, FileDesc) VALUES ('$FileName', '$FileDesc')"); 
				$_SESSION['message'] = "Document Details Saved!"; 
				header('location: uploaddoc.php');

            if ($didUpload) {
                echo "The file " . basename($FileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . " <-- These are the errors" . "\n";
            }
        }
    }

?>