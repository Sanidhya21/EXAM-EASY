<?php

$link=mysqli_connect("localhost","root","","quiz");
if($link==false)
{
	die("ERROR:could not connect.".mysqli_connect_error());
}






$uname=$_POST['s1'];
$mail=$_POST['s2'];
$pass=$_POST['s3'];
$org=$_POST['s4'];




$sql="INSERT INTO table2(
username,email,password,Institute)VALUES('$uname','$mail','$pass','$org')";


if(mysqli_query($link,$sql))
{
	echo "Records added succesfully";
	
}
else
{
	echo "ERROR:Could not able to execute $sql".mysqli_error($link);
}
mysqli_close($link);
header('Location: login form.html');
?>









