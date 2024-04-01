<?php 
session_start();

include("../assets/php/config.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($con,"SELECT * FROM form WHERE username = '$username'");

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        $_SESSION['id'] = $data['id'];
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
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DaguDorms</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap"/>
</head>
<body class="sign-in-body">
    <header class="hover-header">
        <a href="../index.php">
            <img class="hover-header-icon header-icon" src="../assets/images/dagudorms-icon.svg" alt="Header Icon">
        </a> 
        <nav class="header-nav flex-center">
            <ul class="home-header-list flex-center">
                <li class="anim-under"><a href="../index.php" class="flex-center">Home</a></li>
                <li class="anim-under"><a href="../pages/dorms.php" class="flex-center">Dorms</a></li>
                <li class="dropdown flex-center">
                    <button class="hover-dropdown-button flex-center" onclick="toggleDropdown()">
                        <img src="../assets/images/dropdown-icon.svg">
                    </button>
                    <div id="dropdown-menu" class="dropdown-menu">
                        <div class="dropdown-heading">
                            <div class="dropdown-heading-left flex-center">
                                <img class="profile-icon-small" src="../assets/images/profile-icon-small.svg" alt="Profile Icon">
                                <div>
                                    <?php 
                                        if (!isset($_SESSION["username"])) {
                                            echo '<a class="dropdown-heading-btn" href="../pages/sign-in.php">Sign In</a>';
                                        } else {
                                            echo '<a class="dropdown-heading-btn" href="../pages/user-profile-edit.php">Edit Profile</a>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="dropdown-heading-right flex-center">
                                <button id="close-button" class="close-button">
                                    <img class="close-icon" src="../assets/images/close-icon.svg">
                                </button>
                            </div>
                        </div>
                        <div class="dropdown-main flex-center"> 
                            <hr>   
                            <?php
                                if (isset($_SESSION['username'])) {
                                    echo '<a href="user-profile.php">
                                        <img class="dd-main-icon" src="../assets/images/dd-account-icon.svg">
                                        Your profile
                                    </a>';
                                    echo '<a href="../pages/page-wip.php">
                                        <img class="dd-main-icon" src="../assets/images/dd-add-account-icon.svg">
                                        Add account
                                    </a>';
                                    echo '<hr>';
                                    echo '<a href="../pages/page-wip.php">
                                        <img class="dd-main-icon" src="../assets/images/booking-icon.svg">
                                        Reservations
                                        </a>';
                                    echo '<a href="../pages/page-wip.php">
                                        <img class="dd-main-icon" src="../assets/images/submit-icon.svg">
                                        Submissions
                                        </a>';
                                }
                            ?>
                            <a href="../pages/page-wip.php">
                                <img class="dd-main-icon" src="../assets/images/team-icon.svg">
                                About Us
                            </a>
                            <a href="../pages/page-wip.php">
                                <img class="dd-main-icon" src="../assets/images/faq-icon.svg">
                                FAQ
                            </a>
                            <?php
                                if (isset($_SESSION['username'])) {
                                    echo '<hr>';
                                }
                            ?>
                            <?php 
                                if (isset($_SESSION["username"])) {
                                    echo '<a href="../pages/sign-out.php">Sign Out</a>';
                                }
                            ?>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div class="auth-section flex-center">
        <div class="auth-container">
            <div class="auth-left flex-center"> 
                <div class="auth-heading">
                    <h1>Sign In</h1>
                    <br>
                    <p>Log in to reserve and access other features</p>
                </div>
                <form class="auth-form flex-center" method="post">
                    <div class="input-layout">
                        <label class="input-label" for="si-username-input">Username</label>
                        <input class="auth-input si-auth" type="text" name="username" id="username" placeholder="Enter username" required>
                    </div>
                    <div class="input-layout">
                        <label class="input-label" for="si-pw-input">Password</label>
                        <input class="auth-input si-auth" type="password" name="password" id="password" placeholder="Enter password" required>
                    </div>
                    <div class="input-layout-bottom">
                        <div>
                            <input type="checkbox" class="checkbox" id="remember-me" name="remember-me">
                            <label class="remember-me" for="remember-me">Remember me</label>
                        </div>
                        <a class="link-style forgot-pw" href="forgot-pw.php">Forgot password?</a>
                    </div>
                    <input class="auth-btn flex-center" type="submit" name="sign-in"  value="Sign in" onclick="IsRememberMe()">
                </form>
                <p>Don't have an account? <a class="link-style" href="sign-up.php">Sign up</a></p>
            </div>
            <div class="auth-right"></div>
        </div>
    </div>
    <script>
        const rememberCheck = document.getElementById("remember-me"),
            passwordInput = document.getElementById("password"),
            usernameInput = document.getElementById("username");

        if (localStorage.checkbox && localStorage.checkbox !== "") {
            rememberCheck.setAttribute("checked", "checked");
            passwordInput.value = localStorage.password;
            usernameInput.value = localStorage.username;
        }
        else {
            rememberCheck.setAttribute("checked");
            passwordInput.value = "";
            usernameInput.value = "";
        }

        function IsRememberMe() {
            if (rememberCheck.checked && usernameInput.value !== "" && passwordInput.value !== "") {
                localStorage.username = usernameInput.value;
                localStorage.password = passwordInput.value;
                localStorage.checkbox = rememberCheck.value;
            } 
            else {
                localStorage.usernameInput = "";
                localStorage.passwordInput = "";
                localStorage.checkbox = "";
            }
        }
    </script>
    <script src="../assets/js/dropdown.js"></script>
</body>
</html>