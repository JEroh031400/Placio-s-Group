<?php
include 'Calendars.php';
$con = mysqli_connect('localhost','root','','courseware');
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$calendar = new Calendar('2021-02-02');
$sqls=mysqli_query($con,"SELECT tr.BoatModel,tr.Date,tr.Finished,accounts.Name FROM tr,accounts WHERE tr.AccountID=accounts.AccountID");

while($row=mysqli_fetch_array($sqls))
{
$calendar->add_event($row['Name'],$row['Finished'], 1, 'green');
$calendar->add_event($row['Name'],$row['Date'], 1, 'red');
}


if(isset($_POST['submit'])){
$calendar = new Calendar($_POST['Apdate']);


$sqls=mysqli_query($con,"SELECT tr.BoatModel,tr.Date,tr.Finished,accounts.Name FROM tr,accounts WHERE tr.AccountID=accounts.AccountID");

while($row=mysqli_fetch_array($sqls))
{
$calendar->add_event($row['Name'],$row['Finished'], 1, 'green');
$calendar->add_event($row['Name'],$row['Date'], 1, 'red');
}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="calendar.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	    <nav class="navtop">
	    	<div>
	    		<h1>Event Calendar</h1><br>
	    		
	    	</div>
	    </nav>
	<form name="dept" action="index.php" method="post" enctype="multipart/form-data">  
<br>
   <div class="form-group">
   	<h4>Green: Repair Finished</h4>
	    		<h4>Red: Appointment Date</h4><br>
    <label for="CGPA">Search Date</label>

    <input type="date" class="form-control" id="cgpa" name="Apdate" value="YYYY-MM-DD" />
  &nbsp;&nbsp;<button type="submit" name="submit">Search</button>
  </div> 

   

			<div class="content home" style="width: 100%;
                overflow: auto;
                max-width:100%;
                height:auto;
                overflow-y: scroll;">
			<?=$calendar?>
	
	</div>
</form>
	</body>
</html>