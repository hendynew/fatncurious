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
              <img class="media-object displayPicture img-circle  letakMediaRestoran" src="<?php echo base_url('/vendors/images/Background/337094-zero.jpg');?>" alt="Generic placeholder image">
            </div>
              <h1><span> <?php echo $resto->NAMA_RESTORAN ;?> </span>  </h1>
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
              <p><span class="glyphicon glyphicon-road" aria-hidden="true"> </span><?php echo ' '.$resto->ALAMAT_RESTORAN ;?></p>
              <p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <?php echo  ' '.$resto->NO_TELEPON_RESTORAN ;?></p>
              <p><span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo  ' '.$resto->HARI_BUKA_RESTORAN.','.$resto->JAM_BUKA_RESTORAN ;?></p>
              <p><span class="glyphicon glyphicon-flag" aria-hidden="true"></span><?php echo  ' '. $report ;?></p>
              <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><a href="#" style="color:lightblue" data-toggle="modal" data-target="#myModalPassword">  Lihat Lokasi</a></p>
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
            <img class="img-responsive" src="<?php echo base_url('vendors/images/logo.png'); ?>" alt="logo">
          </a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="scroll"><a href="<?php echo site_url('fatncurious') ?>">Home</a></li>
            <li class="scroll"><a href="<?php echo site_url('fatncurious/aboutUs') ?>">About Us</a></li>
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
            <li class="scroll"><a href="<?php echo site_url('fatncurious/contactUs') ?>">Contact Us</a></li>
      <?php
        if(isset($kodeUser)){
      ?>
        <li class="scroll">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?php echo base_url('vendors/images/team/2.jpg'); ?>" class="img-circle displayPictureNavBar"> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('fatncurious/profilUser');?>" style="padding-top:10px;padding-bottom:10px;">Profile</a></li>
            <li><a href="<?php echo site_url('fatncurious/notification');?>" style="padding-top:10px;padding-bottom:10px;">Notification <span class="glyphicon glyphicon-envelope" aria-hidden="true" style="margin-left:10px;"></span></a></li>
            <li><a href="<?php echo site_url('fatncurious/LogOut');?>" style="padding-top:10px;padding-bottom:10px;">Logout</a></li>
            </ul>
        </li>
      <?php
        }
      ?>
          </ul>
        </div>
      </div>
    </div>
  </header><!--/#home-->

    <div class = "container navbarSpace" style="background-color:#fafafa">
        <div>
          <?php
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
                    <?php echo $userRatingJudul?>
                  </div>
                  <div class= "row">
                    <h3><?php echo $userRatingDeskripsi?></h3>
                  </div>
                </h2>
                <?php
                $arr = ['class'=>'btn btn-primary','name'=>'btnSubmit','value'=>'Edit Review'];
                echo '<a href="#" data-toggle="modal" data-target="#modalRating">' . form_submit($arr) . '</a>';
                ?>
              </center>
              <?php } ?>
              <!--Modal -->
              <div id="modalRating" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Rating Restoran <?php echo $resto->NAMA_RESTORAN; ?></h4>
                      </div>
                      <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;">
                        <h2 style="margin-top:0px;">
                          <center>
                            <?php
                              $counter = 0;
                              for($i = 0; $i < 5; $i++){
                                if($counter < $userRating){
                                  echo '<span class="glyphicon glyphicon-star bintang" data-val='. ($i + 1) .'></span>';
                                }
                                else{
                                  echo '<span class="glyphicon glyphicon-star-empty bintang" data-val='. ($i + 1) .'></span>';
                                }
                                $counter++;
                              }
                             ?>
                          </center>
                        </h2>
                        <?php echo form_open("fatncurious/rate_restoran/");?>
                        <div class="form-group">
                          <label for="recipient-name" class="form-control-label">Title:</label>
                          <input type="text" class="form-control" id="recipient-name"name="txtTitle">
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="form-control-label">Comment:</label>
                          <textarea class="form-control" id="message-text" name="txtComment"></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                          <?php

                            $arr = ['name'=>'valueBintang','id'=>"hidBintang",'value'=>"",'type'=>'hidden'];
                            echo form_input($arr);
                            $kode = $resto->KODE_RESTORAN;
                            $arr2 = ['name'=>'kodeRestoran','value'=>$kode,'type'=>'hidden'];
                            echo form_input($arr2);
                          ?>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <?php
                            $arr = ['class'=>'btn btn-primary','name'=>'btnSubmit','value'=>'Submit'];
                            echo form_submit($arr);
                            echo form_close();
                          ?>
                      </div>
                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
          </div>
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
                    <h4 class="modal-title">Review Restoran <?php echo $resto->NAMA_RESTORAN; ?></h4>
                </div>
                <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;">
                  <?php foreach($review_restoran as $rr){ ?>
                  <div class="media">
                    <a class="media-left" href="#">
                      <img class="media-object" src="..." alt="Generic placeholder image">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading"><?php echo $rr->NAMA ?></h4>
                      <h4>
                        <?php
                          $counter = 0;
                          for($i = 0; $i < 5; $i++){
                            if($counter < $rr->RATING){
                              echo '<span class="glyphicon glyphicon-star"></span>';
                            }
                            else{
                              echo '<span class="glyphicon glyphicon-star-empty"></span>';
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
    <div id="modalUpload" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Rating Restoran <?php echo $resto->NAMA_RESTORAN; ?></h4>
              </div>
              <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;">
                <center>
                  <div class="media">
                    <a class="media" href="#">
                      <img class="media-object" src="..." alt="Generic placeholder image">
                    </a>
                    <div class="media-body">
                      <?php echo form_open_multipart('fatncurious/uploadFoto').form_upload('uploadFoto').form_close(); ?>
                    </div>
                  </div>
              </center>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
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
		//===========MAKANAN=========
			if(isset($menu)){
        $ctrRow = 0;
				echo "<h4>MAKANAN</h4>";
				foreach($menu as $m){

					if($m->KODE_JENIS_MENU == 'JM001'){
						$adaMenu=true;
						echo "<div class='media' style='margin-bottom:30px;'>";
							echo "<div class='media-left'>";
			?>
							<img class="media-object displayPicture displayPictureMenu img-rounded"  src="<?php echo base_url('/vendors/images/menu/nasi goreng/1.jpg');?>" alt="..." row-id="<?php echo $ctrRow; ?>">
			<?php
							echo "</div>";
						  echo "<div class='media-body'>";
							echo "<h4 class='media-heading'>".$m->NAMA_MENU."<a href='#' data-toggle='modal' data-target='#modalUpload' class='btn btn-primary' style='float:right;' data-menu='".$m->NAMA_MENU."' data-restoran = '".$resto->NAMA_RESTORAN."'>Upload Foto</a></h4>";
							echo $m->DESKRIPSI_MENU;
							echo "<div class='media m-t-2'>";
              if(isset($review[$m->KODE_MENU])){
                foreach($review[$m->KODE_MENU] as $r){
                  echo "<div class='media-left' href='#'>";?>
                    <img class="media-object displayPictureComment img-circle" src="<?php echo base_url('/vendors/images/team/1.jpg');?>" alt="Generic placeholder image">
      <?php
                  echo "</div>";
                  echo "<div class='media-body'>";
                  echo "<h4 class='media-heading'>" . $r->NAMA ."</h4>";
                  echo $r->DESKRIPSI_REVIEW;
                  echo '<br/>';
                  echo '<span class="glyphicon glyphicon-thumbs-up likeReview"></span><span class="glyphicon glyphicon-thumbs-down dislikeReview" style="margin-left:20px;"></span><span class="glyphicon glyphicon-ok-circle reviewed" style="margin-left:20px;"></span>';
                  echo "</div>";
                  echo "<br/>";
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
            }
            //gallery
    				echo "<div class='imageGallery R".$ctrRow."'>";
    					echo "<div class='links'>";
    						echo "<div class='container-fluid'>";
    							echo "<div class='row'>";
                  $ctr=1;
                  $tidakAdaFoto=true;
                  if(isset($fotoMenu)){
                    foreach($fotoMenu as $f){
                      if($f->KODE_MENU == $m->KODE_MENU){
                        echo "<div class='col-sm-3 gambarImageGallery'>";
      									?>
      										<a href="<?php echo base_url('/vendors/images/menu/'.$m->KODE_RESTORAN.'/'.$m->KODE_MENU.'/'.$ctr.'.jpg');?>">
      											<img src="<?php echo base_url('/vendors/images/menu/'.$m->KODE_RESTORAN.'/'.$m->KODE_MENU.'/'.$ctr.'.jpg');?>" class="img-responsive">
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
				if($adaMenu==false){
					echo "<h5>Tidak Ada Menu Makanan</h5>";
				}
			}

			//===========MAKANAN=========
		?>

		<?php
		$adaMenu=false;
		//===========MINUMAN=========
			if(isset($menu)){
        echo "<hr>";
				echo "<h4>MINUMAN</h4>";
        foreach($menu as $m){
					if($m->KODE_JENIS_MENU == 'JM002'){
						$adaMenu=true;
						echo "<div class='media' style='margin-bottom:30px;'>";
							echo "<div class='media-left'>";
			?>
							<img class="media-object displayPicture displayPictureMenu img-rounded"  src="<?php echo base_url('/vendors/images/menu/nasi goreng/1.jpg');?>" alt="..." row-id="<?php echo $ctrRow; ?>">
			<?php
							echo "</div>";
						  echo "<div class='media-body'>";
							echo "<h4 class='media-heading'>".$m->NAMA_MENU."<a href='#' data-toggle='modal' data-target='#modalUpload' class='btn btn-primary' style='float:right;' data-menu='".$m->NAMA_MENU."' data-restoran = '".$resto->NAMA_RESTORAN."'>Upload Foto</a></h4>";
							echo $m->DESKRIPSI_MENU;
							echo "<div class='media m-t-2'>";
              if(isset($review[$m->KODE_MENU])){
                foreach($review[$m->KODE_MENU] as $r){
                  echo "<div class='media-left' href='#'>";?>
                    <img class="media-object displayPictureComment img-circle" src="<?php echo base_url('/vendors/images/team/1.jpg');?>" alt="Generic placeholder image">
      <?php
                  echo "</div>";
                  echo "<div class='media-body'>";
                  echo "<h4 class='media-heading'>" . $r->NAMA ."</h4>";
                  echo $r->DESKRIPSI_REVIEW;
                  echo '<br/>';
                  echo '<span class="glyphicon glyphicon-thumbs-up likeReview"></span><span class="glyphicon glyphicon-thumbs-down dislikeReview" style="margin-left:20px;"></span><span class="glyphicon glyphicon-ok-circle reviewed" style="margin-left:20px;"></span>';
                  echo "</div>";
                  echo "<br/>";
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
            }

            //gallery
            echo "<div class='imageGallery R".$ctrRow."'>";
              echo "<div class='links'>";
                echo "<div class='container-fluid'>";
                  echo "<div class='row'>";
                  $ctr=1;
                  $tidakAdaFoto=true;
                    foreach($fotoMenu as $f){
                      if($f->KODE_MENU == $m->KODE_MENU){
                        echo "<div class='col-sm-3 gambarImageGallery'>";
                        ?>
                          <a href="<?php echo base_url('/vendors/images/menu/'.$m->KODE_RESTORAN.'/'.$m->KODE_MENU.'/'.$ctr.'.jpg');?>">
                            <img src="<?php echo base_url('/vendors/images/menu/'.$m->KODE_RESTORAN.'/'.$m->KODE_MENU.'/'.$ctr.'.jpg');?>" class="img-responsive">
                          </a>
                        <?php
                        echo "</div>";
                        $ctr++;
                        $tidakAdaFoto=false;
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
				if($adaMenu==false){
					echo "<h5>Tidak Ada Menu Minuman</h5>";
				}
			}
			//===========MINUMAN=========
		?>

		<?php
		$adaMenu=false;
		//===========SNACK=========
			if(isset($menu)){
        echo "<hr>";
				echo "<h4>SNACK</h4>";
				foreach($menu as $m){

					if($m->KODE_JENIS_MENU == 'JM003'){
						$adaMenu=true;
						echo "<div class='media' style='margin-bottom:30px;'>";
							echo "<div class='media-left'>";
			?>
							<img class="media-object displayPicture displayPictureMenu img-rounded"  src="<?php echo base_url('/vendors/images/menu/nasi goreng/1.jpg');?>" alt="..." row-id="<?php echo $ctrRow; ?>">
			<?php
							echo "</div>";
						  echo "<div class='media-body'>";
							echo "<h4 class='media-heading'>".$m->NAMA_MENU."<a href='#' data-toggle='modal' data-target='#modalUpload' class='btn btn-primary' style='float:right;' data-menu='".$m->NAMA_MENU."' data-restoran = '".$resto->NAMA_RESTORAN."'>Upload Foto</a></h4>";
							echo $m->DESKRIPSI_MENU;
							echo "<div class='media m-t-2'>";
              if(isset($review[$m->KODE_MENU])){
                foreach($review[$m->KODE_MENU] as $r){
                  echo "<div class='media-left' href='#'>";?>
                    <img class="media-object displayPictureComment img-circle" src="<?php echo base_url('/vendors/images/team/1.jpg');?>" alt="Generic placeholder image">
      <?php
                  echo "</div>";
                  echo "<div class='media-body'>";
                  echo "<h4 class='media-heading'>" . $r->NAMA ."</h4>";
                  echo $r->DESKRIPSI_REVIEW;
                  echo '<br/>';
                  echo '<span class="glyphicon glyphicon-thumbs-up likeReview"></span><span class="glyphicon glyphicon-thumbs-down dislikeReview" style="margin-left:20px;"></span><span class="glyphicon glyphicon-ok-circle reviewed" style="margin-left:20px;"></span>';
                  echo "</div>";
                  echo "<br/>";
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
            }

            //gallery
            echo "<div class='imageGallery R".$ctrRow."'>";
              echo "<div class='links'>";
                echo "<div class='container-fluid'>";
                  echo "<div class='row'>";
                  $ctr=1;
                  $tidakAdaFoto=true;
                    foreach($fotoMenu as $f){
                      if($f->KODE_MENU == $m->KODE_MENU){
                        echo "<div class='col-sm-3 gambarImageGallery'>";
                        ?>
                          <a href="<?php echo base_url('/vendors/images/menu/'.$m->KODE_RESTORAN.'/'.$m->KODE_MENU.'/'.$ctr.'.jpg');?>">
                            <img src="<?php echo base_url('/vendors/images/menu/'.$m->KODE_RESTORAN.'/'.$m->KODE_MENU.'/'.$ctr.'.jpg');?>" class="img-responsive">
                          </a>
                        <?php
                        echo "</div>";
                        $ctr++;
                        $tidakAdaFoto=false;
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
				if($adaMenu==false){
					echo "<h5>Tidak Ada Menu Snack</h5>";
				}
			}
			//===========SNACK=========
		?>

    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
        <div class="menuGallery">
          <span class="glyphicon glyphicon-thumbs-up likeButton" aria-hidden="true">5</span>
          <span class="glyphicon glyphicon-thumbs-down dislikeButton" aria-hidden="true">5</span>
          <span class="glyphicon glyphicon-flag reportButton" aria-hidden="true">3</span>
          <span class="dropup">
          <span class="glyphicon glyphicon-share-alt shareButton" aria-hidden="true">
          </span>
        </span>
        </div>
        <
    </div>


		<?php
		$adaMenu=false;
		//===========Kredit=========
			if(isset($kartu)){
				echo "<h4>Kartu Kredit</h4>";
				foreach($kartu as $k){
					echo "<div class='media'>";
						echo "<div class='media-left'>";
			?>
						<img class="media-object displayPicture displayPictureMenu img-rounded"  src="<?php echo base_url('/vendors/images/menu/nasi goreng/1.jpg');?>" alt="...">
			<?php
						echo "</div>";
					echo "<div class='media-body'>";
						echo "<h4 class='media-heading'>".$k->KARTU."</h4>";
						echo "Deskripsi : ".$k->DESKRIPSI_PROMO."<br/>";
						echo "Persentase : ".$k->PERSENTASE_PROMO."<br/>";
						echo "<div class='media m-t-2'>";
							echo "<div class='media-left' href='#'>";
			?>
							<img class="media-object displayPictureComment img-circle" src="<?php echo base_url('/vendors/images/team/1.jpg');?>" alt="Generic placeholder image">
			<?php
							echo "</div>";
							echo "<div class='media-body'>";
								echo "<h4 class='media-heading'>Michelle Withney</h4>";
								echo "Promo Termurahh.....";
							echo "</div>";
						echo "</div>";
						echo "<br/>";
						echo "<div class='input-group customInputGroup img-rounded'>";
							echo "<input type='text' class='form-control' placeholder='Tuliskan Komen disini..'>";
							echo "<span class='input-group-btn'>";
								echo "<button class='btn btn-default img-rounded' type='button'>Go!</button>";
							echo "</span>";
						echo "</div>";
					echo "</div>";
					echo "</div>";
				}
			}
			//===========Kredit=========
		?>
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
