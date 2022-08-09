
<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css">
    <link rel="shortcut icon" href="./images/comp.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Log In | Techpreneur</title>
</head>
<body>
    <nav class="nav">
        <div id="first">
            <a href="index.html"><img src="images/PNGlogo.png" alt="logo" id="logo"></a>
            <a href="get-started.html"><button id="start">Get Started</button></a>
            <ul>
                <li><a href="curriculum.html">Curriculum</a></li>
                <li><a href="girlschallenge.html">Our Girls</a></li>
            </ul>
        </div>
        <div id="second">
            <ul>
                <li><a href="about.html">About</a></li>
                <li><a href="impact.html">Impact</a></li>
                <li><a href="login.php"  style = "border-bottom: 1px dotted rgb(232, 178, 28); color: rgb(232, 178, 28);">Log In</a></li>
                <li><a href="signup.php" id="signed">Sign Up</a></li>
            </ul>
        </div>
    </nav>
    
    <!--mobile menu-->
            <div class="mobile">

                <div id="menu">
                  <span id="no1" class="fa fa-bars"></span>
                </div>
                
                <nav id="sidebar">
                    <div class="side"><span id="no2">&times;</span></div>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="get-started.html">Get Started</a></li>
                        <li><a href="curriculum.html">Curriculum</a></li>
                        <li><a href="girlschallenge.html">Our Girls</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="impact.html">Impact</a></li>
                        <li><a href="login.php">Log In</a></li>
                        <li><a href="signup.php">Sign Up</a></li>
                    </ul>
                </nav>
            </div>
<div id="maintain">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form">
        <h1>Log In</h1>
        <div class="inputBox">
            <input type="text" name = "username" required>
            <span>Username</span>
        </div>
        <div class="inputBox">
            <input type="password" name = "passone" required id="passInput">
            <span>Password</span>
            <img src="images/see.png" alt="" id="see">
            <img src="images/hidden.png" alt="" id="hide">
        </div>
        <?php

        session_start();

            include("connection.php");
            include("functions.php");

            // $user_data = check_login($con);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                //user login details have been posted

                $username = $_POST['username'];
                $password = md5($_POST['passone']);

                //read from database

                $query = "SELECT * FROM users WHERE students_username = '$username' limit 1";

                $result = mysqli_query($con, $query);

                if($result) {
                    if($result && mysqli_num_rows($result) > 0) {
                        $user_data = mysqli_fetch_assoc($result);
            
                        if($user_data['students_password'] = $password) {

                            $_SESSION['user_id'] = $user_data['user_id'];
                            header('Location: dashboard.php');
                            die;
                        }
                    }
                } echo "<p style = 'font-size: 12px; align-self: flex-start; color: red; margin: -20px 0px 0px 5%;'>Wrong username or password</p>";

        
                mysqli_close($con);

            }

        ?>

        <input type="submit" value="Log In" id="log">
        <div class="account">
            <p>Don't have an account yet? <a href="signup.php">Sign up</a></p>
            <p>Trouble signing in? <a href="#">Reset your password</a></p>
        </div>
    </div>
    </form>

    <footer>
        <p>Techpreneur girls</p>
        <div class="para">
            <a href="terms.html"><p>Terms of Use</p></a>
            <a href="privacy.html"><p>Privacy Policy</p></a>
            <p>Help & Support</p>

        </div>
        <div class="icon">
            <i class="fa fa-twitter" style ="font-size: 18px;"></i>
            <i class="fa fa-instagram" style ="font-size: 18px"></i>
            <i class="fa fa-facebook" style ="font-size: 18px; padding: 5px 8px;"></i>
            <i class="fa fa-linkedin" style ="font-size: 18px"></i>
            <i class="fa fa-youtube" style ="font-size: 18px;"></i>
        </div>
    </footer>
</div>

    <script src="./scripts/login.js"></script>
    <script src="./scripts/menu.js"></script>
</body>
</html>