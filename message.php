<?php
     include("./inc/header.php");
?>

<link rel="stylesheet" type="text/css" href="css/style2.css">



<!-- main content area -->   
<div id="main" class="wrapper">
    
    
<!-- content area -->    
	<section id="content" class="wide-content">
      <div class="row">	
        <div class="grid_4">
            
        <!--1st col-->
	<?php
                    $sql3="SELECT * FROM sell where user='$user'";
$result3=mysqli_query($con,$sql3);

$count_user_online=mysqli_num_rows($result3);

echo "<h3>$count_user_online Ads</h3><hr/>";
?>


			
				<?php
                                
					//show all the users expect me
					$q = mysqli_query($con,"SELECT * FROM sell WHERE user='$user'");
					//display all the results
					while($row = mysqli_fetch_assoc($q))
					{
					echo" 
<a href='message.php?id={$row['ads_id']}'>
<div class='req-detail'>
            <div class='desc'><img  style='width:50px; height:50px;' src='{$row['item_pix']}'> {$row['title']}
	    </div>
        </div>
    </a> ";
		
					
								
					}
				?>
	
        <!--col1 end-->
        </div>
        
        <div class="grid_4">
            <!--middle one start-->
           
                             
			<?php
				//check $_GET['id'] is set
				if(isset($_GET['id'])){
					$ads_id = trim(mysqli_real_escape_string($con,$_GET['id']));
					//check $user_two is valid
					$q = mysqli_query($con,"SELECT * FROM msg WHERE ads_id='$ads_id'");

                                        while($row = mysqli_fetch_assoc($q)){
                                            
                                            $email=$row['email'];
                                            $title=$row['title'];
                                            $content=$row['content'];
                                            $tym=$row['senttime'];
                                            
		
echo "message for <i><b>$title</b></i>";
echo"
<div style='border-style:solid; border-width:1px; border-radius:10px; padding:5px; '>
		<label style='font-size:10px'>Email :$email<label><br/>
		<label style='font-size:10px'>Recieved :$tym<label><br/>
		<label style='font-size:15px;'>Message   : $content<label>
	
  </div>";
  
  
					}
                                        
                                }
			?>

           <!--middlle ends-->
	</div>
        
        <div class="grid_4">
        	
<!--3rd col-->
 
        </div>
        
	</section><!-- end content area -->   
      
      
    
      
  

      </div>
<?php

include "./inc/foot.inc";
?>


<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
        