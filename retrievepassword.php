<?php
     include("./inc/head.inc");
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
          
          <form class="form-mini" method="post" action="retrievepassword.php">
              
           
              
           <div class="form-row">
                    <input type="text" name="email" placeholder="Enter e-mail address">
                </div>

               

                           
                <div class="form-row form-last-row">
                    <button type="submit" name="send">Send to E-mail</button>

                               
<?php


if(isset($_POST['send']))
{

$to=($_POST['email']);




$to = mysqli_real_escape_string($con,stripslashes($to));
$subject="Retrieved Password from xell.com.ng";

$message="msg";
$headers="From: name@domain.com";
$mail = mail( $to, $subject , $message, $headers );

echo $mail ? "Mail sent! please check your inbox and spam folder" : "Mail failed";

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
?>



