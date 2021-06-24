<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
$s="SELECT * FROM tr,accounts WHERE tr.StatusOfRepair NOT IN('Canceled') AND accounts.AccountID=tr.AccountID";
if(isset($_POST['Search'])){
$find=$_POST['searchs'];    
$s="SELECT * FROM tr,accounts WHERE tr.StatusOfRepair NOT IN('Canceled') AND  accounts.AccountID=tr.AccountID AND accounts.Name LIKE '%$find%'";
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>repair list</title>
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
                        <h1 class="page-head-line">Transaction History  </h1>
                    </div>
                </div>
                <div class="row" >
             <?php  
                         include('dashboard.php');
                    ?>
                <div class="col-md-12">
                   
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           
                           <form name="dept" method="post" enctype="multipart/form-data">
                           <input type="text" name="searchs" placeholder="Search Owner" required=""> 
                           <button type="submit" name="Search" >Search</button>
                       </form>
                           <br>
                           <br>
                            <a href="fpdf/r2.php">
<button class="btn btn-primary"><i class="fa fa-edit "></i>Print holistic Report</button> </a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="fpdf/weekly.php">
<button class="btn btn-primary"><i class="fa fa-edit "></i>Print weekly Report</button> </a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="fpdf/monthly.php"><br><br>
<button class="btn btn-primary"><i class="fa fa-edit "></i>Print Monthly Report</button> </a> &nbsp;&nbsp;&nbsp;<a href="fpdf/yearly.php">
<button class="btn btn-primary"><i class="fa fa-edit "></i>Print Yearly Report</button> </a>   <br>
<br>

      </div>
                        </div>
                    </div>
                </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">
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
                                    $pp=7;
                                    isset($_GET['page'])? $page=$_GET['page']:$page=0;
                                    if($page>1){
                                        $start=($page*$pp)-$pp;
                                    }else{
                                        $start=0;
                                    }
                                    $resultset=$mysqli->query($s);
                                    $numRows=$resultset->num_rows;
                                    $totalpages=$numRows/$pp;
                                    

                                    ?>
                                    <thead class="thead-dark">
                                        <tr>
                                           
                                            <th>Boat Image </th>
                                            <th>Boat Owner</th>
                                            <th>Description</th>
                                             <th>Date</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php


 $resultset=$mysqli->query($s." LIMIT $start,$pp");
$cnt=1;

while($row=$resultset->fetch_assoc())
{

$p=$row['Photo'];
$Mo=$row['Name'];
$des=$row['Description'];
$dt=$row['date'];
$stat=$row['StatusOfRepair'];




?>



                                        <tr>
                                           
                                             <td> <?php if($row['Photo']==""){ ?>
   <img src="yachtphoto/noimage.png" width="200" height="200"><?php } else {?>
   <img src="yachtphoto/<?php echo $p;?>" width="170" height="170">
   <?php } ?></td>
   <td><?php echo $row['Name'];?></td>
   <td><?php echo $row['Description'];?></td>
                                            <td><?php echo $row['Date'];?></td>
                                          
                                             <td><?php echo $row['StatusOfRepair'];?></td>
                                              <td>
                                            <a href="repairupdate.php?id=<?php echo $row['TransactionID']; ?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i> Change repair status</button> </a>    
 &nbsp;&nbsp;                                  

                                              <br>
                                        <br>
                                             <br>
                                        <br>
</a>

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
