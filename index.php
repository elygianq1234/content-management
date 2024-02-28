<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body class="container-fluid bg-success-subtle">
    <h1 class="text-black text-center mt-5">Content Management System</h1>
    <h2 class="myh2 text-center text-success mt-5">Login</h2>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 border border-dark  border-4  p-4">
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <label for="username" class="text-black">Username :</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter username" required><br>
                    <label for="password" class="text-black">Password: </label>
                    <input type="password" name="password" class="form-control" id="pass" placeholder="Password"  ><br>
                    <input type="checkbox" name="check" onclick="showPassword()" class="" >Show Password <br>
                    <input type="submit" name="login" value="Log In" class="btn btn-primary m-2"><br>
                    <a href="signIn.php">Sign in</a> Dont Have an account ?<br>
                </form>
            </div>
        </div>
    </div>
     
        <?php if(isset($_SESSION['user'])) :?>
            <input type="submit" name="login" value="Login">
        <?php endif; ?>
   
<script src="password.js"></script>

<script>
    $(document).ready function(){

    }
</script>

</body>
</html>


<?php


session_start();
session_destroy();
include_once './config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username) || empty($password)) {
        echo "Please enter both username and password";
    } else {
        // Hash the password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Check if username already exists
        $check_query = "SELECT * FROM users WHERE user = '$username'";
        $result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($result) > 0) {
            echo "Username is already taken";
        } else {
            // Insert the user into the database
            $sql = "INSERT INTO users (user, password) VALUES ('$username', '$hash')";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['username'] = $username; // Set session variable
                header("Location: page.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
}
mysqli_close($conn);
exit();






