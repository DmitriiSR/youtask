
<?php


if (isset($_POST['username']) && $_POST['username'] && isset($_POST['password']) && $_POST['password']) {
    $mysql = new mysqli("youtask", "mysql", "", "youtask");
    $mysql -> query("SET NAMES 'utf8'");

    if ($mysql -> connect_error) {
        echo json_encode(array('success' => 0, 'Error Number: ' => $mysql -> connect_errno, 'Error: ' => $mysql -> connect_error));
    }

    $useremail = $_POST['username'];
    $userpass = $_POST['password'];

    $usersTable = $mysql -> query("SELECT * FROM `users`");
    if ($usersTable -> num_rows > 0) {
        while($row = $usersTable -> fetch_assoc()) {
            if ($row['useremail'] === $useremail && $row['userpass'] === $userpass) {
                $username = $row['username'];
                echo json_encode(array('success' => 1, 'username' => $username));
                $mysql -> close();
                exit;
            }
        }
    }
    echo json_encode(array('error' => 1));
    $mysql -> close();
} else {
    echo json_encode(array('error' => 1));
}


