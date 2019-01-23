<?php
	$userName = filter_input(INPUT_POST,'username');
	$psw = filter_input(INPUT_POST,'password');
	$note = filter_input(INPUT_POST,'note');

	if(!empty($userName) && !empty($psw) && !empty($note)) {
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "noteswebapp";
		$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
		if($conn->connect_error) {
			die('Connect Fails: '.$conn->connect_error());
		}
		$sqlGive = "INSERT INTO notes (id,username,password,note) VALUES ('','$userName','$psw','$note')";
		$sql = "SELECT note FROM notes WHERE username='$userName'";
		$result= $conn->query($sql);
		if($result->num_rows > 0) {
			echo "Here Is Your All Notes...<br/>";
			while($row = $result->fetch_assoc()) {
				echo "<div class='notebox'>".$row["note"]."</div><br/>";
			}
		}
		else {
			echo "no notes";
		}
		$conn->close();
	}
?>
