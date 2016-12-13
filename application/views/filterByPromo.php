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
  <link href="<?php echo base_url('/vendors/css/bootstrap-combobox.css'); ?>" rel="stylesheet">

  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="<?php echo base_url('/vendors/images/favicon.ico');?>">

    <style>
        body
        {
			background-image: url('<?php echo base_url('/vendors/images/Background/337094-zero.jpg');?>');
            background-color:red;
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>

</head><!--/head-->

<body>
<div id="asd">FilterBy</div>
  <header id="home">
    <div class="main-nav navbar-fixed-top">
      <div class="container berubahLain">
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
            <?php
            if($fotoUser[0]->URL_FOTO == ''){
              $url = 'default.jpg';
            }else $url = $fotoUser[0]->URL_FOTO;
            $url_full = base_url('/vendors/images/profilepicture/' . $url);
              ?>
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
			?>
          </ul>
        </div>
      </div>
    </div>
  </header><!--/#home-->
    <br>
    <div class='container navbarSpace'>

    <?php
        echo form_open('fatncurious/searchFilterByPromo');
          if(isset($kataSearch)){
              echo form_input('txtSearchKredit',$kataSearch)."<br/>";
          }
          else{
              echo form_input('txtSearchKredit')."<br/>";
          }
          if(isset($namaResto)){
              echo form_checkbox('ckNamaRestoran'," namaRestoran",true)."Nama Restoran"."<br/>";
          }
          else{
            echo form_checkbox('ckNamaRestoran'," namaRestoran",false)."Nama Restoran"."<br/>";
          }
          if(isset($alamatResto)){
            echo form_checkbox('ckAlamatRestoran'," alamatRestoran",true)."Alamat Restoran"."<br/>";
          }
          else{
            echo form_checkbox('ckAlamatRestoran'," alamatRestoran",false)."Alamat Restoran"."<br/>";
          }
          if(isset($namaPromo)){
            echo form_checkbox('ckNamaPromo'," namaPromo",true)."Nama Promo"."<br/>";
          }
          else{
            echo form_checkbox('ckNamaPromo'," namaPromo",false)."Nama Promo"."<br/>";
          }
          if(isset($deskripsiPromo)){
            echo form_checkbox('ckDeskripsiPromo'," deskripsiPromo",true)."Deskripsi Promo"."<br/>";
          }
          else{
            echo form_checkbox('ckDeskripsiPromo'," deskripsiPromo",false)."Deskripsi Promo"."<br/>";
          }
          if(isset($persentasePromo)){
            echo "Persentase Promo Minimal : "."<input type='number' name='txtPersentase' min=0 max=100 value=".$persentasePromo.">"."<br/>";
          }
          else{
            echo "Persentase Promo Minimal : "."<input type='number' name='txtPersentase' value=0 min=0 max=100>"."<br/>";
          }
          echo form_submit('btnSearch','Search');
        echo form_close();
    ?>


  <?php
		foreach($promo as $r){
			echo "<div class='media warnaFilterByGanjil img-rounded'>";
				echo "<div class='media-left'>";
					echo '<a href = '.site_url('/fatncurious/profilRestoran/'.$r->KODE_RESTORAN).'>';
          if($r->URL_FOTO_RESTORAN == ''){
            $url = 'default.jpg';
          }else $url = $r->URL_FOTO_RESTORAN;
          $url_full = base_url('/vendors/images/restoran/' . $url);
	?>
						<img class='media-object img-circle gambarRestoran' src='<?php echo $url_full;?>' alt='...'>
	<?php
					echo "</a>";
				echo "</div>";
				echo "<div class='media-body jarakMedia'>";
					echo "<h3 class='media-heading jarakMedia'>".$r->RESTORAN.', '.$r->ALAMAT."</h3>";
          echo "<h5 class='jarakMedia'>"."Kartu Kredit : ".$r->KARTU."</h5>";
          echo "<h5 class='jarakMedia'>"."Nama Promo : ".$r->NAMA_PROMO."</h5>";
          echo "<h5 class='jarakMedia'>"."Deskripsi Promo : ".$r->DESKRIPSI_PROMO."</h5>";
          echo "<h5 class='jarakMedia'>"."Jumlah Diskon : ".$r->PERSENTASE_PROMO."</h5>";
					echo "<ul class='media-list '>";
						echo "<li class='media'>";
							echo "<div class='media-right'>";
								echo "<a href='#'>";
	?>
									<img class='media-object img-rounded gambarPromo' src='<?php echo base_url("/vendors/images/promo/".$r->FOTO_PROMO);?>' alt='...'>
	<?php
								echo "</a>";
							echo "</div>";
						echo "</li>";
					echo "</ul>";
				echo "</div>";
			echo "</div>";
		}
		echo $links;
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
  <script type="text/javascript" src="<?php echo base_url('/vendors/js/bootstrap-combobox.js'); ?>"></script>
  <script>
    $('.combobox').combobox();
  </script>
</body>
</html>
