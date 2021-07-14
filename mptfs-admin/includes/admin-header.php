<?php
include('includes/partial/header.php');
?>

<body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
        <div class="header-body" style="border-bottom: 1px solid rgba(0, 0, 0, 0.2); box-shadow: 0px 2px 2px 0 rgba(0, 0, 0, 0.2)">
            <div class="header-top">
                <div class="container">
                    <div class="header-row py-2">
                        <div class="header-column justify-content-start">
                            <div class="header-row">
                                <nav class="header-nav-top">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                            <a class="nav-link pl-0 text-white" href="mailto:info@blueoceantech.in"><i class="fa fa-envelope"></i>info@blueoceantech.in</a>
                                        </li>
                                        <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                            <a class="nav-link pl-0 text-white" href="tel:+91 - 9922951184"><i class="fa fa-phone"></i>+91 - 9922951184</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <ul class="header-social-icons social-icons d-sm-block social-icons-clean">
                                    <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f text-white"></i></a></li>
                                    <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter text-white"></i></a></li>
                                    <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in text-white"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-container container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-logo">
                                <a href="<?php echo BASE_URL; ?>">
                                    <img alt="Porto" height="40" data-sticky-height="40" src="../img/mylogo.png">
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php
                    $sql = "SELECT *FROM user";

                    $results = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($results) > 0) {
                        while ($row = mysqli_fetch_assoc($results)) {
                        }
                    }
                    ?>

                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1">
                                <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                    <nav class="collapse">
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li class="dropdown">
                                                <a class="dropdown-item" href="userDetails">
                                                    Home
                                                </a>
                                            </li>
                                            <?php
                                            if ($_SESSION['role'] == 'admin') { ?>
                                                <li class="dropdown">
                                                    <a class="dropdown-item" href="addCity">
                                                        Add City
                                                    </a>
                                                </li>
                                            <?php }
                                            ?>
                                            <?php
                                            if ($_SESSION['role'] == 'admin') { ?>
                                                <li class="dropdown">
                                                    <a class="dropdown-item" href="addPlace">
                                                        Add Place
                                                    </a>
                                                </li>
                                            <?php }
                                            ?>
                                            <?php
                                            if ($_SESSION['role'] == 'admin') { ?>
                                                <li class="dropdown">
                                                    <a class="dropdown-item" href="addSlots">
                                                        Add Slots
                                                    </a>
                                                </li>
                                            <?php }
                                            ?>
                                            <li class="dropdown">
                                                <a class="dropdown-item" href="logout.php">
                                                    Sign Out
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item">
                                                    <?php echo 'Hi,' . ' ' . htmlspecialchars($_SESSION["username"]); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <button class=" btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>