<?php
require_once 'config.php';
if(isset($_POST['choosedId'])) {
    $choosedId = $_POST['choosedId'];
    $myId = $_POST['myId'];
    $sql = $pdo->prepare("SELECT message FROM send_messages WHERE fromUserId=? AND toUserId=?");
    $sql->execute([$choosedId,$myId]);
    $messages = $sql->fetchAll();
    foreach ($messages as $message) {
        echo "<div class='go'><div class='text'>" . $message['message'] . "</div></div>";
    }
}else{
    echo "Please Choose First";
}