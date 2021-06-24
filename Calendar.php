<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

?>
<?php
include 'calendar/Calendars.php';

$calendar = new Calendar(date("Y-m-d"));
$sqls=mysqli_query($con,"SELECT count(Date) AS 'num',Date FROM tr GROUP BY Date");

while($row=mysqli_fetch_array($sqls))
{

$calendar->add_event($row['num'],$row['Date'], 2, 'red');
}

$sqls2=mysqli_query($con,"SELECT count(Finished) AS 'num',Finished FROM tr GROUP BY Finished");
while($row=mysqli_fetch_array($sqls2))
{
$calendar->add_event($row['num'],$row['Finished'], 2, 'green');
}

if(isset($_POST['submit'])){
$calendar = new Calendar($_POST['Apdate']);

$sqls=mysqli_query($con,"SELECT count(Date) AS 'num',Date FROM tr GROUP BY Date");
while($row=mysqli_fetch_array($sqls))
{
$calendar->add_event($row['num'],$row['Date'], 1, 'red');
}
$sqls2=mysqli_query($con,"SELECT count(Finished) AS 'num',Finished FROM tr GROUP BY Finished");
while($row=mysqli_fetch_array($sqls2))
{
$calendar->add_event($row['num'],$row['Finished'], 1, 'green');
}

}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Event Calendar</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('inc/header.php');?>
    <!-- LOGO HEADER END-->
<?
      
 include('inc/menubar.php');

 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Calendar of repairs</h1>
                    </div>
                </div>
                <div class="row" >
            
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                    <link href="calendar/style.css" rel="stylesheet" type="text/css">
        <link href="calendar/calendar.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <form name="dept" action="Calendar.php" method="post" enctype="multipart/form-data">  
<br>
   <div class="form-group">
    <font color="green" align="center"><h4>Green: Repair Finished</h4></font><br>
               <font color="red" align="center"> <h4>Red: Appointment Date</h4></font><br>
    <label for="CGPA">Search Date</label>

    <input type="date" class="form-control" id="cgpa" name="Apdate" value="YYYY-MM-DD" />
  &nbsp;&nbsp;<br><button type="submit" name="submit">Search</button>
  </div> 

   

            <div class="content home"style="width: 100%;
                overflow: auto;
                max-width:100%;
                height:auto;
                overflow-y: scroll;">
            <?=$calendar?>
    
    </div>
</form>
                            </div>
                        </div>
                    </div>
                     <!--  End  Bordered Table  -->
                </div>
            </div>





        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
<?php } ?>
