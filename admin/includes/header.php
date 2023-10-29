<header id="header" class="header">
  <div class="header-menu">
    <div class="col-sm-7">
      <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
    </div>

    <div class="col-sm-5">
      <div class="user-area dropdown float-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="user-avatar rounded-circle" src="./assets/images/admin.jpg" alt="User Avatar">
        </a>

        <div class="user-menu dropdown-menu">
          <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>
          <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
            <i class="fa fa-power-off"></i> Logout
            <form action="./auth_controller.php" method="post" id="logout-form" style="display: none;">
              <input type="hidden" name="proses" value="logout" />
            </form>
          </a>
        </div>
      </div>
    </div>
  </div>

</header>