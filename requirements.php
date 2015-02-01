<?php

try {
    if((version_compare(PHP_VERSION, '5.4.0') >= 0) && extension_loaded('pdo')) {
        $test = new PDO('sqlite::memory:');
        echo "Congratulations! Your server pass the Cockpit requirements. ";
    } else {
        throw new Exception("PDO with SQLite support is missing");
    }
} catch(Exception $e) {
    echo "Sorry, your server doesn't pass the Cockpit requirements.";
}