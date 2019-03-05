<?php
include "./inc/header.php";
?>


<?php
$q = mysqli_query($con,"SELECT * FROM members WHERE user='$user'");
					//display all the results
                                        //show all the users expect me
					while($row = mysqli_fetch_assoc($q)){                                        
                                            $emaill=$row['email'];
                                              $namee=$row['name'];
                                          
                                            $phonee=$row['phone'];
                                            $lga=$row['lga'];
                                        }
                                        ?>

<body id="home">
  

<!-- main content area -->   
<div id="main" class="wrapper">
    
    
<!-- content area -->    
	<section id="content" class="wide-content">
      <div class="row">	
        <div class="grid_4">
       <h1>Change password</h1>

            <form class="form-mini" method="post" action="edit_profile.php">

            
<?php
///
//pass
//include "f_header.php";
if(isset($_POST['pass_update']))
{
    //pass var//
       $old_password=strip_tags(@$_POST['oldpass']);
    $new_password=strip_tags(@$_POST['pass1']);
    $repeat_password=strip_tags(@$_POST['pass2']);
    
        $password_query=mysqli_query($con,"SELECT * FROM members WHERE user='$user'");
            while($row=mysqli_fetch_assoc($password_query)){
                $db_password=$row['password'];
                //hash input
                $old_password_md5=md5($old_password);
                //check old password
                if($old_password_md5==$db_password){
                    
                    if($new_password==$repeat_password){
                        //md5 new pass
                        if(strlen($new_password)<=6){
                            echo"Sorry! your password <br/>should be above six";
                        }
                        else{
                        $new_password_md5=md5($new_password);
                        //update
                       $password_update_query=mysqli_query($con,"UPDATE members SET password='$new_password_md5'
                                                          WHERE user='$user'");
                       echo"Password changed Successful";
                        }
                    }else{
                        echo"your two new password dont match";
                    }
                }
                else
                {
                    echo"The password doesnt match the current password";
                }
            }
      
    }
    else{
        //echo"enter data";
    }
?>

            
                 <div class="form-row">
                    <input type="password" name="oldpass"  placeholder="Current password">
                </div>
               
                <div class="form-row">
                    <input type="password" name="pass1" placeholder="New Password">
                </div>

                <div class="form-row">
                    <input type="password" name="pass2" placeholder="Confirm-new password">
                </div>
  
                <div class="form-row form-last-row">
                    <button type="submit" name="pass_update">Change password</button>
                </div>
            </form>
       
       
       
        </div>
        
        <div class="grid_4">
            <!--middle one start-->
	       <h1>Update profile </h1>

           <form class="form-mini" method="post" action="edit_profile.php">

<?php

// $code = addslashes(strip_tags($_POST['gen']));
 
 //$email = addslashes(strip_tags($_POST['email']));


if(isset($_POST['update']))
{
$name=($_POST['name']);
$email=($_POST['email']);
$mobile=($_POST['mobile']);
$lga=($_POST['lga']);
$state=($_POST['state']);
	if($name ==""  ||$email=="" || $mobile=="" || $lga=="")
        {
		echo "All fields must be completed please<br/>";
        }
        else
        {
 
     $profile_update=mysqli_query($con,"UPDATE members SET name='$name',email='$email',lga='$lga',state='$state',phone='$mobile'
                                 WHERE user='$user' ");
                       echo"profile update Successful!";
                       //header("Location:edit_profile.php?id=$user");            
                
		
        }
}


?>
                <div class="form-row">
                    <input type="text" name="name" value="<?php echo $namee; ?>" placeholder="Name">
                </div>
                
   
                   <div class="form-row">
                    <input type="text" name="mobile" value="<?php echo $phonee; ?>" placeholder="Phone number">
                </div>
                    
                <div class="form-row">
                    <input type="email" name="email" value="<?php echo $emaill; ?>" placeholder="Your Email">
                </div>

              
              <div class="form-row">
                    <label>State</label><br/>
             <select name="state" onchange="changeContent(this.value)">

<?php



$sql = "select * from states";

$result = mysqli_query($con,$sql);

while ($ary = mysqli_fetch_array($result)){

	echo "<option value=\"" . $ary['id']  . "\">" . $ary ['state']  . "</option>";
}
?>
		    <input name='statte' type='hidden' value=''/>




             </select>
                    
                </div>
                 <label>LGA</label><br/>
                 <select name="lga" id="options2">
                 <option><?php echo $lga; ?></option>

	</select>

              
              
                 
               
               
                <div class="form-row form-last-row">
                    <button type="submit" name="update">Update</button>
                </div>



            </form>

           <!--middlle ends-->
	</div>
        
        <div class="grid_4">
        	
<!----regform--start-->
      
        <!--reg form endz-->
 </div>
	</section><!-- end content area -->   
      
      
    
      
  </div><!-- #end div #main .wrapper -->


<!-- footer area -->    
<footer>
	<div id="colophon" class="wrapper clearfix">
    	Nalzsoft 2016
    </div>
    
</footer><!-- #end footer area --> 

</body>
</html>


<script type="text/javascript">
function changeContent(str)
{
if (str=="")
  {
	// if blank, we'll set our innerHTML to be blank.
	document.getElementById("options").innerHTML="";
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
		document.getElementById("options").innerHTML=xmlhttp.responseText;
    }
  }
 // use our XML HTTP Request object to send a get to our content php. 
xmlhttp.open("GET","getlist.php?id="+str, true);
xmlhttp.send();
}
</script>


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
xmlhttp.open("GET","getlist2.php?id="+str, true);
xmlhttp.send();
}
</script>