<?php

include('connect.php');


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Admin Profile</title>

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

        .content-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px;
            /* Add space around the containers */
        }

        .course-content {
            margin-left: 20px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            box-sizing: border-box;
        }

        .course-content h2 {
            margin-top: 0;
        }

        .course-content table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .course-content th {
            padding: 10px;
            background-color: #f2f2f2;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .course-content td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .course-content table button{
            text-align: right;
            /* Align the button and answer to the right */
        }

        .course-content button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
        <div class="content-container">
            <section class="course-content">
                <h2>Course content | Engine</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Lesson</th>
                            <th>Description</th>
                            <th>File</th>
                            <th>Quiz</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Introduction</td>
                            <td>Overview of the course</td>
                            <td><button>Add File</button></td>
                            <td><button>Add Quiz</button></td>
                            <td><button><i class="fa-solid fa-pencil"></i></button></td>
                        </tr>
                        <tr>
                            <td>Lesson 1</td>
                            <td>Introduction to tools and equipment asdasdas</td>
                            <td><button>Add File</button></td>
                            <td><button>Add Quiz</button></td>
                            <td><button><i class="fa-solid fa-pencil"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </section>
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