<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class='container'>
        <div class="col-md-10 images">
        <div class="navbar-header">
            <a class="navbar-brand" href="../View/index.php"><img class="navbar-brand" href="../View/index.php" src="../images/logo circle.png" alt="logo" style="width:40px">| Viewsician</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="nav-middle">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="#" class="search_icon"><i class="fas fa-search" style="font-size:20px"></i></a>
                    </li>
                    <li class="nav-item active">
                        <input class="search_input" type="text" name="" placeholder="Search...">
                    </li>
                    <li class="nav-item">
                        <a href="../View/explore.php" class="icon"><i class="far fa-compass" style="font-size:25px" style="padding: 20px"></i></a>
                        <span class="text">Explore</span>
                    </li>
                    <li class="nav-item dropdown">
                        <!--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <div class="dropdown">
                            <a href="/View/search.html" class="icon"><i class="far fa-user-circle" style="font-size:25px"></i></a>
                            <span class="text">Account</span>
                            <!--</a>-->

                            <div class="dropdown-menu">
                                <div class="nav-image-crop">
                                    <?php $location = "../View/login.php"; if(isset($_SESSION['userId'])): $sId = $_SESSION['userId']; $location = "../View/profile.php?profile_id=$sId";  ?>
                                    <a class="dropdown-item" href="<?=$location?>"><img src="data:image/png;base64,<?= base64_encode($_SESSION['profilePic']) ?>" id="account-image" onerror="this.src='../images/profile-pic.png';" /></a>
                                    <?php else: ?><a class="dropdown-item" href="<?=$location?>">Sign In</a><a class="dropdown-item" href="../View/signup.php">Sign Up</a>
                                    <?php endif; ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../View/index.php">Home</a>
                                    <?php if(isset($_SESSION['userId'])): ?><a class="dropdown-item" href="../Controller/logoutController.php">Sign Out</a><?php endif; ?>
                                </div>
                            </div>
                    </li>
            </div>
            <li class="nav-item">
                <a class="nav-link" href="../View/session.php?type=Session">Session</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../View/session.php?type=Artist">Artists</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../View/session.php?type=Studio">Rehearsal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../View/session.php?type=Venues">Venues</a>
            </li>
            </ul>
        </div>
        </div>
    </div>

</nav>

