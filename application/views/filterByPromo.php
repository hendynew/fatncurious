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
    <br>
    <div class='container navbarSpace'>
      <div class="row">
        <h1>Inline Form</h1>
          <div class="form-group">
            <div class="combobox-container" style="display:none;">
			<input type="hidden" name="inline" value="">
				<div class="input-group">
					<input type="text" autocomplete="off" placeholder="Select a State" class="combobox form-control">
						<ul class="typeahead typeahead-long dropdown-menu" style="top: 34px; left: 0px;">
							<li data-value="Mandiri" class="active">
								<a href="#">
									<strong></strong>M
									<strong></strong>a
									<strong></strong>n
									<strong></strong>d
									<strong></strong>i
									<strong></strong>r
									<strong></strong>i
									<strong></strong>
								</a>
							</li>
							<li data-value="BII">
								<a href="#">
									<strong></strong>B
									<strong></strong>I
									<strong></strong>I
									<strong></strong>
								</a>
							</li>
							<li data-value="BNI">
								<a href="#">
									<strong></strong>B
									<strong></strong>N
									<strong></strong>I
									<strong></strong>
								</a>
							</li>
							<li data-value="Danamon">
								<a href="#">
									<strong></strong>D
									<strong></strong>a
									<strong></strong>n
									<strong></strong>a
									<strong></strong>m
									<strong></strong>o
									<strong></strong>n
									<strong></strong>
								</a>
							</li>
							<li data-value="BRI">
								<a href="#">
									<strong></strong>B
									<strong></strong>R
									<strong></strong>I
									<strong></strong>
								</a>
							</li>
							<li data-value="BCA">
								<a href="#">
									<strong></strong>B
									<strong></strong>C
									<strong></strong>A
									<strong></strong>
								</a>
							</li>
							<li data-value="Mega">
								<a href="#">
									<strong></strong>M
									<strong></strong>e
									<strong></strong>g
									<strong></strong>a
									<strong></strong>
								</a>
							</li>
							<li data-value="CIMB">
								<a href="#">
									<strong></strong>C
									<strong></strong>I
									<strong></strong>M
									<strong></strong>B
									<strong></strong>
								</a>
							</li>
							<li data-value="Sinarmas">
								<a href="#">
									<strong></strong>S
									<strong></strong>i
									<strong></strong>n
									<strong></strong>a
									<strong></strong>r
									<strong></strong>m
									<strong></strong>a
									<strong></strong>s
									<strong></strong>
								</a>
							</li>
							<li data-value="Bukopin">
								<a href="#">
									<strong></strong>B
									<strong></strong>u
									<strong></strong>k
									<strong></strong>o
									<strong></strong>p
									<strong></strong>i
									<strong></strong>n
									<strong></strong>
								</a>
							</li>
							</ul>
							<span class="input-group-addon dropdown-toggle" data-dropdown="dropdown">
								<span class="caret"></span>
							<span class="glyphicon glyphicon-remove"></span>
							</span>
						</div>
					</div>
				<select class="combobox form-control" style="display: none;">
				  <option value="" selected="selected">Select a State</option>
				  <option value="Mandiri">Mandiri</option>
				  <option value="BII">BII</option>
				  <option value="BCA">BCA</option>
				  <option value="BNI">BNI</option>
				  <option value="Danamon">Danamon</option>
				  <option value="BRI">BRI</option>
				  <option value="Mega">Mega</option>
				  <option value="Bersama">Bersama</option>
				  <option value="CIMB">CIMB</option>
				  <option value="Sinarmas">Sinarmas</option>
				  <option value="Bukopin">Bukopin</option>
            </select>
          </div>
      </div>


  <?php
		foreach($promo as $r){
			echo "<div class='media warnaFilterByGanjil img-rounded'>";
				echo "<div class='media-left'>";
					echo '<a href = '.site_url('/fatncurious/profilRestoran/'.$r->KODE_RESTORAN).'>';
	?>
						<img class='media-object img-circle gambarRestoran' src='<?php echo base_url('/vendors/images/portfolio/1.jpg');?>' alt='...'>
	<?php
					echo "</a>";
				echo "</div>";
				echo "<div class='media-body jarakMedia'>";
					echo "<h3 class='media-heading jarakMedia'>".$r->RESTORAN.', '.$r->ALAMAT."</h3>";
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
