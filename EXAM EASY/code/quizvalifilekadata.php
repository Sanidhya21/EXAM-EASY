<?php  
$link=mysqli_connect("localhost","root","","quiz");
if($link==false)
{
	die("ERROR:could not connect.".mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html>
<head>
	<style>
		.whole
		{
			margin-top: 25px;
			border-left: red;
			
		} .heading { margin-top: 50px; margin-left: 150px; height:80px; text-align:
center;	 font-weight: bold; font-size: 20px; width:600px; background-color:
lightblue; } .qdiv { margin-left: 200px; } .odiv { margin-left: 200px; }
.logout { margin-left: 600px; float: right; margin-right: 50px;
background-color: lightblue; } .submit { margin-left: 600px; font-size: bold;} .timer { width:
100px; font-size: 2.5em; text-align: center; margin-left: 1200px; float:
right; margin-right: 40px; }

	</style>
	<script type="text/javascript">
		var seconds = 300;
      function secondPassed() {
          var minutes = Math.round((seconds - 30)/60),
              remainingSeconds = seconds % 60;

          if (remainingSeconds < 10) {
              remainingSeconds = "0" + remainingSeconds;
          }

          document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
          if (seconds == 0) {
              clearInterval(countdownTimer);
             //form1 is your form name
            document.form1.submit();
          } else {
              seconds--;
          }
      }
      var countdownTimer = setInterval('secondPassed()', 1000);
	</script>
    </head>
    <body style="background-image: url(quizback2.jpg); background-repeat: no-repeat;background-attachment: fixed;background-size:cover;">
    <div>
  <!--  <div class="qside">
     	<u><b><h1>
    		Topics
 		</h1></b></u>
 		<a href="signup.html#a1">1</a>
 		<a href="logout.php">2</a>

    </div>-->
	<div class="heading">

	<h3><b>NOTE!!!</b>You can't Submit before all question marked.....</h3>
	<h3>You have to select only one option out of four!!!</h3>

	</div>
	<div class="timer">
            <time id="countdown">5:00</time>
        </div>

	<div class="logout">
	
	<a href="logout.php" style="background-color: blue;color:yellow;font-family: verdana;"><b> LOGOUT</b></a>
</div>
</body>
</html>
<div class="whole" id="a1">
<form action="check.php" method="post">
<?php
$a=array(1,2,3,4,5,6,7,8,9,10);
	$random_keys=array_rand($a,5);
//for($j=0;$j<5;$j++)
//	echo $a[$random_keys[$j]];
for($i=1;$i<6;$i++)
{
	//echo $a[$random_keys[$i]];
	$s=$a[$random_keys[$i-1]];
	//yha se new h
	//if(!array_search($s, $a))
	//{
	//array_push($a,"$s");
	//print_r($a);
	
		

$q= "select * from questions where qid=$s";
$query =mysqli_query($link,$q);

while($rows=mysqli_fetch_array($query))
{
	?>

	<div class="qdiv">
		<h4 class="card-header">
			<?php 
			echo " $i .".$rows['question']
			?>
	</div>
		</h4>  

	<?php
	$q= "select * from answers where ans_id=$s";
	$query =mysqli_query($link,$q);

while($rows=mysqli_fetch_array($query))
{
	?>
	<div class="odiv">
<input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid'] ?>">
		<?php
		echo $rows['answer'];
		?>

	</div>
	
	<?php
}
}
}

?>
<br>
<div class="submit">
<input type="submit" name="submit" value="submit" style="font-size: bold;">
</div>
</form>

</div>
</div>
<!--
<div class="logout">
	<a href="logout.php"> LOGOUT</a>
</div>-->
