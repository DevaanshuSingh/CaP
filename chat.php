<?php

require_once "config.php";
try {
    $stmt = $pdo->prepare(query: "SELECT name,profile FROM users;");
    $stmt->execute();
    $users = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'Error While Fetching Infos: ' . $e->getMessage();
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHATApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/chat.css">
</head>

<body>

    <div class="users">
        <div class="heading">CHOOSE TO CHAT</div>
        <div class="list">
            <!-- <ul>
                <li>
                    <div class="name">One</div>
                    <div class="profile"><img src="" alt=""></div>
                </li>
                <li>
                    <div class="name">Two</div>
                    <div class="profile"><img src="" alt=""></div>
                </li>
            </ul> -->
            <ul>

                <?php
                if (!empty($users)) {
                    foreach ($users as $user) {
                        echo "
                    <li>
                        <div class='name'>" . $user['name'] . "</div>
                        <div class='profile'><img src='" . $user['profile'] . "' alt=''></div>
                    </li>";
                    }
                }else{
                    echo 'alert("No Users Available");';
                }
                ?>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>