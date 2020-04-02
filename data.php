<?php 

	$db = mysqli_connect('localhost', 'root', '', 'register');

	// initialize variables
	$id = "";
	$Cwk_Title = "";
	$Mod_Name = "";
	$Mod_Code = "";
	$Max_Mark  = "";
	$Lecturer = "";
	$HandO_date = "";
	$HandI_Date  = "";
	$FeedB_date = "";
	$Completed = "";
	$Result = "";
	

	if (isset($_POST['save'])) {
		// Strip back slashes
		$Cwk_Title = stripslashes($_POST['Cwk_Title']);
		$Mod_Name = stripslashes($_POST['Mod_Name']);
		$Mod_Code = stripslashes($_POST['Mod_Code']);
		$Max_Mark = stripslashes($_POST['Max_Mark']);
		$Lecturer = stripslashes($_POST['Lecturer']);
		$HandO_date = stripslashes($_POST['HandO_date']);
		$HandI_Date = stripslashes($_POST['HandI_Date']);
		$FeedB_date = stripslashes($_POST['FeedB_date']);
		$Completed = stripslashes($_POST['Completed']);
		$Result = stripslashes($_POST['Result']);
		// Escape Special characters
		$Cwk_Title = mysqli_real_escape_string($db,$Cwk_Title);
		$Mod_Name = mysqli_real_escape_string($db,$Mod_Name);
		$Mod_Code = mysqli_real_escape_string($db,$Mod_Code);
		$Max_Mark = mysqli_real_escape_string($db,$Max_Mark);
		$Lecturer = mysqli_real_escape_string($db,$Lecturer);
		$HandO_date = mysqli_real_escape_string($db,$HandO_date);
		$HandI_Date = mysqli_real_escape_string($db,$HandI_Date);
		$FeedB_date = mysqli_real_escape_string($db,$FeedB_date);
		$Completed = mysqli_real_escape_string($db,$Completed);
		$Result = mysqli_real_escape_string($db,$Result);
		
		mysqli_query($db, "INSERT INTO assignments (Cwk_Title, Mod_Name, Mod_Code, Max_Mark, Lecturer, HandO_date ,HandI_Date, FeedB_date, Completed, Result) VALUES ('$Cwk_Title', '$Mod_Name', '$Mod_Code', '$Max_Mark', '$Lecturer', '$HandO_date', '$HandI_Date', '$FeedB_date', '$Completed', '$Result')"); 
		$_SESSION['message'] = "Assignment Details Saved!"; 
		header('location: CreateAss.php');
	}
		
	if (isset($_POST['update'])) {
		// Strip back slashes
		$id = stripslashes($_POST['id']);
		$Cwk_Title = stripslashes($_POST['Cwk_Title']);
		$Mod_Name = stripslashes($_POST['Mod_Name']);
		$Mod_Code = stripslashes($_POST['Mod_Code']);
		$Max_Mark = stripslashes($_POST['Max_Mark']);
		$Lecturer = stripslashes($_POST['Lecturer']);
		$HandO_date = stripslashes($_POST['HandO_date']);
		$HandI_Date = stripslashes($_POST['HandI_Date']);
		$FeedB_date = stripslashes($_POST['FeedB_date']);
		$Completed = stripslashes($_POST['Completed']);
		$Result = stripslashes($_POST['Result']);
		// Escape Special characters
		$id = mysqli_real_escape_string($db,$id);
		$Cwk_Title = mysqli_real_escape_string($db,$Cwk_Title);
		$Mod_Name = mysqli_real_escape_string($db,$Mod_Name);
		$Mod_Code = mysqli_real_escape_string($db,$Mod_Code);
		$Max_Mark = mysqli_real_escape_string($db,$Max_Mark);
		$Lecturer = mysqli_real_escape_string($db,$Lecturer);
		$HandO_date = mysqli_real_escape_string($db,$HandO_date);
		$HandI_Date = mysqli_real_escape_string($db,$HandI_Date);
		$FeedB_date = mysqli_real_escape_string($db,$FeedB_date);
		$Completed = mysqli_real_escape_string($db,$Completed);
		$Result = mysqli_real_escape_string($db,$Result);

		mysqli_query($db, "UPDATE assignments SET Cwk_Title='$Cwk_Title', Mod_Name='$Mod_Name', Mod_Code='$Mod_Code', Max_Mark='$Max_Mark', Lecturer='$Lecturer', HandO_date='$HandO_date', HandI_Date='$HandI_Date', FeedB_date='$FeedB_date', Completed='$Completed', Result='$Result' WHERE id=$id");
		$_SESSION['message'] = "Assignment Details updated!"; 
		header('location: ViewAss.php');
	}
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
				// Strip back slashes
		$id = stripslashes($_GET['del']);
		$id = mysqli_real_escape_string($db,$id);
	
	mysqli_query($db, "DELETE FROM assignments WHERE id=$id");

	$_SESSION['message'] = "Assignment Deleted!"; 
	header('location: ViewAss.php');
}
?>