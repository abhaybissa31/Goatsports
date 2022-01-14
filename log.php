<?php

if (isset($_POST['sb']))
 {
	$una=$_POST['un'];
	$pw=$_POST['pswd'];
	$rm=$_POST['rem'];
	  if (isset($rm))
{
	  	setcookie('ucoo',$una,time()+86400);
    	setcookie('pwcoo',$pw,time()+86400);
}
if (!isset($rm)) {
  session_start();
  session_destroy();
  setcookie('ucoo','',time()-86400);
  setcookie('pwcoo','',time()-86400);
}

	$con=mysqli_connect('sql104.epizy.com','epiz_28607630','abhay1289','epiz_28607630_su') or die("error in connecting to db");
	
	$ser="select * from su where username='$una' and pass=SHA('$pw');";
	
	$quer=mysqli_query($con,$ser)or die("error in insertion");
	//echo $quer."query result";
	$count=mysqli_num_rows($quer);

	if ($count)
{
	$row=mysqli_fetch_array($quer);
	$pw=$row['pass'];
	$una=$row['username'];	 
  echo '<p><script type="text/javascript"> alert("You have been logged in successfully");
       location="gs.html";
       </script>in</a>.</p>'; 	
} else{  
	echo '<p><script type="text/javascript"> alert("Password or username is wrong");
       location="login.html";
       </script>in</a>.</p>';

	  }	
	
 
	  }
       else
	  	header("location:login.html")
	 
	  	 

?>