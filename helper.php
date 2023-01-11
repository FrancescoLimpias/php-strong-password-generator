<?php

function generatePassword($length)
{

    $password = "";

    // Data validation
    if ($length < 4) {
        // password too short 
        // $error = "Password must be longer than 3 characters";
        return false;
    } else {

        // Declare password sampler 
        $sampler = array(
            /* "lower" */
            "abcdefghijklmnopqrstuvwxyz",
            /* "upper" */
            "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
            /* "cipher" */
            "0123456789",
            /* "symbol" */
            "!@#$%^&*()-_=+;:,.<>/?\"'\|",
        );

        // Generate password
        for ($i = 0; $i < $length; $i++) {

            // determine which type of sample (lower, upper...) to pick from
            $type = $i;
            if ($i > 3) {
                $type = rand(0, 3);
            }

            // pick and concatenate char
            $password .= $sampler[$type][rand(0, strlen($sampler[$type]) - 1)];
        }

        //shuffle the characters of the password
        return str_shuffle($password);
    }
}
