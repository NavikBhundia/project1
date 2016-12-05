<?php

include ('session.php');
// Script and tutorial written by Adam Khoury @ developphp.com
// Line by line explanation : youtube.com/watch?v=T2QFNu_mivw
//create server and database connection constants
        define ("DB_SERVER", "localhost");
        define ("DB_USER","root");      
        define ("DB_PASSWORD","");
        define ("DB_NAME", "House-help");

            $con= new mysqli (DB_SERVER,DB_USER,DB_PASSWORD, DB_NAME);
            // This first query is just to get the total count of rows
            $sql = "SELECT COUNT(maid_id) FROM maids WHERE specialization='Senior Care'";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_row($query);
            // Here we have the total row count
            $rows = $row[0];
            // This is the number of results we want displayed per page
                $page_rows = 10;
            // This tells us the page number of our last page
            $last = ceil($rows/$page_rows);
            // This makes sure $last cannot be less than 1

            if($last < 1){
                $last = 1;
            }

            // Establish the $pagenum variable
            $pagenum = 1;
            // Get pagenum from URL vars if it is present, else it is = 1
            if(isset($_GET['pn'])){
                $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
            }
            // This makes sure the page number isn't below 1, or more than our $last page
            if ($pagenum < 1) { 
                $pagenum = 1; 
                } else if ($pagenum > $last) { 
                    $pagenum = $last; 
            }

            // This sets the range of rows to query for the chosen $pagenum
            
            $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
            // This is your query again, it is for grabbing just one page worth of rows by applying $limit
            
            $sql = "SELECT maid_id, firstname, lastname, age, expe, availability  FROM maids WHERE specialization='Senior Care' ORDER BY expe DESC $limit";
            $query = mysqli_query($con, $sql);
            // This shows the user what page they are on, and the total number of pages
            $textline1 = "Senior Care Takers (<b>$rows</b>)";
            $textline2 = "Page <b>$pagenum</b> of <b>$last</b>";

            // Establish the $paginationCtrls variable
            $paginationCtrls = '';
            
            // If there is more than 1 page worth of results
            if($last != 1){
            
            /* First we check if we are on page one. If we are then we don't need a link to 
            the previous page or the first page so we do nothing. If we aren't then we
            generate links to the first page, and to the previous page. */
            
            if ($pagenum > 1) {
                $previous = $pagenum - 1;
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
        
            // Render clickable number links that should appear on the left of the target page number
                for($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
                    }
                }
            }
    
            // Render the target page number, but without it being a link
                $paginationCtrls .= ''.$pagenum.' &nbsp; ';
                // Render clickable number links that should appear on the right of the target page number
                for($i = $pagenum+1; $i <= $last; $i++){
                    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
                    if($i >= $pagenum+4){
                    break;
                }
            }
    
            // This does the same as above, only checking if we are on the last page, and then generating the "Next"
                if ($pagenum != $last) {
                $next = $pagenum + 1;
                $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
                }
            
            }

            // Close your database connection
                mysqli_close($con);
?>

<!DOCTYPE html>

        <html>
            <head>

                <meta charset="UTF-8">

                    <title> Domestic HouseHelp Service Outsourcing </title>
                    <link rel="stylesheet" type="text/css" href="css/book.css">
                    <script type="text/javascript" src="senior.js"></script>
                    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
                


                <style type="text/css">

                    table{

                        margin: 30px auto;

                    }

                    table,tr,th,td{

                        border: 2px solid #A67B5B;
                        padding: 5px;
                        text-align: left;
                    }

                </style>

                <script>
                    

                
                  $(document).ready(function() {
                    $("#start_date").datepicker({minDate: '+0d'});
                    });

                     $(document).ready(function() {
                    $("#end_date").datepicker({maxDate: '+90d'});
                    });
                
                </script>

            </head>


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

            <body>
   
                <div class="wrapper">

                        <h3 id="status">Phase 1 of 3</h3>

                        <progress id="progressBar" value="0" max="100" style="width:250px;"></progress>

                    <form id="multiphase" onsubmit="return false" action="senior.php" method="post">
        
    
                    <div id="phase1">
                        <p>
                        Welcome Mr/Mss.<strong><?php echo $firstName; ?></strong>, Please look from the list the House-help(Cook) you will like to choose.
                        Thank You.
                        </p>

                        <center>
                        <h2> <?php echo $textline1; ?> Paged </h2>
                        <p><?php echo $textline2; ?></p>
                        </center>
                
                        <table>
                            <tr>
                                 <th>House-help_Id</th>
                                 <th>First Name</th>
                                 <th>Last Name</th>
                                 <th>Age</th>
                                 <th>Experience</th>
                                 <th>Availability</th>
                                 <th>Booking</th>
                            </tr>

                      <!-- populate table from mysql database -->
                        <?php while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)): { 

                             if($row['availability'] == 'available'){

                            ?>
                            <tr>
                                 <td><?php echo $row['maid_id'];?></td>
                                 <td><?php echo $row['firstname'];?></td>
                                 <td><?php echo $row['lastname'];?></td>
                                 <td><?php echo $row['age'];?></td>
                                 <td><?php echo $row['expe'];?></td>
                                 <td><?php echo $row['availability'];?></td>

                                <td>                    
                     
                                    <button name="<?php echo $row['maid_id'];?>" id="<?php echo $row['maid_id'];?>" onclick="processPhase1('<?php echo $row['maid_id'];?>', '<?php echo $row['firstname'];?>')">Book</button>
                                            
                                </td>  
                            </tr>
                        
                        <?php }else{ ?>

                              <tr>
                                 <td><?php echo $row['maid_id'];?></td>
                                 <td><?php echo $row['firstname'];?></td>
                                 <td><?php echo $row['lastname'];?></td>
                                 <td><?php echo $row['age'];?></td>
                                 <td><?php echo $row['expe'];?></td>
                                 <td><?php echo $row['availability'];?></td>

                                <td>                    
                     
                                    <button name="<?php echo $row['maid_id'];?>" id="<?php echo $row['maid_id'];?>" onclick="NotifyMe('<?php echo $row['maid_id'];?>', '<?php echo $row['firstname'];?>')">Notify</button>
                                            
                                </td>  
                            </tr>

                        <?php } } endwhile; ?>
               
                        </table>
        
                        <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>   
            
                    </div> 

                    <div id="phase2">

                            <center>

                            Start Date: <input id="start_date"  type="date" min="2016-12-01" max="2017-02-01" name="start_date">
                            <br />
                            <br />


                            End Date:<input id="end_date" type="date" min="2016-12-01" max="2017-02-01" name="end_date">
                            <br />
                            <br />
                            
                            <center>
                            <button onclick="processPhase2()">Continue</button>
                            </center>

                            </center>
                    </div>

                    
                    <div id="phase3">
                            
                            <center>

                            Number of Seniors:<input id="seniors"  name="seniors" placeholder="5 people">
                            <br />
                            <br />

                            <center>
                                <button onclick="processPhase3()">Continue</button>
                            </center>
        
                            </center>
                    </div>

                    <div id="show_all_data">
                            <center>
                            <table>
                                <tr>
                                <th>House-help_ID</th>
                                <th>Name</th>
                                <th>Start Date</th> 
                                <th>End Date</th>
                                <th>Number of Seniors</th>
                                <th>Total Costing</th>
                                </tr>

                                <tr>
                                <td><span id="display_hlp"></span></td>
                                <td> <span id="display_name"></span></td>
                                <td> <span id="display_start"></span></td>
                                <td> <span id="display_end"></span></td>
                                <td> <span id="display_seniors"></span></td>  
                                <td> <span id="display_total"></span></td>   
                                </tr> 
                                
                            </table>
                         
                            <button onclick="submitForm()">Submit Data</button>
                    
                            </center>
                    </div>
            
                    
                    </form>
                    
                    </div>

            </body>

</html>
