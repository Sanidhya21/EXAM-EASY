<?php
error_reporting(E_ALL ^ E_NOTICE);
$link=mysqli_connect("localhost","root","","quiz");
if($link==false)
{ 
	die("ERROR:could not connect.".mysqli_connect_error());
}
?>


	<!DOCTYPE html>
	<html>
	<head>
	<title></title>
	<style >
		.logout
		{
			margin-left: 600px;
		}
	</style>
</head>
<body style="background-color: lightgreen; background-image: url(result.jpg); background-repeat: no-repeat;background-attachment: fixed;background-size: cover; font-style: bold;color: white;">
	<h2 style="margin-top: 250px; margin-left:550px;">
		Thank You !!!!!
	</h2>
	<div>
<table style="text-align: center; margin-left: 465px; margin-top: 70px; border-collapse: collapse;">
		<th style="margin-left: 120px; margin-bottom: 50px; color:yellow;" ><b><i>RESULT!!</i></b></th>
	
	
	<tr></tr>
	<tr></tr>
	<tr>
		<td style="border-style: solid;
  border-color: coral;">
			<b>Questions Attempted:</b>
		</td>
<?php
if(isset($_POST['submit']))
{
	if(!empty($_POST['quizcheck']))
	{
		$count = count($_POST['quizcheck']);
		?>
		<td style="border-style: solid; border-color: coral;">
			<?php
		echo "Out of 5, you have selected ".$count."options";
		?>
	</td>
</tr>
	<?php
				$result=0;
				$i=1;
				$selected=$_POST['quizcheck'];
			//echo $selected;
			//print_r($selected);
			   $q="select * from questions";
			  $query=mysqli_query($link, $q);

			  
			  while($rows = mysqli_fetch_array($query))
			  {
			  //	print_r($rows['ans_id']);
			  
		      $checked = $rows['ans_id'] == $selected[$i] ;
			  
			  if($checked)
			  {
			  	$result++;
			  }
			  $i++;
			  }
			  ?>
			  <tr>
			  	<td style="border-style: solid;
  border-color: coral;">
  	YOUR SCORE 
  </td>
			  	<td style="border-style: solid;
  border-color: coral;">
			  <?php
			  echo " ur total score is:=>  ".$result; 
			  ?>
			  	
			  </td>
			  </tr>
			</table>
			<br>
			<br>
			<div class="logout">
	<a href="logout.php" style="color:yellow; margin-left: 35px; font-family: verdana;"><b> LOGOUT</b></a>
</div>
</div>
			  <?php

	}}

?>