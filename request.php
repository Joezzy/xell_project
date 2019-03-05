<?php
     include("./inc/header.php");
?>

 
<!-- main content area -->   
<div id="main" class="wrapper">
    
    
<!-- content area -->    
	<section id="content" class="wide-content">
      <div class="row">	
        <div class="grid_4">
            
        <!--1st col-->
        
        <!--col1 end-->
        </div>
        
        <div class="grid_4">
            <!--middle one start-->
	  	<!----regform--start-->
            <h1>Make Request </h1>

           <form class="form-mini" method="post"  enctype="multipart/form-data" action="#">

             
                 <div class="form-row">
                    <input type="text" name="title" placeholder="Title">
                </div>
                 
               
                
                   
                      <div class="form-row">
                    <input type="text" name="describe" placeholder="Description">
                </div>
                
                <div class="form-row form-last-row">
                    <button type="submit" name="send">Post request</button>
                </div>

                
                
<?php


if(isset($_POST['send']))
{
$title=($_POST['title']);
$desc=($_POST['describe']);

$title= stripslashes($title);
$desc= stripslashes($desc);

$title = mysqli_real_escape_string($con,$title);
$desc = mysqli_real_escape_string($con,$desc);


	if($title =="" || $desc=="")
        {
		echo "<br/>Title or Description is empty";
                }

  else
        {
//
$result=mysqli_query($con,"SELECT * FROM members WHERE user='$user'") or die(mysqli_error());

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
$rows = mysqli_fetch_array($result);
$id = $rows['id'];
$name = $rows['name'];
$state=$rows['state'];
$college=$rows['college'];
$phone=$rows['phone'];
//$town=$rows['town'];
$req_id=randomkey(30);




		$insert = "INSERT INTO request (req_id,user,title,request_Detail,name,state,college,phone)
VALUES ('$req_id','$user','$title','$desc','$name','$state','$college','$phone')";
		mysqli_query($con,$insert) or die('Cannot add record '.mysqli_error());
		
                echo "Request Posted";
		
        }
}


?>

                
                
                
                
                
            </form>

           <!--middlle ends-->
	</div>
        
        <div class="grid_4">
        	
<!--3rd col-->
 
        </div>
        
	</section><!-- end content area -->   
      
      
    
      
  </div><!-- #end div #main .wrapper -->


 
<?php

include "./inc/foot.inc";

 function randomkey($length){
                    $key="";
                        $pool=array_merge(range(0,9),range('a','z'),range('A','Z'));
                        for($i=0; $i<$length; $i++){
                            $key.=$pool[mt_rand(0,count($pool)-1)];
                            
                        }
                        return $key;
                  }
                 
                  
                  


?>
