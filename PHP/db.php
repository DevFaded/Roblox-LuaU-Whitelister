<?php
$password = ""; #pass
$user = ""; #user
$databaseName = ""; #name
try{
	$database = new PDO('mysql:host=localhost;dbname=' . $databaseName, $user, $password); 
}catch(Exception $e){
	echo "Error connecting to db: " . $e->getMessage(); 
}
?>
