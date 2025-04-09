<?php
session_start();
include 'db_connection.php';
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !== '') {

    if (isset($_GET['user_id']) && $_GET['user_id'] !== '') {
        $user_id = $_GET['user_id'];
        $user_detail_retreive_query = "SELECT * FROM `user_details` WHERE id='$user_id'";
        $user_detail_retreive_query_result = mysqli_query($connection, $user_detail_retreive_query);
        if ($user_detail_retreive_query_result && mysqli_num_rows($user_detail_retreive_query_result) >= 1) {
            $result = mysqli_fetch_assoc($user_detail_retreive_query_result);
            $id = $result['id'];
            $fname = $result['fname'];
            $lname = $result['lname'];
            $user_name = $result['user_name'];
            $password = $result['password'];
            $gmail = $result['gmail'];

            echo <<<HTML
            <form action='user_form_pro.php?user_id={$id}' method='post'>
                <div style="display: flex; margin-top: 5rem; flex-direction: column; gap: 1rem; justify-content: center; align-items: center; ">
                <input required name="fname" placeholder="enter first name" value = {$fname} />
                <input required name="lname" placeholder="enter lastname name" value = {$lname} />
                <input required name="userName" placeholder="enter username" value = {$user_name} />
                <input required name="password" placeholder="enter password" value = {$password} />
                <input required name="gmail" placeholder="enter Gmail address" value = {$gmail} />
                <button>update</button>
                </div>
            </form>
HTML;
        }
    }
} else {
    $_SESSION['error'] = 'invalid credentials or login first.';
    header('Location: user_login.php');
}
