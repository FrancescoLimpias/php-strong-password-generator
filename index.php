<?php

// Global variables
$password = "";
$error = "";

// Listen for GET Submission
if (isset($_GET["length"])) {

    // Set working vars
    global $password, $error;
    $l = $_GET["length"];

    if ($l < 4) {
        // password too short
        $error = "Password must be longer than 3 characters";
    } else {

        // Declare password sampler
        $sampler = array(
            /* "lower"  */
            "abcdefghijklmnopqrstuvwxyz",
            /* "upper"  */
            "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
            /* "cipher" */
            "0123456789",
            /* "symbol" */
            "!@#$%^&*()-_=+;:,.<>/?\"'\|",
        );

        // Generate password
        for ($i = 0; $i < $l; $i++) {

            // determine which type of sample (lower, upper...) to pick from
            $type;
            if ($i <= 3) {
                $type = $i;
            } else {
                $type = rand(0, 3);
            }

            // pick and concatenate char
            $password .= $sampler[$type][rand(0, strlen($sampler[$type]) - 1)];
        }

        //shuffle the characters of the password
        $password = str_shuffle($password);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        <h3>Password Generator</h3>
        <span class="error" style="color:red"><?= $error ?></span>
        <br>
        <label for="input-lenght">Lenght: </label>
        <input type="number" name="length" id="input-length">
        <input type="submit" value="Run">
    </form>
    <span class="password">
        <b>
            <?= $password ?>
        </b>
    </span>
</body>

</html>