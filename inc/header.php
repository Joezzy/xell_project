<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>Xell</title>
<meta name="description" content="xell.com buy and sell in nigeria">
<meta name="keywords" content="xell buy and sell in nigeria and in higher institutions">

<!-- Mobile viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">

<link rel="shortcut icon" href="images/title.png"  type="image/x-icon">
<!-- CSS-->
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="./css/styles.css"/>
<link rel="stylesheet" type="text/css" href="css/style2.css">
<link rel="stylesheet" href="css/normal.css">
<link rel="stylesheet" href="css/indexx.css">
<link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/search.css">

<!-- end CSS-->
    

</head>

  
  <div class="wrapper">
       <div class="row"> 
        <div >
            
	    
           <a href="index.php"><img src="./images/xell.png"></a>

                  </div>
        
        </div><!-- end row -->
       </div><!-- end wrapper -->
    
    
  </div>
  
<?php
//rnheader.php


include('config.php');

//ob_start();

	session_start();
	//shop not login  users from entering
        
	if(isset($_SESSION['id'])){

		$user_id = $_SESSION['id'];
                //$user="";
              
                $user= $_SESSION['username'];
                
	}else{
		header("Location: login.php");
	}
?>
<!-- header area -->
    <header class="wrapper clearfix">
         
        <!-- main navigation -->
        <nav id="topnav" role="navigation">
          <div class="menu-toggle"><img src="./images/menu.png" /></div>  
          <ul class="srt-menu" id="menu-main-navigation">
   
          <li><a href='index.php'>Home page</a></li>    
	<li><a href='myads.php'>My Ads</a></li>
	<li><a href='myrequest.php'>My Request</a></li>
	<li><a href='edit_profile.php'>Edit Profile</a></li>
	
	<li><a href='sell.php'>Sell</a></li>
	<li><a href='Request.php'>Request</a></li>
	<li><a href='message.php'>Message</a></li>
              <li><a href="logout.php">Logout</a></li>
               <li class="current"><a href='home.php'><?php echo $user ?>'s Profile</a></li>
                  
          </ul>     
		</nav><!-- end main navigation -->
  
    </header><!-- end header -->
 
 
 
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.9.0.min.js">\x3C/script>')</script>


<!-- fire ups - read this file!  -->   
<script src="js/main.js"></script>
 
