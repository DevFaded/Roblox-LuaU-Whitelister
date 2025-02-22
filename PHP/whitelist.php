<?php
include_once "db.php"; 
$userId = $_GET["userId"];
$discordName = $_GET["discordName"];
$discordID = $_GET["discordID"];

$statement = $database->prepare("INSERT INTO users(userID, discordName, discordID) VALUES (?,?,?);");
$result = $statement->execute([$userId, $discordName, $discordID]); 
header('Content-Type: application/json; charset=utf-8');
if ($result === true) {
    $resarray = array(
        "success" => "true",
    );
    $json = json_encode($resarray);
    echo $json; 
} else {
    $resarray = array(
        "whitelised" => "false",
    );
    $json = json_encode($resarray);
    echo $json; 
}
?>
