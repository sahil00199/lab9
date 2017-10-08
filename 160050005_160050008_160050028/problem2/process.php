<?php
	$server = '1.db.cse.iitb.ac.in';
	$user = 'cs699user';
	$pass = 'cs699user@123';
	$db = 'cs699db';
	
	$tablename = event;
	$mysqli = new mysqli($server, $user, $pass, $db);
	mysqli_report(MYSQLI_REPORT_ERROR);
	if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
   }
	// CREATE TABLE event(event_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,event_date DATE,start_time TIME,end_time TIME,description VARCHAR(100));
if (isset($_POST['addsubmit']))
{
    	$ondate = $_POST['date'];
    	$starttime = $_POST['stime'];
    	$endtime = $_POST['etime'];
    	$descrip = $_POST['description'];

   	$query = "INSERT INTO `$tablename` (`event_id`, `event_date`, `start_time`, `end_time`, `description`) VALUES (NULL, '$ondate', '$starttime', '$endtime', '$descrip')";
if(mysqli_query($mysqli,$query))
	{
	  $last_id = $mysqli->insert_id;
      echo "Event added with Event ID =  $last_id<br>";
	}
else
   {
   	echo "error encountered while adding the event" . mysqli_error($mysqli);
   }
}	

elseif (isset($_POST['updmit']))
{
	$eventID = $_POST['Id'];
	$ondate = $_POST['date'];
    $starttime = $_POST['stime'];
    $endtime = $_POST['etime'];
    $descrip = $_POST['description'];
    $query1 = "UPDATE `$tablename` SET `event_date` = '$ondate' WHERE event_id = $eventID ;"; 
	$query2 = "UPDATE `$tablename` SET `start_time` = '$starttime' WHERE event_id = $eventID ;"; 
	$query3 = "UPDATE `$tablename` SET `end_time` = '$endtime' WHERE event_id = $eventID ;"; 
	$query4 = "UPDATE `$tablename` SET `description` = '$descrip' WHERE event_id = $eventID ;"; 
	if(mysqli_query($mysqli,$query1) && mysqli_query($mysqli,$query2) && mysqli_query($mysqli,$query3) && mysqli_query($mysqli,$query4)){
      echo "Event updated successfully with event id = $eventID:)";
   }
   else
   {
   	echo "error encountered while updating the event" . mysqli_error($mysqli);
   }
}

elseif (isset($_POST['deletesubmit']))
{
	$eventID = $_POST['iid'];
	$query = "DELETE FROM `$tablename` WHERE event_id = $eventID;";
    if(mysqli_query($mysqli,$query)) 
   {
      echo "Now the table doesn't contains any event with id = $eventID:)";
   }
   else
   {
   	echo "error encountered while deleting the event" . mysqli_error($mysqli);
   }	
}

elseif (isset($_POST['allsubmit']))
{
	$query="SELECT * from `$tablename` ";
	$wholedatabase = mysqli_query($mysqli,$query);
	if(!$wholedatabase)
   {
   	echo "error encountered while accessing all the events" . mysqli_error($mysqli);
   }
   echo '<table>
	<tr>
	<td> Event ID</td>
	<td> Date</td>
	<td> Start Time</td>
	<td> End Time</td>
	<td> Description</td>
	
	</tr>';
	while($thisrecord=mysqli_fetch_array($wholedatabase))
	{
		echo '<tr>
		<td>'.$thisrecord["event_id"].'</td>
		<td>'.$thisrecord["event_date"].'</td>
		<td>'.$thisrecord["start_time"].'</td>
		<td>'.$thisrecord["end_time"].'</td>
		<td>'.$thisrecord["description"].'</td>
		</tr>';
	}
echo '</table>';
}
elseif (isset($_POST['thisdatesubmit']))
{
	$daate = $_POST['date'];
	$query="SELECT * from `$tablename` WHERE `event_date` = '$daate' ;";
	$wholedatabase=mysqli_query($mysqli,$query) or die(mysqli_error());
   echo '<table>
	<tr>
	<td> Event ID</td>
	<td> Date</td>
	<td> Start Time</td>
	<td> End Time</td>
	<td> Description</td>
	
	</tr>';
	while($thisrecord=mysqli_fetch_array($wholedatabase))
	{
		echo '<tr>
		<td>'.$thisrecord["event_id"].'</td>
		<td>'.$thisrecord["event_date"].'</td>
		<td>'.$thisrecord["start_time"].'</td>
		<td>'.$thisrecord["end_time"].'</td>
		<td>'.$thisrecord["description"].'</td>
		</tr>';
	}
echo '</table>';
}

else
{
	echo "nothing happened";
}


?>