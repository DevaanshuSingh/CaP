
<?php

// require_once 'config.php';
// if (isset($_POST['checkName'], $_POST['checkPassword'])) {
//     $userName = $_POST['checkName'];
//     $userPassword = $_POST['checkPassword'];
//     $image=$_FILES['image']['name'];

//     // file jhamela
//     $fileTmpPath = $_FILES['image']['tmp_name'];
//     $fileName = $_FILES['image']['name'];
//     $fileSize = $_FILES['image']['size'];
//     $fileType = $_FILES['image']['type'];
//     $fileNameCmps = explode(".", $fileName);
//     $fileExtension = strtolower(end($fileNameCmps));

//     // Define allowed file extensions
//     $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

//     if (in_array($fileExtension, $allowedExts)) {
//         // Define upload path
//         $uploadFileDir = './uploaded_files/';
//         $dest_path = $uploadFileDir . $fileName;

//         // Create directory if it doesn't exist
//         if (!is_dir($uploadFileDir)) {
//             mkdir($uploadFileDir, 0755, true);
//         }

//         // Move the file to the upload directory
//         if (move_uploaded_file($fileTmpPath, $dest_path)) {
//             $imagePath = $dest_path;
//         } else {
//             echo "Error moving the uploaded file.";
//             exit;
//         }
//     } else {
//         echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
//         exit;
//     }
//     // file jhamela


//     try {
//         $stmt = $pdo->prepare(query: "INSERT INTO users(name, userPassword, profile)VALUES(?,?,?)");
//         $check=$stmt->execute([$userName,$password,$image]);
//         if($ckeck){
//             echo "<script>
//             alert(`Registered Successfully;`);
//             </script>";
//         }
//         else{
//             echo "<script>
//             alert(`Did Not Registered Successfully;`);
//             </script>";
//         }
//     } catch (PDOException $e) {
//         echo 'Error While Registering Is: ' . $e->getMessage();
//     }

// }



// echo "register.php";
// require_once 'config.php';

// if (isset($_POST['name'], $_POST['password'])) {
//     $userName = $_POST['name'];
//     $userPassword = $_POST['password'];

//     // Corrected: Typo in $_FILES and variable reference
//     $image = $_FILES['image']['name'];

//     // File handling
//     $fileTmpPath = $_FILES['image']['tmp_name'];
//     $fileName = $_FILES['image']['name'];
//     $fileSize = $_FILES['image']['size'];
//     $fileType = $_FILES['image']['type'];
//     $fileNameCmps = explode(".", $fileName);
//     $fileExtension = strtolower(end($fileNameCmps));

//     // Define allowed file extensions
//     $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

//     if (in_array($fileExtension, $allowedExts)) {
//         // Define upload path
//         $uploadFileDir = './uploaded_files/';
//         $dest_path = $uploadFileDir . $fileName;

//         // Create directory if it doesn't exist
//         if (!is_dir($uploadFileDir)) {
//             mkdir($uploadFileDir, 0755, true);
//         }

//         // Move the file to the upload directory
//         if (move_uploaded_file($fileTmpPath, $dest_path)) {
//             $imagePath = $dest_path;
//         } else {
//             echo "Error moving the uploaded file.";
//             exit;
//         }
//     } else {
//         echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
//         exit;
//     }

//     try {
//         // Corrected variable reference for password and image path
//         $stmt = $pdo->prepare("INSERT INTO users(name, userPassword, profile) VALUES(?, ?, ?)");
//         $check = $stmt->execute([$userName, $userPassword, $imagePath]);

//         // Check if registration was successful
//         if ($check) {
//             echo "<script>
//             alert('Registered Successfully');
//             </script>";
//         } else {
//             echo "<script>
//             alert('Did Not Register Successfully');
//             </script>";
//         }
//     } catch (PDOException $e) {
//         echo 'Error While Registering: ' . $e->getMessage();
//     }

// }
