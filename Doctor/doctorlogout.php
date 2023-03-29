<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>doctorlogout</title>
</head>

<body>
<?php
error_reporting(0);

include("connection.php");
session_start();
session_destroy();
unset($SESSION['id']);

	  header("Location:doctor_login.php");
	  ?>
</body>
</html>
