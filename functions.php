<?php
$dbFile = 'db.txt';
function hasUser($users, $email) {
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            return true;
        }
    }
    return false;
}

function readUserData() {
    global $dbFile;
    $users = [];
    $lines = file($dbFile, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        $data = explode('|', $line);
        $user = [
            'id' => $data[0],
            'username' => $data[1],
            'email' => $data[2],
            'password' => $data[3],
            'role' => $data[4]
        ];
        $users[] = $user;
    }
    return $users;
}

function writeUserData($users) {
    global $dbFile;
    $lines = [];
    foreach ($users as $user) {
        $line = implode('|', [
            $user['id'],
            $user['username'],
            $user['email'],
            $user['password'],
            $user['role']
        ]);
        $lines[] = $line;
    }
    file_put_contents($dbFile, implode("\n", $lines));
}


function getUserDataFromDb($userId) {
    global $dbFile;
    
    $data = file($dbFile, FILE_IGNORE_NEW_LINES);
    
    foreach ($data as $line) {
        $userData = explode('|', $line);
        if ($userData[0] == $userId) {
            return [
                'id' => $userData[0],
                'username' => $userData[1],
                'email' => $userData[2],
                'role' => $userData[3],
            ];
        }
    }
    return null;
}
function updateUser($userId, $newUsername, $newEmail) {
    global $dbFile;
    
    $data = file($dbFile, FILE_IGNORE_NEW_LINES);
    
    $updatedData = [];
    
    foreach ($data as $line) {
        $userData = explode('|', $line);

        if ($userData[0] == $userId) {
            $userData[1] = $newUsername;
            $userData[2] = $newEmail;
        }
        
        $updatedData[] = implode('|', $userData);
    }

    $newContent = implode(PHP_EOL, $updatedData);

    file_put_contents($dbFile, $newContent);

    return true; 
}

function deleteUser($userId) {
    global $dbFile;

    $data = file($dbFile, FILE_IGNORE_NEW_LINES);

    $updatedData = [];

    foreach ($data as $line) {
        $userData = explode('|', $line);

        if ($userData[0] == $userId) {
            continue;
        }
        $updatedData[] = $line;
    }
    $newContent = implode(PHP_EOL, $updatedData);

    file_put_contents($dbFile, $newContent);

    return true; 
}
