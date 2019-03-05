<?php
     include "./inc/header.php";
?>

    <link rel="stylesheet" type="text/css" href="css/style2.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">




<body>
<!-- main content area -->   
<div id="main" class="wrapper">
    
    
<!-- content area -->    
	<section id="content" class="wide-content">
      <div class="row">	
        <div class="grid_4">
            
	     <h1>Profile</h1>
<?php

$result=mysqli_query($con,"SELECT * FROM members WHERE user='$user'") or die(mysqli_error());

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
while($rows = mysqli_fetch_assoc($result)){                                     
$id = $rows['id'];
$name = $rows['name'];
$college=$rows['college'];
//$lga=$rows['lga'];
$phone=$rows['phone'];
$email=$rows['email'];     

}

//$result2=mysqli_query($con,"SELECT * FROM states WHERE s_id='$state1'") or die(mysqli_error());

// Mysql_num_row is counting table row
//$count=mysqli_num_rows($result2);
//while($rows = mysqli_fetch_assoc($result2)){                                     

//$state2=$rows['state'];
//}

echo"
                
        <table>
        
        <tr><td width='150px'><strong>Name</strong>        :</td><td>$name</td></tr>
       
         <tr><td><strong>Phone</strong>        :</td><td>$phone</td></tr>
         <tr><td><strong>Email</strong>        :</td><td>$email</td></tr>
      
	          <tr><td><strong>Institution</strong>        :</td><td>$college</td></tr>

         <tr><td><br/><br/><br/></td></tr>
         
        
        </table>
                ";
?>

       
         
      
	 
        <!--1st col-->
        <!----profile--start-->
           <!--middlle ends-->
        <!--col1 end-->
        </div>
        
        <div class="grid_4">
            <!--middle one start-->
	 
    
	</div>
        
        <div class="grid_4">
        	<!--3rd col-->
                
 
        </div>
        
	</section><!-- end content area -->   
      
      
    
      
  </div><!-- #end div #main .wrapper -->


 
<?php

include "./inc/foot.inc";
?>
