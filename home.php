<?php
	include "connect.php";
	include "crypt.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>myNotes</title>
		<style type="text/css">
			displayNote{
			  display: inline-block;
			  background: pink;
			  padding: 0.5em 0.2em 0.8em 0.5em;
			  margin: 2px;
			}
			.displayName{
			  display: inline-block;
			  background: yellow;
			  padding: 0.5em 0.2em 0.8em 0.5em;
			  margin: 2px;
			}
			textarea{
				width: 300px;
				height: 100px;
			}
		</style>
		<script type="text/javascript">
			var no_notes = 0;
			var nId="";
			var i =0;
			function changeMe(){
				var key = document.getElementById('eKey').value;
				var rawText = document.getElementById('textSec').value;

				document.getElementById('textSec').value = changeIt(key, rawText);

			}
			function changeMeBack(){
				var key = document.getElementById('dKey').value;
				//for (var i = 1; i <= no_notes; i++) {
				try{
					while(true){
						i += 1;
						nId = "dNote" + "" + i;
						var rawText = document.getElementById(nId).innerHTML;

						document.getElementById(nId).innerHTML = changeItBack(rawText, key);
					}
				}
				catch(error){
					// !
				}

			}
		</script>
	</head>
	<body>
		<form action="enter.php" method="post">
			EnterNoteTitle:<input type="text" name="notetitle"><br>
			EncryptionKey:<input id="eKey" type="text" name="key"><br>
			<textarea id="textSec" placeholder="type your note here" name="note"></textarea><br>
			<input type="button" value="encrypt" onclick="changeMe()">
			<input type="submit" name="submit">
			<a href="see.php"><input type="button" value="SeeNotes"></a>
		</form>
		<div class="footer">
        	<a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        	<a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
		</div>
	</body>
</html>
