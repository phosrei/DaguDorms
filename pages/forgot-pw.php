<?php 
    session_start();

    include ("../assets/php/config.php");

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") { 
        $email = $_POST['email'];
        $newPassword = validate($_POST['new_password']);
        $confirmPassword = validate($_POST['confirm_password']);

        $verify_email = mysqli_query($con, "SELECT id, username, firstName, lastName, email, telephone FROM form WHERE email='$email'");

        if ($newPassword !== $confirmPassword) {
            echo '<script type="text/javascript">alert("Password does not match"); window.location.href = "forgot-pw.php";</script>';
            exit;
        }
        else {
            if (mysqli_num_rows($verify_email) > 0) {
                $data = mysqli_fetch_assoc($verify_email);
                $id = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['firstName'] = $data['firstName'];
                $_SESSION['lastName'] = $data['lastName'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['telephone'] = $data['telephone'];


                $result = mysqli_query($con, "SELECT password FROM form WHERE id='$id'");
                if (mysqli_num_rows($result) === 1) {
                    $changePassword = mysqli_query($con,"UPDATE form SET password = '$newPassword' WHERE id = '$id'");
                    echo '<script type="text/javascript">alert("Password successfully changed"); window.location.href = "../pages/user-profile.php";</script>';
                    exit;
                }
            }
            else {
                echo '<script type="text/javascript">alert("No email found"); window.location.href = "forgot-pw.php";</script>';
                exit;
            }
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="initial-scale=1, width=device-width">
  	<title>DaguDorms</title>
  	<link rel="stylesheet"  href="../assets/css/styles.css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
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
                                Contact
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
    <section class="auth-section flex-center">
        <div class="forgot-pw-container su-container flex-center">
            <a class="back-btn" href="sign-in.php"><img src="../assets/images/back-button.svg"></a>
            <div class="auth-heading flex-center">
                <h1>Forgot Password?</h1>
                <p>Enter your email and new password</p>
            </div>
            <form class="auth-form" method="post">
                <div class="auth-column">
                    <div class="input-layout">
                        <label class="input-label" for="email">Email</label>
                        <input class="auth-input" type="text" name="email" id="email" placeholder="outlook@gmail.com" required>
                    </div>
                    <div class="input-layout">
                        <label class="input-label" for="new_password">New Password</label>
                        <input class="auth-input" type="password" name="new_password" id="new-password" placeholder="Enter Password" required>
                    </div>
                    <div class="input-layout">
                        <label class="input-label" for="confirm_password">Confirm Password</label>
                        <input class="auth-input" type="password" name="confirm_password" id="confirm-password" placeholder="Enter Password" required>
                    </div>
                </div>
                <br>
                <br>
                <input class="reset-pw-btn auth-btn flex-center" type="submit" name="reset-pw" id="reset-pw" value="Reset Password">
            </form>
        </div>
    </section>

    <script>
        var a;
        function pass() {
            var passwordInput = document.getElementById("new-password");
            if (a == 1) {
                passwordInput.type = "password";
                document.getElementById("eye-icon").src = "../assets/images/see_password_button.png";
                a = 0;
            } else {
                passwordInput.type = "text";
                document.getElementById("eye-icon").src = "../assets/images/hide_password_button.png";
                a = 1;
            }
        }
    </script>
    <script src="../assets/js/dropdown.js"></script>
</body>
</html>