<?php 
$un=$_POST['un'];
$em=$_POST['em'];
$da=$_POST['dob'];
$tel=$_POST['pn'];
$pswd=$_POST['pswd'];
$sub=$_POST['sb'];
$dp=$_FILES['fu'];
$sq=$_POST['sq'];
$sa=$_POST['txtfo'];
//print_r($dp);


    $filename=$dp['name'];//file name
	$filep=$dp['tmp_name'];//tmp file save path
	$fileer=$dp['error'];//if error occurs it'll be bigger than 0 and hence that's how we know error


		if (!isset($dp)&&$fileer==0) 
{
echo "error";
}
else{
			
		# code...
		$destf='prof/'.$filename;
    	//echo "$destf";
		move_uploaded_file($filep,$destf);


$con=mysqli_connect('sql104.epizy.com','epiz_28607630','abhay1289','epiz_28607630_su') or die("error in connecting to db");

	//$query="insert into su(pi,username,email,dob,phone,pass)values('$destf','$un','$em','$da','$tel',SHA('$pswd'));";
	//echo $query;
$query = "SELECT * FROM su WHERE username = '$un'";
	$res=mysqli_query($con,$query) or die("Error in insertion");
		     
		    if (mysqli_num_rows($res) == 0) {
        // The username is unique, so insert the data into the database
        $query = "insert into su(pi,username,email,dob,phone,pass,sques,ans)values('$destf','$un','$em','$da','$tel',SHA('$pswd'),'$sq','$sa');";
        mysqli_query($con, $query);
        
        // Confirm success with the user
       echo '<p><script type="text/javascript"> alert("Your new account has been successfully created. ");
       location="login.html";
       </script>in</a>.</p>';

        mysqli_close($con);
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        $un = "";
        echo  '<p><script type="text/javascript"> alert("The account with this username already exsists");
location="signup.html";
</script></p>';
 }
}
?>

