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
$IDno=trim($_POST['idnum']);
$placewk=trim($_POST['placewrk']);
$uname=trim($_POST['username']);
$pswrd=md5(trim($_POST['password']));
$gendr=trim($_POST['gender']);
$Phnno=trim($_POST['phoneno']);
$loc=trim($_POST['location']);
$streetnm=trim($_POST['streetname']);

$my_sqli="INSERT INTO `Registration`(`firstname`, `lastname`, `idnum`, `placewrk`, `username`, `password`, `gender`, `phoneno`, `location`,`streetname`) VALUES ('$fname','$lname','$IDno','$placewk','$uname','$pswrd','$gendr','$Phnno','$loc','$streetnm')";
if ($con->query($my_sqli) === TRUE) {
    echo "You have successfully registered with us";
    header("Location: login.html");

} else {
    echo "Error: " . $my_sqli . "<br>" . $con->error;
}

$con->close();
 //close the connection for security reasons
?>
