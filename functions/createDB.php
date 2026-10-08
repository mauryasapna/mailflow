<?php

function createDB($db_name){
        
       global $pdo;
        $pdo->exec("CREATE DATABASE IF NOT EXISTS $db_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        echo "created DB '$db_name'";

}
createDB($db_name);