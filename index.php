<?php

include('connect.php');

session_start();

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $user_type = $_SESSION['user_type'];

    // Check if current user is already logged in
    $checkUser = "SELECT COUNT(*) AS countUser from users WHERE id = ?";
    $stmtCheckUser = mysqli_prepare($conn, $checkUser);
    mysqli_stmt_bind_param($stmtCheckUser, "i", $id);
    mysqli_stmt_execute($stmtCheckUser);
    mysqli_stmt_bind_result($stmtCheckUser, $countUser);
    mysqli_stmt_fetch($stmtCheckUser);
    mysqli_stmt_close($stmtCheckUser);

    // if user is log in redirect them
    if ($countUser > 0) {
        // throw error when login user try to access index page 
        echo "<script type='text/javascript'>alert('You are not authorized to access this page.'); 
        window.location.href = 'return.php';</script>";
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Sentrong Sanayang Teknikal ng Kabataan</title>

    <style>

        body {
            padding: 0;
            margin: 0;
            overflow-y: hidden;
        }

        nav { 
            padding-top: 5px;
            height: 60px;
            background-color: #3457D5;
            color: #fff;
            font-size: 17px;
        }

        ul {
            padding: 15px 40px 0 0;
            float: right;
            list-style-type: none;
            margin: 0;
        }

        .main-content {
            align-items: center;
        }

        .sstkLogo {
            width: 25vw;
            padding-top: 20px;
            padding-left: 210px;
        }

        .sstkDesc {
            width: 50%;
            padding-left: 20px;
        }

        .lgn-btn {
            color: #fff;
            cursor: pointer;
            /* Add cursor pointer to show interactivity */
        }

        .quote {
            width: 75%;
            margin-top: -3vw;
            margin-bottom: 3vw;
            padding-left: 25vw;
        }

        .third-row {
            justify-content: space-between;
            align-items: center;
            padding-left: 8vw;
            padding-right: 6vw;
            padding-bottom: 3.8vw;
        }

        .stLogo {
            width: 18vw;
        }

        .PGPC {
            width: 21vw;
            padding-left: 3vw;
        }

        .yamahaLogo {
            width: 25vw;
        }

        .tesdaLogo {
            width: 13.5vw;
        }

        .modal-dialog {
            border-radius: 10;
            margin: 0;
            margin-top: 50px;
            margin-left: auto;
            margin-right: 20px;
            text-align: center;
            width: 10%;
        }

        .second-column {
            margin-top: 5px ;
        }

        footer {
            background-color: #3457D5;
            color: #fff;
            padding: 5px;
            text-align: center;
            margin-top: auto;
            /* Pushes the footer to the bottom */
        }

        footer p {
            margin: 0;
        }

        footer img {
            height: 50px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

    </style>
</head>

<body>
    <div>
        <nav>
            <ul>
                <li>
                    <!-- Add data-toggle and data-target attributes to open the modal -->
                    <a class="lgn-btn" data-toggle="modal" data-target="#loginModal">Login</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="user_login.php"><button type="button" class="btn btn-primary btn-block">Users</button></a> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 second-column">
                            <a href="admin_login.php"><button type="button" class="btn btn-secondary btn-block">Admin</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="first-row">
            <img class="sstkLogo" src="img/sstklogo.png" alt="">
            <img class="sstkDesc" src="img/sstk_description-removebg-preview.png" alt="">
        </div>

        <div class="second-row">
            <img class="quote" src="img//asdasdasd-removebg-preview.png" alt="">
        </div>

        <div class="third-row">
            <img class="stLogo" src="img/santotomaslogo-removebg-preview.png" alt="">
            <img class="PGPC" src="img/PGPC-scaled-removebg-preview.png" alt="">
            <img class="yamahaLogo" src="img/yamahalogo-removebg-preview.png" alt="">
            <img class="tesdaLogo" src="img/tesdalogo-removebg-preview.png" alt="">
        </div>
    </div>

    <footer>
        <p>SENTRONG SANAYANG TEKNIKAL NG KABATAAN, INC.</p>
        <p>©Copyright. All rights reserved</p>
    </footer>
     
</body>

</html>