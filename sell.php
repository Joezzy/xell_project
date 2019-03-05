<?php
     include("./inc/header.php");
?>
<style>
#imagePreview {
    width: 180px;
    height: 180px;
    margin-left: 25px;
    border-style:solid;
    border-width:2px;
    border-radius:2px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>

 <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
 <script type="text/javascript">
$(function() {
    $("#uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>
<!-- main content area -->   
<div id="main" class="wrapper">
    
    
<!-- content area -->    
	<section id="content" class="wide-content">
      <div class="row">	
        <div class="grid_4">
            
        <!--1st col-->
        
        <!--col1 end-->
        </div>
        
        <div class="grid_4">
            <!--middle one start-->
	  	<!----regform--start-->
            <h1>Place Advert </h1>

           <form class="form-mini" method="post"  enctype="multipart/form-data" action="sell.php">
<div id="imagePreview"></div>

                <div class="form-row">
                    <input id="uploadFile" type="file" name="upload" placeholder="select item photo">
                </div>
                
                 <div class="form-row">
                    <input type="text" name="title" placeholder="Title">
                </div>
                 
               
            
                 <div class="form-row">
                    <input type="text" name="prize" placeholder="Prize">
                </div>
                  

                   <div class="form-row">
                    <input type="text" name="desc" placeholder="Description">
                </div>
                  
                
                           
               
               
                <div class="form-row">
                
                <div class="form-radio-buttons">

                    <div>
                        <label>
                            <input type="radio" name="negot" value="Negotiable"><span>Negotiable</span>
                            
                        </label>
                    </div>

                    <div>
                        <label>
                            <input type="radio" name="negot" value="Not negotiable"><span>Not negotiable</span>
                            
                        </label>
                    </div>


               <div class="form-row">
                    <label>Category</label><br/>
             <select name="cat" onchange="changeContent(this.value)">
	       <option></option>

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

	</select>


               
                <div class="form-row form-last-row">
                    <button type="submit" name="sell">Post Advert</button>
                </div>

                               
<?php


if(isset($_POST['sell']))
{

$title=($_POST['title']);
$desc=($_POST['desc']);
$prize=($_POST['prize']);
$negot=($_POST['negot']);
$cat=($_POST['cat']);
$subcat=($_POST['subcat']);

  $title = stripslashes($title);
$desc= stripslashes($desc);
 $prize = stripslashes($prize);
$negot= stripslashes($negot);
 $cat = stripslashes($cat);
$subcat= stripslashes($subcat);

$title = mysqli_real_escape_string($con,$title);
$desc = mysqli_real_escape_string($con,$desc);
$prize = mysqli_real_escape_string($con,$prize);
$negot = mysqli_real_escape_string($con,$negot);
$cat = mysqli_real_escape_string($con,$cat);
$subcat = mysqli_real_escape_string($con,$subcat);
$ads_id= randomkey(30);





 // $photo=$_FILES['upload']['name'];
	//move_uploaded_file($_FILES["upload"]["tmp_name"],"img/".$_FILES["upload"]["name"]);


	if($title =="" || $desc=="")
        {
		echo "<br/>Title or Description is empty";
                }

  else
        {
//
if(isset($_FILES['upload']))
{
	$max_size = 800; //max image size in Pixels
	$destination_folder = 'img';
	$watermark_png_file = 'watermark.png'; //watermark png file
	
	$image_name = $_FILES['upload']['name']; //file name
	$image_size = $_FILES['upload']['size']; //file size
	$image_temp = $_FILES['upload']['tmp_name']; //file temp
	$image_type = $_FILES['upload']['type']; //file type

	switch(strtolower($image_type)){ //determine uploaded image type 
			//Create new image from file
			case 'image/png': 
				$image_resource =  imagecreatefrompng($image_temp);
				break;
			case 'image/gif':
				$image_resource =  imagecreatefromgif($image_temp);
				break;          
			case 'image/jpeg': case 'image/pjpeg':
				$image_resource = imagecreatefromjpeg($image_temp);
				break;
			default:
				$image_resource = false;
		}
	
	if($image_resource){
		//Copy and resize part of an image with resampling
		list($img_width, $img_height) = getimagesize($image_temp);
		
	    //Construct a proportional size of new image
		$image_scale        = min($max_size / $img_width, $max_size / $img_height); 
		$new_image_width    = ceil($image_scale * $img_width);
		$new_image_height   = ceil($image_scale * $img_height);
		$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);

		if(imagecopyresampled($new_canvas, $image_resource , 0, 0, 0, 0, $new_image_width, $new_image_height, $img_width, $img_height))
		{
			
			if(!is_dir($destination_folder)){ 
				mkdir($destination_folder);//create dir if it doesn't exist
			}
			
			//center watermark
			$watermark_left = ($new_image_width/50)-(300/30); //watermark left
			$watermark_bottom = ($new_image_height/50)-(100/30); //watermark bottom

			$watermark = imagecreatefrompng($watermark_png_file); //watermark image
			imagecopy($new_canvas, $watermark, $watermark_left, $watermark_bottom, 0, 0, 300, 100); //merge image
			
					//output image direcly on the browser.
			//header('Content-Type: image/jpeg');
			//imagejpeg($new_canvas, NULL , 90);
			
			//Or Save image to the folder
			
           $image_name=$ads_id;
    		imagejpeg($new_canvas, $destination_folder.'/'.$image_name , 90);
		$photo=$destination_folder.'/'.$image_name ;
			//$query=mysql_query("INSERT INTO image(img) VALUE ('$image_name')");
                        
                        
$result=mysqli_query($con,"SELECT * FROM members WHERE user='$user'") or die(mysqli_error());

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
$rows = mysqli_fetch_array($result);
$id = $rows['id'];
$name = $rows['name'];
//$state=$rows['state'];
$college=$rows['college'];
$phone=$rows['phone'];
//$town=$rows['lga'];


	$insert = "INSERT INTO sell (ads_id,user,item_pix,title,description,prize,negotiable,name,college,phone,category,sub_category)
VALUES ('$ads_id','$user','$photo','$title','$desc','$prize','$negot','$name','$college','$phone','$cat','$subcat')";
		mysqli_query($con,$insert) or die('Cannot add record '.mysqli_error());
		
               // header('location:sell.php');
                echo "Request Posted";

	//header('location:watermark.php');
			//free up memory
			imagedestroy($new_canvas); 
			imagedestroy($image_resource);
			die();
			
		}
	}
}else
{
    echo"Please seleect a picture";
}
		
        }
}


?>
                
                
                
                
                
            </form>

           <!--middlle ends-->
	</div>
        
        <div class="grid_4">
        	
<!--3rd col-->
 
        </div>
        
	</section><!-- end content area -->   
      
      
    
      
  </div><!-- #end div #main .wrapper -->


 
<?php

include "./inc/foot.inc";
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



<?php

 function randomkey($length){
                    $key="";
                        $pool=array_merge(range(0,9),range('a','z'),range('A','Z'));
                        for($i=0; $i<$length; $i++){
                            $key.=$pool[mt_rand(0,count($pool)-1)];
                            
                        }
                        return $key;
                  }
                  ?>
                  