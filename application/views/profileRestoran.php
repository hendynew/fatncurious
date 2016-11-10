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
              <p><span class="glyphicon glyphicon-flag" aria-hidden="true"></span><?php echo  ' '.$resto->STATUS ;?></p>
              <p><span class="glyphicon glyphicon-cog" aria-hidden="true"></span><?php echo  ' '.$resto->DESKRIPSI_RESTORAN ;?></p>
              <p><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <a href="#" style="color:lightblue">Click To Edit Profile</a></p>
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
    <h2>Sorted By :</h2>
    <div class = "container navbarSpace" style="background-color:#fafafa">
        <div>
            <ul class="nav nav-tabs">
                <li role="presentation" class="<?php echo $active1.' ';?> toogleNavBar"><a href="">Recent Comment</a></li>
                <li role="presentation" class="<?php echo $active2.' ';?> toogleNavBar"><a href="<?php echo site_url('/fatncurious/sortByPromoProfilRestoran/'.$resto->KODE_RESTORAN.'') ?>">Promo</a></li>
                <li role="presentation" class="<?php echo $active3.' ';?> toogleNavBar"><a href="<?php echo site_url('/fatncurious/sortByMenuProfilRestoran/'.$resto->KODE_RESTORAN.'') ?>">Menu</a></li>
                <li role="presentation" class="<?php echo $active4.' ';?> toogleNavBar"><a href="#">Lihat Review Restoran</a></li>
                <li role="presentation" class="<?php echo $active5.' ';?> toogleNavBar"><a href="#">Report</a></li>
                 <li role="presentation" style="float:right" class="toogleNavBar"><a href="">Lihat Foto Terbaru</a></li>
            </ul>
        </div>
        <div class="media">
		<?php //sorted by Promo ?>
		<?php
		if(isset($promo)){
			foreach($promo as $p){
				echo "<div class='media-left'>";
		?>
				<img class="media-object displayPicture displayPictureMenu img-rounded" src="<?php echo base_url('/vendors/images/menu/nasi goreng/1.jpg');?>" alt="Generic placeholder image">
		<?php
				echo "</div>";
				echo "<div class='media-body'>";
					echo "<h4 class='media-heading'>".$p->NAMA_PROMO."</h4>";
					echo $p->DESKRIPSI_PROMO;
					echo "<div class='media m-t-2'>";
						echo "<div class='media-left' href='#'>";
		?>
						<img class="media-object displayPictureComment img-circle" src="<?php echo base_url('/vendors/images/team/1.jpg');?>" alt="Generic placeholder image">
		<?php
						echo "</div>";
					echo "<div class='media-body'>";
					echo "<h4 class='media-heading'>Michelle Withney</h4>";
					echo "Mantab bener ni menu.. wkwkkwk";
					echo "</div>";
				echo "</div>";
				echo "<br/>";
				echo "</div>";
				echo "<br>";
			}
		}
		?>
		<?php //sorted by Promo ?>

		<?php //sorted by Menu ?>
		<?php
		if(isset($menu)){
      $ctrRow = 0;
			foreach($menu as $p){
				echo "<div class='media-left'>";
		?>
				<img class="media-object displayPicture displayPictureMenu img-rounded" src="<?php echo base_url('/vendors/images/menu/nasi goreng/1.jpg');?>" alt="Generic placeholder image" row-id="<?php echo $ctrRow; ?>">
		<?php
				echo "</div>";
				echo "<div class='media-body'>";
					echo "<h4 class='media-heading'>".$p->NAMA_MENU."</h4>";
					echo $p->DESKRIPSI_MENU;
					echo "<div class='media m-t-2'>";
						echo "<div class='media-left' href='#'>";
		?>
						<img class="media-object displayPictureComment img-circle" src="<?php echo base_url('/vendors/images/team/1.jpg');?>" alt="Generic placeholder image">
		<?php
						echo "</div>";
					echo "<div class='media-body'>";
					echo "<h4 class='media-heading'>Michelle Withney</h4>";
					echo "Mantab bener ni menu.. wkwkkwk";
					echo "</div>";
				echo "</div>";
				echo "<br/>";
				echo "<div class='input-group customInputGroup img-rounded'>";
				echo "<input type='text' class='form-control' placeholder='Search for...'>";
				echo "<span class='input-group-btn'>";
					echo "<button class='btn btn-default img-rounded' type='button'>Go!</button>";
				echo "</span>";
				echo "</div>";
				echo "</div>.<br>";

				//gallery
				echo "<div class='imageGallery R".$ctrRow."'>";
					echo "<div id='links'>";
						echo "<div class='container-fluid'>";
							echo "<div class='row'>";
              $ctr=1;
								foreach($fotoMenu as $f){
                  if($f->KODE_MENU == $p->KODE_MENU){
                    echo "<div class='col-sm-3 gambarImageGallery'>";
  									?>
  										<a href="<?php echo base_url('/vendors/images/menu/'.$p->KODE_RESTORAN.'/'.$p->KODE_MENU.'/'.$ctr.'.jpg');?>">
  											<img src="<?php echo base_url('/vendors/images/menu/'.$p->KODE_RESTORAN.'/'.$p->KODE_MENU.'/'.$ctr.'.jpg');?>" class="img-responsive">
  										</a>
  									<?php
  									echo "</div>";
  									$ctr++;
                  }

								}
							echo "</div>";
						echo "</div>";
					echo "</div>";
				echo "</div>";

        $ctrRow++;
			}
		}

    //gallery ?>


		</div>
	</div>
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
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
