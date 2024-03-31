<?php 
    session_start();

    include("../assets/php/config.php");
    
    if (!isset($_SESSION["id"]) || !isset($_SESSION["username"])) {
        header("location: ../pages/sign-up.php");
        exit;
    }
    
    $id = $_SESSION["id"];
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = mysqli_real_escape_string($con, $_POST["username"]);
        $firstName = mysqli_real_escape_string($con, $_POST["firstName"]);
        $lastName = mysqli_real_escape_string($con, $_POST["lastName"]);
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $telephone = mysqli_real_escape_string($con, $_POST["telephone"]);

        $update_query = "UPDATE form SET username='$username', firstName='$firstName', lastName='$lastName', email='$email', telephone='$telephone' WHERE id='$id'";
        mysqli_query($con, $update_query);

        $_SESSION['username'] = $username;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['email'] = $email;
        $_SESSION['telephone'] = $telephone;
        
        echo '<script type="text/javascript">alert("User data updated successfully."); window.location.href = "../pages/user-profile.php";</script>';
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
                <h1>Edit Profile</h1>
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
                        <div class="auth-actions-container">
                            <input class="auth-btn si-auth-btn flex-center" type="submit" name="update-profile" value="Update Profile" id="update-profile">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>