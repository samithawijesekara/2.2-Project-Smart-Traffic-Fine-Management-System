<!--==================================================================================================================================SECTION_01====================================================================================================================================-->

<!-- Topbar navigation start here ===================================================-->
<div class="topnavbar">
    <!-- topnav left -->
    <ul class="topnavbar-nav">
        <li class="topnav-item" id="toggle">
            <a class="topnav-link">
                <i class="fas fa-bars" onclick="collapseSidebar()"></i>
            </a>
        </li>
        <li class="topnav-item">
            <img src="../assets/img/logo_text.svg" alt="STFMS logo" class="logo logo-light">
        </li>
    </ul>
    <!-- end topnav left -->
    <!-- topnav right -->
    <ul class="topnavbar-nav topnav-right">
        <li class="topnav-item">
            <div class="mydropdown">
                <p class="mydropdown-toggle pro-drop" data-toggle="user-menu">Settings <i class="fas fa-caret-down mydropdown-toggle" data-toggle="user-menu"></i></p>
                <ul id="user-menu" class="mydropdown-menu">
                    <li class="mydropdown-menu-item">
                        <a href="profile.php" class="mydropdown-menu-link">
                            <div>
                                <i class="fas fa-user"></i>
                            </div>
                            <span>Edit Profile</span>
                        </a>
                    </li>
                    <li class="mydropdown-menu-item">
                        <a href="logout.php" class="mydropdown-menu-link">
                            <div>
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <!-- end topnav right -->
</div>
<!-- Topbar navigation end here ===================================================-->