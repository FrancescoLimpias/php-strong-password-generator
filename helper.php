<?php

function generatePassword($length, $options)
{

    $password = "";

    // Data validation
    if ($length < 4) {
        // password too short
        return false;
    } else {

        // Declare password sampler 
        $sampler = [];
        if ($options["lower"]) {
            /* "lower" */
            $sampler[] = "abcdefghijklmnopqrstuvwxyz";
        }
        if ($options["upper"]) {
            /* "upper" */
            $sampler[] = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        }
        if ($options["cipher"]) {
            /* "cipher" */
            $sampler[] = "0123456789";
        }
        if ($options["symbol"]) {
            /* "symbol" */
            $sampler[] = "!@#$%^&*()-_=+;:,.<>/?\"'\|";
        }

        // Generate password
        for ($i = 0; $i < $length; $i++) {

            // determine which type of sample (lower, upper...) to pick from
            $type = $i;
            if ($i >= count($sampler)) {
                $type = rand(0, count($sampler) - 1);
            }

            // pick and concatenate char
            $pick = rand(0, strlen($sampler[$type]) - 1);
            $password .= $sampler[$type][$pick];

            // allow repetitions
            if (!$options["repetition"]) {
                $sampler[$type] = substr_replace($sampler[$type], '', $pick, 1);
            }
        }

        //shuffle the characters of the password
        return str_shuffle($password);
    }
}
