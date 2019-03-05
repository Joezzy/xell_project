<style>
  
        </style>

<?php
include"./inc/head.inc";
?>
    

		
   
   
   
   
<link rel="stylesheet" type="text/css" href="css/style2.css">



<body>



<!-- main content area -->   
<div id="main" class="wrapper">
    
    
<!-- content area -->    
	<section id="content" class="wide-content">
      <div class="row">
	 
	<div class="grid_12">
        
        	<h1 class="first-header">Latest Ads</h1>
         <div class="cont">	
 <?php
  $sql = "select * from sell ORDER BY id DESC LIMIT 20";
$rsd = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($rsd)){
                                         
   $iid=$row['ads_id'];
                                            $title=$row['title'];
                                            $priz=$row['prize'];
                                            $iimg=$row['item_pix'];
					    $prize= number_format($priz);
echo"
<a href='detail.php?u=$iid'>
<div class='img'>
            <img src='$iimg'>
                
             <div class='desc'><font color='black'>Title:</font>$title<br>
	    <font color='black'>Price:</font>&#8358 $prize</div>
        </div></a>
    
    ";
    }
    
              ?>                         
</div>


	<?php

include "./inc/foot.inc";
?>
