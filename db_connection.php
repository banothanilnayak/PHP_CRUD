<?php
$username = 'root';
$password = '';
$db_name = 'crud_operation_2';
$host = 'localhost';

$connection = mysqli_connect($host, $username, $password, $db_name);

if (!$connection) echo 'failed to connection the database ';
