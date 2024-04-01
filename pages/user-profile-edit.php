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
                            <input class="auth-input" type="text" name="username" id="username" placeholder="Enter new username" required>
                        </div>
                        <div class="input-layout">
                            <label class="input-label" for="su-firstn-input">First Name</label>
                            <input class="auth-input" type="text" name="firstName" id="firstName" placeholder="Enter new first name" required>
                        </div>
                        <div class="input-layout">
                            <label class="input-label" for="su-lastn-input">Last Name</label>
                            <input class="auth-input" type="text" name="lastName" id="lastName" placeholder="Enter new last name" required>
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

    <script src="../assets/js/dropdown.js"></script>
</body>
</html>