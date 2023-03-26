<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>userlogout</title>
</head>

<body>
<?php
error_reporting(0);

include("connection.php");
session_start();
session_destroy();
unset($SESSION['id']);

	  header("Location:index.php");
	  ?>
</body>
</html>
