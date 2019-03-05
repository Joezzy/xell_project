
<?php

include "./inc/config.php";
	      
ob_start();

	session_start();
	//shop not login  users from entering
        
	if(isset($_SESSION['id'])){

		$user_id = $_SESSION['id'];
                //$user="";
              
                $user = $_SESSION['username'];
                
	}else{

	}
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>Oorder</title>
<meta name="description" content="xell.com buy and sell in nigeria">
<meta name="keywords" content="xell buy and sell in nigeria and in higher institutions">

<!-- Mobile viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">

<link rel="shortcut icon" href="images/title.png"  type="image/x-icon">

<!-- CSS-->
<!-- Google web fonts. You can get your own bundle at http://www.google.com/fonts. Don't forget to update the CSS accordingly!-->
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="./css/styles.css"/>
<link rel="stylesheet" type="text/css" href="css/style2.css">
<link rel="stylesheet" href="css/normal.css">
<link rel="stylesheet" href="css/indexx.css">
    <link rel="stylesheet" href="css/search.css">

<!-- end CSS-->
    

</head>
<div class="search-form" > 
  
 
      
      <form class="clear" method="get" action="search_request.php">
       
        
          <input type="text" value="" name='search' placeholder="What do you want?">
          <button  type="submit"  name='submit' title="Search">Search</button>
       
      </form>
      
    
  </div>

  

    <!-- responsive FlexSlider image slideshow -->
    <div class="wrapper">
      
       <div class="row">

           <a href="index.php"> <img src="./images/xell.png" ></a>

	  <!-- main navigation -->
        <nav id="topnav" role="navigation">
	
          <div class="menu-toggle"><img src="./images/menu.png" ></div>
	  
          <ul class="srt-menu" id="menu-main-navigation">
	    
	
              <li class="current"><a href="index.php">Home</a></li>
              <li><a href="#">Automobile</a>
                  <ul>
                      <?php
        $check=mysqli_query($con,"SELECT * FROM  item_sub_cats WHERE cat_id='1'");
          while($get=mysqli_fetch_assoc($check))
          {
            $name=$get['sub_category'];
            
	echo"<li><a href='menu.php?u=$name'>$name</a></li>";
	//''echo "<option value=\"" . $ary['id']  . "\">" . $ary ['typ']  . "</option>";
}
?>
                  </ul>
              </li>
              <li>
                  <a href="#">Phones & Tablets</a>
                  <ul>
                        <?php
        $check=mysqli_query($con,"SELECT * FROM  item_sub_cats WHERE cat_id='2'");
          while($get=mysqli_fetch_assoc($check))
          {
            $name=$get['sub_category'];
            
	echo"<li><a href='menu.php?u=$name'>$name</a></li>";
	//''echo "<option value=\"" . $ary['id']  . "\">" . $ary ['typ']  . "</option>";
}
?>/a></li>
                  </ul>
              </li>
	      
              <li>
                 
                  <a href="#">Electronics</a>
                  <ul>
                        <?php
        $check=mysqli_query($con,"SELECT * FROM  item_sub_cats WHERE cat_id='3'");
          while($get=mysqli_fetch_assoc($check))
          {
            $name=$get['sub_category'];
            
	echo"<li><a href='menu.php?u=$name'>$name</a></li>";
	//''echo "<option value=\"" . $ary['id']  . "\">" . $ary ['typ']  . "</option>";
}
?>/a></li>
                  </ul> </li>
		  
		  
	       <li>
                  <a href="#">Services</a>
                  <ul>
                        <?php
        $check=mysqli_query($con,"SELECT * FROM  item_sub_cats WHERE cat_id='4'");
          while($get=mysqli_fetch_assoc($check))
          {
            $name=$get['sub_category'];
            
	echo"<li><a href='menu.php?u=$name'>$name</a></li>";
	//''echo "<option value=\"" . $ary['id']  . "\">" . $ary ['typ']  . "</option>";
}
?>/a></li>
                  </ul>
              </li>
	       
	       <li>
                 
                  <a href="#">Art & Sport</a>
                  <ul>
                        <?php
        $check=mysqli_query($con,"SELECT * FROM  item_sub_cats WHERE cat_id='5'");
          while($get=mysqli_fetch_assoc($check))
          {
            $name=$get['sub_category'];
            
	echo"<li><a href='menu.php?u=$name'>$name</a></li>";
	//''echo "<option value=\"" . $ary['id']  . "\">" . $ary ['typ']  . "</option>";
}
?>/a></li>
                  </ul> </li>
	       
	       <li>
                
                  <a href="#">Fashion</a>
                  <ul>
                        <?php
        $check=mysqli_query($con,"SELECT * FROM  item_sub_cats WHERE cat_id='6'");
          while($get=mysqli_fetch_assoc($check))
          {
            $name=$get['sub_category'];
            
	echo"<li><a href='menu.php?u=$name'>$name</a></li>";
	//''echo "<option value=\"" . $ary['id']  . "\">" . $ary ['typ']  . "</option>";
}
?></li>
                  </ul>  </li>
		  
		  	       <li>
                
                  <a href="#">Real Estate</a>
                  <ul>
                        <?php
        $check=mysqli_query($con,"SELECT * FROM  item_sub_cats WHERE cat_id='7'");
          while($get=mysqli_fetch_assoc($check))
          {
            $name=$get['sub_category'];
            
	echo"<li><a href='menu.php?u=$name'>$name</a></li>";
	//''echo "<option value=\"" . $ary['id']  . "\">" . $ary ['typ']  . "</option>";
}
?></li>
                  </ul>  </li>
		  
		  	       <li>
                
                  <a href="#">Jobs</a>
                  <ul>
                        <?php
        $check=mysqli_query($con,"SELECT * FROM  item_sub_cats WHERE cat_id='8'");
          while($get=mysqli_fetch_assoc($check))
          {
            $name=$get['sub_category'];
            
	echo"<li><a href='menu.php?u=$name'>$name</a></li>";
	//''echo "<option value=\"" . $ary['id']  . "\">" . $ary ['typ']  . "</option>";
}
?></li>
                  </ul> 	  <li class=><a href='request_show.php'>Requests</a></li>
         
	       
<?php
	if(isset($_SESSION['id'])){

		$user_id = $_SESSION['id'];
                //$user="";
              
                $user = $_SESSION['username'];
		echo" <li class='Current'><a href='home.php'>$user's home</a></li>";
                
	}else{
echo" <li class=''><a href='login.php'>Member Login</a></li>";
	}
		 
		  ?>
		</nav><!-- end main navigation -->
  
    </header><!-- end header -->
 
        <div >
          
                  </div>
        
        </div><!-- end row -->
       </div><!-- end wrapper -->
    
  </div>
<!-- header area -->
    <header class="wrapper clearfix">
		       
  
	 <div class='grid_4'>
	
	 
        </div>
      
	
	
        
        <!-- main navigation -->
<?php
	    

if (isset ($user_id))
    {
    
    $loggedin=TRUE;
   
    }
    else $loggedin=FALSE;
    echo"<html><head>
     
    <Title>$appname";
    if($loggedin) echo " ->($user)";
    
    echo"</title></head>
      
       <body><font face='' size='2'>";
        
    if ($loggedin)
        {
             // header("Location: home.php");
        //echo"<a href=\"home.php\"><input class=\"btn\" value=\"$user Home\" type=\"submit\"></a>";
    }
    else
    {
                 
        //echo"<a href=\"login.php\"><input class=\"btn\" value=\"Sell+\" type=\"submit\"></a>";
	 

    }

ob_flush();

	      
	      ?>
                  
          </ul>     
		</nav><!-- end main navigation -->
  
    </header><!-- end header -->
    
    
    
 


    

        
        

  


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
$search = mysql_real_escape_string($search);



	$tableName="request";		
	$targetpage = "search_request.php"; 	
	$limit = 12;
	 $num=0;
	 
	 	 
	 $search_exploded = explode (" ",$search);
 for($i=0;$i<count($search_exploded);$i++)
{
	$query= "SELECT COUNT(*) as num FROM $tableName where request_detail LIKE '%$search_exploded[$i]%'
                   OR title LIKE '%$search_exploded[$i]%' ";	 
	
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
	$result = mysqli_query($con,"SELECT * FROM $tableName
			      where request_detail LIKE '%$search_exploded[$i]%'
                   OR title LIKE '%$search_exploded[$i]%' LIMIT $start,$limit");
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
		                                  
					   $iid=$row['req_id'];
                                            $title2=$row['title'];
                                            $det=$row['request_detail'];
                                      //      $iimg=$row['item_pix'];
		                                       //    $iimg=$row['item_pix'];

		echo" 
<a href='req_detail.php?u=$iid'>
<div class='req-detail'>
            <div class='desc'><font color='black'>Title:</font>$title2<br>
	    <font color='black'>Description:</font>$det</div>
        </div>
    </a> ";
    
		}
	
	
	?>
</ul>
	
    
<div class='grid_12'><?php
	     echo $paginate;  
	      
//}
	 ?></div>
        </div>

	
	
	
        <div class="grid_4">
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
     
<a href='detail.php?u=$iid'><div class='img'>
            <img src='$iimg'>
                
            <div class='desc'><font color='black'>Title:</font>$title<br>
	    <font color='black'>Price:</font>$prize</div>
        </div>
    </a>
    ";
  
					}

				?>
	
	                                        <div class='grid_12'>
						  <center>
       <a href='ads.php' class="a a--nalz" data-text="More Ads"><span>More Ads</span></a>
						  </center></div>   
 </div>
        
	
        </div>
        </div>
        
        
        
      
      <?php
      include "./inc/foot.inc";
      ?>
