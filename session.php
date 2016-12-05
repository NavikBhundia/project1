
<?php
 session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="House-help";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
  
   
   $user_check = $_SESSION['login_user'];
   $select="select * from `Registration` where `username`= '$user_check' ";
   $ses_sql = mysqli_query($conn,$select);
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
  // $login_session = $row['farmerUsername'];
   $firstName=$row['firstname'];
   
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.html");
   }
?>