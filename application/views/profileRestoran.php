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

  <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>-->
  <link rel="shortcut icon" href="<?php echo base_url('/vendors/images/favicon.ico');?>">
  <link rel="stylesheet" href="<?php echo base_url('/vendors/css/blueimp-gallery.min.css');?>">

</head><!--/head-->

<body>
<div id="asd">Restoran</div>
  <header id="home">
      <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <?php
          if($resto->URL_FOTO_RESTORAN == ''){
            $url = 'default.jpg';
          }else $url = $resto->URL_FOTO_RESTORAN;
          $url_full = base_url('/vendors/images/restoran/' . $url);
        ?>
        <div class="item active" style="background-image: url(<?php echo base_url('/vendors/images/Background/Wallpapers-fruit-flowers-black-background-hd-desktop-wallpapers.jpg');?>)">
          <div class="captionRestoran">
            <div class="media">
              <img class="media-object displayPicture img-circle  letakMediaRestoran" src="<?php echo $url_full;?>" alt="Generic placeholder image">
            </div>
              <h1><span> <?php echo $resto->NAMA_RESTORAN ;?> </span>
                  <h2 style="margin-top:-30px;color:#fff"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                      <span aria-hidden = "true" class="glyphicon" style="color:gold">/4.0</span>
                  </h2>

              </h1>
              <p><span class="glyphicon glyphicon-road" aria-hidden="true"> </span><?php echo ' '.$resto->ALAMAT_RESTORAN ;?></p>
              <p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <?php echo  ' '.$resto->NO_TELEPON_RESTORAN ;?></p>
              <p><span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo  ' '.$resto->JAM_BUKA_RESTORAN ;?></p>
              <p><span class="glyphicon glyphicon-tags" aria-hidden="true"></span><?php echo  ' '.$resto->HARI_BUKA_RESTORAN ;?></p>
              <p><span class="glyphicon glyphicon-flag" aria-hidden="true"></span><button id="btnStatus"  class="btnStatus btn-info" type="button" data-url="<?php echo site_url('fatncurious/updateStatusRestoran')?>" data-val=<?php echo $resto->KODE_RESTORAN?> value="<?php echo $resto->STATUS ?>" style="padding:8px;border-radius:8px;margin-left:5px;"><?php  echo  ' '.$resto->STATUS ;?></button></p>
              <!--<p><span class="glyphicon glyphicon-flag" aria-hidden="true"></span><?php // echo  ' '.$resto->STATUS ;?></p>  -->
              <p><span class="glyphicon glyphicon-cog" aria-hidden="true"></span><?php echo  ' '.$resto->DESKRIPSI_RESTORAN ;?></p>
              <p><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <a href="#" style="color:lightblue" data-toggle="modal" data-target="#myModal">Click To Edit Profile</a></p>
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
            <li class="scroll"><a href="<?php echo site_url('fatncurious/profilUser') ?>">Home</a></li>
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
            <?php
            if($fotoUser[0]->URL_FOTO == ''){
              $url = 'default.jpg';
            }else $url = $fotoUser[0]->URL_FOTO;
            $url_full = base_url('/vendors/images/profilepicture/' . $url);
              ?>
            <img src="<?php echo $url_full ?>" class="img-circle displayPictureNavBar"> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
            <li><a href="#" style="padding-top:10px;padding-bottom:10px;"> <?php echo $this->session->userdata('userYangLogin')->NAMA_USER; ?> </li></a>
            <li><a href="<?php echo site_url('fatncurious/profilUser');?>" style="padding-top:10px;padding-bottom:10px;">Profile</a></li>
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
    </div>
  </header><!--/#home-->

      <!-- Untuk Edit Profil Restoran -->
      <?php//print_r($resto);?>
  <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
    <?php echo form_open_multipart('fatncurious/updateProfilRestoran/'.$resto->KODE_RESTORAN.''); ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><center>Profile Restoran</center></h4>
          </div>
          <div class="modal-body" style="background-image: url('<?php echo base_url('/vendors/images/Background/original.jpg');?>'); background-size: cover;filter:grayscale(.7);color:#fff;" >
            <?php
              if($resto->URL_FOTO_RESTORAN == ''){
                $url = 'default.jpg';
              }else $url = $resto->URL_FOTO_RESTORAN;
              $url_full = base_url('/vendors/images/restoran/' . $url);
            ?>
        <center><img id='fotoMenu' src=<?php echo $url_full;?> style="height:100px;height:100px;" class="img-rounded"></center>
        <?php $this->table->add_row('Upload Foto Restoran',form_upload(array("name"=>"foto"),'',['style'=>'margin-left:20px;'])); ?>
        <?php $this->table->add_row('Nama Restoran',form_input('txtRestoran',$resto->NAMA_RESTORAN,['style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
        <?php $this->table->add_row('Alamat Restoran',form_input('txtAlamat',$resto->ALAMAT_RESTORAN,['style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
        <?php $this->table->add_row('Telepon',form_input('txtTelepon',$resto->NO_TELEPON_RESTORAN,['style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
        <?php $this->table->add_row('Jam Buka',form_input('txtJam',$resto->JAM_BUKA_RESTORAN,['style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
        <?php $this->table->add_row('Hari Buka',form_input('txtHari',$resto->HARI_BUKA_RESTORAN,['style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
        <?php $this->table->add_row('Deskripsi Restoran',form_input('txtDeskripsi',$resto->DESKRIPSI_RESTORAN,['style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
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
<!-- Untuk Edit Profil Restoran -->

    <div class = "container navbarSpace" style="background-color:#fafafa">
      <div>
        <h4>SORTED BY :</h4>
        <ul class="nav nav-tabs">
          <li role="presentation" class="<?php echo $active2.' ';?> toogleNavBar"><a href="<?php echo site_url('/fatncurious/sortByPromoProfilRestoran/'.$resto->KODE_RESTORAN.'') ?>">Promo</a></li>
          <li role="presentation" class="<?php echo $active3.' ';?> toogleNavBar"><a href="<?php echo site_url('/fatncurious/sortByMenuProfilRestoran/'.$resto->KODE_RESTORAN.'') ?>">Menu</a></li>
          <li role="presentation" class="<?php echo $active6.' ';?> toogleNavBar"><a href="#" data-toggle="modal" data-target="#modalInsert">Insert</a></li>
          <li role="presentation" style="float:right" class="toogleNavBar"><a href="#" data-toggle="modal" data-target="#modalReport">Lihat Report Restoran</a></li>
          <li role="presentation" style="float:right" class="toogleNavBar"><a href="#" data-toggle="modal" data-target="#modalReview">Lihat Review Restoran</a></li>
        </ul>
      </div>
        <div class="media">
		<?php
    //print_r($promo);
    //print_r($review_restoran);
		if(isset($promo)){
			foreach($promo as $p){
        echo "<div class='media' id=".$p->KODE_PROMO." style='margin-bottom:30px;'>";
				echo "<div class='media-left'>";
        $url = base_url('/vendors/images/promo/default.jpg');
        if($p->FOTO_PROMO != ''){
          $url = base_url('/vendors/images/promo/'.$p->FOTO_PROMO);
        }
		?>
        <img class="media-object displayPicture displayPictureMenu img-rounded" src="<?php echo $url;?>" alt="...">
		<?php
				echo "</div>";
				echo "<div class='media-body'>";
					echo "<h4 class='media-heading'>".$p->NAMA_PROMO."<a class='btn btn-danger confirmationPromo' data-toggle='confirmation' style='float:right;'  data-url='".site_url('/fatncurious/deletePromo/'.$p->KODE_PROMO.'')."' data-kodepromo='".$p->KODE_PROMO."'>Delete</a><a href='#' data-toggle='modal' class='btn btn-primary' data-target='#modalUpdatePromo' style='float:right; margin-right:10px;' data-koderesto = '".$p->KODE_RESTORAN."' data-namaPromo='".$p->NAMA_PROMO."' data-fotopromo='".$p->FOTO_PROMO."' data-kodePromo='".$p->KODE_PROMO."' data-deskripsiPromo='".$p->DESKRIPSI_PROMO."' data-masaBerlaku='".$p->MASABERLAKU_PROMO."' data-persentasePromo='".$p->PERSENTASE_PROMO."' data-keteranganPromo='".$p->KETERANGAN_PROMO."'>Update</a></h4>";
					echo "Deskripsi : ".$p->DESKRIPSI_PROMO."<br>";
          echo "Masa Berlaku : ".$p->MASABERLAKU_PROMO."<br>";
          echo "Persentase : ".$p->PERSENTASE_PROMO."<br>";
					echo "<div class='media m-t-2'>";
				echo "</div>";
				echo "<br/>";
				echo "</div>";
				echo "<br>";
        echo "</div>";
			}
		}
		?>
		<?php //sorted by Promo ?>

		<?php //sorted by Menu ?>
		<?php
			if(isset($menu)){
        $ctrRow = 0;

        $ctrReview=0;
				foreach($menu as $m){
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
					echo "<h4 class='media-heading'>".$m->NAMA_MENU."<a href='#' data-toggle='confirmation' class='btn btn-danger confirmationMenu' style='float:right;' data-kodemenu='".$m->KODE_MENU."' data-url='".site_url('/fatncurious/deleteMenu/'.$m->KODE_MENU.'')."' data-koderestoran='".$m->KODE_RESTORAN."'>Delete</a><a href='#' class='btn btn-primary' style='float:right;margin-right:10px;' data-toggle='modal' data-target='#modalUpdate' data-menu='".$m->NAMA_MENU."' data-kode='".$m->KODE_MENU."' data-fotoMenu='".$m->URL_FOTO."' data-kodeResto='".$m->KODE_RESTORAN."' data-deskripsi='".$m->DESKRIPSI_MENU."'>Update</a></h4>";
          echo $m->DESKRIPSI_MENU;


          echo "<div class='media m-t-2'>";
          if(isset($review[$m->KODE_MENU])){
            foreach($review[$m->KODE_MENU] as $r){
              echo "<div class='media-left' href='#'>";
              if($r->URL_FOTO == ''){
                $url = 'default.jpg';
              }else $url = $r->URL_FOTO;
              $url_full = base_url('/vendors/images/profilepicture/' . $url);
                ?>
                  <img class="media-object displayPictureComment img-circle" src="<?php echo $url_full?>" alt="Generic placeholder image">
                <?php
              echo "</div>";
              echo "<div class='media-body'>";
              echo "<h4 class='media-heading'>" . $r->NAMA ."</h4>";
              echo "<div id='deskripsi_review".$ctrReview."'>". $r->DESKRIPSI_REVIEW."</div>";
              echo '<br/>';
              $jumlah_like = 0;$jumlah_dislike = 0;
              $like = ""; $dislike = "";$report = "";
              if(isset($like_review[$r->KODE_REVIEW]['LIKE'])) $jumlah_like = $like_review[$r->KODE_REVIEW]['LIKE'];
              if(isset($like_review[$r->KODE_REVIEW]['DISLIKE'])) $jumlah_dislike = $like_review[$r->KODE_REVIEW]['DISLIKE'];
              if(isset($report_review_user[$r->KODE_REVIEW]) && $report_review_user[$r->KODE_REVIEW] != '0') $report = "sudahdiKlik";
              if(isset($like_review_user[$r->KODE_REVIEW])){
                if($like_review_user[$r->KODE_REVIEW] == 1){
                  $like = "sudahdiKlik";
                }else if($like_review_user[$r->KODE_REVIEW] == -1){
                  $dislike = "sudahdiKlik";
                }
              }
              if($kodeuser != '')
              echo '<span id="like' . $r->KODE_REVIEW . '">' . $jumlah_like .'</span><span class="glyphicon glyphicon-thumbs-up likeReview btn ' . $like .'" id="btnLike' . $r->KODE_REVIEW .'" data-review='. $r->KODE_REVIEW .' data-user="'. $kodeuser . '" data-restoran="' . $resto->KODE_RESTORAN .'" data-url="'.site_url('fatncurious/likeComment/').'"></span>
                    <span id="dislike' . $r->KODE_REVIEW . '">' . $jumlah_dislike .'</span><span class="glyphicon glyphicon-thumbs-down dislikeReview btn ' . $dislike .'" id="btnDislike' . $r->KODE_REVIEW .'" data-review='. $r->KODE_REVIEW .' data-user='. $kodeuser . ' data-restoran="' . $resto->KODE_RESTORAN .'" data-url="'.site_url('fatncurious/dislikeComment/').'"></span>
                    <span id="report' . $r->KODE_REVIEW . '" class="glyphicon glyphicon-flag reportReview btn ' . $report .'" data-toggle="modal" data-target="#modalReport" style="margin-left:20px;"  data-review='. $r->KODE_REVIEW .' data-restoran="'. $resto->KODE_RESTORAN . '"></span>';

              if($kodeuser == $r->KODE){
                echo '<div class="row" style="margin-left : 5px;">';
                echo "<span><a class = 'btnDelete' href='".site_url('/fatncurious/deleteComment/'.$resto->KODE_RESTORAN.'/'.$r->KODE_REVIEW.'')."' id='".$r->KODE_REVIEW."d'>Delete </a></span>";
                echo "<span><a class = 'btnUpdate' data-toggle='modal' href='#' id='".$r->KODE_REVIEW."u'  data-val = '".$r->DESKRIPSI_REVIEW."' data-val2='deskripsi_review".$ctrReview."' >Edit </a></span>";
                echo "<span><a class = 'btnUpdate2' data-toggle='modal' href='#' id='".$r->KODE_REVIEW."u2'  data-val = '".$r->DESKRIPSI_REVIEW."' data-val2='deskripsi_review".$ctrReview."' data-url='".site_url('fatncurious/updateComment/'.$resto->KODE_RESTORAN.'/'.$r->KODE_REVIEW.'')."' style=display:none; > Submit </a></span>";
                echo '</div>';
              }
              echo "</div>";
              echo "<br/>";
              $ctrReview++;
            }
          }

          if($kodeuser != ''){
            echo form_open('fatncurious/sortByMenuRestoran');
            echo "<div class='input-group customInputGroup img-rounded'>";
            echo "<input type='text' class='form-control' placeholder='Tuliskan Komen disini..' name='txtReview'>";
            echo "<span class='input-group-btn'>";
            echo form_hidden('menu',$m->KODE_MENU);
            echo form_hidden('resto',$m->KODE_RESTORAN);
            $arr = ['class'=>'btn btn-default img-rounded','name'=>'btnGo','value'=>'Go!'];
            echo form_submit($arr);
            echo "</span>";
            echo "</div>";
            echo form_close();
          }
          echo "</div>";
          echo "</div>";
          echo "</div>";
          //gallery
          echo "<div class='imageGallery R".$ctrRow."'>";
            echo "<div class='links'>";
              echo "<div class='container-fluid'>";
                echo "<div class='row'>";
                $ctr=2;
                $tidakAdaFoto=true;
                if(isset($fotoMenu)){
                  foreach($fotoMenu as $f){
                    if($f->KODE_MENU == $m->KODE_MENU){
                      echo "<div class='col-sm-3 gambarImageGallery'>";
                      ?>
                        <a href="<?php echo base_url('/vendors/images/menu/'.$m->KODE_RESTORAN.'/'.$m->KODE_MENU.'/'.$f->URL_UPLOAD);?>">
                          <img src="<?php echo base_url('/vendors/images/menu/'.$m->KODE_RESTORAN.'/'.$m->KODE_MENU.'/'.$f->URL_UPLOAD);?>" class="img-responsive">
                        </a>
                      <?php
                      echo "</div>";
                      $ctr++;
                      $tidakAdaFoto=false;
                    }
                  }
                }
                if($tidakAdaFoto==true){
                  echo "<h5>Tidak Ada Foto</h5>";
                }
                echo "</div>";
              echo "</div>";
            echo "</div>";
          echo "</div>";
          $ctrRow++;
          //gallery
      }
    }
    //gallery ?>
    <?php //sorted by Menu ?>
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
  <div id="modalUpdate" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title">Update </h4></center>
              </div>
              <?php echo form_open_multipart('fatncurious/updateMenu')?>
              <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto; background-image: url('<?php echo base_url('/vendors/images/Background/fino-cocktail-bar-restaurant.jpg');?>'); background-size: cover;filter:grayscale(.7);color:#fff;">
                <center><img id='fotoMenu' src="..." style="height:100px;height:100px;" class="img-rounded"></center>
                <?php $this->table->add_row('Nama Menu',form_input('txtMenu',"",['id'=>'txtMenu','style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
                <?php $this->table->add_row('Deskripsi Menu',form_input('txtDeskripsiMenu',"",['id'=>'deskripsiMenu','style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
                <?php $this->table->add_row('Upload Foto Menu',form_upload(array("name"=>"foto"),'',['style'=>'margin-left:20px;'])); ?>
                <?php echo $this->table->generate(); ?>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <?php
                  //<button type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                  $arr = ['name'=>'hidKodeRestoran','id'=>'hKodeRestoran','value'=>'','type'=>'hidden'];
                  echo form_input($arr);
                  $arr3 = ['name'=>'hidKodeMenu','id'=>'hKodeMenu','value'=>'','type'=>'hidden'];
                  echo form_input($arr3);
                  $arr3 = ['name'=>'hidFotoMenu','id'=>'hFotoMenu','value'=>'','type'=>'hidden'];
                  echo form_input($arr3);
                  $arr4 = ['class'=>'btn btn-primary','id'=>'submitMenu','name'=>'btnSubmit','value'=>'Submit'];
                  echo form_submit($arr4);
                  ?>
              </div>
              <?php echo form_close();?>
          </div>
      </div>
  </div>

  <div id="modalReview" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <center><h4 class="modal-title">Review Restoran <?php echo $resto->NAMA_RESTORAN;?></h4></center>
          </div>
          <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto; background-image: url('<?php echo base_url('/vendors/images/Background/3865555484_d512b4f0c4_z.jpg');?>'); background-size: cover;filter:grayscale(.7);color:#fff;">
            <?php foreach($review_restoran as $rr){ ?>
            <div class="media">
              <a class="media-left" href="#">
                <?php
                $url = base_url('/vendors/images/profilepicture/default.jpg');
                if($rr->URL_FOTO != ''){
                  $url = base_url('/vendors/images/profilepicture/'. $rr->URL_FOTO);
                }
                ?>
                <img class="media-object displayPictureComment img-circle" src="<?php echo $url?>" alt="Generic placeholder image">
              </a>
              <div class="media-body">
                <h4 class="media-heading" style="color:white;"><?php echo $rr->NAMA ?><span style="float:right"><h6 style="color:white;"><?php echo $rr->TANGGAL ;?></h6></span></h4>
                <h4>
                  <?php
                    $counter = 0;
                    for($i = 0; $i < 5; $i++){
                      if($counter < $rr->RATING){
                        echo '<span style="color:white;" class="glyphicon glyphicon-star"></span>';
                      }
                      else{
                        echo '<span style="color:white;" class="glyphicon glyphicon-star-empty"></span>';
                      }
                      $counter++;
                    }
                   ?>
                </h4>
                <strong style="color:white;"><?php echo $rr->JUDUL ?> </strong><br/>
                <p style="color:white;"><?php echo $rr->DESKRIPSI ?></p>
              </div>
            </div>
            <hr>
            <?php } ?>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div id="modalReport" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <center><h4 class="modal-title">Report Restoran <?php echo $resto->NAMA_RESTORAN;?></h4></center>
        </div>
        <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto; background-image: url('<?php echo base_url('/vendors/images/Background/55afa22ff1c80bb4097cb1349324a8fc1320719438_gallery_gallery.jpg');?>'); background-size: cover;filter:grayscale(.7);color:#fff;">
          <?php// echo print_r($report_restoran);?>
          <?php foreach($report_restoran as $rr){ ?>
          <div class="media">
            <a class="media-left" href="#">
              <?php
              $url = base_url('/vendors/images/profilepicture/default.jpg');
              if($rr->URL_FOTO != ''){
                $url = base_url('/vendors/images/profilepicture/'. $rr->URL_FOTO);
              }
              ?>
              <img class="media-object displayPictureComment img-circle" src="<?php echo $url?>" alt="Generic placeholder image">
            </a>
            <div class="media-body">
              <h4 class="media-heading" style="color:white;"><?php echo $rr->NAMA ?><span style="float:right"><h6 style="color:white;"><?php echo $rr->TANGGAL.','. $rr->WAKTU ;?></h6></span></h4>
              <strong style="color:white;"><?php echo $rr->ALASAN ?> </strong><br/>
            </div>
          </div>
          <hr>
          <?php } ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>


  <div id="modalUpdatePromo" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title">Update </h4></center>
            </div>
            <?php echo form_open_multipart('fatncurious/updatePromo')?>
            <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto; background-image: url('<?php echo base_url('/vendors/images/Background/aktivitaeten_header_restaurant,method=scale,prop=data,id=1200-510.jpg');?>'); background-size: cover;filter:grayscale(.7);color:#fff;">
              <center><img id='fotoPromo' src="..." style="height:100px;height:100px;" class="img-rounded"></center>
              <?php $this->table->add_row('Nama Promo',form_input('txtPromo',"",['id'=>'txtPromo','style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
              <?php $this->table->add_row('Deskripsi Promo',form_input('txtDeskripsiPromo',"",['id'=>'deskripsiPromo','style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
              <?php $this->table->add_row('Masa Berlaku',form_input('txtMasaBerlaku',"",['id'=>'masaBerlaku','style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
              <?php $this->table->add_row('Persentase Promo',form_input('txtPersentasePromo',"",['id'=>'persentasePromo','style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
              <?php $this->table->add_row('Keterangan Promo',form_input('txtKeteranganPromo',"",['id'=>'keteranganPromo','style'=>'margin-left:20px;color:white;','class'=>'form-control'])); ?>
              <?php $this->table->add_row('Upload Foto Promo',form_upload(array("name"=>"foto"),'',['style'=>'margin-left:20px;'])); ?>
              <?php echo $this->table->generate(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?php
                //<button type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                $arr = ['name'=>'hidKodeRestoran','id'=>'hKodeRestoran','value'=>'','type'=>'hidden'];
                echo form_input($arr);
                $arr3 = ['name'=>'hidKodePromo','id'=>'hKodePromo','value'=>'','type'=>'hidden'];
                echo form_input($arr3);
                $arr3 = ['name'=>'hidFotoPromo','id'=>'hFotoPromo','value'=>'','type'=>'hidden'];
                echo form_input($arr3);
                $arr3 = ['id'=>'urlReview','value'=>site_url('fatncurious/reportComment/'),"type"=>'hidden'];
                echo form_input($arr3);
                $arr3 = ['class'=>'btn btn-primary','id'=>'reportReview','name'=>'btnSubmitPromo','value'=>'Submit'];
                echo form_submit($arr3);
                ?>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
  </div>
  <div id="modalInsert" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title">Insert</h4></center>
            </div>
            <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;background-image: url('<?php echo base_url('/vendors/images/Background/bg-restaurant_r369.jpg');?>'); background-size: cover;filter:grayscale(.7);color:#fff;">
              <center>
                <!--<img src="..." style="height:100px;height:100px;" class="img-rounded"><br/>-->
                <form action="<?php echo site_url('fatncurious/insert'); ?>" method="post" enctype="multipart/form-data">
                 <input type="file" name="foto" accept="image/*">
              </center>
              <?php echo form_radio('rbJenisMenu','Promo','checked',['class'=>'jenisMenu','data-url'=>site_url('fatncurious/tampilkanFormInsertPromo')]).'Promo'; ?>
              <?php echo form_radio('rbJenisMenu','Menu','',['class'=>'jenisMenu','style'=>'margin-left:20px','data-url'=>site_url('fatncurious/tampilkanFormInsertMenu')]).'Menu'; ?>
              <div class="formInsertPromo" style="display:inherit">
                <table>
                  <tr>
                    <td>Nama Promo:</td>
                    <td><input type="text" name="txtPromo" value="" style="color:white; margin-left:20px" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Deskripsi Promo:</td>
                    <td><input type="text" name="txtDeskripsiPromo" value="" style="color:white; margin-left:20px" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Masa Berlaku:</td>
                    <td><input type="text" name="txtMasaBerlaku" value="YYYY-MM-DD" style="color:white; margin-left:20px" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Persentase Promo:</td>
                    <td><input type="text" name="txtPersentasePromo" value="" style="color:white; margin-left:20px" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Keterangan Promo:</td>
                    <td><input type="text" name="txtKeteranganPromo" value="" style="color:white; margin-left:20px" class="form-control"></td>
                  </tr>
                </table>
              </div>
              <div class="formInsertMenu" style="display:none;">
                <table>
                  <tr>
                    <td>Nama Menu:</td>
                    <td><input type="text" name="txtMenu" value="" style="color:white; margin-left:20px" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Jenis Menu:</td>
                    <td>
                      <select name='ddJenisMenu' style=" margin-left:20px" class="form-control">
                        <option value='JM001' selected>MAKANAN</option>
                        <option value='JM002'>MINUMAN</option>
                        <option value='JM003'>SNACK</option>
                        <option value='JM004'>DESSERT</option>
                      </select>
                  </td>
                  </tr>
                  <tr>
                    <td>Deskripsi Menu:</td>
                    <td><input type="text" name="txtDeskripsiMenu" value="" style="color:white; margin-left:20px" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Harga Menu:</td>
                    <td><input type="text" name="txtHargaMenu" value="" style="color:white; margin-left:20px" class="form-control"style="color:white; margin-left:20px" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Keterangan Menu:</td>
                    <td><input type="text" name="txtKeteranganMenu" value="" style="color:white; margin-left:20px" class="form-control"></td>
                  </tr>
                </table>
              </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?php
                //<button type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                $arr = ['name'=>'hidKodeRestoran','id'=>'hKodeRestoran','value'=>$resto->KODE_RESTORAN,'type'=>'hidden'];
                echo form_input($arr);
                $arr3 = ['name'=>'hidKodeReview','id'=>'kodeReviewReport','value'=>'','type'=>'hidden'];
                echo form_input($arr3);
                $arr3 = ['id'=>'urlReview','value'=>site_url('fatncurious/reportComment/'),"type"=>'hidden'];
                echo form_input($arr3);
                $arr3 = ['class'=>'btn btn-primary','id'=>'reportReview','name'=>'btnSubmit','value'=>'Submit'];
                echo form_submit($arr3);
                ?>
                </form>
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
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/jquery.inview.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/wow.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/mousescroll.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/smoothscroll.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/jquery.countTo.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/lightbox.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/main.js');?>"></script>
  <script src="<?php echo base_url('/vendors/js/blueimp-gallery.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/tooltip.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/bootstrap-confirmation.js') ?>"></script>
  <script>
    $('.confirmationPromo').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    container: 'body',
    title:"Are you sure want to delete this Promo ? ",
    popout:true,
    buttons: [
      {
        class: 'btn btn-primary',
        icon: 'glyphicon glyphicon-ok',
        onClick: function() {
          var url = $(this).attr("data-url");
          var kodePromo = $(this).attr("data-kodepromo");
          //alert(url);

          $.post(url,{},
          function(result){
            alert(result);
            $("#"+kodePromo).css('display','none');
            //location.reload();
          });
          //alert($(this).attr('data-kodepromo'));
        }
      },
      {
        class: 'btn btn-default',
        icon: 'glyphicon glyphicon-remove'
      }
    ]
    });
    $('.confirmationMenu').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    container: 'body',
    title:"Are you sure want to delete this Menu ? ",
    popout:true,
    buttons: [
      {
        class: 'btn btn-primary',
        icon: 'glyphicon glyphicon-ok',
        onClick: function() {

        	var url = $(this).attr("data-url");
          var kodeRestoran = $(this).attr('data-koderestoran');
          var kodeMenu = $(this).attr('data-kodemenu');
          //alert(url);

          $.post(url,{},
        	function(result){
        		alert(result);
            $("#"+kodeMenu).css('display','none');
            //location.reload();
        	});
          //alert($(this).attr('data-kodemenu')+" | "+$(this).attr('data-koderestoran'));

        }
      },
      {
        class: 'btn btn-default',
        icon: 'glyphicon glyphicon-remove'
      }
    ]
    });

    $(".jenisMenu").on("click",function()
    {
      $jenisMenu = $(this).val();
      if($jenisMenu == "Promo")
      {
        $(".formInsertPromo").css("display","inherit");
        $(".formInsertMenu").css("display","none");
      }
      else
      {
        $(".formInsertPromo").css("display","none");
        $(".formInsertMenu").css("display","inherit");

      }
    });

  </script>
</body>
</html>
