
<link rel="stylesheet" type="text/css" media="screen" href="css/page.css" />

</head>
<?php
include("./inc/header.php");
?>
<body>


<section id="content" class="wide-content">
	  <h1><?php echo $user;?>'s Request</h1>
	
	
      <div class="grid_4">
      </div>



        <div class="grid_4">
            <!--div1 start-->
      
<?php
	//include('connect.php');	

	$tableName="request";		
	$targetpage = "myrequest.php"; 	
	$limit = 10;
	const num=0;
	$query = "SELECT COUNT(*) as num FROM $tableName where user='$user'";
	$total_pages = mysqli_fetch_array(mysqli_query($con,$query));
	$total_pages = $total_pages[num];
	
	$stages = 3;

	if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	
		$start = ($page - 1) * $limit; 
			
    // Get page data
	//$query1 = "SELECT * FROM $tableName where username='$user' LIMIT $start, $limit";
	$result = mysqli_query($con,"SELECT * FROM $tableName WHERE user ='$user' LIMIT $start,$limit");
	
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
			$paginate.= "<a href='$targetpage?page=$prev'>previous</a>";
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
					$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
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
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= "<a href='$targetpage?page=1'>1</a>";
				$paginate.= "<a href='$targetpage?page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
			}
			// End only hide early pages
			else
			{
				$paginate.= "<a href='$targetpage?page=1'>1</a>";
				$paginate.= "<a href='$targetpage?page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
				}
			}
		}
					
				// Next
		if ($page < $counter - 1){ 
			$paginate.= "<a href='$targetpage?page=$next'>next</a>";
		}else{
			$paginate.= "<span class='disabled'>next</span>";
			}
			
		$paginate.= "</div>";		
	
	
}
 echo $total_pages.' Results';
 // pagination

?>

<ul>

<?php 
 

		while($row = mysqli_fetch_array($result))
		{
		                                  
   $iid=$row['id'];
                                            $title=$row['title'];
                                            $prize=$row['request_detail'];
                                      //      $iimg=$row['item_pix'];
		                            //               $iimg=$row['item_pix'];
echo" 
<a href='edit_req.php?u=$iid'>
<div class='req-detail'>
            <div class='desc'><font color='black'>Title:</font>$title<br>
	    <font color='black'>Description:</font>$prize</div>
        </div>
    </a> ";
    
		}
	
	?>
</ul>
	
    
<div class='grid_12'><?php
	     echo $paginate;  
	      
	      ?></div>
        </div>

</section>


<?php

include "./inc/foot.inc";
?>

