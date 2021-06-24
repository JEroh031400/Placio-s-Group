<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
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
    <title>Report breakdown</title>
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
                        <h1 class="page-head-line">Reports</h1>
                    </div>
                </div>
                <div class="row" >
            
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                       
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
                                    <thead class="thead-dark">
                                        <tr>
                                           
                                            <th>Report name </th>
                                            <th>Graph</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                         <td>Number of repairs in group in months</td>  
                                        <td>
                                                                              <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <style>
            
            #my-chart{
                background: #fff;
                width: 100%;
                overflow: auto;
                max-width:100%;
                height:auto;
                overflow-y: scroll;

            }
            
            
        </style>

        <div id="my-chart" style="width:600px; height:600px; "></div>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart'],
                'mapsApiKey': ''   // her eyou can put you google map key
            });
            google.charts.setOnLoadCallback(drawRegionsMap);

            function drawRegionsMap() {
                var data = google.visualization.arrayToDataTable([
                    ['Date', 'Repair Number'],
                     <?php
                     $chartQuery = "SELECT MONTHNAME(Date) As 'te',COUNT(Date) AS 'date' FROM tr GROUP BY month(Date) ORDER BY MONTH(Date) ASC";
                     $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".$row['te'].  "',".$row['date']."],";
                        }
                     ?>
                ]);

                var options = {
                   
                };

                var chart = new google.visualization.LineChart(document.getElementById('my-chart'));
                chart.draw(data, options);
            }
        </script>  
                                        </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
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
