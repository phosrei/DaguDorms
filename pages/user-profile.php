<?php 
    session_start();
    
    if(!isset($_SESSION["id"]) && !isset($_SESSION["username"])) {
        header("location: ../pages/sign-up.php");
    }
    else {
        include("../assets/php/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap"/>
</head>
<body class="flex-center">
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
    <section class="user-profile-section">
        <h1 class="section-heading">Your Info</h1>
        <div class="user-profile-container flex-center br-12">
            <div class="user-left-info flex-center">
                <div class="user-profile-image">
                    <img src="assets/user-profile-icon.svg" alt="User Profile Image">
                </div>
            </div>
            <div class="user-right-info flex-center">
                <div class="user-info-details flex-center btop-0">
                    <span class="user-info-label">Full Name</span>
                    <span class="user-info-value"><?php echo $_SESSION["firstName"]; ?> <?php echo $_SESSION["lastName"]; ?></span>
                </div>
                <div class="user-info-details flex-center">
                    <span class="user-info-label">Username</span>
                    <span class="user-info-value"><?php echo $_SESSION["username"]; ?></span>
                </div>
                <div class="user-info-details flex-center">
                    <span class="user-info-label">Phone number</span>
                    <span class="user-info-value"><?php echo $_SESSION["telephone"]; ?></span>
                </div>
                <div class="user-info-details flex-center">
                    <span class="user-info-label">Email</span>
                    <span class="user-info-value"><?php echo $_SESSION["email"]; ?></span>
                </div>
            </div> 
        </div>
        <h1 class="section-heading">Your Reservations</h1>
        <div class="dorm-card br-12">
            <div class="dorms-image"></div>
            <div class="dorm-info">
                <p class="price">from <b>₱0</b> / month</p>
                <h2>Dormitory Name</h2>
                <p>31 Riofero Road, Arellano St.</p>
                <br>
                <a class="btn-two" href="dorm-info.html">View</a>
            </div>
        </div>
        <h1 class="section-heading">Your Submission</h1>
        <div class="dorm-card br-12">
            <div class="dorms-image"></div>
            <div class="dorm-info">
                <p class="price">from <b>₱0</b> / month</p>
                <h2>Dormitory Name</h2>
                <p>31 Riofero Road, Arellano St.</p>
                <br>
                <p class="under-review-btn" href="dorm-info.html">Under Review</p>
            </div>
        </div>
    </section>
    <footer>
        <p class="dev-name">© BIT5</p>
        <ul class="footer-list flex-center">
            <li>List</li>
            <li>List</li>
            <li>List</li>
            <li>List</li>
        </ul>
    </footer>
    <script src="../assets/js/dropdown.js"></script>
</body>
</html>

<?php } ?>