<?php
session_start();
include 'db_connection.php';

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !== '') {

    if (isset($_POST['fname']) && $_POST['fname'] !== '' && isset($_POST['lname']) && $_POST['lname'] !== '' && isset($_POST['userName']) && $_POST['userName'] !== '' && isset($_POST['password']) && $_POST['password'] !== '' && isset($_POST['gmail']) && $_POST['gmail'] !== '') {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        $gmail = $_POST['gmail'];

        if (isset($_GET['user_id']) && $_GET['user_id'] !== '') {
            $id = $_GET['user_id'];
            $update_query = "UPDATE `user_details` SET fname='$fname', lname='$lname', user_name='$userName', password='$password', gmail='$gmail' WHERE id='$id'";
            $update_query_result = mysqli_query($connection, $update_query);
            if ($update_query_result)  header('Location: user_details.php');
            else echo 'failed to update the user data';
        } else {
            $insert_query = "INSERT INTO `user_details` (fname, lname, user_name, password, gmail) VALUES ('$fname', '$lname', '$userName', '$password', '$gmail' );";
            $insert_query_result = mysqli_query($connection, $insert_query);
            if ($insert_query_result)  header('Location: user_details.php');
            else echo 'failed to insert the user data';
        }
    }
} else {
    $_SESSION['error'] = 'invalid credentials or login first.';
    header('Location: user_login.php');
}
