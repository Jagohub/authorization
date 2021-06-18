<meta charset="utf-8">

<?php  
	
	require_once('conn.php');

	$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, BDNAME);

	if (!$conn){echo"error connect !!!";}

	$result_query_logins = mysqli_query($conn, "SELECT * FROM logins");
	
	
	$logins_all = mysqli_fetch_all($result_query_logins,1);
?>



<?php  

	foreach ($logins_all as $array) {
		
			if ($array['login'] == $_GET['login']) {
				
				$login_exist = True;
				if ($array['password'] == $_GET['pass']) {
					require('html-sheets\exist-login.php');
				}
				
				else if ($_GET['pass']=="") require('html-sheets\No-pass.php');

				else require('html-sheets\wrong-pass.php');
				break;
				}
			else $login_exist = False;
				
	}
	if ($login_exist == False) {
		
		require('html-sheets\No-login.php');}


	mysqli_close($conn);

 ?>



		