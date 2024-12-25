<?php
require_once 'config.php';

$stmt = $pdo->prepare("UPDATE notifificationTable SET newMessage=FALSE;");

if($stmt->execute())
 echo "notifificationTable truncated successfully";
else
    echo "Error truncating notifificationTable";