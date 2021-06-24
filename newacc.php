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





  require 'PHPMailerAutoload.php';

$mail = new PHPMailer(true);


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
    $mail->Subject = 'Account succesfully created';
    $mail->Body    = 'Hi '.$names.', <br> <p> Thanks for registering your account on YachtMailer. As a benefit you will received updates on the progress of your yacht repairs. At Papaya yacht charter services your yacht is safe and we offer different services such as overhaul and fiberglass works just login to you account on our website </p> <br> <br> <b> This is a system generated message do not reply on this email <b><br> <img src="cid:pycs" width="500" height="500">';
    $mail->AddEmbeddedImage(dirname(_FILE_).'/pycs.png','pycs');
  

    if(!$mail->send()){
     
 echo '<script> alert("Cannot create account, Email is not a valid email") </script>';

}else{
  $ret=mysqli_query($con,"INSERT INTO `accounts`(`AccountID`, `Name`, `Email`, `Contact`, `Gender`, `password`) VALUES ($accountID,'$names','$email','$contact','$Gender','$newpass')");
if($ret)
{
   
   
    $msg="Account succesfully created check your mail";
}else
{
$msg="Account failed to create please select another email not associated with another account";
}
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
<font color="green" align="center">
  <?php echo $msg; ?>
</font>

                        <div class="panel-body">
                       <form name="dept" action="newacc.php" method="post" enctype="multipart/form-data">
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
    <input type="text" class="form-control" id="email" name="contact" value=""  placeholder="091923...." required/>
    
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
                         <a href="/deploy/">Already have an Account? click here</a>

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

