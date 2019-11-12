<?php

function ddie($var) {
    echo "<pre>";
        var_dump($var);
    echo "</pre>";
    die();
}