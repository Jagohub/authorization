<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrap">	
<?php 
	require_once('conn.php');
	require_once('functions.php');
	
	$newlogin = $_GET['newlogin'];
	$newpassword = $_GET['newpassword'];
	$newname = $_GET['newname'];

	$conn = connect();	
	$logins_all = selectLogins($conn);
	$repit_login = checkRepitLogin($logins_all, $newlogin);

	if ($repit_login) require_once('html-sheets\sorry-login-exist.php');

	if (!$repit_login) insertNewUser($conn, $newlogin, $newpassword, $newname);	

	echo'<a href="index.php">Back =></a>';
	
	echo'<pre>';
	print_r(selectAll($conn));
	echo'</pre>';


	mysqli_close($conn);
 ?>
		
 		</div>
 	</body>
</html>