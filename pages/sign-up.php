<?php 
    session_start();

    if (isset($_SESSION["id"]) && $_SESSION["username"]) {
        include("../assets/php/config.php");
        header("location: ../pages/sign-out.php");
    }  
    else {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = $_POST['username'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $password = $_POST['password'];

            $verify_user = mysqli_query($con, "SELECT username, email FROM form WHERE username='$username' AND email='$email");

            if (mysqli_num_rows($verify_user) != 0) {
                echo '<script type="text/javascript">alert("Username/Email has been taken, please try again"); window.location.href = "sign-up.php";</script>';
                exit;
            } 
            else {
                $data = mysqli_fetch_assoc($verify_email);
                $id = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['firstName'] = $data['firstName'];
                $_SESSION['lastName'] = $data['lastName'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['telephone'] = $data['telephone'];

                mysqli_query($con, "INSERT INTO form(username, firstName, lastName, email, telephone, password) 
                    VALUES ('$username', '$firstName', '$lastName', '$email', '$telephone', '$password')");
                header("location: user-welcome.php");
                exit;
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
        <div class="auth-container su-container flex-center"> 
            <div class="auth-heading">
                <h1>Sign Up</h1>
                <br>
                <p>Make an account to reserve and access other features</p>
            </div>
            <form class="auth-form" action="" method="post">
                <div class="auth-row">
                    <div class="auth-column">
                        <div class="input-layout">
                            <label class="input-label" for="username-input">Username</label>
                            <input class="auth-input" type="text" name="username" id="username" placeholder="Enter username" required>
                        </div>
                        <div class="input-layout">
                            <label class="input-label" for="su-firstn-input">First Name</label>
                            <input class="auth-input" type="text" name="firstName" id="firstName" placeholder="Enter first name" required>
                        </div>
                        <div class="input-layout">
                            <label class="input-label" for="su-lastn-input">Last Name</label>
                            <input class="auth-input" type="text" name="lastName" id="lastName" placeholder="Enter last name" required>
                        </div>
                        <div class="input-layout">
                            <label class="input-label" for="su-email-input">Email Address</label>
                            <input class="auth-input" type="email" name="email" id="email" placeholder="outlook@gmail.com" required>
                        </div>
                    </div>
                    <div class="auth-column">
                        <div class="input-layout">
                            <label class="input-label" for="su-phone-num-input">Phone Number</label>
                            <input class="auth-input" type="tel" name="telephone" id="telephone" placeholder="+63 912 345 6789" required>
                        </div>
                        <div class="input-layout">
                            <label class="input-label" for="su-pw-input">Password</label>
                            <input class="auth-input" type="password" name="password" id="password" placeholder="Enter password" required>
                        </div>
                        <div class="input-layout">
                            <label class="input-label" for="confirm-pw">Confirm Password</label>
                            <input class="auth-input" type="password" name="confirm-pw" id="confirm-pw" placeholder="Confirm password" required>
                        </div>
                        <div class="auth-actions-container">
                            <input class="auth-btn si-auth-btn flex-center" type="submit" name="sign-up" value="Sign Up" id="sign-up">
                            <p>Already have an account? <a class="link-style" href="sign-in.php">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
<?php } ?>
