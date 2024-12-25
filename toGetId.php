<?php
session_start();
if (isset($_POST['choosedId'])) {
    $choosedId = $_POST['choosedId'];
    $_SESSION['choosedId'] = $choosedId;
    echo "Got choosedId: $choosedId";
} else {
    echo "No choosedId received";
}