
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
             $check=mysqli_query($con,"SELECT * FROM request WHERE req_id='$id'");
             if(mysqli_num_rows($check)==1){
               while($get=mysqli_fetch_assoc($check))
               {
                 $name=$get['name'];
                 $title=$get['title'];
                 $desc=$get['request_detail'];
                 $phone=$get['phone'];
                // $college=$get['college'];
                 $town=$get['town'];
                 $state=$get['state'];
                 
                 
              echo"<table>
               <tr><td>Title         :</td><td>$title</td></tr>
               <tr><td>Description   :</td><td>$desc</td></tr>
             
               </table>
               <table>
               <tr><strong>Information of the person Requeting</strong></tr>
               <tr><td>Name          :</td><td>$name</td></tr>
               <tr><td>Phone         :</td><td>$phone</td></tr>
            
               <tr><td>Town          :</td><td>$town</td></tr>
               <tr><td>State         :</td><td>$state</td></tr>
               
               
               
               
              
              
              </table>  ";
              
              
              
              
              
              
                 
             }
         }
     }
     }
     ?>
     
     
      <!---div1 ends--->
      
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
           
	  </div><!-- end row -->
	</section><!-- end content area -->   
      
      
    
      
  </div><!-- #end div #main .wrapper -->

 
 
<?php

include "./inc/foot.inc";
?>
