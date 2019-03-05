<?php
//
include('./inc/header.php');


if (isset($user))
{
    $sql5="DELETE FROM login WHERE user = '$user'";
$result5=mysql_query($sql5);
session_start();
    session_unset();
    session_destroy();
   // session_write_close();

 header("location: index.php");
}
else {
 header("location: index.php");
}

?>