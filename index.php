<?php 
    session_start();
    include("./assets/php/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DaguDorms</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" />
</head>
<body class="fade-in">
    <header class="hover-header home-header-position">
        <a href="#">
            <img class="hover-header-icon header-icon" src="assets/images/dagudorms-icon.svg" alt="Header Icon">
        </a> 
        <nav class="header-nav flex-center">
            <ul class="home-header-list">
                <li class="anim-under"><a href="index.php" class="flex-center">Home</a></li>
                <li class="anim-under"><a href="pages/dorms.php" class="flex-center">Dorms</a></li>
                <li class="dropdown flex-center">
                    <button class="hover-dropdown-button flex-center" onclick="toggleDropdown()">
                        <img src="assets/images/dropdown-icon.svg">
                    </button>
                    <div id="dropdown-menu" class="dropdown-menu">
                        <div class="dropdown-heading">
                            <div class="dropdown-heading-left flex-center">
                                <img class="profile-icon-small" src="assets/images/profile-icon-small.svg" alt="Profile Icon">
                                <div>
                                    <?php 
                                        if (!isset($_SESSION["username"])) {
                                            echo '<a class="dropdown-heading-btn" href="pages/sign-in.php">Sign In</a>';
                                        } else {
                                            echo '<a class="dropdown-heading-btn" href="pages/user-profile-edit.php">Edit Profile</a>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="dropdown-heading-right flex-center">
                                <button id="close-button" class="close-button">
                                    <img class="close-icon" src="assets/images/close-icon.svg">
                                </button>
                            </div>
                        </div>
                        <div class="dropdown-main flex-center">
                            <hr>
                            <?php
                                if (isset($_SESSION['username'])) {
                                    echo '<a href="pages/user-profile.php">
                                        <img class="dd-main-icon" src="assets/images/dd-account-icon.svg">
                                        Your profile
                                    </a>';
                                    echo '<a href="pages/page-wip.php">
                                        <img class="dd-main-icon" src="assets/images/dd-add-account-icon.svg">
                                        Add account
                                    </a>';
                                    echo '<hr>';
                                    echo '<a href="pages/page-wip.php">
                                        <img class="dd-main-icon" src="assets/images/booking-icon.svg">
                                        Reservations
                                        </a>';
                                    echo '<a href="pages/page-wip.php">
                                        <img class="dd-main-icon" src="assets/images/submit-icon.svg">
                                        Submissions
                                        </a>';
                                }
                            ?>
                            <a href="pages/page-wip.php">
                                <img class="dd-main-icon" src="assets/images/team-icon.svg">
                                About Us
                            </a>
                            <a href="pages/page-wip.php">
                                <img class="dd-main-icon" src="assets/images/faq-icon.svg">
                                Contact
                            </a>
                            <hr>
                            <?php 
                                if (isset($_SESSION["username"])) {
                                    echo '<a href="pages/sign-out.php">Sign Out</a>';
                                }
                            ?>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <section class="hero-section flex-center">
        <div class="hero-mid flex-center">
            <p class="hero-main-text">DaguDorms</p>
            <a class="hero-btn" href="pages/dorms.php">Get Started</a>
        </div>
    </section>
    <section class="info-section flex-center">
        <span class="info-text">
            At vero eos et accusamus et iusto odio dignissimos ducimus qui
            blanditiis praesentium voluptatum deleniti atque corrupti quos
            dolores et quas molestias excepturi sint occaecati cupiditate non
            provident, similique sunt in culpa qui officia deserunt mollitia
            animi, id est laborum et dolorum fuga. Et harum quidem rerum
            facilis est et expedita distinctio. Nam libero tempore, cum soluta
            nobis est eligendi optio cumque nihil impedit quo minus id quod
            maxime placeat facere possimus, omnis voluptas assumenda est,
            omnis dolor repellendus.
        </span>
        <img class="info-img" src="assets/images/room.png" alt="Apartment Illustration">
    </section>
    <section class="box-section flex-center">
        <div class="box flex-center br-12"></div>
        <div class="box flex-center br-12"></div>
        <div class="box flex-center br-12"></div>
        <div class="box flex-center br-12"></div>
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
    <script>
        function toggleDropdown() {
            var dropdownMenu = document.getElementById("dropdown-menu");
            dropdownMenu.classList.toggle("open");
        }

        var closeButton = document.getElementById("close-button");
        closeButton.addEventListener("click", toggleDropdown);
    </script>
</body>
</html>
