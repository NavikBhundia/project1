<?php 

    include ('session.php');

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">

	<title> Domestic HouseHelp Service Outsourcing </title>

	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>

<body>

	<header>

		<img src="img/HouseHelp.png" alt="House Help logo">
		
		<h1> Admin Pannel </h1>

        <p> Welcome Admin. <?php echo $firstName; ?> </p>

		<nav>

			<ul>
				<li> <a href="admin.html"> HOUSEHELPS </a></li>
				<li> <a href="client.html"> CLIENTS</a></li>
                <li> <a href="logout.php"> LOGOUT </a></li>

			</ul>
			
		</nav>

	</header>


	<div class="wrapper">
		
		  <section>

    <h1> Cook Registration </h1>

	<form action="regshousehelp.php" method="post" >
    <center>
    First Name:<br />
         <input type="text" name="firstname" placeholder="first_maid_name" required><br />

    Last name:<br>
         <input type="text" name="lastname" placeholder="last_maid_name" required><br />

    Age:<br>
         <input type="text" name="age" placeholder="18 years" required><br />

    ID Number:<br>
        <input type="text" name="idnumb" placeholder="45454545" maxlength="8" required><br />

    Specialization: <br />
         <select name ="specialization" required>
         <option value="Cooking">Cooking</option>
         <option value="Cleaning">Cleaning</option>
         <option value="BabySitting">Baby Sitting</option>
         <option value="SeniorCare">Senior Care </option>
         <option value="General">General</option>
         </select>  <br />

    Experience:<br>
         <input type="text" name="expe" placeholder="5 years" required><br />

    Availability:<br />
         <select name ="availability" required>
         <option value="available">available</option>
         <option value="not available">not available</option>
         </select><br />

    Gender:<br />
         <select name ="gender" required>
         <option value="male">male</option>
         <option value="female">female</option>
         </select><br />

    Phone Number:<br>
         <input type="text" name="phone_no" placeholder="+254701397777" minlength="13" maxlength="13" required><br />

    Location: <br />
         <select name ="location" required>
         <option value="CBD">CBD</option>
         <option value="Westlands">Westlands</option>
         <option value="Parklands">Parklands</option>
         <option value="South C">South C</option>
         <option value="South B">South B</option>
         <option value="Eastleigh">Eastleigh</option>>
         </select>  <br />

    Street name:<br>
         <input type="text" name="streetnm" placeholder="kibera" required><br />

         <br />
    <input type="Submit" value="submit" required />
    </center>
    </form>

		</section>
	</div>

	<footer>
		
	</footer>

</body>

</html>