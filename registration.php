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
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel=stylesheet href= style.css>
</head>
<body>
    <div class="container mt-5">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $fullname = $email = $password = $passwordRepeat = "";
        $errors = array();

        if (isset($_POST["submit"])) {
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];

            if (empty($fullname) || empty($email) || empty($password) || empty($passwordRepeat)) {
                array_push($errors, "All fields are required.");
            } 
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Invalid email format.");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters long.");
            }
            if ($password !== $passwordRepeat) {
                array_push($errors, "Passwords do not match.");
            }
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $row_count = mysqli_num_rows($result);
            if ($row_count > 0) {
                array_push($errors, "Email already exists.");
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                require_once "database.php";
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
                $prepareStmt = mysqli_prepare($conn, $sql);

                if($prepareStmt) {
                    mysqli_stmt_bind_param($prepareStmt, "sss", $fullname, $email, $passwordHash);
                    mysqli_stmt_execute($prepareStmt);
                    echo "<div class='alert alert-success'>Registration successful!</div>";
                } else {
                    die("Something went wrong: " . mysqli_error($conn));
                }
            }
        }
        ?>

        <form action="" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?php echo htmlspecialchars($fullname); ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div><p>Already registered</p> <a href="login.php"> Login Here</a></div>
    </div>
</body>
</html>
