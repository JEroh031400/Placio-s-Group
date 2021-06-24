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
$message = '';

$connect = new PDO("mysql:host=sql201.epizy.com;dbname=epiz_28471577_yacht", "epiz_28471577","NHAUeSwzLrqvdst");


function fetch_customer_data($connect)
{
  $d=$_POST['Ids']; 
$mn="SELECT timestampdiff(month,Date,Finished) as 'A' FROM tr WHERE Transactionid=".$d;
  $sm = $connect->prepare($mn);
  $sm->execute();
  $rm = $sm->fetchAll();
foreach ($rm as $row) {
  $nmonth=$row['A'];
}
$mns="SELECT price FROM servtransaction WHERE servID=(SELECT prodid FROM products WHERE Productname='Parking Fee') AND servtransaction.Transactionid=".$d;
  $sms = $connect->prepare($mns);
  $sms->execute();
  $rms = $sms->fetchAll();
foreach ($rms as $row) {
  $nfee=$row['price'];
}
  
  $query ="SELECT * FROM tr,accounts WHERE tr.AccountID=accounts.AccountID AND tr.TransactionID=".$d;
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '<center><div><h1>Papaya yacht Charter and Services Inc.</h1></div>
  <div><h2>Report of repairs</h2></center></div></center><br><br>
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <tr>
        <th>Yacht owner</th>
        <th>Photo</th>
        <th>ServiceFee</th>
        <th>Status</th>
        <th>Date</th>
      </tr>
  ';
  foreach($result as $row)
  {
    $output .= '
      <tr>
        <td>'.$row["Name"].'</td>
         <td><img src="yachtphoto/'.$row['Photo'].'" width="200" height="200"></td>
        <td>'.$row["ServiceFee"].'</td>
        <td>'.$row["StatusOfRepair"].'</td>
        <td>'.$row["Date"].'</td>
      </tr>
';
}
$output .='
<br>'; 
 
    $pf="SELECT products.Productname,products.price FROM products,servtransaction WHERE servtransaction.servID=products.prodid AND servtransaction.servID!=(SELECT prodid FROM products WHERE Productname='Parking Fee') AND servtransaction.TransactionID=".$d;
      $stat = $connect->prepare($pf);
  $stat->execute();
  $rs = $stat->fetchAll();
  $output .= '
  <br>
    </table>
  </div>
  <br>
   <div><h5>Reciept of repair</h5></center></div><br><br>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
      <tr>
        <th>Service</th>
        <th>Price of the Service</th>
      </tr>
  ';
  foreach($rs as $row)
  {
    $output .= '
      <tr>
        <td>'.$row["Productname"].'</td>
        <td>'.$row["price"].' Pesos </td>
      </tr>';
    }
$output .= '
      <tr>
        <td>Parking</td>
        <td>Number of month/s: '.$nmonth.' <br> Parking fee: '.$nfee.' Pesos</td>
      </tr>';
$output.='<br>  </table </div> ';

  $pfs="SELECT ServiceFee FROM tr WHERE TransactionID=".$d;
      $st = $connect->prepare($pfs);
  $st->execute();
  $tl = $st->fetchAll();
   foreach($tl as $row)
  {
    $totalfee=$row['ServiceFee'];
  }
  $output .='Total: '.$totalfee.' <br> <br>';
  return $output;
}

/*if(isset($_POST['subm'])){
  
  $file_name =  'a.pdf';
  $html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
  $html_code .= fetch_customer_data($connect);
  $pdf = new Pdf();
  $pdf->load_html($html_code);
  $pdf->render();
  $file = $pdf->output();
  file_put_contents($file_name, $file);
}*/


if(isset($_POST['submits'])){

$ch=$_POST['Services'];
foreach ($_POST['Services'] as $key => $value) {
if($_POST['Services'][$key]!=null){
$prd=$_POST['Services'][$key];
$pc=$_POST['price'][$key];
$ry="INSERT INTO servtransaction(TransactionID,servID,price) VALUES($TID,$prd,$pc)";
$t=mysqli_query($con,$ry);
if($t){
$ry="UPDATE tr SET ServiceFee=(SELECT SUM(price) FROM servtransaction WHERE TransactionID=$TID) WHERE TransactionID=$TID";
$t=mysqli_query($con,$ry); 
}else{
  echo $ry;
}
}
}
}






if(isset($_POST['submit']))
{
$st=$_POST['Status'];
$nme=$_POST['yachtowner'];
$ml=$_POST['mailing'];
$sfe=$_POST['srfee'];

if(($_POST['Status']="Finished already picked up")||($_POST['Status']="Finished ready for pick up")){
$rsss=mysqli_query($con,"UPDATE tr SET ServiceFee=(SELECT (SELECT ServiceFee FROM tr WHERE TransactionID=$TID)+((SELECT timestampdiff(month,Date,Finished) as 'A' FROM tr WHERE Transactionid=$TID)*(SELECT price FROM `products` WHERE Productname='Parking fee')) FROM `tr` WHERE TransactionID=$TID) WHERE TransactionID=$TID");
$rss=mysqli_query($con,"UPDATE tr SET Finished=now() WHERE TransactionID=$TID");
if($rss){
$checks=mysqli_query($con,"SELECT * FROM servtransaction WHERE TransactionID=$TID AND servID=(SELECT prodid FROM `products` WHERE Productname='Parking fee')");
$nums=mysqli_fetch_array($checks);
if($nums>0){
$rnt=mysqli_query($con,"UPDATE servtransaction SET price=(SELECT timestampdiff(month,Date,Finished) as 'A' FROM tr WHERE Transactionid=$TID)*(SELECT price FROM `products` WHERE Productname='Parking fee') WHERE TransactionID=$TID AND servID=(SELECT prodid FROM `products` WHERE Productname='Parking fee')");
}else{
$rnt=mysqli_query($con,"INSERT INTO servtransaction VALUES($TID,(SELECT prodid FROM `products` WHERE Productname='Parking fee'),(SELECT timestampdiff(month,Date,Finished) as 'A' FROM tr WHERE Transactionid=$TID)*(SELECT price FROM `products` WHERE Productname='Parking fee'))");
}
} 
}





$rql=mysqli_query($con,"UPDATE tr SET StatusOfRepair='$st' WHERE TransactionID=".$TID);
if ($rql) {
$ch=$_POST['Services'];
foreach ($_POST['Services'] as $key => $value) {
if($_POST['Services'][$key]!=null){
$prd=$_POST['Services'][$key];
$pc=$_POST['price'][$key];
$ry="INSERT INTO servtransaction(TransactionID,servID,price) VALUES($TID,$prd,$pc)";
$t=mysqli_query($con,$ry);
if($t){
$ry="UPDATE tr SET ServiceFee=(SELECT SUM(price) FROM servtransaction WHERE TransactionID=$TID) WHERE TransactionID=$TID";
$t=mysqli_query($con,$ry); 
}else{
  echo $ry;
}
}
}




require 'PHPMailerAutoload.php';

include('pdf.php');
  $file_name =  'yachtreport'.rand().'.pdf';
  $html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
  $html_code .= fetch_customer_data($connect);
  $pdf = new Pdf();
  $pdf->load_html($html_code);
  $pdf->render();
  $file = $pdf->output();
  file_put_contents($file_name, $file);

    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
require 'class/class.phpmailer.php';
  $mail = new PHPMailer;
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'yachtmailerr@gmail.com';                     //SMTP username
    $mail->Password   = 'grouphug';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
    
    //Recipients
    $mail->setFrom('yachtmailerr@gmail.com', 'YachtMailer');
    $mail->addAddress($_POST['mailing']);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  $mail->addAttachment($file_name);    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Yacht Status update '.$pt;
    $mail->Body    = '<br> Hi '.$nme.', <br> <p> This is an Status update of your Yacht, <br> Notice: Cancelation of repair is not possible once the repair status of the yacht is on the dry docs This is the status and expected bill to be payed on the yacht repair  </p> <br> view the attachments file, the file also contains the possible amount to pay, thank you!!  <br> <br> <b> This is a system generated message do not reply on this email <b> <br> <img src="cid:pycs" width="500" height="500">';
    $mail->AddEmbeddedImage(dirname(_FILE_).'/pycs.png','pycs');
  
     
    if(!$mail->send()){
     
echo '<script> alert("Cannot update status") </script>'; 

}else{
$status=$_POST['Status'];



$q="UPDATE tr SET StatusOfRepair='$status' WHERE TransactionID=".$TID;



$ret=mysqli_query($con,$q);
if($ret)
{
 echo '<script> alert("Status update succesfully") </script>';
}else{
    echo '<script> alert("Cannot update status") </script>';                 
}
}





unlink($file_name);
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
    <title>Update Repair status</title>
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
                        <h1 class="page-head-line">Yacht repair Registration form </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Yacht repair update
                        </div>


                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
                        <?php
                        $sqls=mysqli_query($con,"SELECT * FROM tr,accounts WHERE tr.AccountID=accounts.AccountID AND tr.TransactionID=".$TID);

while($row=mysqli_fetch_array($sqls))
{?>


  <div class="form-group">
    <label for="studentname">Unique Transaction Id </label>
    <input type="text" class="form-control" id="studentname" name="Ids" required="" value="<?php echo htmlentities($row['TransactionID']);?>" readonly />
  </div>

 <div class="form-group">
    <label for="studentname">Yacht owner </label>
    <input type="text" class="form-control" id="studentname" name="yachtowner" required="" value="<?php echo htmlentities($row['Name']);?>" readonly />
  </div>

   <div class="form-group">
    <label for="studentname">Yacht model </label>
    <input type="text" class="form-control" id="studentname" name="yachtmodel" required="" value="<?php echo htmlentities($row['BoatModel']);?>" readonly />
  </div>

<div class="form-group">
    <label for="CGPA">Description of repair needed</label>
    <input type="text" class="form-control" id="cgpa" name="description"  value="<?php echo htmlentities($row['Description']);?>" required="" readonly />
  </div>

  <div class="form-group">
    <label for="CGPA">Service Fee</label>
    <input type="text" class="form-control" id="cgpa" name="srfee"  value="<?php if($row['ServiceFee']==0){
     echo "Not Finished Estimating the repair bill "; 
   }else{ echo htmlentities($row['ServiceFee']); 
 };?>" required="" readonly />
  </div>   


<div class="form-group">
    <label for="CGPA">Email to send</label>
    <input type="text" class="form-control" id="cgpa" name="mailing"  value="<?php echo htmlentities($row['Email']);?>" readonly />
  </div> 

<div class="form-group">
   
   <img src="yachtphoto/<?php echo htmlentities($row['Photo']);
   $pt=$row['Photo'];

   ?>" width="400" height="400">
    <label for="Pincode"></label>
  </div>
    <?php } 

$sqs=mysqli_query($con,"SELECT * FROM tr,accounts WHERE tr.AccountID=accounts.AccountID AND tr.TransactionID=".$TID);

while($row=mysqli_fetch_array($sqs))
    if($row['ServiceFee']==0){ ?>
<div class="form-group">
    <label for="CGPA">Services Done:</label><br>
<?php
$ss=mysqli_query($con,"SELECT * FROM products WHERE productname!='Parking fee'");
while($row=mysqli_fetch_array($ss))
{?>
 
   <input type="checkbox" name="Services[]" value="<?php echo htmlentities($row['prodid']);  ?>"/> <?php echo htmlentities($row['Productname']); ?>
   <input type="hidden" name="price[]" value="<?php echo htmlentities($row['price']);?>" readonly >

  </div> 
<?php } } ?>



  <div class="form-group">
    <label for="CGPA">Status</label>
   <select name="Status" class="form-control">
   <option value="Parked in the docks">
      Parked in the docks
    </option>
   <option value="On going repair">
      On going repair
    </option>
      <option value="Finished ready for pick up">
     Finished ready for pick up
    </option>
       <option value="Finished already picked up">
     Finished already pick up
    </option>
  </select>


  </div>



<br>
 <button type="submit" name="submit" id="submit" class="btn btn-default">Update</button>

<br>

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
