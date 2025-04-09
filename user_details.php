    <?php
    session_start();
    include 'db_connection.php';


    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !== '') {
        $user_details_query = "SELECT * FROM `user_details`";
        $user_details_result =  mysqli_query($connection, $user_details_query);
        if ($user_details_result && mysqli_num_rows($user_details_result) >= 1) {
            echo <<<HTML
        <div style='display:flex; flex-direction:colum; justify-content:center; align-items:center ;margin-top:5rem'>
            <a style ='margin-bottom: 10rem;' href='user_form.php'>Back<a/>
            <a style ='margin-bottom: 10rem;' href='user_logout.php'>Logout<a/>
            <table  border='1'>
            <tr>
             <th>id</th>
             <th>fname</th>
             <th>lname</th>
             <th>user_name</th>
             <th>password</th>
             <th>gmail</th>
             <th>actions</th>
            </tr>
HTML;
            while ($row =  mysqli_fetch_assoc($user_details_result)) {
                echo <<<HTML
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['fname']}</td>
                <td>{$row['lname']}</td>
                <td>{$row['user_name']}</td>
                <td>{$row['password']}</td>
                <td>{$row['gmail']}</td>
                <td> 
                     <a href='user_update.php?user_id={$row['id']}'>edit</a>
                     <a href='user_delete_pro.php?user_id={$row['id']}'>delete</a>
                </td>
            </tr>
HTML;
            }
            echo <<<HTML
        </div>
    </table>
HTML;
        }
    } else {
        $_SESSION['error'] = 'invalid credentials or login first.';
        header('Location: user_login.php');
    }
    ?>
