<?php
include_once "db.php"; 
$userId = $_GET["userId"]; 
$license = $_GET["license"];

$stmt = $database->prepare("SELECT * FROM users WHERE userID=?"); 
$stmt->execute([$userId]); 
$user = $stmt->fetch();

header('Content-Type: application/json; charset=utf-8');
if ($user["userID"] == $userId) {
    $resarray = array(
    "whitelised" => "true",
    "discordName" => $user["discordName"],
    );
    $json = json_encode($resarray);
    echo $json; 
}
else {
    $resarray = array(
        "whitelised" => "false",
    );
$json = json_encode($resarray);
echo $json; 
}
$database = null;
