<?php 
    session_start();

    include("php/config.php");
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $password = $_POST['password'];

        $verify_user = mysqli_query($con, "SELECT username FROM form WHERE username='$username'");

    if (mysqli_num_rows($verify_user) != 0) {
        // TODO: change this message
        echo "<div class='message'>
            <p>Username taken, please use another username</p>
            </div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='back-btn'>Go Back</button>";
    } else {
        mysqli_query($con, "INSERT INTO form(username, firstName, lastName, email, telephone, password) 
            VALUES ('$username', '$firstName', '$lastName', '$email', '$telephone', '$password')") or die("An error occured");

        header("location: sign-in.php");
        die;
    }

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DaguDorms</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url('https://fonts.cdnfonts.com/css/inter');
    </style>
</head>
<body>
    <header>
        <a href="index.html">
            <img class="header-icon" src="assets/dagudorms-icon.svg" alt="Header Icon">
        </a>    
        <nav class="header-nav flex-center">
            <ul class="header-nav-list flex-center">
                <li class="header-nav-item flex-center">
                    <a href="dorms.html" class="header-nav-link flex-center">Dorms</a>
                </li>
                <li class="header-nav-item flex-center">
                    <a href="about.html" class="header-nav-link flex-center">About</a>
                </li>
                <li class="header-nav-item flex-center">
                    <a href="contact.html" class="header-nav-link flex-center">Contact</a>
                </li>
            </ul>
        </nav>
    </header>
        <div class="SignUp-box"> 
            <div class="sign-up">
                <h2> Sign Up</h2>
                <p>Make an account to reserve and access other features</p>
            </div>

        <div class="column">
            <form class="form-box" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <div class="layout">
                    <label for="username"> Username</label>
                    <input class="username" type="text" name="username" id="username" placeholder="Enter Username" required>
                </div>

                <div class="layout">
                    <label for="firstName"> First Name</label>
                    <input class="Fname" type="text" name="firstName" id="firstName" placeholder="Enter First Name" required>
                </div>

                <div class="layout">
                    <label for="lastName"> Last Name</label>
                    <input class="Lname" type="text" name="lastName" id="lastName" placeholder="Enter Last Name" required>
                </div>

                <div class="layout">
                    <label for="email"> Email Address</label>
                    <input class="email" type="email" name="email" id="email" placeholder="Enter Email" required>
                </div>

                <div class="layout">
                    <label for="telephone"> Phone Number</label>
                    <input class="Pnumber" type="tel" name="telephone" id="telephone" placeholder="+63 912 345 6789" required>
                </div>

                <div class="layout">
                    <label for="password"> Password</label>
                    <input class="pass" type="password" name="password" id="password" placeholder="Enter password" required>
                </div>

                <div class="Sign-up">
                    <input class="btn" type="submit" name="sign-up" value="Sign Up" id="sign-up">
                </div>

                <div class="link"> 
                    Already have an account? <a href="sign-in.php"> Sign In?</a>
                </div>
        </div>
    <footer class="flex-center">
        <p class="dev-name">BIT5</p>
    </footer>
    
</body>
</html>
