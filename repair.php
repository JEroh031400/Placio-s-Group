<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$AccountID="";
$sql=mysqli_query($con,"select * from accounts where Email='".$_SESSION['login']."'");
while($row=mysqli_fetch_array($sql))
{
$AccountID=$row['AccountID'];
}
$DT=$_POST['Apdate'];
$yachtmodel=$_POST['yachtmodel'];
$photo=$_FILES["file"]["name"];
$description=$_POST['description'];
$TransactionID=rand(100000,999999);
move_uploaded_file($_FILES["file"]["tmp_name"],"yachtphoto/".$_FILES["file"]["name"]);
$ret=mysqli_query($con,"INSERT INTO `tr`(`TransactionID`, `AccountID`, `Photo`,BoatModel, `Description`, `StatusOfRepair`, `ServiceFee`, `Date`) VALUES ('$TransactionID','$AccountID','$photo','$yachtmodel','$description','Pending',0,'$DT')");
if($ret)
{
$_SESSION['msg']="Yacht repair is Successfully registered to our system check your mail for updates !!";
}
else
{
  $_SESSION['msg']="Error :Record not update";
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
    <title>Student Profile</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Yacht repair Registration form  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Fill up the following
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <label for="studentname">Yacht model </label>
    <input type="text" class="form-control" id="studentname" name="yachtmodel" required="" />
  </div>
  
<div class="form-group">
    <label for="CGPA">Description of repair needed</label>
    <input type="text" class="form-control" id="cgpa" name="description"  value="description of repair need ex fiber glass work or repaint" required />
  </div>  

<div class="form-group">
    <label for="CGPA">Appointment Date</label>
    <input type="date" class="form-control" id="cgpa" name="Apdate" value="YYYY-MM-DD" />
  </div> 


<div class="form-group">
    <label for="Pincode">Upload a Photo of you're yacht </label>
    <input type="file" class="form-control"  name="file"  value=""  required="" />
  </div>


  <?php } ?>

 <button type="submit" name="submit" id="submit" class="btn btn-default">Register</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>





        </div>
    </div>
  <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>


</body>
</html>

