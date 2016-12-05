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
	
}


$uid=trim($_POST['username']);
$pwd=md5(trim($_POST['password']));


 $my_sqli = "SELECT * FROM `Registration` WHERE `username`='$uid' AND `password`='$pwd'";
 $result = $con->query($my_sqli);     

$row = $result->fetch_assoc();
if ($row['username'] != $uid && $row['password'] != $pwd){
	echo "incorrect credentials";
    }else{
            session_start();	
 	        if($row['Category'] == 'Admin'){
 	        header('Location: reghousehelp.php');

          }else{
           session_start();	
           $_SESSION['login_user'] = $uid;
	       header('Location: home.php');
          }
}
  
$con->close();


?>

