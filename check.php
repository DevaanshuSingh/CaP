<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Camera with Button</title>
    <style>
        .response {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <button onclick="callAJAX(1)" class="btn">AJAX</button>
    <div class="response" id="response"></div>

    <script>
        function callAJAX(toSendId) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'check.php', true);  // The same PHP file
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('response').innerHTML = `Response From Here: ${xhr.responseText}<br>To Here`; 
                } else {
                    document.getElementById('response').innerHTML = `Error From Here: ${xhr.statusText}<br>To Here`;
                }
            };

            xhr.onerror = function () {
                document.getElementById('response').innerText = "AJAX Request Failed";
            };

            // Sending toSendId to the server
            xhr.send('checking=' + encodeURIComponent(toSendId));
        }
    </script>
</body>
</html> -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checking'])) {
    $checking = $_POST['checking'];
    echo "InPHP: $checking";
    exit; // Stop further processing to ensure only the response is returned
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Form Submit</title>
</head>

<body>
    <form id="myForm">
        <input type="text" name="checking" id="checking" placeholder="Enter your name" />
        <button type="submit">Submit</button>
    </form>

    <p id="response" style="border: 1px solid black; padding: 10px;"></p>

    <script>

        location.onload = alert("GRK");
        // Get the input value
        const checkingValue = document.getElementById("checking").value;

        // Create an AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "", true); // Send request to the same page
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Handle the response
        xhr.onload = function () {
            if (xhr.status === 200) {
                document.getElementById("response").textContent = xhr.responseText; // Display response
            } else {
                document.getElementById("response").textContent = xhr.responseText; // Display response
            }
        };

        // Send the data
        xhr.send("checking=" + encodeURIComponent(checkingValue));
    });
    </script>
</body>

</html>