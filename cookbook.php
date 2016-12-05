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
$hlp=trim($_POST['hlp']);
$fname=trim($_POST['name']);
$start=trim($_POST['start']);
$end=trim($_POST['end']);
$people=md5(trim($_POST['people']));
$meals=trim($_POST['meals']);
$total=trim($_POST['total']);



	$my_sql="INSERT INTO `cooksbooking`(`House-help_ID`, `firstname`, `start_date`, `end_date`, `people`, `meals` ,`total`) VALUES ('$hlp','$fname','$start','$end','$people','$meals','$total')";
		
		if ($con->query($my_sql) === TRUE) {
    	echo "You have successfully Submitted the booking details.";
    	header("Location: payment.php");
		}

$con->close();
 //close the connection for security reasons
?>



