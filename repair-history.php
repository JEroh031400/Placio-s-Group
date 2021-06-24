<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_GET['del']))
      {
              mysqli_query($con,"update tr set StatusOfRepair='Canceled' where TransactionID = '".$_GET['id']."'");
             echo '<script> alert("Repair Successfully Canceled") </script>';
      }


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Transaction List</title>
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
                        <h1 class="page-head-line">Transaction History  </h1>
                    </div>
                </div>
                <div class="row" >
            
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php 
                            $query=mysqli_query($con,"SELECT * FROM tr WHERE StatusOfRepair NOT IN('Canceled') AND AccountID=(SELECT AccountID FROM accounts WHERE Email='".$_SESSION['login']."')");
$num=mysqli_fetch_array($query);
if($num==0){ 
    ?>
    <h3><font color="green" align="center"><?php echo "No repair transaction detected on your account " ;?></font></h3>
    <?php
}else{
    ?>
                            <div class="table-responsive-sm table-bordered">
                                <table class="table">
                                    <style>
                                        @media(max-width: 500px){
    .table thead{
        display: none;
    }
    .table,.table tbody,.table tr,.table td{
        display: block;
        width: 100%;
    }
    .table td{
        text-align: right;
        padding-left: 50%;
        text-align: right;
        position: relative;
    }
    .table td::before{
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left: 15px;
        font-size: 15px;
        text-align: left;
    }
}

                                    </style>
                                    <?php 
                                    $mysqli=NEW MySQLi('sql201.epizy.com','epiz_28471577','NHAUeSwzLrqvdst','epiz_28471577_yacht');
                                    $pp=3;
                                    isset($_GET['page'])? $page=$_GET['page']:$page=0;
                                    if($page>1){
                                        $start=($page*$pp)-$pp;
                                    }else{
                                        $start=0;
                                    }
                                    $resultset=$mysqli->query("SELECT * FROM tr WHERE StatusOfRepair NOT IN('Canceled') AND AccountID=(SELECT AccountID FROM accounts WHERE Email='".$_SESSION['login']."')");
                                    $numRows=$resultset->num_rows;
                                    $totalpages=$numRows/$pp;
                                    

                                    ?>
                                    <thead class="thead-dark">
                                        <tr>
                                           
                                            <th>Boat Image </th>
                                            <th>Boat Model</th>
                                            <th>Description</th>
                                             <th>Date</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php


 $resultset=$mysqli->query("SELECT * FROM tr WHERE AccountID=(SELECT AccountID FROM accounts WHERE StatusOfRepair NOT IN('Canceled') AND Email='".$_SESSION['login']."') LIMIT $start,$pp");
$cnt=1;

while($row=$resultset->fetch_assoc())
{

$p=$row['Photo'];
$Mo=$row['BoatModel'];
$des=$row['Description'];
$dt=$row['date'];
$stat=$row['StatusOfRepair'];




?>



                                        <tr>
                                           
                                             <td> <?php if($row['Photo']==""){ ?>
   <img src="yachtphoto/noimage.png" width="200" height="200"><?php } else {?>
   <img src="yachtphoto/<?php echo $p;?>" width="170" height="170">
   <?php } ?></td>
   <td><?php echo $row['BoatModel'];?></td>
   <td><?php echo $row['Description'];?></td>
                                            <td><?php echo $row['Date'];?></td>
                                          
                                             <td><?php echo $row['StatusOfRepair'];?></td>
                                              <td><?php if(($row['StatusOfRepair']=="Finished already picked up")||($row['StatusOfRepair']=="Finished ready for pick up")) {?>
                                                <a style="color:red;">cannot Alter the transaction repair is on going or the repair is already finished </a> <br><br>
                                              <?php }else{?>
                                            <a href="editrepair.php?id=<?php echo $row['TransactionID']; ?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit Transaction</button> </a><br>
                                              <br>                                   
                                              
                                                
                                             <a href="repair-history.php?id=<?php echo $row['TransactionID']?>&del=delete" onClick="return confirm('Are you sure you want to cancel the Repair?')">
                                            <button class="btn btn-danger">Cancel Repair</button></a>
                                        <br><br>
<?php } ?>
<?php if(($row['StatusOfRepair']=="Finished already picked up")||($row['StatusOfRepair']=="Finished ready for pick up")) {?><a href="feedback.php?id=<?php echo $row['TransactionID']; ?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i>Add a Feedback</button>  </a>
                                             <br><br> <?php } ?>
                                            </td>
                                   

                                        </tr>

<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                                
                                    <h4>
                                     <center>
                                    <strong>
                                    <?php 
                                    for($x=1;$x<=$totalpages+1;$x++){
                                     ?> 
                                    
                                        <style>
                                        a{
                                        color:#fff; 
                                        font-size:15px; 
                                        }
                                        </style>
                                        <button class="btn btn-primary">
                                        <?php

                                      echo "<a href='?page=$x'>$x \t</a>";
                                        ?>
                                       </button>
                                    <?php
                                    }
                                    ?>

                                </strong>
                                     </center>
                                 </h4>
                             <?php } ?>
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
