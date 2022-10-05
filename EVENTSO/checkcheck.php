<?php
include ('connection.php');
session_start();
if(isset($_POST['date']))
{
   $d=$_POST['date']; 
}


$q='select * from Events where Date = "'.$d.'"';
$res=mysqli_query($connection,$q) or die(mysqli_error($connection));
$row=mysqli_fetch_array($res);
$num=mysqli_num_rows($res);
if($num>0)
{
$_SESSION['success']=TRUE;
echo $row['Hall'];
header('location:checkhalls.php');
}
else
{
$_SESSION['fail']=TRUE;
header('location:check.php');
}
?>