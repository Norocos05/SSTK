<?php

include('connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Clients</title>

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* This ensures that the body takes at least the full height of the viewport */
            margin: 0;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #3457D5;
            color: #fff;
            padding: 10px 20px;
        }

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        header nav ul li {
            margin-right: 20px;
        }

        header nav ul li:last-child {
            margin-right: 0;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
        }

        .user-menu {
            display: flex;
            align-items: center;
            justify-content: flex-end; 
            flex-grow: 1; 
        }

        .user-menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .user-menu ul li {
            margin-right: 20px;
        }

        .user-menu ul li:last-child {
            margin-right: 0;
        }

        .user-menu a {
            color: #fff;
            text-decoration: none;
        }

        main {
            flex-grow: 1;
            /* This makes the main content area grow to fill the remaining space */
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

        .reports-table {
            border-collapse: collapse;
            min-width: 500px;
            width: 100%;
        }

        .caption1 {
            text-align: left;
            font-weight: 700;
            font-size: 2.5em;
            color: #ff0000;
            margin-left: 15px;
        }

        .caption2 {
            text-align: right;
            font-size: 2em;
            color: #1E3897;
            text-decoration: underline;
            margin-left: 15px;
            padding-bottom: 10px;
            cursor: pointer;
        }

        thead {
            border-bottom: 2px solid black;
            font-size: 2em;
            font-weight: 700;
        }

        tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        th,
        td {
            border: none;
            text-align: center;
        }

        td {
            padding: 15px;
        }

        .container {
            margin-top: 100px;
            width: min(1500px, 100% - 3rem);
            margin-inline: auto;
            max-height: 700px;
            overflow: auto;
        }
    </style>

</head>

<body>

    <header>
        <div class="user-menu">
            <ul>
                <li><a href="admin_clients-list.php">Clients</a></li>
				<li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="container">
            <table class="reports-table">
                <caption class="caption1">
                    User accounts
                </caption>
                <caption class="caption2">
                    <a href="create-account.html">+ Add User</a>
                </caption>
                <thead>
                    <tr>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>E-mail</td>
                        <td>Address</td>
                        <td>Contact No.</td>
                    </tr>
                </thead>
            </table>
        </div>


    </main>
    <footer>
        <p>SENTRONG SANAYANG TEKNIKAL NG KABATAAN, INC.</p>
        <p>©Copyright. All rights reserved</p>
    </footer>
    <script>

        // Add file button functionality
        const addFileButtons = document.querySelectorAll('button');

        addFileButtons.forEach(button => {
            button.addEventListener('click', () => {
                const input = document.createElement('input');
                input.type = 'file';
                input.accept = 'application/pdf';
                input.style.display = 'none';
                document.body.appendChild(input);
                input.click();
                input.addEventListener('change', () => {
                    const file = input.files[0];
                    const fileName = file.name;
                    const fileSize = file.size;
                    const fileType = file.type;
                    const fileUrl = URL.createObjectURL(file);
                    const fileLink = document.createElement('a');
                    fileLink.href = fileUrl;
                    fileLink.download = fileName;
                    fileLink.textContent = fileName;
                    button.parentNode.insertBefore(fileLink, button.nextSibling);
                    document.body.removeChild(input);
                });
            });
        });
    </script>
</body>

</html>