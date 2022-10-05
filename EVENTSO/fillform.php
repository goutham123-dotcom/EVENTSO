<?php
include ('connection.php');
session_start();
if(isset($_POST['hall'])&&
   isset($_POST['namep'])&&  
   isset($_POST['date'])&&
   
   isset($_POST['time'])&&
   isset($_POST['purpose'])&&
   isset($_POST['fname'])&&
   isset($_POST['lname'])&&
   isset($_POST['roll'])&&
   isset($_POST['no'])&&
   isset($_POST['dpt']))
{ $hal=$_POST['hall'];
  $np=$_POST['namep'];
  $d=$_POST['date'];
  $tm=$_POST['time'];
  $p=$_POST['purpose'];
  $fn=$_POST['fname'];
  $ln=$_POST['lname'];
  $rollno=$_POST['roll'];
  $no=$_POST['no'];
  $dept=$_POST['dpt'];
  if(!empty($hal)&&!empty($np)&&!empty($d)&&!empty($tm)&&!empty($p)&&!empty($fn)&&!empty($ln)&&!empty($rollno)&&!empty($no)&&!empty($dept))
  { 
     $q='select * from Events where Hall = "'.$hal.'" AND Date = "'.$d.'"';
  $res=mysqli_query($connection,$q) or die(mysqli_error($connection));
  $num=mysqli_num_rows($res);
   if($num==1)
   { header('location:finishfail.php');
   } 
   else
   {
	    $query="INSERT INTO `Events` VALUES('$hal','$np','$d','$tm','$p','$fn','$ln','$rollno','$no','$dept')";																																																																																																																												
	 if($query_run=mysqli_query($connection,$query) or die(mysqli_error($connection)))
	  { 
	    header('location:finish.php');
	  }
	  else
	  { echo 'Sorry, Try again later.';
	  }
   }
 }
  
  else
  { echo 'All fields are required.';
  }
  
}

?>