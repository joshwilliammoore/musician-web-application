<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class='container'>
      <div class="navbar-header">
  <a class="navbar-brand" href="/View/index.html"><img class="navbar-brand" href="/View/index.html" src="../images/Logo.png" alt="logo" style="width:40px">| Viewsician</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      </div>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="nav-middle">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <input class="search_input" type="text" name="" placeholder="Search...">
        <a href="#" class="search_icon"><i class="fas fa-search" style="font-size:25px"></i></a>
      </li>
      <li class="nav-item">
        <a href="/View/search.html" class="icon"><i class="far fa-compass" style="font-size:30px" style="padding: 20px"></i></a>
        <span class="text">Explore</span>
      </li>
      <li class="nav-item dropdown">
        <!--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
        <div class="dropdown">
        <a href="/View/search.html" class="icon"><i class="far fa-user-circle" style="font-size:30px"></i></a>
        <span class="text">Account</span>
        <!--</a>-->
          
        <div class="dropdown-menu">
            <a class="dropdown-item" href="../View/account.php"><img src="data:image/png;base64,<?=base64_encode($_SESSION['profilePic'])?>" /></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
        </div>
      </li>
      </div>
      <li class="nav-item">
        <a class="nav-link" href="/View/session.html">Session</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/View/artists.html">Artists</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/View/rehearsal.html">Rehearsal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/View/venues.html">Venues</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/View/login.html">List</a>
      </li>
    </ul>
  </div>
          </div>

</nav>