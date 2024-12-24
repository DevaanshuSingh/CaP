<!-- Ngrock
For Hide The Actual Source Code -->

<?php
session_start();

require_once 'config.php';
if (isset($_GET['checkName'], $_GET['checkPassword'])) {
    $userName = $_GET['checkName'];
    $userPassword = $_GET['checkPassword'];

    try {

        $stmt = $pdo->prepare(query: "SELECT * FROM users WHERE name=? AND userPassword=?;");
        $stmt->execute([$userName, $userPassword]);
        $existUser = $stmt->fetchAll();

        if (!empty($existUser)) {
            $stmt = $pdo->prepare(query: "SELECT * FROM users;");
            $stmt->execute();
            $users = $stmt->fetchAll();
            // foreach($existUser as $user) {
            // print_r($existUser);
            // echo "<script>alert(`Regesterd As:\n".$existUser[0]['id']."->".$existUser[0]['name'] ." `)</script>";
            // }
            ?>
            <!doctype html>
            <html lang="en">

            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- <title><i>CHAT</i><b>App</b></title> -->
                <title><i>CHAT<strong>A</strong></i>pp</title>

                <!-- <title>Sri Charcha</title> -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

                <link rel="stylesheet" href="./css/chat.css">
                <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
            </head>

            <body>
                <div class="users">
                    <div class="choose"><u>CHOOSE TO CHAT</u></div>
                    <div class="list">
                        <ul id="userList">
                            <?php
                            if (!empty($users)) {
                                foreach ($users as $user) {
                                    echo "<li onclick='secondPersonData(" . $user['name'], $user['profile'] . ")' data-id='" . $user['id'] . "'  data-name='" . $user['name'] . "' data-profile='" . $user['profile'] . "' >
                                            <div class='name'>" . $user['name'] . "</div>
                                            <div class='profile'><img src='" . $user['profile'] . "' alt=''></div>
                                        </li>";
                                    if ($user['name'] == $userName) {
                                        $myName = $user['name'];
                                        $myProfile = $user['profile'];
                                    }
                                }
                            } else {
                                echo 'alert("No Users Available");';
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="chat-section">

                    <div class="know-about">
                        <div class="second-person">
                            <div class="profile-pic">
                                <img src="" class="img-fluid" alt="">
                            </div>
                            <div class="profile-name"><?php // echo $user['name'] ?></div>
                        </div>

                        <!-- <div class="close-chat">X</button></div> -->

                        <div class="first-person " data-my-id='<?php echo $existUser[0]['id'] ?>'>
                            <div class="profile-pic">
                                <img src="<?php // echo $myProfile ?>" class="img-fluid" alt="Your Name">
                            </div>
                            <div class="profile-name"><?php echo $userName ?></div>
                        </div>
                    </div>

                    <div class="inner-chat">
                        <div class="chat-to">
                            <div class="show-message">
                                <div class="both-messages">

                                    <div class="sections message-receive">
                                        <h6 class="heading"><u>RECEIVED MESSAGES</u> <i class="icon ri-corner-right-up-fill"></i>
                                        </h6>
                                        <div class="all-texts">

                                        </div>
                                    </div>

                                    <div class=" sections message-sent">
                                        <h6 class="heading"><u>SENT MESSAGES</u> <i class="icon ri-corner-right-down-fill"></i></h6>
                                        <div class="all-texts">
                                            <?php
                                            if (isset($_POST['sendFromAjax'])) {
                                                $toSendId = $_POST['sendFromAjax'];
                                                echo "<script>alert(`toSendId: " . $toSendId . "`);</script>";
                                                $stmt = $pdo->prepare("SELECT message FROM send_messages WHERE fromUserId = ? AND toUserId= ?;");
                                                $stmt->execute([$existUser[0]['id'], $toSendId]);//here This toSendId Is A JS Variable How To Get THat's Value In PHP
                                                $messages = $stmt->fetchAll();
                                                if (!empty($messages)) {
                                                    foreach ($messages as $message) {
                                                        echo "<div class='go'>
                                                        <div class='text'>
                                                            " . $message['message'] . "
                                                        </div>
                                                    </div>";
                                                    }
                                                } else {
                                                    echo "<div class='go'>
                                                <div class='text'>
                                                    SELECT message FROM send_messages WHERE fromUserId = " . $existUser[0]['id'] . " AND toUserId= " . $toSendId . ";
                                                </div>
                                            </div>";
                                                }
                                            } else {
                                                echo "<script>alert(`Not Set`);</script>";
                                            }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="send-messages">
                                <div class="text-section"><input class="message message-input" type="text" name="message"
                                        placeholder="Type Message">
                                    <div class="send-image">
                                        <div onclick="sendMessage()" class="btn"><i class=" send-icon ri-upload-2-fill"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="design">
                    <div class="cnat"><img src="codernaccotax.png" alt="CNAT"></div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                    crossorigin="anonymous"></script>

                <script>
                    window.onload = () => {
                        alert('Loaded');
                    };
                    // alert(`Befor #hiddenId's value: ${document.querySelector('#hiddenId').value}`);
                    // let check = document.querySelector('#hiddenId').value;
                    // alert(`Before: ${check}`);

                    let getMyId = document.querySelector('.first-person');
                    let myId = getMyId.getAttribute('data-my-id');
                    let toSendId;
                    let design = document.querySelector('.design');

                    function secondPersonData(id, name, profile) { }
                    let userList = document.querySelectorAll('#userList > li');

                    userList.forEach(user => {
                        user.addEventListener('click', () => {
                            design.style.transition = 'all 2s ease';
                            design.style.height = '0%';
                            design.style.backgroundColor = 'rgba(218, 209, 209, 0)';

                            let name = user.getAttribute('data-name');
                            let profile = user.getAttribute('data-profile');
                            toSendId = user.getAttribute('data-id');

                            let replaceSecondPersonName = document.querySelector('.second-person .profile-name');
                            let replaceSecondPersonProfile = document.querySelector('.second-person .profile-pic img');
                            replaceSecondPersonName.textContent = name;

                            if (replaceSecondPersonProfile) {
                                // replaceSecondPersonProfile.src = profile;
                                replaceSecondPersonProfile.alt = name;
                            } else {
                                alert('Image element not found.');
                            }
                            alert(`Calling AJAX(${toSendId})`);
                            callAJAX(toSendId);
                            alert(`After Inputing Value: ${document.querySelector('#hiddenId').value}`);

                        });
                    });
                    // function callAJAX(toSendId) {
                    //     alert(`callAJAX: ${toSendId}`);
                    //     const xhr = new XMLHttpRequest();
                    //     xhr.open('POST', 'chat.php', true);
                    //     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    //     xhr.onprogress = function () {
                    //         alert("AJAX Loading");
                    //     };
                    //     xhr.onload = function () {
                    //         if (xhr.status === 200) {
                    //             // document.querySelector('.all-texts').innerHTML = xhr.responseText;
                    //             alert(`AJAX Sent ${toSendI}  And Response: ${xhr.responseText}`);
                    //         } else {
                    //             alert('Error: ' + xhr.status);
                    //         }
                    //     };
                    //     xhr.onerror = function () {
                    //         alert("AJAX Request Failed");
                    //     };
                    //     alert(`Before AJAX Sending: ${toSendId}`);
                    //     xhr.send('sendFromAjax=' + toSendId);
                    //     alert(`After AJAX Sending: ${toSendId}`);
                    // }
                    function callAJAX(toSendId) {
                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', 'chat.php', true);  // The same PHP file
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                        xhr.onload = function () {
                            if (xhr.status === 200) {
                                // document.querySelector('.all-texts').innerHTML = xhr.responseText;
                                alert(`AJAX Sent ${toSendI}  And Response: ${xhr.responseText}`);
                            } else {
                                alert('Error: ' + xhr.status);
                            }
                        };

                        xhr.onerror = function () {
                            alert("AJAX Request Failed");
                        };

                        alert(`Before AJAX Sending: ${toSendId}`);
                        xhr.send('sendFromAjax=' + encodeURIComponent(toSendId));
                        alert(`After AJAX Sending: ${toSendId}`);
                    }


                    function sendMessage() {
                        // alert("CLICKED");
                        let from = myId;
                        let to = toSendId;
                        let message = document.querySelector('.message-input').value.trim();
                        if (from && to && message) {
                            alert(`From: ${from}\nTo: ${to}\nMessage: ${message}`);
                            const xhr = new XMLHttpRequest();
                            xhr.open('POST', 'sendMessage.php', true);
                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                            xhr.onload = () => {
                                if (xhr.status === 200) {
                                    alert(`Message Sent: ${xhr.responseText}`);
                                    // window.location.href = 'sendMessage.php';
                                    document.querySelector('.message-input').value = "";
                                } else {
                                    alert('Error Occurred');
                                }
                            };
                            xhr.onerror = () => {
                                alert("Request Failed");
                            };
                            xhr.send(
                                "from=" + encodeURIComponent(from) +
                                "&to=" + encodeURIComponent(to) +
                                "&message=" + encodeURIComponent(message)
                            );
                        } else {
                            if (!from) alert('From is Empty');
                            if (!to) alert('To is Empty');
                            if (!message) alert('Message is Empty');
                        }
                    }

                </script>

            </body>

            </html>

            <?php

        } else {
            echo "<script>
            alert(`Please Register First To Use The ChatApp; \n`);
            window.location.href = 'index.php';
            </script>";
        }
    } catch (PDOException $e) {
        echo 'Error While Fetching Infos: ' . $e->getMessage();
    }
} else {
    echo "<script>
            alert(`Please Fullfill The Requirments First`);
            window.location.href = 'index.php';
        </script>";
}
?>