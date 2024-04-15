<?php

include ('connect.php');

session_start();

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    // Check if a user is already logged in
    $checkUser = "SELECT COUNT(*) AS countUser from users WHERE id = ?";
    $stmtCheckUser = mysqli_prepare($conn, $checkUser);
    mysqli_stmt_bind_param($stmtCheckUser, "i", $id);
    mysqli_stmt_execute($stmtCheckUser);
    mysqli_stmt_bind_result($stmtCheckUser, $countUser);
    mysqli_stmt_fetch($stmtCheckUser);
    mysqli_stmt_close($stmtCheckUser);

    if ($countUser > 0) {
        // Catch error when login user try to access applicant's application form
        echo "<script type='text/javascript'>alert('You cannot go back to this page while login.'); 
        window.location.href = 'return.php';</script>";
        exit();
    }
}

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    // Check if current admin is already logged in
    $checkAdmin = "SELECT COUNT(*) AS countAdmin from admins WHERE id = ?";
    $stmtCheckAdmin = mysqli_prepare($conn, $checkAdmin);
    mysqli_stmt_bind_param($stmtCheckAdmin, "i", $id);
    mysqli_stmt_execute($stmtCheckAdmin);
    mysqli_stmt_bind_result($stmtCheckAdmin, $countAdmin);
    mysqli_stmt_fetch($stmtCheckAdmin);
    mysqli_stmt_close($stmtCheckAdmin);

    if ($countAdmin > 0) {
        // Catch error when login user try to access applicant's application form
        echo "<script type='text/javascript'>alert('You cannot go back to this page while login.'); 
        window.location.href = 'return.php';</script>";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    if (!empty($admin_username) && !empty($admin_password) && !is_numeric($admin_username)) {

        $sql = "SELECT * FROM admins WHERE username = '$admin_username' && user_type = 'admin'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            // Verify the hashed password
            if($user_data['password'] == $admin_password) {
                $_SESSION['id'] = $user_data['id'];
                $_SESSION['user_type'] = $user_data['user_type'];

                header("Location: admin_dashboard.php ");
                die;
            }
        }
        echo "<script type='text/javascript'> alert('Incorrect Credentials');
        window.location.href = 'admin_login.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Website</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            /* Prevent horizontal scrolling */
            position: relative;
            background: #3457D5;
            /* Updated left background color */
        }

        /* Left Background */
        .left-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 50vw;
            height: 100vh;
            background-color: #FFFCEB;
            /* Updated left color */
            z-index: -1;
            /* Ensure it's behind other content */
        }

        /* Right Background */
        .right-bg {
            position: absolute;
            top: 0;
            right: 0;
            width: 50vw;
            height: 100vh;
            background-color: #3457D5;
            /* Updated right color */
            z-index: -1;
            /* Ensure it's behind other content */
        }

        /* Login Container */
        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 50px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            /* Box shadow for container */
            border-radius: 10px;
            /* Rounded corners */
            text-align: center;
            /* Center text */
            width: 400px;
            /* Set width */
        }

        /* Login Form Styles */
        .login-form {
            text-align: center;
            /* Align form elements to the center */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-form input[type="text"],
        .login-form input[type="password"],
        .login-form input[type="submit"] {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            /* Ensure padding is included in width */
        }

        .login-form input[type="submit"] {
            background-color: #4CAF50;
            /* Green background color */
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-form input[type="submit"]:hover {
            background-color: #45a049;
            /* Darker green on hover */
        }

        h2 {
            margin-top: 0;
        }

        /* Text color for links */
        a {
            color: #4CAF50;
            text-decoration: none;
        }

        /* Change color of links on hover */
        a:hover {
            color: #45a049;
        }
    </style>
</head>

<body>
    <div class="left-bg"></div>
    <div class="right-bg">
        <div class="login-container">
            <h2>Login</h2>
            <form class="login-form" method="POST" >
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="submit" class="submit" value="Login">
                <p>Forgot your password? <a href="#">Click here</a>.</p>
            </form>
        </div>
    </div>
</body>

</html>