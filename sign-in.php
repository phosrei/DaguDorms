<?php 
    session_start();

    include("php/config.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($con,"SELECT * FROM form WHERE username = '$username'");

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);


                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['firstName'] = $data['firstName'];
                $_SESSION['lastName'] = $data['lastName'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['telephone'] = $data['telephone'];

                if($data['password'] == $password) {
                    header("location: user-profile.php");
                    die;
                } 
                else {
                    echo "An error occured";
                }
            } 
            else {
                echo "An error occured";
            }
        } 
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>DaguDorms</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        @import url('https://fonts.cdnfonts.com/css/inter');
    </style>
</head>
<body>
    <header class="header">
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
    <div class="SignIn-box"> 

        <div class="column">
            <div class="left">
            
                <div class="sign-in">
                    <h2> Sign In</h2>
                    <p>Log in to reserve and access other features</p>
                    
                </div>

                <form class="form-box" method="post">
                    <div class="layout">
                        <label for="username"> Username</label>
                        <input class="username" type="text" name="username" id="username" placeholder="  Enter Username" required>
                    </div>

                    <div class="layout">
                        <label for="password"> Password</label>
                        <input class="pass" type="password" name="password" id="password" placeholder="  Enter password" required>
                    </div>
                    <div class="Passlink"> 
                        <a href="">Forgot password?</a>
                    </div>

                    <div class="sign-in">
                        <input class="SIbtn" type="submit" name="sign-in" value="Sign In" id="sign-in">
                    </div>

                    <div class="SIlink"> 
                        <p> Don't have an account? <a href="Sign-Up.php"> Sign Up</a></p>
                    </div>
                </form>
            </div>    
            <div class="right">
                <div class="pic">
                    
                </div>
            </div>
        </div>
            
        
    </div>

    


        <footer class="flex-center">
            <p class="dev-name">BIT5</p>
        </footer>
</body>
</html>