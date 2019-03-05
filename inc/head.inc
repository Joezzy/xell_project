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

<title>xell</title>
<meta name="description" content="xell.com buy and sell in nigeria">
<meta name="keywords" content="mammy buy and sell in nigeria and in higher institutions">

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
<link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/search.css">
	<!--social css--->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />

<link rel="stylesheet" href="css/normalize.css">
<!-- end JS-->



<!-- end CSS-->
    

</head>
<div class="search-form" > 
  
 
      
      <form class="clear" method="get" action="search.php">
       
        
          <input type="text" value="" name='search' placeholder="What do you want?">
          <button  type="submit"  name='submit' title="Search">Search</button>
       
      </form>
      
    
  </div>

  

    <!-- responsive FlexSlider image slideshow -->
    <div class="wrapper">
      
       <div class="row">

           <a href="index.php"> <img src="./images/xell.png" ></a>
<a href='http://www.linkedin.com'><div style='font-size:35px;' class="fa fa-facebook fa-color_linkedin fa-5x"></div></a>&nbsp; &nbsp; &nbsp;&nbsp;
<a href='http://www.google.com'><div style='font-size:25px;' class="fa fa-google-plus fa-color_gplus fa-3x"></div></a>&nbsp;&nbsp; &nbsp;&nbsp;
<a href='http://www.linkedin.com'><div style='font-size:25px;' class="fa fa-linkedin fa-color_linkedin fa-3x"></div></a>&nbsp;&nbsp; &nbsp;&nbsp;
<a href='http://www.pinterest.com'><div style='font-size:25px;' class="fa fa-pinterest fa-color_pintrest fa-3x"></div></a>&nbsp;&nbsp; &nbsp;&nbsp;
<a href='http://www.twitter.com'><div style='font-size:25px;' class="fa fa-twitter fa-color_twitter fa-3x"></div></a>

	 
  
 <!-- main navigation -->
        <nav id="topnav" role="navigation">
          <div class="menu-toggle"><img src="./images/menu.png" /></div>  
          <ul class="srt-menu" id="menu-main-navigation">

     <li class=""><a href="index.php"><div class="fa fa-home fa-2x"></div></a></li>
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
?></li>
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
?></li>
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
?></li>
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
?></li>
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
		     </ul>
		  
		  <li class=><a href='request_show.php'>Requests</a></li>
         
	       
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

          </ul>     
		</nav><!-- end main navigation -->
  

    </header><!-- end header -->
    

 
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.9.0.min.js">\x3C/script>')</script>


<!-- fire ups - read this file!  -->   
<script src="js/main.js"></script>


    
    
 


    

        
        

  