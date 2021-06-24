<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$prname=$_POST['prname'];
$photo=$_FILES["phot"]["name"];
$description=$_POST['prdesc'];
$price=$_POST['price'];

$prID=rand(100000,999999);
move_uploaded_file($_FILES["phot"]["tmp_name"],"products/".$_FILES["phot"]["name"]);
$ret=mysqli_query($con,"INSERT INTO `products`(prodid,Productname,Photo,price) VALUES ($prID,'$prname','$photo','$price')");
if($ret)
{
$_SESSION['msg']="Service succesfully added to the list";
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
                        <h1 class="page-head-line">Service management </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Enter a new service
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="session">Service name </label>
    <input type="text" class="form-control" id="sesssion" name="prname" required="" />
  </div>
  

<div class="form-group">
    <label for="CGPA">Price</label>
    <input type="text" class="form-control" id="cgpa" name="price" required />
  </div>  

 
  <div class="form-group">
    <label for="Pincode">Upload a Photo of you're yacht repair service </label>
    <input type="file" class="form-control" id="photo" name="phot" required="" />
  </div>



  <?php } ?>

 <button type="submit" name="submit" id="submit" class="btn btn-default">Register</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>
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
                                    $pp=3;
                                    isset($_GET['page'])? $page=$_GET['page']:$page=0;
                                    if($page>1){
                                        $start=($page*$pp)-$pp;
                                    }else{
                                        $start=0;
                                    }
                                    $resultset=$mysqli->query("SELECT * FROM products ");
                                    $numRows=$resultset->num_rows;
                                    $totalpages=$numRows/$pp;
                                    

                                    ?>
                                    <thead class="thead-dark">
                                        <tr>
                                           
                                            <th> Image </th>
                                            <th>Service</th>
                                            <th>Price</th>
                                            
                                             
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php


 $resultset=$mysqli->query("SELECT * FROM products LIMIT $start,$pp");
$cnt=1;

while($row=$resultset->fetch_assoc())
{

$p=$row['Photo'];
$Mo=$row['Productname'];
$dt=$row['price'];
$stat=$row['Stock'];




?>



                                        <tr>
                                           
                                             <td> <?php if($row['Photo']==""){ ?>
   <img src="products/noimage.png" width="200" height="200"><?php } else {?>
   <img src="products/<?php echo $p;?>" width="250" height="250">
   <?php } ?></td>
   <td><?php echo $row['Productname'];?></td>
   <td><?php echo "P.".$row['price'];?></td>
                                          
                                          
                                             
                                              <td>
                                            <a href="serviceupdate.php?id=<?php echo $row['prodid']; ?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i>Edit service details </button> </a>    
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





        </div>
    </div>
  <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>


</body>
</html>

