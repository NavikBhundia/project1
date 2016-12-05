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
$fname=trim($_POST['firstname']);
$lname=trim($_POST['lastname']);
$age=trim($_POST['age']);
$idn=trim($_POST['idnumb']);
$spec=trim($_POST['specialization']);
$expe=trim($_POST['expe']);
$avai=trim($_POST['availability']);
$gendr=trim($_POST['gender']);
$Phnno=trim($_POST['phone_no']);
$loc=trim($_POST['location']);
$strt=trim($_POST['streetnm']);

$my_sqli="INSERT INTO `maids`(`firstname`, `lastname`, `age`, `idnumb`, `specialization`, `expe`, `availability`, `gender`, `phone_no`, `location`, `streetnm`) VALUES ('$fname','$lname','$age','$idn','$spec','$expe','$avai','$gendr','$Phnno','$loc','$strt')";
if ($con->query($my_sqli) === TRUE) {
    echo "You have successfully registered the househelp";
    header("Location: reghousehelp.php");

} else {
    echo "Error: " . $my_sqli . "<br>" . $con->error;
}

$con->close();
 //close the connection for security reasons
?>