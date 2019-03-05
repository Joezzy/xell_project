<?php ob_start();
	include"header2.php";

if (isset($_GET['id']) && is_numeric($_GET['id']))
{
$id = $_GET['id'];

$result = mysqli_query($con,"DELETE FROM images WHERE id=$id")
or die(mysqli_error());

header("Location: upload.php");
}
else

{
header("Location: upload.php");
}
