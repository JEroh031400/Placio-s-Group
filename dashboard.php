<link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<?php 
session_start();
error_reporting(0);
include("includes/config.php");
$yearly="SELECT SUM(ServiceFee) AS 'f' FROM tr WHERE YEAR(Date)=YEAR(now())";
$incomey=mysqli_query($con,$yearly);

 while($row=mysqli_fetch_array($incomey)){

?>  <div class="row">          
  <div class="col-md-6">
    
                    <div class="alert alert-info">

                    <h2>
                    
                         <strong><img src="icons\slip.png" width="60" height="60" > <?php 
                      echo 'P. '.$row['f'];
                      ?> 
                      

                       </strong> 
                         </h2>
                         <h3>
                         <center>
                         Income This year
                       </center>
                        </h3>
                    </div>
                                    </div>


                <?php } 

              $month="SELECT SUM(ServiceFee) AS 'f' FROM tr WHERE Month(Date)=Month(now())";
$incomem=mysqli_query($con,$month);

 while($row=mysqli_fetch_array($incomem)){

?>            
  <div class="col-md-6">
    
                    <div class="alert alert-info">

                    <h2>
                    
                         <strong><img src="icons\slip.png" width="60" height="60" > <?php 
                      echo 'P. '.$row['f'];
                      ?> 
                      

                       </strong> 
                         </h2>
                         <h3>
                         <center>
                         Income This month
                       </center>
                        </h3>
                    </div>
                                    </div>


<?php }
 $Week="SELECT SUM(ServiceFee) AS 'f' FROM tr WHERE Week(Date)=Week(now())";
$incomew=mysqli_query($con,$Week);

 while($row=mysqli_fetch_array($incomew)){

?>            
  <div class="col-md-6">
    
                    <div class="alert alert-info">

                    <h2>
                    
                         <strong><img src="icons\slip.png" width="60" height="60" > <?php 
                      echo 'P. '.$row['f'];
                      ?> 
                      

                       </strong> 
                         </h2>
                         <h3>
                         <center>
                         Income This Week
                       </center>
                        </h3>
                    </div>
                                    </div>
                                    

                <?php   
}
$statuses=mysqli_query($con,"SELECT StatusOfRepair,COUNT(StatusOfRepair) AS 'Number' FROM tr GROUP BY Statusofrepair");

 while($row=mysqli_fetch_array($statuses)){
 ?>
 



                <div class="col-md-6">
                    <div class="alert alert-info">
                    <h5>
                    
                         <strong> <?php 
                      echo $row['StatusOfRepair'].' : ';
                      ?> 
                       <?php echo $row['Number']; ?>

                       </strong> 
                         </h5>
                       
                    </div>
                                    </div>
                                    <?php } ?>



    