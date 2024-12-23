<?php

require_once 'config.php';

if (isset(
    $_POST['from'],
    $_POST['to'],
    $_POST['message']
)) {
    $fromUserId = $_POST['from'];
    $toUserId = $_POST['to'];
    $message = $_POST['message'];
    try {
        $stmt = $pdo->prepare("INSERT INTO send_messages(fromUserId,toUserId,message) VALUES(?, ?, ?)");
        $check = $stmt->execute([$fromUserId, $toUserId, $message]);
        if (!$check) {
            echo "<script>
                alert('Not Inserted Values: fromUserId, toUserId , message');
            </script>";
        }
        else {
            echo "<script>
                alert('Message Sent Successfully');
            </script>";
        }
    } catch (PDOException $e) {
        echo 'Error While Inserting Value: ' . $e->getMessage();
    }
} else {
    echo "Please Fullfill First";
}