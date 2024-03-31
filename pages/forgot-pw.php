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
    <header>
        <a href="../index.html">
            <img class="header-icon" src="../assets/images/dagudorms-icon.svg" alt="Header Icon">
        </a>
        <nav class="header-nav flex-center">
            <ul class="header-list flex-center">
                <li><a href="pages/dorms.html" class="header-nav-link flex-center">Dorms</a></li>
                <li><a href="pages/page-wip.html" class="header-nav-link flex-center">About</a></li>
                <li><a href="pages/page-wip.html" class="header-nav-link flex-center">Contact</a></li>
            </ul>
        </nav>
    </header>
    <section class="auth-section flex-center">
        <div class="forgot-pw-container su-container flex-center"> 
            <a class="back-curved-btn" href="sign-in.php"><img src="../assets/images/back_curved_button.svg"></a>
            <div class="auth-heading">
                <h1>Forgot Password</h1>
            </div>
            <form class="auth-form" action="" method="post">
                    <div class="auth-column">
                        <div class="input-layout">
                            <label class="input-label" for="email">Email</label>
                            <input class="auth-input" type="text" name="email" id="email" placeholder="outlook@gmail.com" required>
                        </div>
                        <div class="input-layout">
                            <label class="input-label" for="new_password">New Password</label>
                            <input class="auth-input" type="text" name="new_password" id="new-password" placeholder="Enter Password" required>
                        </div>
                        <div class="input-layout">
                            <label class="input-label" for="confirm_password">Confirm Password</label>
                            <input class="auth-input" type="text" name="confirm_password" id="confirm-password" placeholder="Enter Password" required>
                            
                        </div>
                        <br>
                        <br>
                        <div class="auth-actions-container">
                            <input class="auth-btn si-auth-btn flex-center" type="submit" name="reset-password" value="Reset Password" id="reset-password">
                        </div>
                    </div>
            </form>
            <button class="eye-btn"><img class="eye-icon" id="eye-icon" src="../assets/images/see_password_button.png" onclick="pass()"></button>
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
</body>
</html>