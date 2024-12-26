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
                                            <div class='name'>";
                                    if ($existUser[0]['id'] != $user['id'])
                                        echo $user['name'];
                                    else
                                        echo "<sup style='color:blue;'>(YOU)</sup>" . $user['name'];
                                    echo "</div>
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
                            <div class="profile-name"><?php echo $myName ?></div>
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
                                            <?php
                                            // require_once 'config.php';
                                            //     $stmt = $pdo->prepare("SELECT message FROM send_messages WHERE fromUserId = ? AND toUserId= ?;");
                                            //     $stmt->execute([1, 2]);
                                            //     $messages = $stmt->fetchAll();
                                            //     if ($messages) {
                                            //         foreach ($messages as $message) {
                                            //             echo "<div class='go'>
                                            //                 <div class='text'>
                                            //                     " . $message['message'] . "
                                            //                 </div>
                                            //             </div>";
                                            //         }
                                            //     } else {
                                            //         echo "<div class='go'>
                                            //         <div class='text'>
                                            //             SELECT message FROM send_messages WHERE fromUserId = " . $existUser[0]['id'] . " AND toUserId= " . $toSendId . ";
                                            //         </div>
                                            //     </div>";
                                            //     }
                                            ?>
                                        </div>
                                    </div>

                                    <div class=" sections message-sent">
                                        <h6 class="heading"><u>SENT MESSAGES</u> <i class="icon ri-corner-right-down-fill"></i></h6>
                                        <div class="all-texts">
                                            <?php
                                            // require_once 'config.php';
                                            // if (isset($_POST['choosedId'])) {
                                            // $toSendId = $_POST['choosedId'];
                                            // $toSendId = $_SESSION['choosedId'];
                                            // echo "<script>alert('toSendId Is:  $toSendId ');</script>";
                                            // $stmt = $pdo->prepare("SELECT message FROM send_messages WHERE fromUserId = ? AND toUserId= ?;");
                                            // $stmt->execute([1, 2]);//here This toSendId Is A JS Variable How To Get THat's Value In PHP
                                            // $messages = $stmt->fetchAll();
                                            // if (!empty($messages)) {
                                            //     foreach ($messages as $message) {
                                            //         echo "<div class='go'>
                                            //             <div class='text'>
                                            //                 " . $message['message'] . "
                                            //             </div>
                                            //         </div>";
                                            //     }
                                            // } else {
                                            //     echo "<div class='go'>
                                            //     <div class='text'>
                                            //         SELECT message FROM send_messages WHERE fromUserId = " . $existUser[0]['id'] . " AND toUserId= " . $toSendId . ";
                                            //     </div>
                                            // </div>";
                                            // }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="send-messages">
                                <div class="text-section"><input class="message message-input" type="text" name="message"
                                        placeholder="<?php echo "Welcome: $myName,"; ?>"></div>
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

                    setInterval(() => {
                        const xhrCheck = new XMLHttpRequest();
                        xhrCheck.open('POST', 'checkMessages.php', true);
                        xhrCheck.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhrCheck.onload = function () {
                            if (xhrCheck.status === 200) {
                                // alert("responseText: " + xhrCheck.responseText);
                                // document.querySelector('.message-sent .all-texts').innerHTML = xhrCheck.responseText;
                                if(xhrCheck!=0){
                                    sentMessages(myId, toSendId);
                                    receivedMessages(myId, toSendId)
                                }
                            } else {
                                alert(`Error in sm.php: ${xhrCheck.status}`);
                            }
                        };
                        xhrCheck.send();
                    }, 1000);

                    let getMyId = document.querySelector('.first-person');
                    let myId = getMyId.getAttribute('data-my-id');
                    let toSendId;
                    let design = document.querySelector('.design');
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

                            sentMessages(myId, toSendId);
                            receivedMessages(myId, toSendId);
                            // alert(`Done`);
                        });
                    });

                    // This Function Shows Sent-Messages(Messages Sent By You To Choosed_Person);
                    function sentMessages(myId, toSendId) {
                        // alert("Sent Messages");
                        // Send data to sm.php
                        const xhrSm = new XMLHttpRequest();
                        xhrSm.open('POST', 'sentMessages.php', true);
                        xhrSm.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhrSm.onload = function () {
                            if (xhrSm.status === 200) {
                                // alert("responseText: " + xhrSm.responseText);
                                document.querySelector('.message-sent .all-texts').innerHTML = xhrSm.responseText;
                            } else {
                                alert(`Error in sm.php: ${xhrSm.status}`);
                            }
                        };
                        xhrSm.send("choosedId=" + encodeURIComponent(toSendId) + "&myId=" + encodeURIComponent(myId));
                    }

                    // This Function Shows Received-Messages(Messages Received By You From Choosed_Person);
                    function receivedMessages(myId, toSendId) {
                        // alert("Received Messages");
                        // Send data to rm.php
                        const xhrRm = new XMLHttpRequest();
                        xhrRm.open('POST', 'receivedMessages.php', true);
                        xhrRm.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhrRm.onload = function () {
                            if (xhrRm.status === 200) {
                                // alert(xhrRm.responseText);
                                document.querySelector('.message-receive .all-texts').innerHTML = xhrRm.responseText;
                            } else {
                                alert(`Error in rm.php: ${xhrRm.status}`);
                            }
                        };
                        xhrRm.send("choosedId=" + encodeURIComponent(toSendId) + "&myId=" + encodeURIComponent(myId));
                    }

                    function sendMessage() {
                        // console.log("Sending");
                        let from = myId;
                        let to = toSendId;
                        let message = document.querySelector('.message-input').value.trim();
                        if (from && to && message) {
                            // alert(`From: ${from}\nTo: ${to}\nMessage: ${message}`);
                            const xhr = new XMLHttpRequest();
                            xhr.open('POST', 'sendMessage.php', true);
                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                            xhr.onload = () => {
                                if (xhr.status === 200) {
                                    sentMessages(myId, toSendId);
                                    receivedMessages(myId, toSendId);
                                    // alert(`Message Sent: ${xhr.responseText}`);
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
                        // console.log("Sent");
                        // location.reload();
                        updateNotificationTable();
                        sentMessages(myId, toSendId);
                        receivedMessages(myId, toSendId);
                    }

                    function updateNotificationTable() {
                        const xhrClear = new XMLHttpRequest();
                        xhrClear.open('POST', 'updateNotificationTable.php', true);
                        xhrClear.onload = function () {
                            if (xhrClear.status === 200) {
                                // alert("Clear Response: " + xhrClear.responseText);
                            } else {
                                alert(`Error in rm.php: ${xhrClear.status}`);
                            }
                        };
                        xhrClear.send();
                    }
                    function clearNotificationTable() {
                        const xhrClear = new XMLHttpRequest();
                        xhrClear.open('POST', 'clearNotificationTable.php', true);
                        xhrClear.onload = function () {
                            if (xhrClear.status === 200) {
                                alert("Clear Response: " + xhrClear.responseText);
                            } else {
                                alert(`Error in rm.php: ${xhrClear.status}`);
                            }
                        };
                        xhrClear.send();
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