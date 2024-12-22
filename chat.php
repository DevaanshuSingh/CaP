<!-- Ngrock
For Hide The Actual Source Code -->

<?php
require_once 'config.php';
if (isset($_GET['checkName'], $_GET['checkPassword'])) {
    // echo "<script>
    // alert('Starting Checking');
    // </script>";

    $userName = $_GET['checkName'];
    $userPassword = $_GET['checkPassword'];
    // echo "<script>
    // alert('Got_Name: $userName, Got_Pass: $userPassword');
    // </script>";

    try {
        // echo "<script>
        // alert('Inside Try Block');
        // </script>";

        $stmt = $pdo->prepare(query: "SELECT * FROM users WHERE name=? AND userPassword=?;");
        $stmt->execute([$userName, $userPassword]);
        $existUser = $stmt->fetchAll();

        if (!empty($existUser)) {
            echo "<script>
                        // alert(`User Have Registered (LINE: 19)`);
                    </script>";

            $stmt = $pdo->prepare(query: "SELECT * FROM users;");
            $stmt->execute();
            $users = $stmt->fetchAll();

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
                    <div class="heading">CHOOSE TO CHAT</div>
                    <div class="list">
                        <ul>
                            <?php
                            if (!empty($users)) {
                                foreach ($users as $user) {
                                    echo "<li>
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
                                <img src="<?php
                                // echo $user['profile']
                                ?>" class="img-fluid" alt="<?php
                                echo $user['name']
                                    ?>">
                            </div>
                            <div class="profile-name"><?php
                            echo $user['name']
                                ?></div>
                        </div>

                        <div class="first-person">
                            <div class="profile-pic">
                                <img src="<?php
                                // echo $myProfile
                                ?>" class="img-fluid" alt="<?php
                                echo $user['name']
                                    ?>">
                            </div>
                            <div class="profile-name"><?php echo $myName ?></div>
                        </div>
                    </div>

                    <div class="inner-chat">
                        <div class="chat-to">
                            <div class="show-message">
                                <div class="both-messages">


                                    <div class="sections message-receive">
                                        <h6 id="heading"><u>RECEIVED MESSAGES</u> <i class="ri-corner-right-up-fill"></i></h6>
                                        <div class="all-texts">
                                            <div class="go">
                                                <div class="text">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo, dolor atque doloribus ratione fuga ex illum rerum! Sunt modi facere laborum vel unde alias soluta expedita voluptatibus rem est odio ea atque animi eligendi voluptatum magni non nihil eum, doloribus distinctio quam molestias similique. A distinctio reprehenderit, aliquam totam expedita magnam, voluptates quis ratione suscipit doloremque beatae iure libero accusantium quas rem illum exercitationem minima at sapiente neque quae id eum error. Obcaecati dicta unde perspiciatis eius vel, tempora esse quasi ipsum libero eum ea, error incidunt magnam? Accusamus deserunt cumque ratione libero eligendi. Minima, incidunt impedit. Recusandae, quod, ea sapiente iste ipsum possimus quam ut modi id perferendis corporis odio similique reprehenderit sunt laboriosam eveniet, ratione maxime illum minus alias quasi eligendi quas quisquam asperiores. Tenetur veritatis quibusdam iure blanditiis nesciunt nemo nostrum asperiores laborum cumque itaque hic qui et, labore in cupiditate doloremque! Sunt et vitae, doloremque, impedit commodi totam perspiciatis minima numquam mollitia corporis laborum consectetur iste in placeat, sint vel repellat sit expedita. Earum nisi fuga consectetur error culpa eum suscipit excepturi adipisci sint veritatis aut eaque est et nemo voluptates porro, quibusdam ex illum nostrum veniam inventore accusantium eveniet magni? Blanditiis perspiciatis corrupti, deserunt nostrum quas, consectetur nesciunt qui rerum facere fugit possimus. Repellendus, et possimus inventore minima tempora ea saepe. Libero ratione quos accusamus sapiente dignissimos at voluptas iste. Unde alias nisi quidem obcaecati repellendus eaque minima magni voluptatem totam quia maiores necessitatibus debitis, reiciendis placeat error iure quaerat facilis fugiat labore delectus dignissimos, fugit eius! Animi sunt accusamus corrupti, hic est nihil debitis itaque nulla temporibus maiores cum sequi esse quidem atque vitae, vel similique, deserunt recusandae laborum laudantium saepe. Sit aliquid sequi excepturi asperiores id possimus ab sed, enim vel. Quis vel, illum eveniet, fuga aperiam quidem aliquid nam velit ducimus earum rerum. Iusto voluptatum deserunt laborum adipisci reprehenderit perspiciatis dolorum eius magnam sit et exercitationem, sunt dicta deleniti at saepe laudantium eveniet soluta aliquid veritatis voluptas quis, libero, nemo nobis? Porro, aliquid quae quod quia eaque magnam placeat numquam iusto excepturi, similique et non sapiente assumenda voluptatem aspernatur cum omnis velit at repudiandae vitae quo eos a, corrupti quaerat! Voluptas, ipsa. Id, quo aperiam! Perferendis aliquid, voluptatibus error quam vitae tempore quibusdam sunt suscipit neque culpa natus autem eius cumque aspernatur? Ab corrupti ipsa, natus exercitationem laborum illum error magni possimus aut quasi odit id commodi consectetur reprehenderit accusantium praesentium? Perspiciatis dolores ad quasi omnis? Cumque nisi inventore eligendi pariatur sed dolor fuga, eos deleniti cum ipsam, laboriosam nobis aliquid facere nesciunt. Eaque tenetur adipisci dolor consectetur praesentium ut doloribus consequatur id, culpa nobis recusandae accusamus error porro corrupti temporibus quasi fugiat cupiditate optio dolorum. Cupiditate vero veritatis sit quaerat atque ratione eveniet voluptate eaque et obcaecati? Voluptates, voluptate! Soluta illum veniam error numquam expedita explicabo assumenda sit iure, iste maiores repudiandae cumque velit fugit molestias nulla voluptatem! Expedita maiores aliquid dolore quis voluptas, natus dolorem laboriosam aut nam omnis incidunt sed non perferendis reprehenderit deleniti beatae consequatur suscipit. Distinctio, culpa?
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" sections message-sent">
                                        <h6 id="heading"><u>SENT MESSAGES</u> <i class=" icon ri-corner-right-down-fill"></i>
                                        </h6>

                                        <div class="all-texts">
                                            <div class="go">
                                                <div class="text">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo, dolor atque doloribus ratione fuga ex illum rerum! Sunt modi facere laborum vel unde alias soluta expedita voluptatibus rem est odio ea atque animi eligendi voluptatum magni non nihil eum, doloribus distinctio quam molestias similique. A distinctio reprehenderit, aliquam totam expedita magnam, voluptates quis ratione suscipit doloremque beatae iure libero accusantium quas rem illum exercitationem minima at sapiente neque quae id eum error. Obcaecati dicta unde perspiciatis eius vel, tempora esse quasi ipsum libero eum ea, error incidunt magnam? Accusamus deserunt cumque ratione libero eligendi. Minima, incidunt impedit. Recusandae, quod, ea sapiente iste ipsum possimus quam ut modi id perferendis corporis odio similique reprehenderit sunt laboriosam eveniet, ratione maxime illum minus alias quasi eligendi quas quisquam asperiores. Tenetur veritatis quibusdam iure blanditiis nesciunt nemo nostrum asperiores laborum cumque itaque hic qui et, labore in cupiditate doloremque! Sunt et vitae, doloremque, impedit commodi totam perspiciatis minima numquam mollitia corporis laborum consectetur iste in placeat, sint vel repellat sit expedita. Earum nisi fuga consectetur error culpa eum suscipit excepturi adipisci sint veritatis aut eaque est et nemo voluptates porro, quibusdam ex illum nostrum veniam inventore accusantium eveniet magni? Blanditiis perspiciatis corrupti, deserunt nostrum quas, consectetur nesciunt qui rerum facere fugit possimus. Repellendus, et possimus inventore minima tempora ea saepe. Libero ratione quos accusamus sapiente dignissimos at voluptas iste. Unde alias nisi quidem obcaecati repellendus eaque minima magni voluptatem totam quia maiores necessitatibus debitis, reiciendis placeat error iure quaerat facilis fugiat labore delectus dignissimos, fugit eius! Animi sunt accusamus corrupti, hic est nihil debitis itaque nulla temporibus maiores cum sequi esse quidem atque vitae, vel similique, deserunt recusandae laborum laudantium saepe. Sit aliquid sequi excepturi asperiores id possimus ab sed, enim vel. Quis vel, illum eveniet, fuga aperiam quidem aliquid nam velit ducimus earum rerum. Iusto voluptatum deserunt laborum adipisci reprehenderit perspiciatis dolorum eius magnam sit et exercitationem, sunt dicta deleniti at saepe laudantium eveniet soluta aliquid veritatis voluptas quis, libero, nemo nobis? Porro, aliquid quae quod quia eaque magnam placeat numquam iusto excepturi, similique et non sapiente assumenda voluptatem aspernatur cum omnis velit at repudiandae vitae quo eos a, corrupti quaerat! Voluptas, ipsa. Id, quo aperiam! Perferendis aliquid, voluptatibus error quam vitae tempore quibusdam sunt suscipit neque culpa natus autem eius cumque aspernatur? Ab corrupti ipsa, natus exercitationem laborum illum error magni possimus aut quasi odit id commodi consectetur reprehenderit accusantium praesentium? Perspiciatis dolores ad quasi omnis? Cumque nisi inventore eligendi pariatur sed dolor fuga, eos deleniti cum ipsam, laboriosam nobis aliquid facere nesciunt. Eaque tenetur adipisci dolor consectetur praesentium ut doloribus consequatur id, culpa nobis recusandae accusamus error porro corrupti temporibus quasi fugiat cupiditate optio dolorum. Cupiditate vero veritatis sit quaerat atque ratione eveniet voluptate eaque et obcaecati? Voluptates, voluptate! Soluta illum veniam error numquam expedita explicabo assumenda sit iure, iste maiores repudiandae cumque velit fugit molestias nulla voluptatem! Expedita maiores aliquid dolore quis voluptas, natus dolorem laboriosam aut nam omnis incidunt sed non perferendis reprehenderit deleniti beatae consequatur suscipit. Distinctio, culpa?
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="send-messages">
                                <div class="text-section"><input class="message" type="text" name="message">
                                    <div class="send-image">
                                        <div class="btn"><i class=" icon ri-upload-2-fill"></i></div>
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
                    let design = document.querySelector('.design');
                    design.addEventListener(
                        "click", () => {
                            design.style.transition = 'all 2s ease';
                            // design.style.display = 'none';
                            design.style.height = '0%';
                            design.style.backgroundColor = 'rgba(218, 209, 209, 0)';
                        }
                    );
                </script>

            </body>

            </html>

            <?php

        } else {
            echo "<script>
            alert(`Please Register First To Use The ChatApp; \nNot Enough Users, (OUTER)`);
            window.location.href = 'index.php';
            </script>";
        }
    } catch (PDOException $e) {
        echo 'Error While Fetching Infos: ' . $e->getMessage();
    }
} else {
    echo '<script>alert(`Please Fullfill The Requirments First`);</script>';
}
?>