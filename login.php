<?php
    session_start();
    if (isset($_SESSION["user"])) {
        header("Location: index.php");
        exit();
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel=stylesheet href= "style.css">
</head>
<body>
<div class="container mt-5">
    <?php
    session_start();
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        require_once "database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION["user"] = $user['email'];
                header("Location: index.php");
                die();
            }
            else{
                echo "<div class='alert alert-danger'>Invalid email or password.</div>";
            }
        }else{
            echo "<div class='alert alert-danger'>Invalid email or password.</div>";
        }
    }
    ?>
   
        <form action="login.php" method="post">
            <div class="mb-3">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Login" name="login">
            </div>
        </form>
        <div><p>Not registered yet</p> <a href="registration.php">Register Here</a></div>
    </div>
</body>
</html>