<meta charset="utf-8">

<?php  
	
	require_once('conn.php');
	require_once('functions.php');

	$conn = connect();
	$logins_all = selectAll($conn);
	
// проверка логина и пароля существующего пользователя
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



		