<?php

function checkDB($db_name) {

    global $pdo;

    $stmt = $pdo->query(
        "SELECT SCHEMA_NAME
        FROM INFORMATION_SCHEMA.SCHEMATA 
     WHERE SCHEMA_NAME = " . $pdo->quote($db_name)
    );

    $resp = null;

    if ($stmt->fetchColumn()) {
        $resp = true;
    } else {
        $resp = false;
    }

    return $resp;
}

