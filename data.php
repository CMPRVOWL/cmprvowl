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
		$Cwk_Title = $_POST['Cwk_Title'];
		$Mod_Name = $_POST['Mod_Name'];
		$Mod_Code = $_POST['Mod_Code'];
		$Max_Mark = $_POST['Max_Mark'];
		$Lecturer = $_POST['Lecturer'];
		$HandO_date = $_POST['HandO_date'];
		$HandI_Date = $_POST['HandI_Date'];
		$FeedB_date = $_POST['FeedB_date'];
		$Completed = $_POST['Completed'];
		$Result = $_POST['Result'];
		
		mysqli_query($db, "INSERT INTO assignments (Cwk_Title, Mod_Name, Mod_Code, Max_Mark, Lecturer, HandO_date ,HandI_Date, FeedB_date, Completed, Result) VALUES ('$Cwk_Title', '$Mod_Name', '$Mod_Code', '$Max_Mark', '$Lecturer', '$HandO_date', '$HandI_Date', '$FeedB_date', '$Completed', '$Result')"); 
		$_SESSION['message'] = "Assignment Details Saved!"; 
		header('location: CreateAss.php');
	}
		
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$Cwk_Title = $_POST['Cwk_Title'];
		$Mod_Name = $_POST['Mod_Name'];
		$Mod_Code = $_POST['Mod_Code'];
		$Max_Mark = $_POST['Max_Mark'];
		$Lecturer = $_POST['Lecturer'];
		$HandO_date = $_POST['HandO_date'];
		$HandI_Date = $_POST['HandI_Date'];
		$FeedB_date = $_POST['FeedB_date'];
		$Completed = $_POST['Completed'];
		$Result = $_POST['Result'];

		mysqli_query($db, "UPDATE assignments SET Cwk_Title='$Cwk_Title', Mod_Name='$Mod_Name', Mod_Code='$Mod_Code', Max_Mark='$Max_Mark', Lecturer='$Lecturer', HandO_date='$HandO_date', HandI_Date='$HandI_Date', FeedB_date='$FeedB_date', Completed='$Completed', Result='$Result' WHERE id=$id");
		$_SESSION['message'] = "Assignment Details updated!"; 
		header('location: ViewAss.php');
	}
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM assignments WHERE id=$id");
	$_SESSION['message'] = "Assignment Deleted!"; 
	header('location: ViewAss.php');
}
?>