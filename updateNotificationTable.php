<?php
require_once 'config.php';

$stmt = $pdo->prepare("UPDATE notifificationTable SET newMessage=TRUE;");

if($stmt->execute())
 echo "notifificationTable Updated successfully";
else
    echo "Error Updating notifificationTable";