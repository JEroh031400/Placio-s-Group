<?php
session_start();
error_reporting(0);
include('includes/config.php');
error_reporting(0);
$texts=0;;
$email=$_POST['email'];


/*if(isset($_POST['t'])){
$ret=mysqli_query($con,"SELECT * FROM `accounts` WHERE Email='$email'");
  $nums=mysqli_fetch_array($ret);
   $staff=mysqli_query($con,"SELECT * FROM `staffs` WHERE Email='$email'");
  $numstaff=mysqli_fetch_array($staff);
$retst=mysqli_query($con,"SELECT * FROM `staffs` WHERE Email='$email'");  
while($row=mysqli_fetch_array($retst)){
$names=$row['Name'];
$pas=$row['password'];
}
$retsts=mysqli_query($con,"SELECT * FROM `accounts` WHERE Email='$email'");  
while($row=mysqli_fetch_array($retsts)){
$names=$row['Name'];
$pas=$row['password'];
}
if ($numstaff>0){
echo 'Hi '.$names.', <br> <p> This is your code for changing your password, copy the code below, do not share this to anyone. </p> <br> <h2> '.$pas.'</h2>';  
}

}
*/
if(isset($_POST['up']))
{
  $newp=md5($_POST['newpass']);
  $code=$_POST['code'];
  $rett=mysqli_query($con,"SELECT * FROM `accounts` WHERE Email='$email' ");
  $confs=mysqli_fetch_array($rett);
  if($confs>0){
    $changing=mysqli_query($con,"UPDATE `accounts` SET password='$newp' WHERE password='$code' AND Email='$email' ");
    if ($changing) {
  $msg="Successfully change your password";
    }
  }else{
    $msg="Wrong code cannot change your password";
  }
}
if(isset($_POST['subs']))
{

  $ret=mysqli_query($con,"SELECT * FROM `accounts` WHERE Email='$email'");
  $nums=mysqli_fetch_array($ret);
  

  if($nums>0){
    $texts++;
  require 'PHPMailerAutoload.php';
$mail = new PHPMailer(true);
$rets=mysqli_query($con,"SELECT * FROM `accounts` WHERE Email='$email'");  
while($row=mysqli_fetch_array($rets)){
$names=$row['Name'];
$pas=$row['password'];
}
}
 $staff=mysqli_query($con,"SELECT * FROM `staffs` WHERE Email='$email'");
  $numstaff=mysqli_fetch_array($staff);
if($numstaff>0){
    $texts++;
  require 'PHPMailerAutoload.php';
$mail = new PHPMailer(true);
$retst=mysqli_query($con,"SELECT * FROM `staffs` WHERE Email='$email'");  
while($row=mysqli_fetch_array($retst)){
$names=$row['Name'];
$pas=$row['password'];
}
}

if(($numstaff>0)||($nums>0)){
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'yachtmailerr@gmail.com';                     //SMTP username
    $mail->Password   = 'grouphug';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('yachtmailerr@gmail.com', 'YachtMailer');
    $mail->addAddress($_POST['email']);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password recovery';
    $mail->Body    = 'Hi '.$names.', <br> <p> This is your code for changing your password, copy the code below, do not share this to anyone. </p> <br> <h2> '.$pas.'</h2> <br> <br> <br> <b> This is a system generated message do not reply on this email <b><br> <img src="cid:pycs" width="500" height="500">';
    $mail->AddEmbeddedImage(dirname(_FILE_).'/pycs.png','pycs');
  

    if(!$mail->send()){
      echo '<script> alert("Cannot create account, Email is not a valid email") </script>';
  }else{
$msg="Code is sended to your email";
}
}
if(($nums==0)&&($numstaff==0)){
  $msg="email you entered is not associated on any account on the yacht charter";
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
                        <h1 class="page-head-line">Password Recovery</h1>
                    </div>
                </div>

                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                         
                        </div>
<font color="green" align="center">
  <?php echo $msg; ?>
<?php echo $msgs; ?>
</font>

                        <div class="panel-body">
                       <form name="dept" action="pasrec.php" method="post" enctype="multipart/form-data">
 

 <div class="form-group">
    <label for="studentregno">Email </label>
    <input type="email" class="form-control" id="email" name="email" value="<?php if(($nums>0)||($numstaff>0)){ echo $email; } ?>"  placeholder="User@email.com" required <?php if(($nums>0)||($numstaff>0)){ ?> readonly  <?php }?>/>
    
  </div>
<?php
if ($texts>0) {
 ?>
<div class="form-group">
    <label for="studentregno">code</label>
    <input type="text" class="form-control" id="email" name="code" value="" required/>   
  </div> 
<div class="form-group">
    <label for="studentregno">New password</label>
    <input type="password" class="form-control" id="email" name="newpass" value="" required/>   
  </div> 

<?php
}
 ?>
  </div>  




 
<?php
if ($texts>0) {
 ?>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn-primary" type="submit" name="up" id="submit" class="btn btn-default">Update</button>
<?php }else{ ?>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="subs" id="submit" class="btn btn-default">Submit</button>
<?php
}
?>
</form>



<br>                              <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <a href="/deploy/">Back to login</a>

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

