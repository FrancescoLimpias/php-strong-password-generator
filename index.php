<?php
// Setup
require_once __DIR__ . "/helper.php";

// Global variables
$password;
$error = "";

// Listen for GET Submission
$length = $_GET["length"] ?? false;
if ($length) {

    // check for options
    $supportedOptions = ["lower", "upper", "cipher", "symbol", "repetition"];
    $options = [];
    foreach ($supportedOptions as $supportedOption) {
        $options[$supportedOption] = $_GET[$supportedOption] ?? false;
    }

    // try to generate password
    $password = generatePassword($length, $options);

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

    <!-- Compatibility -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ID -->
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Fontawesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

</head>

<body>
    <div class="form-container">

        <h3>Password Generator</h3>

        <form>

            <!-- Error display -->
            <?php if ($error) { ?>
                <span class="error" style="color: red">
                    <?= $error ?>
                </span>
                <br>
            <?php } ?>

            <!-- Password length -->
            <label for="input-lenght">Password length: </label>
            <input type="number" name="length" id="input-length" placeholder="length">

            <div class="checkbox-container">
                <!-- Allowed types -->
                <label for="check-lower">Minuscole</i></label>
                <input type="checkbox" name="lower" id="check-lower" checked>
                <label for="check-upper">Maiuscole</label>
                <input type="checkbox" name="upper" id="check-upper" checked>
                <label for="check-number">Cifre</label>
                <input type="checkbox" name="cipher" id="check-number" checked>
                <label for="check-symbol">Simboli</label>
                <input type="checkbox" name="symbol" id="check-symbol" checked>
                <!-- Repetitive characters -->
                <label for="check-repetition">Ripetizioni</label>
                <input type="checkbox" name="repetition" id="check-repetition">
            </div>
            <button type="submit">Submit</button>
        </form>
        
    </div>
</body>

</html>