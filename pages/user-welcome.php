<?php 
    session_start();
    include("../assets/php/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/styles.css"/>
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" />
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
    <div class="user-welcome-section flex-center">
        <div class="user-welcome-container flex-center br-12">
            <img class="account-icon2" alt="" src="../assets/images/user-profile-icon.svg">
      	    <span class="username">@<?php echo $_SESSION['username']; ?></span>
      		<h2 class="welcome-user">Welcome <?php echo $_SESSION['firstName']; ?>!</h2>
      		<p class="you-now-have">You now have access to these features:</p>
      		<div class="user-features-wrapper">
        		<ul class="user-features-list">
          			<li>Reserving dormitories</li>
                    <li>Submitting dormitories</li>
                    <li>Profile editor</li>
                    <li>Reviews</li>
                </ul>
      		</div>
      		<a href="../index.php" class="get-started-btn">Get Started</a>
        </div>
    </div>
    <script src="../assets/js/dropdown.js"></script>
</body>
</html>