<?php
    session_start();
    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
        exit();
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel=stylesheet href= "style.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome to the User Dashboard</h1>
        <h1>Welcome, <?php echo $_SESSION["user"]; ?>!</h1>
        <p>This is a protected area. You must be logged in to view this page.</p>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>    
</body>
</html>