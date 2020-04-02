<?php
    
	$db = mysqli_connect('localhost', 'root', '', 'register');

	// initialize variables

	$FileDesc = "";
	
	$currentDir = getcwd();
    $uploadDirectory = "/uploads/";

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png','doc','docx','pdf','xls','xlsx']; // Get all the file extensions

    $FileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    // $fileExtension = strtolower(end(explode('.',$fileName)));
	$fileExt = explode('.',$FileName);
	$fileExtension = strtolower(end($fileExt));
    $uploadPath = $currentDir . $uploadDirectory . basename($FileName); 

    if (isset($_POST['upload'])) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($fileSize > 5000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 5MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
				$FileDesc = $_POST['FileDesc'];			
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
                echo $error . "These are the errors" . "\n";
            }
        }
    }

?>