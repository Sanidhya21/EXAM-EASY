<?php
$link=mysqli_connect("localhost","root","","quiz");
if($link==false)
die("Error while connecting".mysqli_connect_error());
$sql="CREATE TABLE table2(username varchar(20),email varchar(30)PRIMARY KEY ,password varchar(20),Institute varchar(10))";
if(mysqli_query($link,$sql))
	echo "Table created succesfully";
else
{
	echo "Error could not able to execute $sql".mysqli_error($link);
}
mysqli_close($link);

?>