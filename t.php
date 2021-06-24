<?php
session_start();
error_reporting(0);
include('includes/config.php');
error_reporting(0);



if(isset($_POST['submit']))
{
$names=$_POST['name'];
$accountID = rand(100000,999999);
$password=$_POST['password'];
$newpass=md5($password);
$Gender=$_POST['Gender'];
$email=$_POST['email'];
$Address=$_POST['Address'];
$contact=$_POST['contact'];



$ret=mysqli_query($con,"INSERT INTO `ac`(`AccountID`, `Name`, `Email`, `Contact`, `Gender`, `password`) VALUES ($accountID,'$names','$email','$contact','$Gender','$newpass')");
if($ret)
{


    echo '<script> alert("Account succesfully created check your mail") </script>';
     


}else{
   
echo '<script> alert("Email is already used") </script>';   
    
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
<?php 
$_SESSION['login']="";

 ?>
    <!-- MENU SECTION END-->
       <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Yacht owner Registration  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                         
                        </div>
<font color="green" align="center"></font>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <label for="studentname"> Name  </label>
    <input type="text" class="form-control" id="name" name="name" value=""  required />
  </div>

 <div class="form-group">
    <label for="studentregno">Email </label>
    <input type="email" class="form-control" id="email" name="email" value=""  placeholder="User@email.com" required/>
    
  </div>

  <div class="form-group">
    <label for="studentregno">Contact number</label>
    <input type="tel" class="form-control" id="email" name="contact" value=""  placeholder="091923...." required/>
    
  </div>


 <div class="form-group">
    <label for="studentregno">Password </label>
    <input type="password" name="password" class="form-control"  required />
    
  </div>



<div class="form-group">
    <label for="Pincode">Address  </label>
    <input type="text" class="form-control" id="Pincode" name="Address"  required />
  </div>   

<div class="form-group">
    <label for="CGPA">Gender </label>
   <select name="Gender" class="form-control">
   <option value="male">
      male
    </option>
   <option value="female">
      female
    </option>
      <option value="others">
      others
    </option>
  </select>


  </div>  





    <br>  <br>  

 <button class="btn-primary" type="submit" name="submit" id="submit" class="btn btn-default">Register</button>




</form>



<br>                              <br>
                         <a href="/courseware/">Already have an Account? click here</a>

                        <br>                              <br>
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

