<?php

session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/user.css">
    <link rel="shortcut icon" href="./images/comp.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>My Dashboard | Techpreneur</title>
</head>
<body>
    <header>
        <nav>
            <div class='flex'>
                <i class='fa fa-bars' id='bar'></i>
                <i class='fa fa-bars' id='bars'></i>
                <a href="index.html" id="logo"><img src="./images/educ.jpg" alt="logo" id="logo"></a>
            </div>
            <div class='flexed'>
                <i class="fa fa-toggle-off" aria-hidden="true"></i>
                <img src="userpp/<?php echo $user_data['pp'];?>" alt="">
                <a id = 'logout' onclick='openNotice()'><i class="fa fa-power-off"></i>Logout</a>
            </div>
        </nav>
    </header>
    <main>
        <div id='sidebar'>
            <a href="mydashboard.php" class="item">
                <i class="fa fa-dashboard icon"></i>Dashboard
            </a>
            <a href="profile.php" class="item">
                <i class="fa fa-user icon"></i>Profile
            </a>
            <a href="#" class="item">
                <i class="fa fa-tasks icon"></i>Tasks
            </a>
            <a href="#" id='mobile' class="item">
                <i class="fa fa-power-off icon"></i>Logout
            </a>
        </div>
        <div id='main'>
            <h2>Hello, <?php echo $user_data['student_surname'];?> <?php echo $user_data['student_firstname'];?></h2>
            <h3>Student Numeric Id: <?php echo $user_data['user_id'];?></h3>
        </div>
    </main>

    <section>
        <div class="form-popup" id="myForm">
            <div class = "form-container">
                <h2>Are you sure you want to log out?</h2>
                <button type="button" class="cancel" id='closed' onclick="closeNotice()">No</button>
                <button type="button" class="btn"><a href="logout.php">Yes</a></button>
            </div>
        </div>
    </section>









    <style>
        <?php include "./styles/user.css" ?>
    </style>
    <script>
        <?php include "./scripts/mydashboard.js" ?>
    </script>
    <script>
        <?php include "./scripts/dashboard.js" ?>
    </script>
</body>
</html>


<!-- echo $check;

$check = substr($pass, 0, -12); -->