<?php
return array(
    'db_config' => array(
        // required
        'database_type' => 'mysql',
        'database_name' => 'name',
        'server' => 'localhost',
        'username' => 'your_username',
        'password' => 'your_password',
        // optional
        'port' => 3306,
        'charset' => 'utf8',
        // driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
        'option' => array(
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        )
    )
);