<?php
include"./inc/head.inc";
?>

  
    <body>
<!-- content area -->
<div id="main" class="wrapper">
	<section id="content" class="wide-content">
      <div class="row">	
        <div class="grid_6">
            
<!log in starts-->
           

            <form class="form-mini" method="post" action="login.php">
                     <h1> Sign in</h1>
                <div class="form-row">
                    <input type="text" name="username" placeholder="Username">
                </div>

                <div class="form-row">
                    <input type="password" name="password" placeholder="Password">
                </div>

               

                           
                <div class="form-row form-last-row">
                    <button type="submit" name="signin">Log in</button>

                  <a href="retrievepassword.php">  you forgot your password?</a>
                </div>

                
                
<?php
ob_start();
if(isset($_POST['signin']))
{

 // username and password sent from form
$username= $_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con,$password);

$pass_md5=md5($password);
// check if supplied details exist
$result=mysqli_query($con,"SELECT * FROM members WHERE user='$username' 
AND password='$pass_md5'") or die(mysql_error());

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
$rows = mysqli_fetch_array($result);
$id = $rows['id'];
$name = $rows['user'];
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
	// Register $myusername, $mypassword and redirect to file "home.php"
	$_SESSION['id'] = $id;
	$_SESSION['username'] = $name;
	
	header("location:home.php");
}
else {
	echo "Wrong Username or Password";
}
}




?>
                
            </form>
   <!--log in endz-->
       
        	
        </div>
        
        
        <div class="grid_6">
        	
<!----regform--start-->


           <form class="form-mini" method="post" action="login.php">
                            <h1>Register </h1>
<?php



if(isset($_POST['signup']))
{
	//$tm=($_POST['terms']);
	if (empty($_POST['terms'])){
		//echo "<p>Please read and accept our terms and conditions</p>";
		
		
		 echo "<script type='text/javascript'>
                window.alert(' Please read and accept our terms and conditions! ');
                </script>";
		
		
	}
	else{
		
$name=($_POST['name']);
$uname=($_POST['uname']);
$college=($_POST['college']);
$email=($_POST['email']);
$pass=($_POST['pass']);
$pass2=($_POST['pass2']);
$mobile=($_POST['mobile']);
//$state=($_POST['muppetname']);
//$lga=($_POST['lga']);

$name = stripslashes($name);
$uname = stripslashes($uname);
$college = stripslashes($college);
$email = stripslashes($email);
$pass = stripslashes($pass);
$pass2 = stripslashes($pass2);
$mobile= stripslashes($mobile);
//$state = stripslashes($state);
//$lga= stripslashes($lga);

$name = mysqli_real_escape_string($con,$name);
$uname = mysqli_real_escape_string($con,$uname);
$college = mysqli_real_escape_string($con,$college);
$email = mysqli_real_escape_string($con,$email);
$pass = mysqli_real_escape_string($con,$pass);
$pass2 = mysqli_real_escape_string($con,$pass2);
$mobile = mysqli_real_escape_string($con,$mobile);



	if($name =="" || $pass=="" ||$pass2=="" || $uname =="" ||$college =="" || $email=="" || $mobile=="")
        {
		echo "All fields must be completed please<br/>";
                }
   elseif($pass!=$pass2){
	echo"password does not match";
          
   }
  else
        {
//

          $check = mysqli_query($con,"SELECT * FROM members WHERE user='$uname'");
    if (mysqli_num_rows($check)>=1)
    {
       echo "Username already taken";
       }
        else
        {
      $pass_md5=md5($pass);
		$insert = "INSERT INTO members (name,user,password,email,phone,college)
VALUES ('$name','$uname','$pass_md5','$email','$mobile','$college')";
		mysqli_query($con,$insert) or die('Cannot add record '.mysqli_error());
		
             echo "<script type='text/javascript'>
                window.alert(' Successful! you can now login ');
                </script>";
		
        }
}
}

}
?>
                <div class="form-row">
                    <input type="text" name="name" placeholder="Name">
                </div>
                
                 <div class="form-row">
                    <input type="text" name="uname" placeholder="Username">
                </div>
                 
                  <div class="form-row">
                    <input type="password" name="pass" placeholder="Password">
                </div>
                  
                   <div class="form-row">
                    <input type="password" name="pass2" placeholder="Confirm-Password">
                </div>
   
                   <div class="form-row">
                    <input type="text" name="mobile" placeholder="Phone number">
                </div>
                    
                <div class="form-row">
                    <input type="email" name="email" placeholder="Your Email">
                </div>

              
                 <div class="form-row">
                    <label>Institution type</label><br/>
             <select name="muppetname" onchange="changeContent(this.value)">
<option> </option>
<?php



$sql = "select * from college_cat";

$result = mysqli_query($con,$sql);

while ($ary = mysqli_fetch_array($result)){

	echo "<option value=\"" . $ary['id']  . "\">" . $ary ['typ']  . "</option>";
}


//mysql_close($link);


?>
             </select>
                    
                </div>
                 <label>Institution</label><br/>
                 <select name="college" id="options2">
                 <option><?php// echo $town; ?></option>

	</select>

              
              
                 <div class="form-row">
             
	      <div class="form-row form-last-row">
                    <input type="checkbox" name="terms" value="yes" />checking this box  means u
		    accept our<br/> <a href="terms.php">Terms & Conditions </a>
                </div>
               
	       
                <div class="form-row form-last-row">
                    <button type="submit" name="signup">Submit Form</button>
                </div>
		 </div>


            </form>

        <!--reg form endz-->
 </div>
	
	
	</section><!-- end content area -->   
      
      
    
      
  </div><!-- #end div #main .wrapper -->


<!-- footer area -->   <?php

include "./inc/foot.inc";

?>





<script type="text/javascript">
function changeContent(str)
{
if (str=="")
  {
	// if blank, we'll set our innerHTML to be blank.
	document.getElementById("options2").innerHTML="";
	return;
  } 
if (window.XMLHttpRequest)
	{	// code for IE7+, Firefox, Chrome, Opera, Safari
		// create a new XML http Request that will go to our generator webpage.
		xmlhttp=new XMLHttpRequest();
	}
else
	{	// code for IE6, IE5
		// create an activeX object
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	// on state change
	xmlhttp.onreadystatechange=function()
	{
	// if we get a good response from the webpage, display the output
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		document.getElementById("options2").innerHTML=xmlhttp.responseText;
    }
  }
 // use our XML HTTP Request object to send a get to our content php. 
xmlhttp.open("GET","getlist.php?id="+str, true);
xmlhttp.send();
}
</script>