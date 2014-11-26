<?php
return array(
    'db_config' => array(
        // required
        'database_type' => 'mysql',
        'database_name' => 'name',
        'server' => GIROCLETA_DB_SERVER,
        'username' => GIROCLETA_DB_USER,
        'password' => GIROCLETA_DB_PASSWD,
        // optional
        'port' => GIROCLETA_DB_PORT,
        'charset' => 'utf8',
        // driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
        'option' => array(
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        )
    )
);