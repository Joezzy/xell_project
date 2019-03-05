<?php

include "./inc/head.inc";

?>


<body>
  
       <div id="main" class="wrapper">
 
<section id="content" class="wide-content">
      
	
	 <div class="grid_8">
            <!--div1 start-->
      
<?php
	//include('connect.php');
	 //if(isset($_GET ['submit'])){
	      
//if($_GET ['search']){
    
//$button = $_GET ['submit'];
$search = $_GET ['search'];
//$college= $_GET ['college'];
$search= stripslashes($search);
$search = mysqli_real_escape_string($con,$search);



	$tableName="sell";		
	$targetpage = "search.php"; 	
	$limit = 12;
	 $num=0;
	 
	 	 
	 $search_exploded = explode (" ",$search);
 for($i=0;$i<count($search_exploded);$i++)
{
	$query= "SELECT COUNT(*) as num FROM $tableName where sub_category LIKE '%$search_exploded[$i]%'
                   OR title LIKE '%$search_exploded[$i]%' OR description LIKE '%$search_exploded[$i]%'";	 
	
 }
 $total_pages = mysqli_fetch_array(mysqli_query($con,$query));
	$total_pages = $total_pages[$num];
	$stages = 3;
	if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	
       $start = ($page - 1) * $limit; 
			
    // Get page data
	//$query1 = "SELECT * FROM $tableName where username='$user' LIMIT $start, $limit";
	 for($i=0;$i<count($search_exploded);$i++)
{
	$result = mysqli_query($con,"SELECT * FROM  $tableName where sub_category LIKE '%$search_exploded[$i]%'
       OR title LIKE '%$search_exploded[$i]%' OR description LIKE '%$search_exploded[$i]%' LIMIT $start,$limit");
	 }
	// Initial page num setup
	if ($page == 0){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;					
	
	
	$paginate = '';
	if($lastpage > 1)
	{	
	

	
	
		$paginate .= "<div class='paginate'>";
		// Previous
		if ($page > 1){
			$paginate.= "<a href='$targetpage?search=$search&page=$prev'>previous</a>";
		}else{
			$paginate.= "<span class='disabled'>previous</span>";	}
			

		
		// Pages	
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page){
					$paginate.= "<span class='current'>$counter</span>";
				}else{
					$paginate.= "<a href='$targetpage?search=$search&page=$counter'>$counter</a>";}					
			}
		}
		elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
		{
			// Beginning only hide later pages
			if($page < 1 + ($stages * 2))		
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?search=$search&page=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage?search=$search&page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?search=$search&page=$lastpage'>$lastpage</a>";		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= "<a href='$targetpage?search=$search&page=1'>1</a>";
				$paginate.= "<a href='$targetpage?search=$search&page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?u=$search&page=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage?search=$search&page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?search=$search&page=$lastpage'>$lastpage</a>";		
			}
			// End only hide early pages
			else
			{
				$paginate.= "<a href='$targetpage?search=$search&page=1'>1</a>";
				$paginate.= "<a href='$targetpage?search=$search&page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?search=$search&page=$counter'>$counter</a>";}					
				}
			}
		}
					
				// Next
		if ($page < $counter - 1){ 
			$paginate.= "<a href='$targetpage?search=$search&page=$next'>next</a>";
		}else{
			$paginate.= "<span class='disabled'>next</span>";
			}
			
		$paginate.= "</div>";		
	
	
}
 echo $total_pages.' Results for "'.$search.'"';
 // pagination

?>

<ul>

<?php 
 

		while($row = mysqli_fetch_array($result))
		{
		                                  
   $iid=$row['ads_id'];
                                            $title=$row['title'];
                                            $prize=$row['prize'];
                                      //      $iimg=$row['item_pix'];
		                                           $iimg=$row['item_pix'];
echo"
     
<a href='detail.php?u=$iid'><div class='mimg'>
            <img src='$iimg'>
                
		
		 <div class='desc'>
		<font>Name :$title</font><br>
		<font>Price :$prize</font>
		
		</div></div>
	
    </a>
    ";
    
		}
	
	?>
</ul>
	
    
<div class='grid_12'><?php
	     echo $paginate;  
	      
//}
	 ?></div>
        </div>

	
	
	
        <div class="grid_4">
     <div class="grid_12">
   
        	<h1 class="first-header">Latest Request</h1>
           
    
            
<?php

                                    $q = mysqli_query($con,"SELECT * FROM request  ORDER BY id DESC LIMIT 5");
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
                                        
				?>
	
	    
	</div>
     <center><a href='request_show.php' class="a a--nalz" data-text="More Request"><span>More Request</span></a></center>
        </div>
        
	
        </div>
        </div>
        
        
        
      
      <?php
      include "./inc/foot.inc";
      ?>
