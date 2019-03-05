<?php

$link = mysql_connect('localhost', 'root', '');
mysql_select_db('mammy', $link);

$sql = "SELECT abbrv FROM colleges WHERE category=" . $_REQUEST['id'];

$result = mysql_query($sql);


while ($row= mysql_fetch_array($result)){

	echo '<option >'.$row['abbrv'].'</option>';
}



?>