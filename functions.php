<?php 

function connect(){

	$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, BDNAME);
	if (!$conn)echo"-- error connect !!! <br>";
	// else echo "-- conn exist <br>";

	return $conn;
}



function selectAll($conn){

	$result_query_logins = mysqli_query($conn, "SELECT * FROM logins");
	$logins_all = mysqli_fetch_all($result_query_logins, MYSQLI_ASSOC); // 1

	return $logins_all;
}



function selectLogins($conn){

	$result_query_logins = mysqli_query($conn, "SELECT login FROM logins");
	$logins_all = mysqli_fetch_all($result_query_logins, 1); //MYSQLI_ASSOC

	return $logins_all;
}



function checkRepitLogin($logins_all, $newlogin){

	foreach ($logins_all as $value) {
		foreach ($value as $data) {
			if($newlogin==$data) return true;	
			// print_r($data.", ");
		}
	}
	return false;
}



function tablesList($conn){

	$sql = "SHOW TABLES FROM ".BDNAME;	
	$result_query_list_t = mysqli_query($conn, $sql);
	$tables = mysqli_fetch_all($result_query_list_t, 2); // MYSQLI_NUM

	echo "-- tables in DB are: ";
	foreach ($tables as $value) {
		echo $value[0].', ';
	}

}


function insertNewUser($conn, $newlogin, $newpassword, $newname){

	$sql = "INSERT INTO logins (login, password, name) VALUES ('".$newlogin."', '".$newpassword."', '".$newname."')";
	if(mysqli_query($conn, $sql)) echo 'Insert OK!!!!!! <br>'; 
	else echo'No insert? error';

	echo($sql); echo'<br>';

}