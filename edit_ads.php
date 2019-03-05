
<?php

include "./inc/header.php";
?>



<body>
    
 
    
<!-- main content area -->   
<div id="main" class="wrapper">
    
    
<!-- content area -->    
	<section id="content" class="wide-content">
      <div class="row">
        
        <div class="grid_4">
            
        </div>
        <div class="grid_4">
     
<?php

if (isset($_GET['u'])){
   if($_GET['u']==""){
            header('location:myads.php');
   }
    $id=mysqli_real_escape_string($con,$_GET['u']);
    if(ctype_alnum($id)){
       
        //check user exists
        $check=mysqli_query($con,"SELECT * FROM sell WHERE id='$id'");
        if(mysqli_num_rows($check)==1){
          while($row=mysqli_fetch_assoc($check))
          {
            	 $iid=$row['id'];
		  $ads_id=$row['ads_id'];
                                            $title=$row['title'];
                                            $prize=$row['prize'];
                                            $iimg=$row['item_pix'];
                                            $desc=$row['description'];
                                            $sub_cat=$row['sub_category'];
                                            //$neg=$get['negotiable'];
          }
         
  ?>
            
          <form class='form-mini' method='post'  action='edit_ads.php'>
           
             <div class='form-row'>
                     <img src="<?php echo $iimg ?>"  style="width:100%; height:250px" align="center">

                       </div>
             
            
  <input type="hidden" name='adsid' placeholder='Title' value="<?php echo $ads_id; ?>"/>
             <input type="hidden" name='idd' placeholder='Title' value="<?php echo $id; ?>"/>
                 <div class='form-row'>
                    <input type='text' name='title' placeholder='Title' value="<?php echo $title; ?>"/>
                </div>
                 
               
                
                   
                      <div class='form-row'>
                    <input type='text' name='price' placeholder='Price' value="<?php echo $prize; ?>"/>
                </div>
                
               
                
                
                   <div class="form-row">
                    <input type="text" name="desc" placeholder="Description" value="<?php echo $desc; ?>">
                </div>
                  
                
                           
               
               
                <div class="form-row">
                
              <div class="form-row">
             <select name="negot" ">
             <option>Negotiable</option>
             <option>Not negotiable</option>
             </select>
             </div>


               <div class="form-row">
                    <label>Category</label><br/>
             <select name="cat" onchange="changeContent(this.value)">

<?php


$sql = "select * from item_cats";
$result = mysqli_query($con,$sql);
while ($ary = mysqli_fetch_array($result)){
	echo "<option value=\"" . $ary['id']  . "\">" . $ary ['category']  . "</option>";
}


//mysql_close($link);


?>
             </select>
                    
                </div>
                 <label>Sub-category</label><br/>
                 <select name="subcat" id="options">
                     <option><?php echo $sub_cat; ?></option>

	</select>


               
                <div class='form-row form-last-row'>
                    <button type='submit' name='send'>Update ads</button>
                </div>
<div class='form-row form-last-row'>
                    <button type='submit' name='delete'>Delete ads</button>
                </div>
                               
                </form>
  
         
         <?php
               
          }
}
}
 

?>

 <!---div1 ends--->

  </div>
        <div class="grid_4">
           
            
        </div>
           
	  </div><!-- end row -->
	</section><!-- end content area -->   
      
      
    
      
  </div><!-- #end div #main .wrapper -->

 
<?php

if(isset($_POST['send']))
{
   $idd=($_POST['idd']);
$titlee=($_POST['title']);
$price=($_POST['price']);
 $desc=($_POST['desc']);
$negot=($_POST['negot']);
$cat=($_POST['cat']);
$subcat=($_POST['subcat']);

  $titlee = stripslashes($titlee);
$desc= stripslashes($desc);
 $price = stripslashes($price);
$negot= stripslashes($negot);
 $cat = stripslashes($cat);
$subcat= stripslashes($subcat);

$titlee = mysqli_real_escape_string($con,$titlee);
$desc = mysqli_real_escape_string($con,$desc);
$price = mysqli_real_escape_string($con,$price);
$negot = mysqli_real_escape_string($con,$negot);
$cat = mysqli_real_escape_string($con,$cat);
$subcat = mysqli_real_escape_string($con,$subcat);


	if($titlee=="" || $price=="" || $desc=="" || $subcat=="")
        {
		echo "All fields must be completed please<br/>";
        }
        else
        {
 
     $profile_update=mysqli_query($con,"UPDATE sell SET title='$titlee',prize='$price', description='$desc', negotiable='$negot',
                                category='$cat', sub_category='$subcat' WHERE id='$idd'");
                       echo"Ads update Successful!";
  
	 header('location:myads.php');	
        }
}
?>
 
 
 
<?php

include "./inc/foot.inc";
?>

<?php
if(isset($_POST['delete']))
{
    $id=($_POST['idd']);
    
    $adsid=($_POST['adsid']);
    
  //  $id=mysql_real_escape_string($_POST['id_']);
$delete = "DELETE FROM `sell` WHERE id='$id'";
$delete2 = "DELETE FROM `msg` WHERE ads_id='$adsid'";
mysqli_query($con, $delete);
mysqli_query($con, $delete2);
 header('location:myads.php');

}
    
    ?>


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
xmlhttp.open("GET","get_cat.php?id="+str, true);
xmlhttp.send();
}
</script>