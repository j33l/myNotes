<?php

include "connect.php";

session_start();

$uname = $_SESSION["username"];
var_dump($uname);
$notetitle = $_POST["notetitle"];
$noteText = $_POST["note"];

$enter_query = "INSERT INTO notes (id,username,notetitle,note) VALUES ('','$uname','$notetitle','$noteText')";
$link->query($enter_query);

echo "<font color=green><br>Saved!</font>";

?>
