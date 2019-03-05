<?php
		     include("./inc/config.php");

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
