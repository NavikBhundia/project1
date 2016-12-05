<?php
//create server and database connection constants
define ("DB_SERVER", "localhost");
define ("DB_USER","root");
define ("DB_PASSWORD","");
define ("DB_NAME", "House-help");

$con= new mysqli (DB_SERVER,DB_USER,DB_PASSWORD, DB_NAME);

//Check server connection
if ($con->connect_error){
	die ("Connection failed:". $con->connect_error);
}else {
	echo "Connected successfully <br />";
}
//receive  values from user form and trim white spaces
$hlp=trim($_POST['House-help_ID']);
$fname=trim($_POST['firstname']);
$start=trim($_POST['start_date']);
$duration=trim($_POST['duration']);
$end=trim($_POST['end_date']);
$people=md5(trim($_POST['people']));
$meals=trim($_POST['meals']);
$rooms=trim($_POST['rooms']);
$babys=trim($_POST['babys']);

 $my_sqli = "SELECT * FROM `maids` WHERE `maid_id`='$hlp' AND `firstname`='$fname'";
 $result = $con->query($my_sqli);  

$row = $result->fetch_assoc();
if ($row['maid_id'] != $hlp && $row['firstname'] != $fname){
	echo "The cook you chose dont exists. Please check the name properly";
	
	header("Location: general.php");

	}else
	{
		if($row['maid_id'] = $hlp && $row['firstname'] = $fname && $row['availability'] == 'available'){

		$my_sql="INSERT INTO `generalbooking`(`House-help_ID`, `firstname`, `start_date`, `duration`, `end_date`, `people`, `meals`, `rooms`, `babys`) VALUES ('$hlp','$fname','$start','$duration','$end','$people','$meals','$rooms','$babys')";
		if ($con->query($my_sql) === TRUE) {
    	echo "You have successfully registered with us";

		}
	}
}
$con->close();
 //close the connection for security reasons
?>

