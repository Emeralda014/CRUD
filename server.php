<?php 
	session_start();
	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$edit_state = false;

    //connect to the database
    $db = mysqli_connect('remotemysql.com', 'JtfvISCCLL', 'OFCgpYw45s', 'JtfvISCCLL');


    //if the save button is clicked
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		$query = "INSERT INTO info (name, address) VALUES ('$name', '$address')";
        mysqli_query($db, $query); 
        $_SESSION['msg'] = "Address saved";
		header('location: index.php');  //this redirects to the index page
	}
	// to update records
	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$id = $_POST['id'];

		mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
		$_SESSION['msg'] = "Address updated!";
		header('location: index.php');
	}
	// to delete records
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM info WHERE id=$id");			
		$_SESSION['msg'] = "Address deleted!";
		header('location: index.php');
	}
	
	//retrieve records
	$results = mysqli_query($db, "SELECT * FROM info");




?>

