<?php
session_start();
include 'db_connection.php';
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !== '') {
    if (isset($_GET['user_id']) && $_GET['user_id'] !== '') {
        $user_id = $_GET['user_id'];
        $user_delete_query = "DELETE FROM  `user_details` WHERE id='$user_id'";
        $user_delete_query_result = mysqli_query($connection, $user_delete_query);
        if ($user_delete_query_result) {
            header('Location: user_details.php');
        } else {
            echo 'failed to delete the user';
        }
    }
} else {
    $_SESSION['error'] = 'invalid credentials or login first.';
    header('Location: user_login.php');
}
