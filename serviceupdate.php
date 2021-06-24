<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
$TID=intval($_GET['id']);
if(isset($_POST['submit']))
{


$prname=$_POST['Productname'];
$photo=$_FILES["photo"]["name"];
move_uploaded_file($_FILES["photo"]["tmp_name"],"yachtphoto/".$_FILES["photo"]["name"]);
$pre=$_POST['price'];

if($photo==""){
 $q="UPDATE products SET Productname='$prname',price='$pre' WHERE prodid=".$TID; 
}else {
$q="UPDATE products SET Photo='$photo',Productname='$prname',price='$pre' WHERE prodid=".$TID;
}


$ret=mysqli_query($con,$q);
if($ret)
{
$_SESSION['msg']="Your transaction has been updated succesfully ";
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
<?php include('inc/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['alogin']!="")
{
 include('inc/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Update service information</h1>
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
                        <?php
                        $sqls=mysqli_query($con,"SELECT * FROM products WHERE prodid=".$TID);

while($row=mysqli_fetch_array($sqls))
{?>



   <div class="form-group">
    <label for="studentname">Service name </label>
    <input type="text" class="form-control" id="studentname" name="Productname" required="" value="<?php echo htmlentities($row['Productname']);?>" />
  </div>

<div class="form-group">
    <label for="CGPA">Service Price</label>
    <input type="text" class="form-control" id="cgpa" name="price"  value="<?php echo htmlentities($row['price']);?>" required="" />
  </div>  



<div class="form-group">
   
   <img src="yachtphoto/<?php echo htmlentities($row['Photo']);?>" width="400" height="400">
    <label for="Pincode"></label>
    <input type="file" class="form-control" id="photo" name="photo"  value="<?php echo htmlentities($row['Photo']);?>"/>
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