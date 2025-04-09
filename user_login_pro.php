<?php
session_start();
include 'db_connection.php';
if (isset($_POST['user_name']) && $_POST['user_name'] != '' && isset($_POST['user_name']) && $_POST['user_name'] != '') {
    $gmail = $_POST['user_name'];
    $password = $_POST['password'];

    $user_data_query =  "SELECT * FROM `user_details` WHERE gmail='$gmail' LIMIT 1";
    $user_data_query_result = mysqli_query($connection, $user_data_query);

    if ($user_data_query_result && mysqli_num_rows($user_data_query_result) === 1) {
        $result = mysqli_fetch_assoc($user_data_query_result);
        if ($result['password'] === $password) {
            $_SESSION['user_id'] = $result['id'];
            header('Location: user_details.php');
        } else {
            header('Location: user_login.php');
        }
    } else {
        $_SESSION['error'] = 'invalid credentials or login first.';
        header('Location: user_login.php');
    }
}
