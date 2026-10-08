<?php

require_once("core/database.php");

include_once("functions/checkDB.php");


$db_name = "php_learning";

if (!checkDB($db_name)) {
    
    echo "DB does not exists but we are creating... '$db_name'";

    $pdo->exec("CREATE DATABASE IF NOT EXISTS $db_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    echo "<hr>";

    echo "DB created..! '$db_name'";

    exit;

}else{
    
    echo "DB exists..! '$db_name'";

}


// $pdo->exec("CREATE DATABASE IF NOT EXISTS db_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
// $pdo->exec("DROP DATABASE IF EXISTS db_name");


// $dbName = 'mystore';

// $stmt = $pdo->query(
//     "SELECT SCHEMA_NAME 
//      FROM INFORMATION_SCHEMA.SCHEMATA 
//      WHERE SCHEMA_NAME = " . $pdo->quote($dbName)
// );

// if ($stmt->fetchColumn()) {
//     $pdo->exec("DROP DATABASE `$dbName`");
//     echo "Database '$dbName' deleted successfully.";
// } else {
//     echo "Database '$dbName' does not exist.";
// }

// $pdo->exec("USE mystore");
// $stmt = $pdo->query("SELECT DATABASE()");
// echo $stmt->fetchColumn();

// $pdo->exec("CREATE DATABASE IF NOT EXISTS php_learning CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");