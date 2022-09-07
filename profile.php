<?php

session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //user details have been posted

        $userID = $_POST['myId'];
        $dadnumber = $_POST['newdadnum'];
        $mumnumber = $_POST['newmumnum'];
        $newusername = $_POST['newuser'];
        $newpassword = $_POST['connewpass'];
        $pass = md5($newpassword);
    
        //save to database

        $query = "UPDATE $dbtable SET students_username = '$newusername', fathers_phone = '$dadnumber', mothers_phone = '$mumnumber', students_password = '$pass' WHERE user_id = '$userID'";


        $res = mysqli_query($con, $query);
        
        // mysqli_close($con);

        header('Location: profile.php');
        die;

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/comp.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>My Profile | Techpreneur</title>
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
                <i class="fa fa-toggle-off" id='toggle' aria-hidden="true"></i>
                <img src="userpp/<?php echo $user_data['pp'];?>" alt="">
                <a id = 'logout' onclick='openNotice()'><i class="fa fa-power-off"></i>Logout</a>
            </div>
        </nav>
    </header>
    <main id='general'>
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
            <h2>Dashboard</h2>
            <p><?php echo $user_data['student_surname'];?> <?php echo $user_data['student_firstname'];?>'s profile</p>
            <div id="profile">
                <img src="userpp/<?php echo $user_data['pp'];?>" alt="" id='profimg'>
                <div class="details">
                    <h3><?php echo $user_data['student_surname'];?> <?php echo $user_data['student_firstname'];?> <?php echo $user_data['student_middlename'];?></h3>
                    <p><b>Student Numeric Id:</b> <?php echo $user_data['user_id'];?></p><br>
                    <button id='button'>Edit Profile</button>
                    <p><span id='person'>Personal Information</span> <span id='parent'>Parents' Information</span></p><br>
                    <div id='all'>
                        <div class='one'>
                            <div>
                                <p><b>Surname</b></p>
                                <p><?php echo $user_data['student_surname'];?></p>
                            </div>
                            <div>
                                <p><b>Date of Birth</b></p>
                                <p><?php echo $user_data['date_of_birth'];?></p>
                            </div>
                            <div>
                                <p><b>Username</b></p>
                                <p><?php echo $user_data['students_username'];?></p>
                            </div>
                        </div>
                        <div class='two'>
                            <div>
                                <p><b>First Name</b></p>
                                <p><?php echo $user_data['student_firstname'];?></p>
                            </div>
                            <div>
                                <p><b>School's Name</b></p>
                                <p><?php echo $user_data['schools_name'];?></p>
                            </div>
                            <div>
                                <p><b>Email</b></p>
                                <p><?php echo $user_data['students_email'];?></p>
                            </div>
                        </div>
                        <div class='three'>
                            <div>
                                <p><b>Middle Name</b></p>
                                <p><?php echo $user_data['student_middlename'];?></p>
                            </div>
                            <div>
                                <p><b>School's Address</b></p>
                                <p><?php echo $user_data['schools_address'];?></p>
                            </div>
                            <div>
                                <p><b>Phone No.</b></p>
                                <p><?php echo $user_data['fathers_phone'];?></p>
                            </div>
                        </div>
                    </div>
                    <div id='mall'>
                        <div class='four'>
                            <div>
                                <p><b>Father's Name</b></p>
                                <p><?php echo $user_data['fathers_name'];?></p>
                            </div>
                            <div>
                                <p><b>Phone No.</b></p>
                                <p><?php echo $user_data['fathers_phone'];?></p>
                            </div>
                            <div>
                                <p><b>Email Address</b></p>
                                <p><?php echo $user_data['fathers_email'];?></p>
                            </div>
                        </div>
                        <div class='five'>
                            <div>
                                <p><b>Mother's Name</b></p>
                                <p><?php echo $user_data['mothers_name'];?></p>
                            </div>
                            <div>
                                <p><b>Phone No.</b></p>
                                <p><?php echo $user_data['mothers_phone'];?></p>
                            </div>
                            <div>
                                <p><b>Email Address</b></p>
                                <p><?php echo $user_data['mothers_email'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="update">
                <h2>UPDATE MY PROFILE</h2><br>
                <div>
                    <p><span id='personal'>Profile Update</span> <span id='parental'></span></p><br>
                    <p><a href = 'update.php' target = '_blank' style="text-decoration:none; color:black">Change Profile Picture <i class="fa fa-external-link" aria-hidden="true"></i></a></p><br>
                    <form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div id='grid'>
                            <input type="text" placeholder='Username' value='<?php echo $user_data['students_username'];?>' title='My Username' name='newuser'>
                            <input type="text" placeholder='My Numeric Id' value='<?php echo $user_data['user_id'];?>' title='My Numeric Id' name='myId' readonly>
                            <input type="text" placeholder="Father's Phone No." value='<?php echo $user_data['fathers_phone'];?>'  title="My Dad's Phone Number" name='newdadnum'>
                            <input type="text" placeholder="Mother's Phone No." value='<?php echo $user_data['mothers_phone'];?>' title="My Mum's Phone Number" name='newmumnum'>
                            <input type="text" placeholder='Enter Password' name='oldpass' title="My Password" id='oldpwd' value='<?php echo $user_data['students_password'];?>'>
                            <input type="text" placeholder='Enter New Password' name='newpass' id='passone' minlength="8" maxlength="16">
                            <input type="text" placeholder='Confirm New Password' name='connewpass' id='passtwo' disabled minlength="8" maxlength="16">
                            <input type="submit" value="Save Details" id='btn' name='update'>
                        </div>
                    </form>
                    <!-- <div id="avatar">
                        <input id="file" type="file" title='Click to select new profile picture' onchange="loadFile(event)" accept = 'image/*'/>
                        <img src="" id="output" width="200" />
                        <div id='span'>
                            <span class="fa fa-camera"></span>
                            <span id='change'><b>Change Image</b></span>
                        </div>
                    </div>
                    <button id='savepic'>Save as Profile Picture</button> -->
                </div>
            </div>
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
        <?php include "./styles/profile.css" ?>
    </style>
    <script>
        <?php include "./scripts/profile.js" ?>
    </script>
    <script>
        <?php include "./scripts/dashboard.js" ?>
    </script>
    <script>
        <?php include "./scripts/mydashboard.js" ?>
    </script>
    </body>
</html>