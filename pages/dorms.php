<?php
    session_start();
    include("../assets/php/config.php");
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
    <section class="dorms-section">
        <div class="filters-container">
            <section>
                <h2 class="filters-heading">Filters</h2>
                <div class="filter-option">
                    <label for="priceRange">Price Range</label>
                    <input type="range" min="0" max="10000" value="0" class="slider" id="priceRange">
                    <p>₱<span id="priceValue">0</span></p>
                </div>
                <div class="filter-option">
                    <label for="ratingsRange">Ratings</label>
                    <input type="range" min="0" max="5.0" value="0" step="0.1" class="slider" id="ratingsRange">
                    <p><span id="rateValue">0</span></p>
                </div>
            </section>
            <hr class="filters-divider">
            <section class="filter-options">
                <h2 class="filters-heading">Features</h2>
                <div>
                    <input type="checkbox" class="checkbox" id="airConditioning" name="airConditioning">
                    <label for="airConditioning">Air Conditioning</label>
                </div>
                <div>
                    <input type="checkbox" class="checkbox" id="elevator" name="elevator">
                    <label for="elevator">Elevator</label>
                </div>
                <div>
                    <input type="checkbox" class="checkbox" id="kitchen" name="kitchen">
                    <label for="kitchen">Kitchen</label>
                </div>
                <div>
                    <input type="checkbox" class="checkbox" id="petsAllowed" name="petsAllowed">
                    <label for="petsAllowed">Pets Allowed</label>
                </div>
                <div>
                    <input type="checkbox" class="checkbox" id="utilities" name="utilities">
                    <label for="utilities">Utilities Included</label>
                </div>
                <div>
                    <input type="checkbox" class="checkbox" id="washingMachine" name="washingMachine">
                    <label for="washingMachine">Washing Machine</label>
                </div>
                <div>
                    <input type="checkbox" class="checkbox" id="wifi" name="wifi">
                    <label for="wifi">Wi-Fi</label>
                </div>
            </section>
            <hr class="filters-divider">
            <section class="filter-options">
                <h2 class="filters-heading">Room Type</h2>
                <div>
                    <input type="checkbox" class="checkbox" id="dormRoom" name="dormRoom">
                    <label for="dormRoom">Dorm Room</label>
                </div>
                <div>
                    <input type="checkbox" class="checkbox" id="singleBed" name="singleBed">
                    <label for="singleBed">Single Bed</label>
                </div>
                <div>
                    <input type="checkbox" class="checkbox" id="twoBeds" name="twoBeds">
                    <label for="twoBeds">Two Beds</label>
                </div>
                <div>
                    <input type="checkbox" class="checkbox" id="studio" name="studio">
                    <label for="studio">Studio</label>
                </div>
            </section>
        </div>
        <div class="dorms-listing" id="dorms-listing">
            <div class="search-container">
                <div class="search-bar br-12">
                    <span class="search-icon flex-center">
                        <img src="../assets/images/search-icon.svg" alt="Search">
                    </span>
                    <input class="search-input" type="search" id="search_bar" name="search_bar" placeholder="Search dormitories in Dagupan City" spellcheck="false">
                </div>
                <div class="move-dates-wrapper br-12">
                    <div class="move-date-container flex-center" style="border-right: 2px solid #DBDDE1">
                        <img class="calendar-icon" src="../assets/images/calendar-icon.svg" alt="Calendar Icon">
                        <div class="move-date flex-center">
                            <p>Move in</p>
                            <input class="move-input" type="date" name="end-date" id="start-date">
                        </div>
                    </div>
                    <div class="move-date-container flex-center">
                        <img class="calendar-icon" src="../assets/images/calendar-icon.svg" alt="Calendar Icon">
                        <div class="move-date flex-center">
                            <p>Move out</p>
                            <input class="move-input" type="date" name="end-date" id="end-date">
                        </div>
                    </div>
                </div>
            </div>
        <div class="dorm-card-root" id="dorm-card-root">
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
    <script src="../assets/js/dorms.js"></script>
    <script src="../assets/js/dropdown.js"></script>
</body>
</html>
