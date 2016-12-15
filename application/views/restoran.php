<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
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
              <?php
              if($resto->URL_FOTO_RESTORAN == ''){
                $url = 'default.jpg';
              }else $url = $resto->URL_FOTO_RESTORAN;
              $url_full = base_url('/vendors/images/restoran/' . $url);
              ?>
              <img class="media-object displayPicture img-circle  letakMediaRestoran" src="<?php echo $url_full?>" alt="Generic placeholder image">
            </div>
              <h1><span> <?php echo $resto->NAMA_RESTORAN;?> </span>  </h1>
                  <h2 style="margin-top:-30px;color:#fff">
                    <?php
                    $temp_rating = $rating;
                    for($i=0;$i<5;$i++){
                      if($temp_rating > 0){
                        echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                      }else echo '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>';
                      $temp_rating--;
                    }
                    ?>
                  </h2>
              </h1>
              <p id="alamatRestoran" data-alamat = "<?php echo $resto->ALAMAT_RESTORAN; ?>"><span class="glyphicon glyphicon-road" aria-hidden="true"> </span><?php echo ' '.$resto->ALAMAT_RESTORAN ;?></p>
              <p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <?php echo  ' '.$resto->NO_TELEPON_RESTORAN ;?></p>
              <p><span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo  ' '.$resto->HARI_BUKA_RESTORAN.','.$resto->JAM_BUKA_RESTORAN ;?></p>
              <p><span class="glyphicon glyphicon-flag" aria-hidden="true"></span><?php echo  ' '. $report ;?></p>
              <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><a href="#" style="color:lightblue" data-toggle="modal" data-target="#modalMap">  Lihat Lokasi </a></p>
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
          <a class="navbar-brand" href="<?php echo site_url('fatncurious');?>">
            <img class="img-responsive" src="<?php echo base_url('vendors/images/logo-putih-.png'); ?>" alt="logo">
          </a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="scroll"><a href="<?php echo site_url('fatncurious') ?>">Home</a></li>
            <li class="scroll">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              FilterBy <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('/index.php/fatncurious/filterByPromo');?>" style="padding-top:10px;padding-bottom:10px;">Biggest Promo</a></li>
              <li><a href="<?php echo base_url('/index.php/fatncurious/filterByRestoran');?>" style="padding-top:10px;padding-bottom:10px;">Restaurant Names</a></li>
              <li><a href="<?php echo base_url('/index.php/fatncurious/filterByMenu');?>" style="padding-top:10px;padding-bottom:10px;">Menu</a></li>
              <li><a href="<?php echo base_url('/index.php/fatncurious/filterByKartu');?>" style="padding-top:10px;padding-bottom:10px;">Credit Cards</a></li>
              </ul>
          </li>
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
            <a class="del_notif" href="<?= base_url() . 'index.php/fatncurious/sortByMenuRestoran/' . $n->URL?>"  style="padding:0px;" data-kode="<?= $n->KODE_NOTIFIKASI?>" data-url="<?= base_url() . 'index.php/fatncurious/delete_notif/' . $n->KODE_NOTIFIKASI?>">
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
            //print_r($fotoUser);
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

    <div class = "container navbarSpace" style="background-color:#fafafa">
        <div>
          <?php
          $kode = $resto->KODE_RESTORAN;
            if($kodeuser != ''){
              ?>
    			<center>
            <?php
              if($userRating == 0){
                echo "<h4> Give Rating </h4>";
                echo '<h2 class="rating" >';?>
                          <span class="glyphicon <?php echo $glyphicon1;?>" data-val="1" data-val2=<?php echo $kodeuser?> data-val3=<?php echo $resto->KODE_RESTORAN?> data-val4="<?php echo $userRating?>" data-toggle="modal" data-target="#modalRating" aria-hidden="true"></span>
                          <span class="glyphicon <?php echo $glyphicon2;?>" data-val="2" data-val2=<?php echo $kodeuser?> data-val3=<?php echo $resto->KODE_RESTORAN?> data-val4="<?php echo $userRating?>" data-toggle="modal" data-target="#modalRating" aria-hidden="true"></span>
                          <span class="glyphicon <?php echo $glyphicon3;?>" data-val="3" data-val2=<?php echo $kodeuser?> data-val3=<?php echo $resto->KODE_RESTORAN?> data-val4="<?php echo $userRating?>" data-toggle="modal" data-target="#modalRating" aria-hidden="true"></span>
                          <span class="glyphicon <?php echo $glyphicon4;?>" data-val="4" data-val2=<?php echo $kodeuser?> data-val3=<?php echo $resto->KODE_RESTORAN?> data-val4="<?php echo $userRating?>" data-toggle="modal" data-target="#modalRating" aria-hidden="true"></span>
                          <span class="glyphicon <?php echo $glyphicon5;?>" data-val="5" data-val2=<?php echo $kodeuser?> data-val3=<?php echo $resto->KODE_RESTORAN?> data-val4="<?php echo $userRating?>" data-toggle="modal" data-target="#modalRating" aria-hidden="true"></span>
                </h2><?php
              }else{
            ?>
              <center>
                <h2>
                  <div class="row">
                    <?php
                      $counter = 0;
                      for($i = 0; $i < 5; $i++){
                        if($counter < $userRating){
                          echo '<span class="glyphicon glyphicon-star"></span>';
                        }
                        else{
                          echo '<span class="glyphicon glyphicon-star-empty"></span>';
                        }
                        $counter++;
                      }
                     ?>
                  </div>
                  <div class="row">
                    <p id="ratingJudul"><?php echo $userRatingJudul?></p>
                  </div>
                  <div class= "row">
                    <h3><p id="ratingDeskripsi"><?php echo $userRatingDeskripsi?></p></h3>
                  </div>
                </h2>
                <?php
                $arr = ['class'=>'btn btn-primary','name'=>'btnSubmit','value'=>'Edit Review'];
                echo '<a href="#" data-toggle="modal" data-target="#modalRating">' . form_submit($arr) . '</a>';
                ?>
              </center>
              <?php } ?>


              <?php
          }?>
    			</center>
              <h2>Sorted By :</h2>
              <ul class="nav nav-tabs">
                  <li role="presentation" class="<?php echo $active1.' ';?> toogleNavBar"><a href="<?php echo site_url('/fatncurious/sortByPromoRestoran/'.$resto->KODE_RESTORAN.'') ?>">Promo</a></li>
                  <li role="presentation" class="<?php echo $active2.' ';?> toogleNavBar"><a href="<?php echo site_url('/fatncurious/sortByKreditRestoran/'.$resto->KODE_RESTORAN.'') ?>">Kartu Kredit</a></li>
                  <li role="presentation" class="<?php echo $active3.' ';?> toogleNavBar"><a href="<?php echo site_url('/fatncurious/sortByMenuRestoran/'.$resto->KODE_RESTORAN.'') ?>">Jenis Menu</a></li>
                  <li role="presentation" style="float:right" class="toogleNavBar"><a href="#" data-toggle="modal" data-target="#modalReview">Lihat Review Restoran</a></li>
              </ul>
        </div>

        <!-- Modal -->
        <div id="modalReview" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title">Review Restoran <?php echo $resto->NAMA_RESTORAN; ?></h4></center>
                </div>
                <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;background-image: url('<?php echo base_url('/vendors/images/Background/chocolate food design candy powder paint brushes black background 1920x1200 wallpaper_www.wall321.com_13.jpg');?>'); background-size: cover;filter:grayscale(.7);color:#fff;">
                  <?php if(isset($review_restoran)){foreach($review_restoran as $rr){ ?>
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
                      <h4 class="media-heading" style="color:white;"><?php echo $rr->NAMA ?></h4>
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
                      <strong><?php echo $rr->JUDUL ?> </strong><br/>
                      <?php echo $rr->DESKRIPSI ?>
                    </div>
                  </div>
                  <hr>
                  <?php }}else echo "Tidak ada review." ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="modalUpload" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title">Rating Restoran <?php echo $resto->NAMA_RESTORAN; ?></h4></center>
              </div>
              <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;">
                <center>
                  <div class="media">
                    <div class="media-body">
                      <?php echo form_open_multipart('fatncurious/uploadFoto').form_upload('foto'); ?>
                    </div>
                  </div>
              </center>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                  <?php
                  //<button type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                  $arr = ['name'=>'hidKodeRestoran','id'=>'hidKodeRestoran','value'=>'','type'=>'hidden'];
                  echo form_input($arr);
                  $arr2 = ['name'=>'hidKodeMenu','id'=>'hidKodeMenu','value'=>'','type'=>'hidden'];
                  echo form_input($arr2);
                  $arr3 = ['class'=>'btn btn-primary','name'=>'btnSubmit','value'=>'Submit'];
                  echo form_submit($arr3) . form_close();
                  ?>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
        <?php
			if(isset($promo)){
				foreach($promo as $p){
					echo "<div class='media'>";
						echo "<div class='media-left'>";
						echo "<a href='#'>";
		?>
							<img class="media-object img-rounded img-responsive fotoPromo"  src="<?php echo base_url('/vendors/images/promo/'.$p->FOTO_PROMO);?>" alt="...">
		<?php
						echo "</a>";
						echo "</div>";
					echo "</a>";
				}
			}
		?>

		<?php
		$adaMenu=false;
    $temp_jenis_menu = '';
			if(isset($menu)){
        $ctrRow = 0;

        $ctrReview=0;
				foreach($menu as $m){
          if($temp_jenis_menu != $m->KODE_JENIS_MENU){
            echo "<hr>";
            echo "<h4>" . $jenis_menu[$m->KODE_JENIS_MENU] ."</h4>";
            $temp_jenis_menu = $m->KODE_JENIS_MENU;
          }
          $adaMenu=true;
          echo "<div class='media' style='margin-bottom:30px;'>";
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
            if($kodeuser != '')
            echo "<h4 class='media-heading'>".$m->NAMA_MENU."<a href='#' data-toggle='modal' data-target='#modalUpload' class='btn btn-primary' style='float:right;' data-menu='".$m->NAMA_MENU."' data-restoran = '".$resto->NAMA_RESTORAN."' data-kodemenu = '".$m->KODE_MENU."' data-koderestoran = '".$resto->KODE_RESTORAN."'>Upload Foto</a></h4>";
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
		?>

    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
		<?php
		//===========Kredit=========
			if(isset($kartu)){
				echo "<h4>Kartu Kredit</h4>";
				foreach($kartu as $k){
					echo "<div class='media'>";
						echo "<div class='media-left'>";
            if($k->URL_FOTO_KARTU_KREDIT == ''){
              $url = 'default.jpg';
            }else $url = $k->URL_FOTO_KARTU_KREDIT;
            $url_full = base_url('/vendors/images/kredit/' . $url);
			?>
						<img class="media-object displayPicture displayPictureMenu img-rounded"  src="<?php echo $url_full ;?>" alt="...">
			<?php
						echo "</div>";
					echo "<div class='media-body'>";
						echo "<h4 class='media-heading'>".$k->KARTU."</h4>";
						echo "Nama Promo : ".$k->NAMA_PROMO."<br/>";
            echo "Deskripsi : ".$k->DESKRIPSI_PROMO."<br/>";
						echo "Persentase : ".$k->PERSENTASE_PROMO."<br/>";
            echo "Masa Berlaku : ".$k->MASABERLAKU_PROMO."<br/>";
					echo "</div>";
					echo "</div>";
				}
			}
			//===========Kredit=========
		?>
    <div id="modalReport" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title">Report Review</h4></center>
              </div>
              <div class="modal-body" style="background-image: url('<?php echo base_url('/vendors/images/Background/thanksgiving_09_213.jpg');?>'); background-size: cover;filter:grayscale(.7);color:#fff;">
                <center>
                  <div class="media">
                    <div class="media-body">
                      <?php echo 'Deskripsi Report : ' . '<br>';
                      $arr = ['id'=>'txtDeskripsi','class'=>'form-control','style'=>'color:white;'];
                      echo form_textarea($arr);
                      ?>
                    </div>
                  </div>
              </center>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <?php
                  //<button type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                  $arr = ['name'=>'hidKodeRestoran','id'=>'kodeRestoranReport','value'=>'','type'=>'hidden'];
                  echo form_input($arr);
                  $arr3 = ['name'=>'hidKodeReview','id'=>'kodeReviewReport','value'=>'','type'=>'hidden'];
                  echo form_input($arr3);
                  $arr3 = ['id'=>'urlReview','value'=>site_url('fatncurious/reportComment/'),"type"=>'hidden'];
                  echo form_input($arr3);
                  $arr3 = ['class'=>'btn btn-primary','id'=>'reportReview','name'=>'btnSubmit','value'=>'Submit'];
                  echo form_submit($arr3);
                  ?>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
        <!--Modal -->
        <div id="modalMap" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title">Lokasi Restoran <?php echo $resto->NAMA_RESTORAN; ?></h4></center>
                </div>
                <div class="modal-body">
                <!--<div id="floating-panel" style="position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        width: 350px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;">
                    <input id="address" type="text" value="SURABAYA" style="width: 225px;">
                    <input id="submit" type="button" value="Reverse Geocode">
                  </div>-->
                  <center><div id="map" style="height: 500px;width:500px;background-color:red;"></div></center>
                </div>
                <div class="modal-footer">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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

  <!--Modal -->
  <div id="modalRating" class="modal fade">
    <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <center><h4 class="modal-title">Rating Restoran <?php echo $resto->NAMA_RESTORAN; ?></h4></center>
        </div>
        <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;background-image: url(<?php echo base_url('/vendors/images/Background/Wallpapers-fruit-flowers-black-background-hd-desktop-wallpapers.jpg');?>) ;background-size: cover;filter:grayscale(.7);color:#fff;"">
          <h2 style="margin-top:0px;">
            <center>
              <?php
                $counter = 0;
                for($i = 0; $i < 5; $i++){
                  if($counter < $userRating){
                    echo '<span style="color:white;" class="glyphicon glyphicon-star bintang" data-val='. ($i + 1) .'></span>';
                  }
                  else{
                    echo '<span style="color:white;" class="glyphicon glyphicon-star-empty bintang" data-val='. ($i + 1) .'></span>';
                  }
                  $counter++;
                }
               ?>
              </center>
           </h2>
            <?php echo form_open("fatncurious/rate_restoran/");?>
              <div class="form-group">
              <label for="recipient-name" class="form-control-label">Title:</label>
              <input type="text" class="form-control" id="recipient-name" name="txtTitle" style="color:white;">
              </div>
              <div class="form-group">
              <label for="message-text" class="form-control-label">Comment:</label>
              <textarea class="form-control" id="message-text" name="txtComment" style="color:white;"></textarea>
              </div>
              <?php
                $arr = ['name'=>'valueBintang','id'=>"hidBintang",'value'=>"",'type'=>'hidden'];
                echo form_input($arr);
                $arr2 = ['name'=>'kodeRestoran','value'=>$kode,'type'=>'hidden'];
                echo form_input($arr2);
              ?>
              <?php
                $arr = ['class'=>'btn btn-primary','name'=>'btnSubmit','value'=>'Submit'];
                echo form_submit($arr);
                echo form_close();
              ?>
          </div>
          <div class="modal-footer">
          </div>
      </div>
      <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
      </div>

    <!--<script>
    function initMap() {
    /*var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: {lat: -34.397, lng: 150.644}
    });

    var geocoder = new google.maps.Geocoder();

    document.getElementById('submit').addEventListener('click', function() {
      geocodeAddress(geocoder, map);
    });*/

    var resultMap = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: {lat: -7.2575, lng: 112.7521}
    });

    var geocoder = new google.maps.Geocoder();
    var address = $("#alamatRestoran").attr("data-alamat");
    geocoder.geocode({"address": address}, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        resultMap.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
          map: resultMap,
          position: results[0].geometry.location
        });
        alert("GeoCode Successful");
        console.log(results[0].geometry.location);
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  }

  function geocodeAddress(geocoder, resultsMap) {
    //var address = document.getElementById('address').value;
    var address = $("#alamatRestoran").attr("data-alamat");
    geocoder.geocode({'address': address}, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        resultsMap.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
          map: resultsMap,
          position: results[0].geometry.location
        });
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  }

</script>-->
  <script>
  function initMap() {
    var resultMaps = new google.maps.Map(document.getElementById("map"), {
      zoom: 8
    });
    var origin2 = $('#alamatRestoran').attr('data-alamat');
    var geocoder = new google.maps.Geocoder;
    geocoder.geocode(
      {
        address : origin2,
        region : 'INDONESIA'
      },function(response,status)
      {
        if(status !== google.maps.GeocoderStatus.OK)
        {
          //alert("Error was : "+status);
        }
        else
        {
          console.log(response[0].geometry.location.lat());
          console.log(response[0].geometry.location.lng());
          var marker = new google.maps.Marker(
            {
              map : resultMaps,
              position : response[0].geometry.location
            });
          resultMaps.setCenter(marker.position);
          console.log(marker.position.lat());
          console.log(marker.position.lng());
          console.log(resultMaps.center.lat());
          console.log(resultMaps.center.lng());
          //alert("masuk");
          console.log(resultMaps.getCenter().lat());
          console.log(resultMaps.getCenter().lng());
        }
      });

  }
  </script>

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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqpR9uFr9Cdp4XDNAsrEojh3GTWNmCte8&callback=initMap"
      async defer></script>
</body>
</html>
