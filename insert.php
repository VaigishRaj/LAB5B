<?php
include 'database.php';
include 'user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    $result = $user->createUser($_POST['matric'], $_POST['name'], $_POST['password'], $_POST['role']);

    if ($result === true) {
        echo "User successfully created.";
    } else {
        echo "Error: " . $result;
    }

    mysqli_close($db);
} else {
    echo "Invalid request.";
}
?>
