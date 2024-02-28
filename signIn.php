<?php


include_once ('./config.php');



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body class="bg-primary-subtle">
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 border border-dark border-4 p-4">
                <h2 class="text-center mb-4">Sign In</h2>
                <form action="index.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-center" name="register">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php


if($_SERVER["REQUEST_METHOD"] === "POST"){

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);


    if(empty($username)){
        echo "Please enter a username";
    }elseif(empty($password)){
        echo "Please enter a password";
    }else{
        $hash =  password_hash($password ,PASSWORD_DEFAULT );
        $sql = "INSERT INTO users (user,password) VALUES('$username' , '$hash')";

        try{
            mysqli_query($conn,$sql);
            echo "You are now registered";
        }
        
        catch(mysqli_sql_exception){
            echo "user is already taken";
        }
    }
}


mysqli_close($conn);

?>