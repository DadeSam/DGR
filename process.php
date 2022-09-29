<?php

date_default_timezone_set("Africa/Accra");
$dateTime = date("Y-m-d") . ' ' . date("H:i:s");

if(isset($_POST['snapped_picture'])){
$firstname = ucfirst(htmlspecialchars(trim($_POST['firstname'])));
$lastname = ucfirst(htmlspecialchars(trim($_POST['lastname'])));
$phone = htmlspecialchars(trim($_POST['phone']));
$email = htmlspecialchars(trim($_POST['email']));
$purpose = htmlspecialchars(trim($_POST['purpose']));
$contact_person = ucfirst(htmlspecialchars(trim($_POST['contact_person'])));
$contact_person_number = htmlspecialchars(trim($_POST['contact_person_number']));
$schedule = htmlspecialchars(trim($_POST['schedule']));
$org = htmlspecialchars(trim($_POST['org']));
$department = htmlspecialchars(trim($_POST['department']));
$ref_code = $_POST['ref_code'];
$photo = $_POST['snapped_picture'];

$filteredData = explode(',', $photo);
$photo_value = $filteredData[1];
$unencoded = base64_decode($photo_value);
//naming the stored picture
$fp = fopen($ref_code.'.png', 'w');
fwrite($fp, $unencoded);
fclose($fp);

//Create connection

		$link = mysqli_connect('localhost', 'root', "", 'checkin');
		$querry = "INSERT INTO dgr (firstname, lastname, number, email, organisation, photo, contact_person, contact_person_number, purpose, department, schedule, ref_code, checkin_time) VALUES ('$firstname', '$lastname','$phone', '$email', '$org', '$photo_value', '$contact_person', '$contact_person_number', '$purpose', '$department', '$schedule', '$ref_code', '$dateTime')";
		mysqli_query($link, $querry);
		if(mysqli_affected_rows($link) > 0){
		   header("Location:successpage.php?ref=$ref_code");
		  }
		
  }

elseif($_POST['grid_code'] != 'null'){
	$logout_code = $_POST['grid_code'];
	$link = mysqli_connect("localhost", "root", "","checkin");
	$query = "UPDATE dgr SET checkout_time = '$dateTime' WHERE ref_code = '$logout_code'";
    mysqli_query($link, $query);
	   if(mysqli_affected_rows($link) > 0){
	      echo "<p style=\"border:2px solid limegreen\">Checkout successful</p>";
	    }else{
		echo "<p style=\"border:2px solid red\">Please check your phone for the reference code</p>";
	       }
         }
else{
	header("Location:index.php");
}

?> 