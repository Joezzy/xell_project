
<?php

include "./inc/head.inc";
?>



<body>
    
 
    
<!-- main content area -->   
<div id="main" class="wrapper">
    
    
<!-- content area -->    
	<section id="content" class="wide-content">
      <div class="row">
        
      <div class="grid_4">
     
<?php

if (isset($_GET['u'])){
     if($_GET['u']==""){
            header('location:index.php');
   }
    $id=mysqli_real_escape_string($con,$_GET['u']);
    if(ctype_alnum($id)){
        //check user exists
        $check=mysqli_query($con,"SELECT * FROM sell WHERE ads_id='$id'");
            
            
        if(mysqli_num_rows($check)==1){
          while($get=mysqli_fetch_assoc($check))
          {
            $ads_id=$get['ads_id'];
            $user=$get['user'];
            $name=$get['name'];
            $title=$get['title'];
            $priz=$get['prize'];
            $desc=$get['description'];
            $neg=$get['negotiable'];
            $phone=$get['phone'];
            $college=$get['college'];
            //$college=$get['lga'];
           // $state=$get['state'];
            $pix=$get['item_pix'];
	      $prize= number_format($priz);
          }

         ?>
        
         <table>
          <tr><img src='<?php echo $pix; ?>' width='200px' height='200px'/></tr>
          <tr><td>Title         :</td><td><?php echo $title; ?></td></tr>
          <tr><td>Description   :</td><td><?php echo $desc; ?></td></tr>
          <tr><td>Prize         :</td><td>&#8358 <?php echo $prize; ?></td></tr>
	  <tr><td><font color='red'><?php echo $neg; ?></font></td></tr>
        
          </table>
          <table>
          <tr><strong>Advertiser's Information</strong></tr>
          <tr><td>Advertiser    :</td><td><?php echo $name; ?></td></tr>
          <tr><td>Phone         :</td><td><?php echo $phone; ?></td></tr>
	  <tr><td>Institution         :</td><td><?php echo $college; ?></td></tr>



         </table>  
    <?Php     
            
        } 
}
}
?>
 <!---div1 ends--->
 
            
 <form  method="post" id="showme" action="detail.php?u=<?php echo $ads_id; ?>">
          <h3>Message Ads</h3>
           <input name='adsid' type='hidden' value='<?php echo $ads_id; ?>'/>
            <input name='user' type='hidden' value='<?php echo $user; ?>'/>
             <input name='title' type='hidden' value='<?php echo $title; ?>'/>
                <div class="form-row">
                    <input type="email" name="email" placeholder="Your Email"
                           style="border:none; border-color: #0099ff; border-style: solid; border-width: 2px;">
                </div>

		                <div class="form-row">
                    <input type="text" name="phone" placeholder="Phone" alt='enter only numbers'
                           style="border:none; border-color: #0099ff; border-style: solid; border-width: 2px;">
                </div>
				
                   <div class="form-row">
                    <textarea name="texxt" placeholder="Content" height="200px"
                              style="font-size: 10px; width: 143px; border:none; border-color: #0099ff; border-style: solid; border-width: 2px;"></textarea>
                </div>
              
                
                <div class="form-row form-last-row">
                      <input id="send" name="sennd" value="Send" type="submit" class="btn"">
   
                     
                </div>


                <?php
                
    if(isset($_POST['sennd']))
        {
    

    $email=($_POST['email']);
    $text=($_POST['texxt']);
    $title=($_POST['title']);
     $ads_id=($_POST['adsid']);
      $user=($_POST['user']);
      $phone=($_POST['phone']); 
    $email= stripslashes($email);
    $text= stripslashes($text);

    
    $phone = mysqli_real_escape_string($con,$phone);
    $email = mysqli_real_escape_string($con,$email);    
  $ads_id = mysqli_real_escape_string($con,$ads_id);
    $title = mysqli_real_escape_string($con,$title);
    $text = mysqli_real_escape_string($con,$text);

	if($email=="" || $text=="" || $phone="")
        {
		echo "Please fill the email and text<br/>";
        }
        else
        {
  $insert = "INSERT INTO msg (ads_id,user,title,email,phone,content)
VALUES ('$ads_id','$user','$title','$email','$phone','$text')";
		mysqli_query($con,$insert) or die('Cannot add record '.mysqli_error());
		
                echo "<br/><br/><br/>Message sent successfully";
               // header('locatio:detail.php?u=$ads_id');
        
		}
    }
?>
 
        </form>
        
      
      <!---div1 ends--->
      
       </div>
           


        <div class="grid_4">

               <div class="grid_12">
        	<h1 class="first-header">Latest Ads</h1>
           
    
            
<?php
                                    $q = mysqli_query($con,"SELECT * FROM sell  ORDER BY id DESC LIMIT 6");
					//display all the results
                                        //show all the users expect me
					while($row = mysqli_fetch_assoc($q)){
                                      $iid=$row['ads_id'];
                                            $title=$row['title'];
                                            $prize=$row['prize'];
                                            $iimg=$row['item_pix'];
echo"
     
<a href='detail.php?u=$iid'><div class='mimg'>
            <img src='$iimg'>
                
            <div class='desc'><font color='black'>Title:</font>$title<br>
	    <font color='black'>Price:</font>$prize</div>
        </div>
    </a>
    ";
  
					}

				?>
	
       <div class='grid_12'><center><a href='ads.php'>See more...</a></center></div>   
	</div>
        </div>
      
	 <div class="grid_4">
   
        	<h1 class="first-header">Latest Request</h1>
           
    
            
            <?php
                                    $q = mysqli_query($con,"SELECT * FROM request  ORDER BY id DESC LIMIT 10");
					//display all the results
                                        //show all the users expect me
					while($row = mysqli_fetch_assoc($q)){
                                            
                                            $iid=$row['req_id'];
                                            $title2=$row['title'];
                                            $det=$row['request_detail'];
                                            
		echo" 
<a href='req_detail.php?u=$iid'>
<div class='req-detail'>
            <div class='desc'><font color='black'>Title:</font>$title2<br>
	    <font color='black'>Description:</font>$det</div>
        </div>
    </a> ";
					}
                                        echo"<a href='request_show.php'>See more...</a>";
				?>
	
	 
	    
	</div>
           
	  </div><!-- end row -->
	</section><!-- end content area -->   
      
      
    
      
  </div><!-- #end div #main .wrapper -->

 
 
<?php

include "./inc/foot.inc";
?>
