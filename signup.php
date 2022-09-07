<?php

session_start();

    include("connection.php");
    include("functions.php");

    // $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //user details have been posted

        $childsurname = $_POST['csname'];
        $childfirstname = $_POST['cfname'];
        $childmidname = $_POST['cmname'];
        $dateofbirth = $_POST['date'];
        $gender = $_POST['gender'];
        $fathername = $_POST['ffname'];
        $fathernumber = $_POST['fnumber'];
        $fatheremail = $_POST['femail'];
        $mothername = $_POST['mfname'];
        $mothernumber = $_POST['mnumber'];
        $motheremail = $_POST['memail'];
        $schoolname = $_POST['schoolname'];
        $schooladdress = $_POST['schooladdress'];
        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $password = $_POST['passone'];
        $pass = md5($password);
        $vkey = md5(time().$username);

    
        //save to database
        $user_id = random_num(32);

        // $query = `INSERT INTO $dbtable (student_surname, student_firstname, student_middlename, date_of_birth, gender, fathers_name, fathers_phone, fathers_email, mothers_name, mothers_phone, mothers_email, schools_name, schools_address, students_username, students_email, students_password, user_id, vkey ) VALUES ('$childsurname','$childfirstname','$childmidname','$dateofbirth','$gender','$fathername','$fathernumber','$fatheremail','$mothername','$mothernumber','$motheremail','$schoolname','$schooladdress','$username','$useremail','$pass','$user_id', '$vkey')`;

        $query = "INSERT INTO $dbtable (students_username, students_password, student_surname, student_firstname, student_middlename, date_of_birth, gender, fathers_name, fathers_phone, fathers_email, mothers_name, mothers_phone, mothers_email,schools_name, schools_address, students_email,user_id, vkey ) VALUES ('$username', '$pass','$childsurname','$childfirstname','$childmidname','$dateofbirth','$gender', '$fathername','$fathernumber','$fatheremail','$mothername','$mothernumber','$motheremail','$schoolname','$schooladdress','$useremail', '$user_id', '$vkey')";


        mysqli_query($con, $query);
        
        mysqli_close($con);

        header('Location: login.php');
        die;

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/signup.css">
    <link rel="shortcut icon" href="./images/comp.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Sign Up | Techpreneur</title>
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
                <li><a href="login.php">Log In</a></li>
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
    <form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h1>Sign Up</h1>
        <section>
        <div id="form">


            <h3>Name of the Applicant</h3>
            <div class="names">
                <div class="inputBox">
                    <input type="text" name = "csname" id = 'csname' required>
                    <span>Surname</span>
                </div>
                <div class="inputBox">
                    <input type="text" name = "cfname" id = "cfname" required>
                    <span>First Name</span>
                </div>
                <div class="inputBox">
                    <input type="text" name = "cmname" id = "cmname" required>
                    <span>Middle Name</span>
                </div>
            </div>

            <div class="date" aria-required="true">
                <label for="date"><b>Date of Birth</b></label>
                <input type="date" id="date" name = "date">
            </div>

            <!-- <div class="date" aria-required="true">
                <label for="date"><b>Profile Picture</b></label>
                <input type="file" name="image" id="file" onchange="loadFile(event)" accept='image/*'>
                <img src="" id="output" width="200" />
            </div> -->


            <div class="date" aria-required="true">
                <label for="gender"><b>Gender</b></label>
                <input type="radio" name="gender" value="male"> Male <br>
                <input type="radio" name="gender" value="female"> Female
            </div>


            <h2>Parents' Details</h2>

            <h4>Father's Details</h4>
            <div class="named">
                <div class="inputBox" id = "yes">
                    <input type="text" name = "ffname" id = "ffname" required>
                    <span>Full Name</span>
                </div>
                <div class="inputBox" id="yes">
                    <input type="text" name = "fnumber" id = "fnumber" required>
                    <span>Phone No.</span>
                </div>
                <div class="inputBox" id="yes">
                    <input type="email" name = "femail" id = "femail" required>
                    <span>Email Address</span>
                </div>
                <div class="inputBox"></div>
            </div>


            <h4>Mother's Details</h4>
            <div class="named">
                <div class="inputBox" id = "yes">
                    <input type="text" name = "mfname" id = "mfname" required>
                    <span>Full Name</span>
                </div>
                <div class="inputBox" id="yes">
                    <input type="text" name = "mnumber" id = "mnumber" required>
                    <span>Phone No.</span>
                </div>
                <div class="inputBox" id="yes">
                    <input type="email" name = "memail" id = "memail" required>
                    <span>Email Address</span>
                </div>
                <div class="inputBox"></div>
            </div>

            <h2>School's Details</h2>

            <div class="named">
                <div class="inputBox" id="yes">
                    <input type="text" name = "schoolname" id = "schoolname" required>
                    <span>School's Name</span>
                </div>
                <div class="inputBox" id="yes">
                    <input type="text" name = "schooladdress" id = "schooladdress" required>
                    <span>School's Address</span>
                </div>
            </div>

            <input type="button" value="Save & Continue" id="log">
        </div>
    <!-- </form>
    <form action=""> -->
        <div id="formed">
            <h3>User's Registration Details</h3>

            <div class="inputBoxed">
                <input type="text" name = "username" id = "username" required>
                <span>Username</span>
            </div>
            <div class="inputBoxed">
                <input type="email" id="email" name = "useremail" class="form-control" pattern= '.+@.+\..+' required>
                <span>Email</span>
            </div>
            <small id="smallie">email address is invalid</small>
            <div class="inputBoxed">
                <input type="password" id="passInput" name = "passone" minlength="8" maxlength="16" required>
                <span id="span">Password</span>
                <img src="images/see.png" alt="" id="see">
                <img src="images/hidden.png" alt="" id="hide">    
            </div>
            <small id="small">password must be between 8 and 16 characters</small>
            <div class="inputBoxed">
                <input type="password" id="passInput2" name = "passtwo" minlength="8" maxlength="16" required disabled>
                <span id="span2">Confirm Password</span>
                <img src="images/see.png" alt="" id="see2">
                <img src="images/hidden.png" alt="" id="hide2">    
            </div>
            <small id="smallSecond">passwords do not match</small>
            <small id="smallThird">passwords match</small>
            <small id="smallFourth">this field is disabled until you fill in your password</small>


            <div id="privacy" style="flex-direction: column;">
                <div style="display: flex; align-items: center;">
                    <input type="checkbox" name="newsletter" id="check">
                    <p>I agree to the terms of use*</p>
                </div>
                <div style="display: flex;align-items: center;">
                    <input type="checkbox" name="privacy" id="check">
                    <p>I have read Techpreneur's privacy policy*</p>
                </div>
            </div>

            <div style="width: 100%; display: flex; flex-direction: row; justify-content: space-between;">
                <input type="button" value="Previous" id="logs">
                <input type="submit" value="Sign Up" id="logged">
            </div>

        </div>
    </form>
    </section>

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

    <script src="./scripts/signup.js"></script>
    <script src="./scripts/menu.js"></script>
    <script>
        var loadFile = function (event) {
        var image = document.getElementById("output");
        image.style.alignSelf = 'flex-start';
        // image.setAttribute('src', URL.createObjectURL(event.target.files[0]));
        // console.log(URL.createObjectURL(event.target.files[0]));
        // if(typeof(Storage) !== undefined) {
            localStorage.setItem('newpic', URL.createObjectURL(event.target.files[0]));
            image.src = localStorage.getItem('newpic');
            // document.getElementById('savepic').style.display = 'inline-block'
        // }
      };
    </script>
</body>
</html>