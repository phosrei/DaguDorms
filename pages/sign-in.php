<?php 
    session_start();

    include("../assets/php/config.php");

    if (isset($_SESSION["id"]) && $_SESSION["username"]) {
        header("location: ../pages/sign-out.php");
    }  
    else {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = mysqli_query($con,"SELECT * FROM form WHERE username = '$username'");

            if ($result) {
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
        <a href="../index.html">
            <img class="hover-header-icon header-icon" src="../assets/images/dagudorms-icon.svg" alt="Header Icon">
        </a> 
        <nav class="header-nav flex-center">
            <ul class="header-list flex-center">
                <li><a href="../pages/dorms.html" class="header-nav-link flex-center">Dorms</a></li>
                <li><a href="../pages/page-wip.html" class="header-nav-link flex-center">About</a></li>
                <li><a href="../pages/page-wip.html" class="header-nav-link flex-center">Contact</a></li>
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
                        <label class="input-label" for="username">Username</label>
                        <input class="auth-input si-auth" type="text" name="username" id="username" placeholder="Enter username" required>
                    </div>
                    <div class="input-layout">
                        <label class="input-label" for="password">Password</label>
                        <input class="auth-input si-auth" type="password" name="password" id="password" placeholder="Enter password" required>
                    </div>
                    <div class="input-layout-bottom">
                        <div>
                            <input type="checkbox" class="checkbox" id="remember-me" name="remember-me">
                            <label class="remember-me" for="remember-me">Remember me</label>
                        </div>
                        <a class="link-style forgot-pw" href="forgot-pw.php">Forgot password?</a>
                    </div>
                    <input class="auth-btn flex-center" type="submit" name="sign-in" value="Sign in" id="sign-in" onClick="IsRememberMe()">
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
</body>
</html>

<?php } ?>