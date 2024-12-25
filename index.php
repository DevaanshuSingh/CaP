<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Go For CHATApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">

    <!-- Enabling GOOGLE_FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+J+Guides:ital@0;1&display=swap" rel="stylesheet">
</head>

<body>
    <div class="background-image-div">
        <!-- <img src="codernaccotax.png" alt="Coder_n_Accotax"> -->
        <div class="info">
            <div class="heading">
                <h1>Let's Know About:</h1>
            </div>
            <div class="content">
                <i>Here You Can <span class="highlight"><strong>Chat</strong></span> Live With Another Person Currently
                    Available In Server,<br>Have Tried to Make This Software User Friendly That's Why
                    <br><strong>Here</strong> You Are Able to See The Profile Picture To know-about And The Person You Are
                    Chhating With,</i>
            </div>
        </div>

        <div class="use">
            <div class="login slides ">
                <div class="login-heading use-heading"><u><strong>LOGIN</strong></u></div>

                <form action="chat.php" method="GET">
                    <div class="mb-3">
                        <label for="checkName" class="form-label">Enter Name</label>
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
                <div class="signup-heading use-heading"><u><strong>SIGNUP</strong></u></div>

                <form action="" method="POST" enctype="multipart/form-data">
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
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>


<?php
//Sign_Uping
require_once 'config.php';

if (isset($_POST['name'], $_POST['password'])) {
    $userName = $_POST['name'];
    $userPassword = $_POST['password'];

    // Corrected: Typo in $_FILES and variable reference
    $image = $_FILES['image']['name'];

    // File handling
    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileType = $_FILES['image']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Define allowed file extensions
    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExtension, $allowedExts)) {
        // Define upload path
        $uploadFileDir = './uploaded_files/';
        $dest_path = $uploadFileDir . $fileName;

        // Create directory if it doesn't exist
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0755, true);
        }

        // Move the file to the upload directory
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $imagePath = $dest_path;
        } else {
            echo "Error moving the uploaded file.";
            exit;
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit;
    }

    try {
        // Corrected variable reference for password and image path
        $stmt = $pdo->prepare("INSERT INTO users(name, userPassword, profile) VALUES(?, ?, ?)");
        $check = $stmt->execute([$userName, $userPassword, $imagePath]);

        // Check if registration done successfully
        // if ($check) {
        // echo "<script>
        // alert('Registered Successfully');
        // </script>";
        // } else {
        if (!$check) {
            echo "<script>
            alert('Did Not Register Successfully');
            </script>";
        }
    } catch (PDOException $e) {
        echo 'Error While Registering: ' . $e->getMessage();
    }

}