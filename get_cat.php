<?php

include("./inc/config.php");

$sql = "SELECT sub_category FROM item_sub_cats WHERE cat_id=" . $_REQUEST['id'];

$result = mysqli_query($con,$sql);


while ($row= mysqli_fetch_array($result)){

	echo '<option >'.$row['sub_category'].'</option>';
}



?>