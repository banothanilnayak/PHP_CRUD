<?php
session_start();
if (isset($_SESSION['error']) && $_SESSION['error'] !== '') {
    echo <<<HTML
    <p style='margin-left:15rem; color: red; font-family:bold;'>{$_SESSION['error']}</p>
HTML;
    unset($_SESSION['error']);
}

echo <<<HTML
<form action='user_login_pro.php' method='post'>
    <div style="display: flex; margin-top: 5rem; flex-direction: column; gap: 1rem; justify-content: center; align-items: center; ">
     <input required name="user_name" placeholder="username" />
     <input required name="password" placeholder="password" />
    <button>Login</button>
</div>
</form>
HTML;
