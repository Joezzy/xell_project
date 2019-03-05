
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
            header('location:myrequest.php');
   }
     
  
    $id=mysqli_real_escape_string($con,$_GET['u']);
    if(ctype_alnum($id)){
        //check user exists
        $check=mysqli_query($con,"SELECT * FROM request WHERE id='$id'");
        if(mysqli_num_rows($check)==1){
          while($get=mysqli_fetch_assoc($check))
          {
            $id=$get['id'];
            $name=$get['name'];
            $title=$get['title'];
            $desc=$get['request_detail'];
            
  ?>
            
          <form class='form-mini' method='post'  action='edit_req.php'>

             <input type="hidden" name='idd' placeholder='Title' value="<?php echo $id; ?>"/>
                 <div class='form-row'>
                    <input type='text' name='title' placeholder='Title' value="<?php echo $title; ?>"/>
                </div>
                 
               
                
                   
                      <div class='form-row'>
                    <input type='text' name='describe' placeholder='Description' value="<?php echo $desc; ?>"/>
                </div>
                
                <div class='form-row form-last-row'>
                    <button type='submit' name='send'>Update request</button>
                </div>
                
                  <div class='form-row form-last-row'>
                    <button type='submit' name='delete'>Delete request</button>
                </div>
                </form>
  
         
         <?php
               }
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
$descc=($_POST['describe']);


	if($titlee=="" || $descc=="")
        {
		echo "All fields must be completed please<br/>";
        }
        else
        {
 
     $profile_update=mysqli_query($con,"UPDATE request SET title='$titlee',request_detail='$descc' WHERE id='$idd'");
                       echo"Request update Successful!";
                       header('location:myrequest.php');
                       //header("Location:edit_profile.php?id=$user");            
                
		
        }
}
?>
 
 <?php
if(isset($_POST['delete']))
{
    $id=($_POST['idd']);
  //  $id=mysql_real_escape_string($_POST['id_']);
$delete = "DELETE FROM `request` WHERE id='$id'";
mysqli_query( $con,$delete);
 header('location:myrequest.php');

}
?>
 
 
<?php

include "./inc/foot.inc";
?>

