<?php
//rnfunctions.php
$dbhost='localhost';
$dbname='mammy';
$dbuser='root';
$dbpass='';
$appname="xell";

$con=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


function destroySession()
    {
    $_SESSION=array();
    if (session_id() !="" || isset($_COOKIE[session_name()]))
        setcookie(session_name(),'',time()-259000, '/');
    session_destroy();
    }
//

?>