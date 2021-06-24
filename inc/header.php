<?php
include("includes/config.php");
error_reporting(0);
?>
<style type="text/css">

.circular--square{
border-top-left-radius: 50% 50%;
border-top-right-radius: 50% 50%;
border-bottom-left-radius: 50% 50%;
border-bottom-right-radius: 50% 50%;
}


</style>


<?php if($_SESSION['alogin']!="")
{?>
<header style="background-color:gray">
        <div class="container" style="background-color:gray">
            <div class="row">
 
               <div class="col-md-12">
<?php
$names="";
$AccountID="";
$sql=mysqli_query($con,"select * from staffs where Email='".$_SESSION['alogin']."'");
while($row=mysqli_fetch_array($sql))
{
$names=$row['Name'];
}             
?>

                    <?php if($names!=""){ ?>
                    <strong>Welcome: </strong><?php echo $names;
                     ?>
                    &nbsp;&nbsp;
<?php }?>
    
 





                   
                    


                </div>

            </div>
        </div>
    </header>
    <?php } ?>
    <!-- HEADER END-->
    
    <div class="navbar navbar-inverse set-radius-zero"  style="background:url(pycs.png) no-repeat center; background-size:contain; width:100%">

              <div class="container" style="background-color:gray">
                
             
               
             

      
       </div>
           
       <div class="container">
            <div class="row">
            <div class="navbar-header">
                  <?php if($_SESSION['alogin']!="")
{?>                
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php } ?>

                  <a style="color:#fff; font-size:25px;5px; line-height:50px; ">

            

                </a>
                <br>
         
                <a style="color:#fff; font-size:25px;5px; line-height:50px; ">
                </a>
                <br><br><br><br><br><br>
                 

                              
            
 </div>
              

                

        </div>
            </div>
        </div>