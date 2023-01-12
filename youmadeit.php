<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password generated</title>

    <link rel="stylesheet" type="text/css" href="thankyou.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="thank-you-container">
        <h2>Password</h2>
        <div class="password-container">
            <span id="password">
                <?= $_SESSION["password"] ?>
            </span>
            <button id="copy-btn" class="copy-btn" onclick="copyPassword()">
                <i class="fas fa-copy"></i>
            </button>
        </div>
    </div>

    <script>
        function copyPassword() {
            var password = document.getElementById("password");
            var copyBtn = document.getElementById("copy-btn");
            var range = document.createRange();
            range.selectNode(password);
            window.getSelection().addRange(range);
            document.execCommand("copy");
            window.getSelection().removeAllRanges();
            copyBtn.innerHTML = '<i class="fas fa-check"></i>';
        }
    </script>
</body>

</html>