<?php
// Setup
require_once __DIR__ . "/helper.php";

// Global variables
$password;
$error = "";

// Listen for GET Submission
$length = $_GET["length"] ?? false;
if ($length) {

    // try to generate password
    $password = generatePassword($length);

    // if SUCCESS then redirect
    if ($password) {
        session_start();
        $_SESSION["password"] = $password;
        header("Location: youmadeit.php");
    } else {
        $error = "Error generating the password.";
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
        <!-- <span class="error" style="color:red"><?= $error ?></span>
        <br> -->
        <label for="input-lenght">Lenght: </label>
        <input type="number" name="length" id="input-length">
        <input type="submit" value="Run">
    </form>
    <?php if ($error) { ?>
        <span class="error">
            <?= $error ?>
        </span>
    <?php } ?>
</body>

</html>