<?php


include './config.php';

session_start();



if (isset($_POST['logout'])) {
    // Unset tanan session variables
    $_SESSION = [];
session_destroy();

}

// exit()
;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 border border-dark border-4 p-4 text-center">
                <form method="index.php" action="post">
                    <h2>Do you want to log out?</h2>
                    <button type="submit" name="logout" class="btn btn-primary mt-5">Yes</button>
                    <a href="index.php" class="btn btn-danger mt-5 ms-3">No</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

