<?php
header("Access-Control-Allow-Origin: *");

$servername="localhost";
$username="root";
$password="";
$dbname="mammy";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn->connect_error)
{
    die("connection failed" . $conn->connect_error);
}

$sql="select * from sell ORDER BY id DESC LIMIT 16";
$result=mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
    $outp=array();
    $outp=$result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($outp);
}

else
{
echo json_encode("0 result");
}
$conn->close();




?>
