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

 $sqls=mysqli_query($con,"SELECT * FROM accounts WHERE Email='".$_SESSION['login']."'");
$id=0;
while($row=mysqli_fetch_array($sqls)){
$id=$row['AccountID'];
}

$name=$_POST['name'];
$mail=$_POST['Email'];
$Adds=$_POST['address'];
$cont=$_POST['contact'];
$pass=md5($_POST['pass']);

$sq=mysqli_query($con,"SELECT * FROM accounts WHERE password='$pass' AND AccountID=".$id);
 $q="UPDATE accounts SET Name='$name',Address='$Adds',Email='$mail',Contact='$cont' WHERE password='$pass' AND AccountID=".$id; 

$num=mysqli_fetch_array($sq);

if($num>1)
{
echo '<script> alert("Your information has been updated succesfully") </script>';
$ret=mysqli_query($con,$q);

$_SESSION['login']=$_POST['Email'];
}
else{
  echo '<script> alert("Invalid input Password Cannot Update") </script>'; 
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
                        <h1 class="page-head-line">Profile Update </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                        
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
                        <?php
                        $sqls=mysqli_query($con,"SELECT * FROM accounts WHERE Email='".$_SESSION['login']."'");

while($row=mysqli_fetch_array($sqls))
{?>



   <div class="form-group">
    <label for="studentname">Name </label>
    <input type="text" class="form-control" id="studentname" name="name" required="" value="<?php echo htmlentities($row['Name']);?>" />
  </div>

  <div class="form-group">
    <label for="studentname">Address</label>
    <input type="text" class="form-control" id="studentname" name="address" required="" value="<?php echo htmlentities($row['Address']);?>" />
  </div>

<div class="form-group">
    <label for="CGPA">Email</label>
    <input type="Email" class="form-control" id="cgpa" name="Email"  value="<?php echo htmlentities($row['Email']);?>" required="" />
  </div>  

<div class="form-group">
    <label for="CGPA">Contact Number</label>
    <input type="text" class="form-control" id="cgpa" name="contact"  value="<?php echo htmlentities($row['Contact']);?>" required="" />
  </div> 

   <div class="form-group">
    <label for="CGPA">Enter Password</label>
    <input type="Password" class="form-control" id="cgpa" name="pass" required="" />
  </div>




  <?php } ?>

 <button type="submit" name="submit" id="submit" class="btn btn-default">Update</button>
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
<?php }?>