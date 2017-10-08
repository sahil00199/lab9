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
		$correct = true;
    	$ondate = $_POST['date'];
    	$starttime = $_POST['stime'];
    	$endtime = $_POST['etime'];
    	$descrip = $_POST['description'];
    	$datebool = preg_match("/^$/",$ondate) || preg_match("/^[0-9]{4}-[0][0-9]-[0-2][0-9]$/",$ondate) || preg_match("/^[0-9]{4}-[0][0-9]-[3][0-1]$/",$ondate) || preg_match("/^[0-9]{4}-[1][0-2]-[0-2][0-9]$/",$ondate) || preg_match("/^[0-9]{4}-[1][0-2]-[3][0-1]$/",$ondate);
    	$starttimebool = preg_match("/^$/",$starttime) || preg_match("/^[0-1][0-9]:[0-5][0-9]:[0-5][0-9]$/",$starttime) || preg_match("/^[2][0-4]:[0-5][0-9]:[0-5][0-9]$/",$starttime);
    	$endtimebool = preg_match("/^$/",$endtime) || preg_match("/^[0-1][0-9]:[0-5][0-9]:[0-5][0-9]$/",$endtime) || preg_match("/^[2][0-4]:[0-5][0-9]:[0-5][0-9]$/",$endtime);
    	if (!$datebool)
    	{
    		echo "date not mathing... please input in the format YYYY-MM-DD with correct values of months and dates<br>";
    		$correct = false;
    	}
    	if (!$starttimebool )
    	{
    		echo "start time not mathing... please input in the format HH:MM:SS with correct values of hours, minutes and dates<br>";
    		$correct = false;
    	}
    	if (!$endtimebool)
    	{
    		echo "end time not mathing... please input in the format HH:MM:SS with correct values of hours, minutes and dates<br>";
    		$correct = false;
    	}
    	if ($correct)
    {
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

}


elseif (isset($_POST['updmit']))
{
	$correct = true;
	$eventID = $_POST['Id'];
	$ondate = $_POST['date'];
    $starttime = $_POST['stime'];
    $endtime = $_POST['etime'];
    $descrip = $_POST['description'];
    $query1 = "UPDATE `$tablename` SET `event_date` = '$ondate' WHERE event_id = $eventID ;"; 
	$query2 = "UPDATE `$tablename` SET `start_time` = '$starttime' WHERE event_id = $eventID ;"; 
	$query3 = "UPDATE `$tablename` SET `end_time` = '$endtime' WHERE event_id = $eventID ;"; 
	$query4 = "UPDATE `$tablename` SET `description` = '$descrip' WHERE event_id = $eventID ;";
	$datebool = preg_match("/^$/",$ondate) || preg_match("/^[0-9]{4}-[0][0-9]-[0-2][0-9]$/",$ondate) || preg_match("/^[0-9]{4}-[0][0-9]-[3][0-1]$/",$ondate) || preg_match("/^[0-9]{4}-[1][0-2]-[0-2][0-9]$/",$ondate) || preg_match("/^[0-9]{4}-[1][0-2]-[3][0-1]$/",$ondate);
    $starttimebool = preg_match("/^$/",$starttime) || preg_match("/^[0-1][0-9]:[0-5][0-9]:[0-5][0-9]$/",$starttime) || preg_match("/^[2][0-4]:[0-5][0-9]:[0-5][0-9]$/",$starttime);
    $endtimebool = preg_match("/^$/",$endtime) || preg_match("/^[0-1][0-9]:[0-5][0-9]:[0-5][0-9]$/",$endtime) || preg_match("/^[2][0-4]:[0-5][0-9]:[0-5][0-9]$/",$endtime);
    if (!$datebool)
    	{
    		echo "date not mathing... please input in the format YYYY-MM-DD with correct values of months and dates<br>";
    		$correct = false;
    	}
    	if (!$starttimebool )
    	{
    		echo "start time not mathing... please input in the format HH:MM:SS with correct values of hours, minutes and dates<br>";
    		$correct = false;
    	}
    	if (!$endtimebool)
    	{
    		echo "end time not mathing... please input in the format HH:MM:SS with correct values of hours, minutes and dates<br>";
    		$correct = false;
    	}
    	if ($correct)
    {
	if(mysqli_query($mysqli,$query1) && mysqli_query($mysqli,$query2) && mysqli_query($mysqli,$query3) && mysqli_query($mysqli,$query4)){
      echo "Event updated successfully with event id = $eventID:)";
   }
   else
   {
   	echo "error encountered while updating the event" . mysqli_error($mysqli);
   }}
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
	$correct = true;
	$daate = $_POST['date'];
	$query="SELECT * from `$tablename` WHERE `event_date` = '$daate' ;";
	$wholedatabase=mysqli_query($mysqli,$query) or die(mysqli_error());
	$datebool = preg_match("/^$/",$ondate) || preg_match("/^[0-9]{4}-[0][0-9]-[0-2][0-9]$/",$ondate) || preg_match("/^[0-9]{4}-[0][0-9]-[3][0-1]$/",$ondate) || preg_match("/^[0-9]{4}-[1][0-2]-[0-2][0-9]$/",$ondate) || preg_match("/^[0-9]{4}-[1][0-2]-[3][0-1]$/",$ondate);
	if (!$datebool)
    	{
    		echo "date not mathing... please input in the format YYYY-MM-DD with correct values of months and dates<br>";
    		$correct = false;
    	}
    	else{
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
}
else
{
	echo "nothing happened";
}


?>