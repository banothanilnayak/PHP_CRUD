<?php
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !== '') {

    echo <<<HTML
     <form action="user_form_pro.php" method="post">
         <div style="display: flex; margin-top: 5rem; flex-direction: column; gap: 1rem; justify-content: center; align-items: center; ">
             <input required name="fname" placeholder="enter first name" />
             <input required name="lname" placeholder="enter lastname name" />
             <input required name="userName" placeholder="enter username" />
             <input required name="password" placeholder="enter password" />
             <input required name="gmail" placeholder="enter Gmail address" />
             <button>Submit</button>
            </div>
        </form>
HTML;
} else {
    $_SESSION['error'] = 'invalid credentials or login first.';
    header('Location: user_login.php');
}
