<?php
	$userName = filter_input(INPUT_POST,'username');
	$psw = filter_input(INPUT_POST,'password');

	if(!empty($userName) && !empty($psw)) {
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "noteswebapp";
		$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
		if(mysqli_connect_error()) {
			die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
		}
		else {
			$sql = "INSERT INTO notes (id,username,password,note) VALUES ('','$userName','$psw','$note')";
			//$sqlGet = "SELECT password FROM notes WHERE username='$userName'";
			if($conn->query($sql)) {
				echo "new record is inserted successfully";
			}
			else {
				echo "Error :".$sql." ".$conn->error;;
			}
			//$conn->query($sqlGet)->fetch_assoc();
			//echo $row["id"];
			$conn->close();
		}
	}
?>
