<?php
include 'functions.php';
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    deleteUser($userId);

    header('Location: admin_dashboard.php');
    exit;
}
?>
