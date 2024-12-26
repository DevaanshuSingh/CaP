<?php
require_once 'config.php';
try{
$stmt = $pdo->prepare("SELECT * FROM notifificationTable;");
$stmt->execute();
$isTrue = $stmt->fetch();
 if(!$isTrue)
    echo $isTrue;
else
    echo "0";
}catch(PDOException $e){
    echo "Error While ". $e->getMessage();
}