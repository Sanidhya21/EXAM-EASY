<?php


function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

$link=mysqli_connect("localhost","root","","quiz");
if($link==false)
{
	die("ERROR:could not connect.".mysqli_connect_error());
}
$userid=$_POST['uname'];
$passo=$_POST['upass'];

$result="SELECT * FROM admin where email='$userid' and password='$passo'";
if($va=mysqli_query($link,$result))
{
	if(mysqli_num_rows($va)==0)
	{
		header('Location: entryNotMatched.html');
		$message = "wrong answer";
	echo "<script type='text/javascript'>alert('$message');</script>";

	#secho "Data not found register here  =>"."<a href=\"signup.html\"><button>SignUp</button></a>";
}
else
{
        session_start();
        $_SESSION["CHECK_LOGIN"]='logined';
	header('Location: maiframe.html');
}

}

mysqli_close($link);

?>