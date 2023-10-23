<?php
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    $lines = file('db.txt', FILE_IGNORE_NEW_LINES);

    foreach ($lines as &$line) {
        $userData = explode('|', $line);
        if ($userData[0] == $userId) {
            $userData[4] = 'admin';
            $line = implode('|', $userData);
            break;
        }
    }

    file_put_contents('db.txt', implode(PHP_EOL, $lines));
    
    header("Location: admin_dashboard.php");
    exit();
} else {
    echo "Invalid user ID.";
}
?>
