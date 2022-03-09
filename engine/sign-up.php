<?php
if (isset($_POST['username']) && $_POST['username'] && isset($_POST['passwordreg']) && $_POST['passwordreg'] && isset($_POST['fullname']) && $_POST['fullname'] && isset($_POST['confirmpassword']) && $_POST['confirmpassword']) {
    $mysql = new mysqli("youtask", "mysql", "", "youtask");
    $mysql -> query("SET NAMES 'utf8'");

    if ($mysql -> connect_error) {
        echo json_encode(array('success' => 0, 'Error Number: ' => $mysql -> connect_errno, 'Error: ' => $mysql -> connect_error));
    }

    $username = $_POST['fullname'];
    $useremail = $_POST['username'];
    $userpass = $_POST['passwordreg'];

    $usersTable = $mysql -> query("SELECT * FROM `users`");
    if ($usersTable -> num_rows > 0) {
        while($row = $usersTable -> fetch_assoc()) {
            if ($row['useremail'] === $useremail) {
                echo json_encode(array('error' => 1));
                $mysql -> close();
                exit;
            }
        }
    }

    $mysql -> query("INSERT INTO `users`(`username`, `useremail`, `userpass`) VALUES ('$username', '$useremail', '$userpass')");

    echo json_encode(array('success' => 1, 'username' => $username));

    $mysql -> close();

} else {
    echo json_encode(array('success' => 0));
}