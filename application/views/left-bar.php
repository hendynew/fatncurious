<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Fat 'n Curious</span></a>
  </div>

  <div class="clearfix"></div>

  <div class="profile">
    <div class="profile_pic">
      <img src="../resources/images/img.jpg" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2><?php echo $active?></h2>
    </div>
  </div>

  <br />

  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="master">Info</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="master_user">User</a></li>
            <li><a href="master_restaurant">Restaurant</a></li>
            <li><a href="master_promo">Promo</a></li>
            <li><a href="master_menu">Menu</a></li>
            <li><a href="master_kartu_kredit">Kartu Kredit</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-edit"></i> Review <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="master_review/restaurant">Restaurant</a></li>
            <li><a href="master_review/menu">Menu</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="">
      <span class="glyphicon" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true" onclick="launchIntoFullscreen(document.documentElement)"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout">
      <span class="glyphicon glyphicon-off" aria-hidden="true" onclick="logout()"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="">
      <span class="glyphicon" aria-hidden="true"></span>
    </a>

  </div>
  <!-- /menu footer buttons -->
</div>
