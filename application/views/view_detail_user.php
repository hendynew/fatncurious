<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Detail | Fat 'n Curious </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>/build/css/custom.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?php echo base_url();?>/vendors/jquery/dist/jquery.min.js"></script>
    <script>
    var fullScreen = false;
    function launchIntoFullscreen(element) {
  if(!fullScreen){
    if(element.requestFullscreen) {
      element.requestFullscreen();
    } else if(element.mozRequestFullScreen) {
      element.mozRequestFullScreen();
    } else if(element.webkitRequestFullscreen) {
      element.webkitRequestFullscreen();
    } else if(element.msRequestFullscreen) {
      element.msRequestFullscreen();
    }
    fullScreen = true;
  }else{
    if(document.exitFullscreen) {
      document.exitFullscreen();
    } else if(document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if(document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
    fullScreen = false;
  }
}
  function logout(){
    window.location = "master/logout";
  }
    </script>
    <style>
      .glyphicon{cursor: pointer;}
      ul.pagination {
          display: inline-block;
          padding: 0;
          margin: 0;
      }

      ul.pagination li {display: inline;}

      ul.pagination li a {
          color: black;
          float: left;
          padding: 8px 16px;
          text-decoration: none;
          transition: background-color .3s;
          border: 1px solid #ddd;
      }

      ul.pagination li a.active {
          background-color: #4CAF50;
          color: white;
          border: 1px solid #4CAF50;
      }

      ul.pagination li a:hover:not(.active) {background-color: #ddd;}
      div.center {text-align: center;}
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Fat 'n Curious</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo base_url(); ?>/resources/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $active?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>index.php/master">Info</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>index.php/master_user">User</a></li>
                      <li><a href="<?php echo base_url();?>index.php/master_restaurant">Restaurant</a></li>
                      <li><a href="<?php echo base_url();?>index.php/master_promo">Promo</a></li>
                      <li><a href="<?php echo base_url();?>index.php/master_menu">Menu</a></li>
                      <li><a href="<?php echo base_url();?>index.php/master_kartu_kredit">Kartu Kredit</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Review <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>index.php/master_review/restaurant">Restaurant</a></li>
                      <li><a href="<?php echo base_url();?>index.php/master_review/menu">Menu</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"  onclick="launchIntoFullscreen(document.documentElement)"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true" onclick="logout()"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $active ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="<?php echo base_url() ?>index.php/master/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Detail user <?php echo $nama ?></h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form User</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      </li>
                      <li class="dropdown">
                        <?php
                        echo form_open('master_user');
                        echo form_hidden("dropdownUser",$kode_param);
                        $array=['class'=>'btn btn-danger','name'=>'btnDelete'];
                        echo form_submit($array,'Ban');
                        echo form_close();
                        ?>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php
                      $array=['class'=>'form-horizontal form-label-left'];
                      echo form_open('master_user',$array);
                    ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode User</label>
                        <label class="control-label col-md-1 col-sm-1 col-xs-12"><?php echo $kode ?></label>
                          <?php echo form_hidden("kodeUser",$kode); ?>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis User</label>
                        <label class="control-label col-md-1 col-sm-1 col-xs-12"><?php echo $jenis ?></label>
                        <?php echo form_hidden("jenisUser",$jenis); ?>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php
                            $array=['class'=>'form-control','name'=>'txtNama'];
                            echo form_input($array,$nama);
                            ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php
                            $array=['class'=>'form-control','name'=>'txtAlamat'];
                            echo form_input($array,$alamat);
                            ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php
                            $array=['class'=>'form-control','name'=>'txtTelp'];
                            echo form_input($array,$telp);
                            ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php
                            $array=['class'=>'form-control','name'=>'txtTanggal'];
                            echo form_input($array,$tgl);
                            ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Pos</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php
                            $array=['class'=>'form-control','name'=>'txtPos'];
                            echo form_input($array,$pos);
                            ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php
                            $array=['class'=>'form-control','name'=>'txtEmail'];
                            echo form_input($array,$email);
                            ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php
                            $array=['class'=>'form-control','name'=>'txtPass'];
                            echo form_input($array,$pass);
                            ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Report</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php
                            $array=['class'=>'form-control','name'=>'txtReport'];
                            echo form_input($array,$report);
                            ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php
                            $array=['class'=>'form-control','name'=>'txtKeterangan'];
                            echo form_textarea($array,$keterangan);
                            ?>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <?php
                            $array=['class'=>'btn btn-primary','name'=>'btnInsert'];
                            echo form_submit($array,'Add User');
                            $array=['class'=>'btn btn-success','name'=>'btnUpdate'];
                            echo form_submit($array,'Update Info');
                            $array=['class'=>'btn btn-danger','name'=>'btnDelete'];
                            echo form_submit($array,'Ban');
                          ?>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Table user</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                        <?php
                        if(sizeof($data2) > 0)
                        {
                          echo '<div class="table-responsive">';
                          $this->table->set_heading('Nama Kartu Kredit', 'Kode User');
                          $tmp = array('table_open'=>'<table class="table table-striped jambo_table">','heading_row_start'=>'<th class="column-title">','row_start'=>'<tr class="odd pointer"><td></td>','row_alt_start'=> '<tr class="even pointer"><td></td>');
                          $this->table->set_template($tmp);

                          foreach($data2 as $key=>$value){
                            $this->table->add_row($data2[$key],$key);
                          }
                          echo $this->table->generate();
                          echo '</div>';
                        }
                        ?>
                        <?php
                        if(sizeof($data3) > 0){
                          echo '<div class="table-responsive">';
                          $this->table->set_heading('Kode Report','User Reported', 'Alasan');
                          $tmp = array('table_open'=>'<table class="table table-striped jambo_table">','heading_row_start'=>'<th class="column-title">','row_start'=>'<tr class="odd pointer"><td></td>','row_alt_start'=> '<tr class="even pointer"><td></td>');
                          $this->table->set_template($tmp);

                          foreach($data3 as $key=>$value){
                            $this->table->add_row($key, $data3[$key]['KODE_USER_REPORTED'],$data3[$key]['ALASAN']);
                          }
                          echo $this->table->generate();
                          echo '</div>';
                        }
                        ?>
                        <?php
                        if(sizeof($data4) > 0){
                          echo '<div class="table-responsive">';
                          $this->table->set_heading('Kode Report','User Reporting', 'Alasan');
                          $tmp = array('table_open'=>'<table class="table table-striped jambo_table">','heading_row_start'=>'<th class="column-title">','row_start'=>'<tr class="odd pointer"><td></td>','row_alt_start'=> '<tr class="even pointer"><td></td>');
                          $this->table->set_template($tmp);

                          foreach($data4 as $key=>$value){
                            $this->table->add_row($key, $data4[$key]['KODE_USER_REPORTING'],$data4[$key]['ALASAN']);
                          }
                          echo $this->table->generate();
                          echo '</div>';
                        }
                        ?>

                        <?php
                        if(sizeof($data5) > 0){
                          echo '<div class="table-responsive">';
                          $this->table->set_heading('Kode Review', 'Kode Menu','Deskripsi','Tanggal','Jumlah Like','Keterangan');
                          $tmp = array('table_open'=>'<table class="table table-striped jambo_table">','heading_row_start'=>'<th class="column-title">','row_start'=>'<tr class="odd pointer"><td></td>','row_alt_start'=> '<tr class="even pointer"><td></td>');
                          $this->table->set_template($tmp);

                          foreach($data5 as $key=>$value){
                            $this->table->add_row($key,$data5[$key]['KODE_MENU'],$data5[$key]['DESKRIPSI_REVIEW'],$data5[$key]['TANGGAL_REVIEW'],$data5[$key]['JUMLAH_LIKE_REVIEW'],$data5[$key]['KETERANGAN_REVIEW']);
                          }
                          echo $this->table->generate();
                          echo '</div>';
                        }
                        ?>

                        <?php
                        if(sizeof($data6) > 0){
                          echo '<div class="table-responsive">';
                          $this->table->set_heading('Kode Review Restoran', 'Kode Restoran','Deskripsi','Tanggal','Jumlah Like','Keterangan');
                          $tmp = array('table_open'=>'<table class="table table-striped jambo_table">','heading_row_start'=>'<th class="column-title">','row_start'=>'<tr class="odd pointer"><td></td>','row_alt_start'=> '<tr class="even pointer"><td></td>');
                          $this->table->set_template($tmp);

                          foreach($data6 as $key=>$value){
                            $this->table->add_row($key, $data6[$key]['KODE_RESTORAN'],$data6[$key]['DESKRIPSI_REVIEW_RESTORAN'],$data6[$key]['TANGGAL_REVIEW_RESTORAN'],$data6[$key]['JUMLAH_LIKE_REVIEW_RESTORAN'],$data6[$key]['KETERANGAN_REVIEW_RESTORAN']);
                          }
                          echo $this->table->generate();
                          echo '</div>';
                        }
                        ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>/vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>/build/js/custom.min.js"></script>


  </body>
</html>
