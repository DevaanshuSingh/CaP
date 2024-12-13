<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="info">
        <div class="heading">
            <h1>Let's Know About:</h1>
        </div>
        <div class="content">
            <i>Here You Can <span class="highlight"><strong>Chat</strong></span> Live With Another Person Currently
                Available In Server,<br>Have Tried to Make This Software User Friendly That's Why
                <br><strong>Here</strong> You Are Able to See The Profile Picture Of Self And The Person You Are
                Chhating With,</i>
        </div>
    </div>

    <div class="use">
        <div class="login slides ">
            <form action="" method="GET">
                <div class="mb-3">
                    <label for="name" class="form-label">Enter Name</label>
                    <input type="text" class="form-control" id="checkName" name="checkName" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Enter Password</label>
                    <input type="password" class="form-control" id="password" name="checkPassword" required>
                </div>
                <button type="submit" class="btn btn-primary">CHAT</button>
            </form>
        </div>

        <div class="signup slides ">
            <form action="register.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Enter Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label"><strong>Choose Profile
                            Picture</strong></label>
                    <input type="file" class="form-control" id="picture" name="image" accept="image/*"
                        capture="environment" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

    <div class="review">
        <table class="table table-dark table-striped">

            <thead>
                <tr>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>password</th>
                    <th>Profile</th>
                    <th>Remove</th>
                </tr>
            </thead>

            <tbody class="bg-success text-white">
                <?php
                // Database connection
                require 'config.php';
                try {
                    $stmt = $pdo->query('SELECT * FROM users');
                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($users as $user) {
                        $x = "<tr>";
                        $x .= "<div class='adjust' ><td>" . $user['id'] . ".</td></div>";
                        $x .= "<div class='adjust' ><td>" . $user['name'] . "</td></div>";
                        $x .= "<div class='adjust' ><td>" . $user['userPassword'] . "</td></div>";
                        $x .= "<div class='adjust-image' ><td><img src='" . $user['profile'] . "' alt='Profile Picture' style='width: 100px; height: auto;'></td></div>";
                        $x .= "<div class='adjust' ><td><button type='submit' name='del' value='" . $user['id'] . "' onclick='truncateTable()' style='background-color: red; color: white'>TRUNCATE</button></td></div>";
                        $x .= "</tr>";
                        echo $x;
                    }
                } catch (PDOException $e) {
                    echo 'Database error: ' . $e->getMessage();
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="script.js"></script>
</body>

</html>

<?php
require_once 'config.php';
if (isset($_GET['checkName'], $_GET['checkPassword'])) {
    $userName = $_GET['checkName'];
    $userPassword = $_GET['checkPassword'];
    try {
        $stmt = $pdo->prepare(query: "SELECT * FROM users;");
        $stmt->execute();
        $infos = $stmt->fetchAll();
        if (!empty($infos)) {
            foreach ($infos as $info) {
                if ($info['name'] == $userName && $info['userPassword'] == $userPassword) {
                    echo "<script>
            alert(`User Have Registered`);
                window.location.href = 'chat.php';
            </script>";
                }
            }

            echo "<script>
            alert(`Please Register First`);
            </script>";
        } else {
            echo "<script>
            alert(`Please Register FirstTo Use The ChatApp;`);
            </script>";
        }
    } catch (PDOException $e) {
        echo 'Error While Fetching Infos: ' . $e->getMessage();
    }
} else {
    // echo '<script>alert(`Please Register First To Use The ChatApp;`);</script>';
}
