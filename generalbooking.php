<?php 

    include ('session.php');

?>

<!DOCTYPE html>

  <html>

    <head>

    <meta charset="UTF-8">

    <title> Domestic HouseHelp Service Outsourcing </title>
    <link rel="stylesheet" type="text/css" href="css/book.css">
    <script type="text/javascript" src="general.js"></script>

    </head>

    <body>

    <header>

    <img src="img/HouseHelp.png" alt="House Help logo">
    
    <h1> Domestic Househelp Service Sourcing </h1>

    <nav>

      <ul>
        <li> <a href="home.php"> HOME </a></li>
        <li> <?php echo $firstName; ?> </li>
        <li> <a href="logout.php"> LOGOUT </a></li>

      </ul>
      
    </nav>

  </header>

   <div class="wrapper">

   	<h3 id="status">Phase 1 of 3</h3>

   	<progress id="progressBar" value="0" max="100" style="width:250px;"></progress>


   	<form id="multiphase" onsubmit="return false">
   	
  		<div id="phase1">
    		House-help_ID: <input id="House-help_ID" name="House-help_ID">
    		<br />
    		First Name: <input id="firstname" name="firstname">
    		<br />
    		<center>
    		<button onclick="processPhase1()">Continue</button>
    		</center>
  		</div>

  		<div id="phase2">
  			Start Date: <input id="start_date" type="Date" name="start_date">
    		<br />

    		Duration: <select id="Duration" name="duration">
      				 <option value="one day">one day</option>
      				 <option value="one week">one week</option>
      				 <option value="one month">one month</option>
    				 </select>
    		<br />

    		End Date:<input id="end_date" type="Date" name="end_date">
    		<br />
    		<center>
    		<button onclick="processPhase2()">Continue</button>
    		</center>

  		</div>

  		<div id="phase3">

  		Number of People:<input id="people"  name="people" placeholder="5 people">
  		<br />
    				
    	Number of Meals:<select id="meals" name="meals">
      				    <option value="one meal">One meal per day</option>
      				    <option value="two meals">Two meals per day</option>
      				    <option value="three meals">Three meals per day</option>
    				    </select>
    	<br />

      Number of Rooms:<input id="rooms" name="rooms" placeholder="3 rooms"><br />

      Number of Babies: <input id="babys" name="babys" placeholder="3 babys"><br />
    	<center>
    	<button onclick="processPhase3()">Continue</button>
    	</center>
  		</div>

  		<div id="show_all_data">
  		<table>
  			<tr><th>House-help_ID</th></tr>
  			<tr><td><span id="display_hlp"></span></td></tr> 
    		<tr><th>First Name</th></tr>
    		<tr><td><span id="display_fname"></span></td></tr>
    		<tr><th>Start Date</th></tr> 
    		<tr><td><span id="display_start"></span></td></tr> 
    		<tr><th>Duration</th></tr>
    		<tr><td><span id="display_duration"></span></td></tr> 
    		<tr><th>End Date</th></tr>
    		<tr><td> <span id="display_end"></span></td></tr> 
    		<tr><th>Number of People</th></tr>
    		<tr><td> <span id="display_people"></span></td></tr> 
    		<tr><th>Number of Meals</th></tr>
    		<tr><td> <span id="display_meals"></span></td></tr>
        <tr><th>Number of rooms</th></tr>
        <tr><td> <span id="display_rooms"></span></td></tr>
        <tr><th>Number of babys</th></tr>
        <tr><td> <span id="display_babys"></span></td></tr>
    	</table>	 
    		<button onclick="submitForm()">Submit Data</button>
  			</div>
	</form>
    
   </div>

</body>

</html>

