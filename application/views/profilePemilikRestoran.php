<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Fast 'n Curious</title>
  <link href="<?php echo base_url('/vendors/css/bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('/vendors/css/animate.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('/vendors/css/font-awesome.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('/vendors/css/lightbox.css');?>" rel="stylesheet">

  <link id="css-preset" href="<?php echo base_url('/vendors/css/presets/preset1.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('/vendors/css/main.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('/vendors/css/responsive.css');?>" rel="stylesheet">

  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="<?php echo base_url('/vendors/images/favicon.ico');?>">
  <link rel="stylesheet" href="<?php echo base_url('/vendors/css/blueimp-gallery.min.css');?>">

</head><!--/head-->

<body>
<div id="asd">Restoran</div>
  <header id="home">
      <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(<?php echo base_url('/vendors/images/Background/Wallpapers-fruit-flowers-black-background-hd-desktop-wallpapers.jpg');?>)">
          <div class="captionRestoran">
            <div class="media">
				<br/>
              <?php
                if($fotoUser[0]->URL_FOTO == ''){
                  $url = 'default.jpg';
                }else $url = $fotoUser[0]->URL_FOTO;
                $url_full = base_url('/vendors/images/profilepicture/' . $url);
              ?>
              <img class="media-object displayPicture img-circle  letakMediaRestoran" src="<?php echo $url_full ?>" alt="Generic placeholder image">
            </div>
              <h1> <?php echo $user->NAMA_USER ;?>
              </h1>
              <p><span class="glyphicon glyphicon-home" aria-hidden="true"></span><?php echo $user->ALAMAT_USER;?></p>
              <p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><?php echo $user->NOR_TELEPON_USER ;?> </p>
              <p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><?php echo $user->EMAIL_USER ;?>  </p>
              <p><span class="glyphicon glyphicon-flag" aria-hidden="true"></span><?php echo $user->JUMLAH_REPORT_USER ;?></p>
              <p><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <a href="#" style="color:lightblue" data-toggle="modal" data-target="#myModal">  Click To Edit Profile</a></p>
              <p><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> <a href="#" style="color:lightblue" data-toggle="modal" data-target="#myModalPassword">  Click To Change Password</a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url('fatncurious/profilPemilikRestoran');?>">
            <img class="img-responsive" src="<?php echo base_url('vendors/images/logo-putih-.png'); ?>" alt="logo">
          </a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="scroll"><a href="<?php echo site_url('fatncurious') ?>">Home</a></li>
            <li class="scroll"><a href="<?php echo site_url('fatncurious/index#contact') ?>">Contact Us</a></li>
            <?php
              if(isset($kodeUser)){
                if(isset($notifikasi)){
            ?>
              <li class="scroll">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="glyphicon glyphicon-bell"><sup><sup class="label label-danger" style="font-size:12px;"><?php echo count($notifikasi)?></sup></sup></span>
                </a>
                <ul class="dropdown-menu" style="max-height: calc(80vh - 210px);overflow-y: auto;">
                  <?php
                    $isiClass ="";
                    foreach($notifikasi as $n){
                      if($n->URL_FOTO == ''){
                        $url = 'default.jpg';
                      }else $url = $n->URL_FOTO;
                      $url_full = base_url('/vendors/images/profilepicture/' . $url);
                  ?>
                  <a href="<?= base_url() . 'index.php/fatncurious/sortByMenuRestoran/' . $n->URL?>"  style="padding:0px;">
                    <div class="notif" style="<?= $isiClass?>">
                      <li class="media" style="height:70px;">
                          <div class="media-left" style="padding:5px;background-color: inherit">
                            <img class="media-object displayPictureNotifikasi img-circle"  src="<?php echo $url_full ?>" alt = "generic placeholder image"></img>
                          </div>
                          <div class="media-body" style="background-color: inherit">
                            <div class="media-heading" style="color:white;max-width: 500px; min-width:300px;background-color:inherit"><?php echo $n->ISI?></div>
                            <h6 style="color:white;"><?= $n->WAKTU ?></h6>
                          </div>
                      </li>
                    </div>
                  </a>
                  <hr/>
                  <?php $isiClass = "background-color:gray;margin-top:-20px;margin-bottom: -20px;";
                }
                  ?>
                </ul>
              </li>
              <?php
            }
              ?>
        <li class="scroll">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?php echo $url_full ?>" class="img-circle displayPictureNavBar"> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('fatncurious/profilUser');?>" style="padding-top:10px;padding-bottom:10px;">Profile</a></li>
            <li><a href="<?php echo site_url('fatncurious/notification');?>" style="padding-top:10px;padding-bottom:10px;">Notification <span class="glyphicon glyphicon-envelope" aria-hidden="true" style="margin-left:10px;"></span></a></li>
            <li><a href="<?php echo site_url('fatncurious/LogOut');?>" style="padding-top:10px;padding-bottom:10px;">Logout</a></li>
            </ul>
        </li>
      <?php
        }
        else{
      ?>
          <li class="scroll">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Register/Login
            </a>
            <ul class="dropdown-menu loginRegister">
              <?php echo form_open('fatncurious/login');?>
            <!--<form accept-charset="UTF-8" action="fatncurious/login" method="post"> -->
              <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" >
                <input name="authenticity_token" type="hidden" value="4L/A2ZMYkhTD3IiNDMTuB/fhPRvyCNGEsaZocUUpw40=" />
              </div>
                <fieldset class='textbox'>
                  <label id='js-username' style="padding:5px;">
                    <span>Username</span>
                    <input autocomplete="on" id="username" name="txtEmailLogin" type="text" />
                  </label>
                  <label id='password' style="padding:5px;">
                    <span>Passwort</span>
                    <input id="userpassword" name="txtPasswordLogin" type="password" />
                  </label>
                </fieldset>
                <fieldset class='subchk' style="padding:5px;">
                  <?php
                    $array=['name'=>'btnLogin','value'=>'Login'];
                    echo form_submit($array);
                  ?>
                </fieldset>
                <?php echo form_close();?>
              <!-- </form> -->
              <a href="#" data-toggle="modal" data-target="#modalRegister" style="padding : 5px;">Register</a>
            <ul>
          </li>
      <?php } ?>
          </ul>
        </div>
      </div>
  </header><!--/#home-->
  <div class="container navbarSpace">
    <ul class="nav nav-tabs">
        <li role="presentation" class="active toogleNavBar"><a href="#">Recent Comment</a></li>
        <li role="presentation" style="float:right" class="toogleNavBar"><a href="#" data-toggle="modal" data-target="#modalLihatRestoran">Lihat Restoran</a></li>
    </ul>
    <br>
  <?php
    if(isset($review)){
      $restoSebelumnya='';
      foreach ($restoran as $r) {
  ?>
          <div class="media-list">
            <div class="media">
              <a class="media-left" href="<?php echo site_url('/fatncurious/profilRestoran/'.$r->KODE_RESTORAN) ;?>">
                <?php
                  if($r->URL_FOTO_RESTORAN == ''){
                    $url = 'default.jpg';
                  }else $url = $r->URL_FOTO_RESTORAN;
                  $url_full = base_url('/vendors/images/restoran/' . $url);
                ?>
                <img class="media-object img-rounded gambarRestoran" src="<?php echo $url_full ?>" alt="Generic placeholder image">

              <div class="media-body">
                <h4 class="media-heading"><?php echo $r->NAMA_RESTORAN .'-'.$r->ALAMAT_RESTORAN ;?></h4>
                </a>
                <?php
                $ctrRow = 0;

                $ctrReview=0;
                foreach($menu as $m){
                  if($m->KODE_RESTORAN == $r->KODE_RESTORAN){


                  echo "<div class='media' id=".$m->KODE_MENU." style='margin-bottom:30px;'>";
                    echo "<div class='media-left'>";
                    $url = base_url('/vendors/images/menu/default.jpg');
                    if($m->URL_FOTO != ''){
                      $url = base_url('/vendors/images/menu/'.$m->KODE_RESTORAN.'/'.$m->KODE_MENU . '/' . $m->URL_FOTO);
                    }
            ?>
                    <img class="media-object displayPicture displayPictureMenu img-rounded"  src="<?php echo $url;?>" alt="..." row-id="<?php echo $ctrRow; ?>">
            <?php
                    echo "</div>";
                    echo "<div class='media-body'>";
                  echo "<h4 class='media-heading'>".$m->NAMA_MENU."</h4>";
                  echo $m->DESKRIPSI_MENU;


                  echo "<div class='media m-t-2'>";
                  $adaComment=false;
                  //print_r($review);
                  $ctrRow = 0;
                  $ctrReview=0;
                    foreach($review as $rr){
                      if($rr->NAMA_RESTORAN == $m->NAMA_RESTORAN){
                        if($rr->NAMA_MENU == $m->NAMA_MENU){


                        $adaComment=true;
                  ?>
                        <div class="media">
                          <a class="media-left" href="<?php echo site_url('fatncurious/profilUserKlik/'.$rr->KODE_USER.'');?>">
                            <?php

                              if($rr->URL_FOTO_USER == ''){
                                $url = 'default.jpg';
                              }else $url = $rr->URL_FOTO_USER;
                              $url_full = base_url('/vendors/images/profilepicture/' . $url);
                            ?>
                            <img class="media-object displayPictureComment img-circle" src="<?php echo $url_full ?>" alt = "generic placeholder image"></img>
                          </a>

                            <div class="media-body">
                              <h4 class="media-heading"><?php echo $rr->NAMA_USER ;?> <span style="float:right"><h6><?php echo $rr->TANGGAL_REVIEW ;?></h6></span></h4>
                              <p><?php echo $rr->DESKRIPSI_REVIEW ;?></p>
                            </div>
                            </div>
                    <?php
                            }
                          }
                        }
                        echo "<br>";
                        if($adaComment==false){
                          echo "<h4>Tidak ada Comment</h4>";
                        }
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";

                  $ctrRow++;
                }
              }
                ?>
                </div>
                </div>
                </div>
  <?php

      }
    }
    echo $links;
  ?>
  </div>

  <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
		<?php echo form_open_multipart('fatncurious/updateProfilUser'); ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><center>Profile User</center></h4>
          </div>
          <div class="modal-body" style="background-image: url('<?php echo base_url('/vendors/images/Background/food-cherry-cup-photo-tablecloths-white-background.jpg');?>'); background-size: cover;filter:grayscale(.7);color:#fff;" >

				<?php $this->table->add_row('Nama User',form_input('txtRestoran',$user->NAMA_USER,['style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
				<?php $this->table->add_row('Alamat',form_input('txtJalan',$user->ALAMAT_USER,['style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
				<?php $this->table->add_row('Nomor Telepon',form_input('txtNoTelp',$user->NOR_TELEPON_USER,['style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
        <?php $this->table->add_row('Upload Profile Foto',form_upload('foto','',['style'=>'margin-left:20px'])); ?>
				<?php echo $this->table->generate(); ?>
          </div>
          <div class="modal-footer">
            <?php
				//echo "<button type='submit' class='submit btn-default' >Submit</button>";
        $arr = ['name'=>'btnSubmit','class'=>'submit btn-primary','value'=>'Submit'];
        echo form_submit($arr);
			?>
            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
		<?php echo form_close(); ?>
        </div>
      </div>
    </div>

	<div id="myModalPassword" class="modal fade" role="dialog" >
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
		<?php echo form_open('fatncurious/gantiPassProfilUser'); ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><center>Ganti Password</center></h4>
          </div>
          <div class="modal-body" style="background-image: url('<?php echo base_url('/vendors/images/Background/alcohol cocktail drink liquor lemons white background slices 1920x1080 wallpaper_www.wallpaperto.com_89.jpg');?>'); background-size: cover;filter:grayscale(.7);color:#000;">

				<?php $this->table->add_row('Old Password',form_password('txtOldPassword','',['style'=>'margin-left:20px;','class'=>'form-control'])); ?>
				<?php $this->table->add_row('New Password',form_password('txtNewPassword','',['style'=>'margin-left:20px;','class'=>'form-control'])); ?>
				<?php $this->table->add_row('Confirmation New Password',form_password('txtConfirmNewPassword','',['style'=>'margin-left:20px;','class'=>'form-control'])); ?>
				<?php echo $this->table->generate(); ?>
          </div>
          <div class="modal-footer">
            <button type="submit" class="submit btn-default" >Submit</button>
            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
		<?php echo form_close(); ?>
        </div>
      </div>
    </div>
  <div id="modalLihatRestoran" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center>List Restoran</center></h4>
        </div>
        <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;">
        <?php foreach($restoran as $resto){ ?>
          <div class="media">
            <div class="media-left">
              <?php
              if($resto->URL_FOTO_RESTORAN == ''){
              $foto = 'default.jpg';
              }
              else{$foto = $resto->URL_FOTO_RESTORAN ;}
              echo '<a href = '.site_url('/fatncurious/profilRestoran/'.$resto->KODE_RESTORAN).'>';
              ?>
              <img class="media-object displayPicture displayPictureMenu img-rounded"  src="<?php echo base_url('/vendors/images/restoran/'.$foto);?>" alt="...">
              </a>
            </div>
            <div class="media-body" style="max-height: calc(100vh - 210px);overflow-y: auto;">
              <h4 class="media-heading"><?php echo $resto->NAMA_RESTORAN ;?></h4>
                <div>
                  <?php echo $resto->ALAMAT_RESTORAN;?><br/>
                  <?php echo $resto->NO_TELEPON_RESTORAN;?><br/>
                  <?php echo $resto->DESKRIPSI_RESTORAN;?><br/>
                </div>
           </div><!--div mediaBody bawah-->
        </div>
        <hr/>

  <?php
  }?>
  </div>
  </div>
  </div>
  </div>

      <div id="modalRegister" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <?php echo form_open_multipart('fatncurious/register'); ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><center>Register</center></h4>
          </div>
          <div class="modal-body" style="background-image: url('<?php echo base_url('/vendors/images/Background/thanksgiving_09_213.jpg');?>'); background-size: cover;filter:grayscale(.7);color:#fff;" >
            <?php echo form_open('fatncurious/register');?>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <?php
                $array=['type'=>'email','class'=>'form-control','placeholder'=>'Email','name'=>'txtEmailRegister','style'=>'color:white'];
                echo form_input($array);
                //<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                ?>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <?php
                $array=['type'=>'password','class'=>'form-control','placeholder'=>'Password','name'=>'txtPasswordRegister','style'=>'color:white'];
                echo form_input($array);
                //<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                ?>
              </div>
              <div class="form-group">
                <label for="exampleInputNama"> Nama</label>
                <?php
                $array=['type'=>'text','class'=>'form-control','placeholder'=>'Nama','name'=>'txtNamaRegister','style'=>'color:white'];
                echo form_input($array);
                //<input type="text" class="form-control" id="exampleInputNama1" placeholder="Nama">
                ?>
              </div>
              <div class="form-group">
                <label for="exampleInputDTPicker">Tanggal Lahir</label>
                <?php
                $array=['type'=>'text','class'=>'form-control','id'=>'exampleInputDTPicker1','placeholder'=>'DD/MM/YYYY','name'=>'txtTglRegister','style'=>'color:white'];
                echo form_input($array);
                //<input type="text" class="form-control" id="exampleInputDTPicker1" placeholder="DD/MM/YYYY">
                ?>
              </div>
              <div class="form-group">
                <label for="exampleInputNoTelp"> No Telp</label>
                <?php
                $array=['type'=>'text','class'=>'form-control','placeholder'=>'No Telp','name'=>'txtNoTelpRegister','style'=>'color:white'];
                echo form_input($array);
                //<input type="text" class="form-control" id="exampleInputNoTelp1" placeholder="No Telp">
                ?>
              </div>
              <?php
                $array=['class'=>'btn btn-info','name'=>'btnRegister','value'=>'Register','style'=>'color:white'];
                echo form_submit($array);
                //<button type="submit" class="btn btn-info">Register</button>
                ?>
                <?php
                echo form_close();
              ?>
          </div>
      </div>
    </div>
  </div>

  <div id="modalRegister" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <?php echo form_open_multipart('fatncurious/register'); ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><center>Register</center></h4>
          </div>
          <div class="modal-body" style="background-image: url('<?php echo base_url('/vendors/images/Background/thanksgiving_09_213.jpg');?>'); background-size: cover;filter:grayscale(.7);color:#fff;" >
            <?php echo form_open('fatncurious/register');?>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <?php
                $array=['type'=>'email','class'=>'form-control','placeholder'=>'Email','name'=>'txtEmailRegister','style'=>'color:white'];
                echo form_input($array);
                //<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                ?>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <?php
                $array=['type'=>'password','class'=>'form-control','placeholder'=>'Password','name'=>'txtPasswordRegister','style'=>'color:white'];
                echo form_input($array);
                //<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                ?>
              </div>
              <div class="form-group">
                <label for="exampleInputNama"> Nama</label>
                <?php
                $array=['type'=>'text','class'=>'form-control','placeholder'=>'Nama','name'=>'txtNamaRegister','style'=>'color:white'];
                echo form_input($array);
                //<input type="text" class="form-control" id="exampleInputNama1" placeholder="Nama">
                ?>
              </div>
              <div class="form-group">
                <label for="exampleInputDTPicker">Tanggal Lahir</label>
                <?php
                $array=['type'=>'text','class'=>'form-control','id'=>'exampleInputDTPicker1','placeholder'=>'DD/MM/YYYY','name'=>'txtTglRegister','style'=>'color:white'];
                echo form_input($array);
                //<input type="text" class="form-control" id="exampleInputDTPicker1" placeholder="DD/MM/YYYY">
                ?>
              </div>
              <div class="form-group">
                <label for="exampleInputNoTelp"> No Telp</label>
                <?php
                $array=['type'=>'text','class'=>'form-control','placeholder'=>'No Telp','name'=>'txtNoTelpRegister','style'=>'color:white'];
                echo form_input($array);
                //<input type="text" class="form-control" id="exampleInputNoTelp1" placeholder="No Telp">
                ?>
              </div>
              <?php
                $array=['class'=>'btn btn-info','name'=>'btnRegister','value'=>'Register','style'=>'color:white'];
                echo form_submit($array);
                //<button type="submit" class="btn btn-info">Register</button>
                ?>
                <?php
                echo form_close();
              ?>
          </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="<?php echo base_url('/vendors/js/jquery.js');?>">
  </script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/bootstrap.min.js');?>"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/jquery.inview.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/wow.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/mousescroll.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/smoothscroll.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/jquery.countTo.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/lightbox.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/main.js');?>"></script>

  <script src="<?php echo base_url('/vendors/js/blueimp-gallery.min.js');?>"></script>
</body>
</html>
