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
                    //         echo "<script>
                    // alert(`User Have Registered`);
                    //     window.location.href = 'chat.php';
                    // </script>";


                    // try {
                    //     $stmt = $pdo->prepare(query: "SELECT name,profile FROM users;");
                    //     $stmt->execute();
                    //     $users = $stmt->fetchAll();
                    // } catch (PDOException $e) {
                    //     echo 'Error While Fetching Infos: ' . $e->getMessage();
                    // }
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
                        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
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
                                    } else {
                                        echo 'alert("No Users Available");';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                        <div class="chat-section">
                            <div class="self">
                                <div class="another-info">
                                    <div class="profile-pic">
                                        <img src="<?php echo $imageSrc['profile'] ?>" alt="<?php echo $name['name'] ?>">
                                    </div>
                                    <div class="profile-name"></div>
                                </div>

                                <div class="my-info">
                                    <div class="profile-pic">
                                        <img src="<?php echo $imageSrc['profile'] ?>" alt="<?php echo $name['name'] ?>">
                                    </div>
                                    <div class="profile-name"></div>
                                </div>

                            </div>
                            <div class="inner-chat">
                                <div class="chat-to">
                                    <div class="show-message">
                                        <div class="both-messages">
                                            <div class=" sections message-sent">
                                                <h6 id="heading"><u>RECEIVED MESSAGES</u> <i class=" icon ri-corner-right-down-fill"></i>
                                                </h6>

                                                <div class="all-texts">
                                                    <div class="go">
                                                        <div class="icon"><i class=" icon ri-corner-right-down-fill"></i></div>
                                                        <div class="text">
                                                            KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK
                                                            ko ko k k k ok o sdfg sdgs dgs dgh sdgsdg sg sd gsd gsd gsd gsd gsd g
                                                        </div>
                                                    </div>

                                                    <div class="go">
                                                        <div class="icon"><i class=" icon ri-corner-right-down-fill"></i></div>
                                                        <div class="text">
                                                            lorem700
                                                        </div>
                                                    </div>

                                                    <div class="go">
                                                        <div class="icon"><i class=" icon ri-corner-right-down-fill"></i></div>
                                                        <div class="text">
                                                            lorem700
                                                        </div>
                                                    </div>
                                                    <div class="go">
                                                        <div class="icon"><i class=" icon ri-corner-right-down-fill"></i></div>
                                                        <div class="text">
                                                            lorem700
                                                        </div>
                                                    </div>
                                                    <div class="go">
                                                        <div class="icon"><i class=" icon ri-corner-right-down-fill"></i></div>
                                                        <div class="text">
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam amet provident
                                                            perspiciatis nemo! Deleniti, voluptatum. Hic accusantium labore molestias
                                                            adipisci, veritatis ad similique debitis voluptatibus minus laborum quos
                                                            distinctio aut recusandae dolor itaque culpa at blanditiis explicabo
                                                            exercitationem ipsam. Nihil deleniti possimus eum quibusdam nesciunt.
                                                        </div>
                                                    </div>
                                                    <div class="go">
                                                        <div class="icon"><i class=" icon ri-corner-right-down-fill"></i></div>
                                                        <div class="text">
                                                            lorem700
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="sections message-receive">
                                                <h6 id="heading"><u>SENT MESSAGES</u> <i class="ri-corner-right-up-fill"></i></h6>

                                                <div class="all-texts">
                                                    <div class="come">
                                                        <div class="icon"><i class="ri-corner-right-up-fill"></i></div>
                                                        <div class="text">
                                                            <!-- KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK -->
                                                            ko ko k k k ok o sdfg sdgs dgs dgh sdgsdg sg sd gsd gsd gsd gsd gsd g
                                                        </div>
                                                    </div>
                                                    <div class="come">
                                                        <div class="icon"><i class="ri-corner-right-up-fill"></i></div>
                                                        <div class="text">
                                                            <!-- KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK -->
                                                            ko ko k k k ok o sdfg sdgs dgs dgh sdgsdg sg sd gsd gsd gsd gsd gsd g
                                                            ko ko k k k ok o sdfg sdgs dgs dgh sdgsdg sg sd gsd gsd gsd gsd gsd g
                                                            ko ko k k k ok o sdfg sdgs dgs dgh sdgsdg sg sd gsd gsd gsd gsd gsd g
                                                        </div>
                                                    </div>
                                                    <div class="come">
                                                        <div class="icon"><i class="ri-corner-right-up-fill"></i></div>
                                                        <div class="text">
                                                            ,
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="send-messages">
                                        <div class="text-section">
                                            <input class="message" type="text" name="message">
                                            <div class="send-image">
                                                <div class="btn"><i class="ri-upload-2-fill"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                            crossorigin="anonymous"></script>
                        <script src="script.js"></script>

                    </body>

                    </html>
                    <?php

                }
            }
            echo "<script>
            alert(`Please Register First`);
            window.location.href = 'index.php';

            </script>";
        } else {
            echo "<script>
            alert(`Please Register First To Use The ChatApp;`);
                        window.location.href = 'index.php';
            </script>";
        }
    } catch (PDOException $e) {
        echo 'Error While Fetching Infos: ' . $e->getMessage();
    }
} else {
    // echo '<script>alert(`Please Register First To Use The ChatApp;`);</script>';
}
?>