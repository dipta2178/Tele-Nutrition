<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Tele-Nutritionist User login</title>
</head>

<style>
h1{
font-size:50px;
text-align:center;
padding-top:30px;
color:#000066;
}
img 
{ float: left;
width: 77px;
}
li{
font-size:24px;
}
h3{
font-size:24px;}
p{
text-align:center;
font-size:26px;}

body {margin:0;
padding:0;
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
width:100%;
height:100vh;
background-image:url(../CSE499/pic/user_log.jpg);
background-size:cover;
}
</style>
<body class="container display-4">

<h1><span style="color: black"><marquee behavior="scroll" direction="left"
           onmouseover="this.stop();"
           onmouseout="this.start();"><b>24 Hours Open for All...</b></marquee></span></h1>

<?php
error_reporting(0);
session_start();
include("connection.php");
include ('../translate.php');

if(isset($_POST['submit'])){

$id=$_POST['id'];
$pswd=$_POST['pswd'];
$email=$_POST['email'];
if(empty($email) || empty ($pswd))
{
$error_msg="filled all the requirements";
}

else

{

$u_query="select* from user where email='$email' AND pswd='$pswd'";
	$check=mysqli_query($db,$u_query);
	
	if(mysqli_num_rows($check)>0)
	/*if($_POST['id']=='$id' && $_POST['pswd']=='$pswd')*/
	
	{
	$check_row= mysqli_fetch_assoc($check);
	$_SESSION['email']=$check_row['email'];
	echo "<script> window.location='view_user_home_page.php' </script> ";
	}
	else
	{
	$invalid_msg="Invalid user email/ password ";
	}

}
}
?>
      <!-- Login -->
      <div class="w3-transparence w3-margin" ></div>
        <div class="w3-container w3-padding w3-transparence" >
 <h1  class=" text-center font-weight-bold text-BLUE ">Patient Login</h1>
        </div>
  <form class="modal-content animate" action="login.php" method="post">
        <div class="w3-container w3-white">
          
      <label for="email"><b> Email</b></label>
          <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail or Phone Number"  name="email" style="width:100%" required></p>
         <label for="pswd"><b>Password</b></label>
     <p> <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="pswd" required></p>
      <p> <button type ="submit" name="submit" value="login" class="w3-button w3-block w3-blue">Login</button></p>
        </div>
<p style="text-align:center" >
Not Yet A Member? <a href="registration.php"><strong style="color:#de1010">Register</strong></a></br>

      </p>  
      </form>
<?php
if(isset($error_msg)){echo $error_msg;}
if(isset($invalid_msg)){echo $invalid_msg;}
?>

</body>
</html>
