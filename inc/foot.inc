   
<!-- footer area -->    
<div class='foot'>
	
        	       
<?php
	if(isset($_SESSION['id'])){

		$user_id = $_SESSION['id'];
                //$user="";
              
                $user = $_SESSION['username'];
		echo" <a href='home.php' class='a a--nalz' data-text='$user  is logged on'><span> $user Account</span></a>";

                
	}else{
echo" <a href='login.php' class='a a--nalz' data-text='Login as member'><span> Login as member</span></a>";
	}
		 
		  ?>
        

        
         <a href='feedback.php' class="a a--nalz" data-text="Send Us feedback "><span> Feedback</span></a>
        <a href='terms.php' class="a a--nalz" data-text="Our Terms"><span> Terms & Condition</span></a>
       <a href='index.php' class="a a--nalz" data-text="&copy xell it 2018"><span> &copy xell 2018</span></a>
     
						
     					  
    	
   

</div><!-- #end footer area --> 

