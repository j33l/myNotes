<?php
	include "home.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>myNotes</title>
</head>
<body>
	<hr>
		DencryptionKey:<input id="dKey" type="text" name="key">
		<input type="button" value="Decrypt" onclick="changeMeBack()"><br>
	<?php 

		$noteOutput="";
		$count=0;
		
		session_start();

		$get_query = "SELECT notetitle,note FROM notes where username='".$_SESSION["username"]."'";
		$result= $link->query($get_query);

		while($row = $result->fetch_assoc()) {
			$count += 1;
			echo "<div class='displayName'>".$row["notetitle"]."</div>";
			echo "<displayNote id='dNote".$count."'>".$row["note"]."</displayNote><br/>";
		}

		echo "<script>no_notes =".$count ."</script>";

	?>
</body>
</html>
