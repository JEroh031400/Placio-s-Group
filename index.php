<?php
session_start();
error_reporting(0);
include("includes/config.php");
if((strlen($_SESSION['alogin'])!=0)||(strlen($_SESSION['login'])!=0))
{
if(strlen($_SESSION['alogin'])!=0){  
header('location:repairm.php');
}
if(strlen($_SESSION['login'])!=0){  
header('location:repair-history.php');
}
}
else{
if(isset($_POST['submit']))
{
    $regno=$_POST['Email'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM accounts WHERE Email='$regno' and password='$password'");
$num=mysqli_fetch_array($query);

$que=mysqli_query($con,"SELECT * FROM staffs WHERE Email='$regno' and password='$password'");
$n=mysqli_fetch_array($que);


if($num>0)
{
$extra="repair-history.php";//
$_SESSION['login']=$_POST['Email'];
$_SESSION['id']=$num['AccountID'];
$_SESSION['sname']=$_POST['Name'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(studentRegno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
elseif ($n>0) {    

$extra="Addprod.php";//
$_SESSION['alogin']=$_POST['Email'];
$_SESSION['id']=$num['AccountID'];
$_SESSION['sname']=$_POST['Name'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(studentRegno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/repairm.php");
exit();
}
else{    
$_SESSION['errmsg']="Invalid Email or Password";
$extra="repair-history.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
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

    <title>User Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body style="background-image: url('VK.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;">
    <?php include('includes/header.php');?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Please Login To Enter </h4>

                </div>

            </div>
             <span style="color:gray;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
            <form name="admin" method="post">
            <div class="row">
                <div class="col-md-6">
                     <font color="87CEEB">
                     <label>Email: </label>
                        <input type="Email" name="Email" class="form-control" required=""  />
                        <label>Enter Password :  </label>
                        <input type="password" name="password" class="form-control"  required="" />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log In </button>&nbsp;
                        </font>
                        <br>
                        <br>
                        <a href="/deploy/pasrec.php">Forgot password?</a>
                           <br>                              <br> 
                         <a href="/deploy/newacc.php">Sign up</a>

                        <br>                              <br>
                   
                     

                </div>
                </form>
                <div class="col-md-6">
                    <div class="alert alert-info">
                      Papaya yacht charter is one of the yacht charter on Nasugbu,Batangas serving yacht owners at it's best.
                        <br />
                         <strong> We do services like: </strong>
                        <ul>
                            <li>
                                Yacht repairs
                            </li>
                            <li>
                                Fiber glass works
                            </li>
                            <li>
                                Repaint
                            </li>
                            <li>
                                Engine Overhaul and others
                            </li>
                        </ul>
                       
                    </div>
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
