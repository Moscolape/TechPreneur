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
    <link rel="stylesheet" href="./styles/admindashboard.css">
    <link rel="shortcut icon" href="./images/comp.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Admin Dashboard | Techpreneur</title>
</head>
<body>

    <div id="content">
        <div id="header">
            <div>
                <span class="slide">
                    <a href="#" id="open">
                        <i class="fa fa-bars"></i>
                    </a>
                    <a href="#" id="close">
                        <i class="fa fa-bars"></i>
                    </a>
                </span>
                <small class='small'><?php echo $user_data['students_username'];?></small>

            </div>
            <div class="slide">
                <i class="fa fa-bell-o"></i>
                <a id = 'logout' onclick='openNotice()'>Log Out</a>
            </div>
        </div>
        <div id="menu" class="nav">
            <div id="dash">
                <img src="./images/mosco.png" alt="">
                <a href="#" class="close">
                    Dashboard
                </a>
            </div>
            <a href="#" class="item">
                <i class="fa fa-registered icon"></i>Registration
            </a>
            <a href="#" class="item">
                <i class="fa fa-spinner icon"></i>Status
            </a>
            <a href="#" class="item">
                <i class="fa fa-book icon"></i>Deliverables
            </a>
            <a href="#" class="item last">
                <i class="fa fa-user-circle icon"></i>Profile
            </a>
        </div>

        
        <div id="main">
            <div>
                <h4>No. of Registered Students</h4>
            </div>
            <div>
                <h4>No. of Registered Students</h4>
            </div>
            <div>
                <h4>Successful Registrations</h4>
            </div>
            <div>
                <h4>Registrations in Progress</h4>
            </div>
        </div>
        
    </div>

    <div class="form-popup" id="myForm">
        <div class = "form-container">
            <h2>Are you sure you want to log out?</h2>
            <button type="button" class="cancel" id='closed' onclick="closeNotice()">No</button>
            <button type="button" class="btn"><a href="logout.php">Yes</a></button>
        </div>
    </div>


    <style>
        <?php include "./styles/admindashboard.css" ?>
    </style>
    <script src = './scripts/dashboard.js'></script>
</body>
</html>