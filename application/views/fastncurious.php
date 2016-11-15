<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Fat 'n Curious</title>
    <link href="<?php echo base_url('/vendors/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('/vendors/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('/vendors/css/lightbox.css')?>" rel="stylesheet">
    <link id="css-preset" href="<?php echo base_url('/vendors/css/presets/preset1.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('/vendors/css/main.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('/vendors/css/responsive.css');?>" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?php echo base_url('/vendors/images/favicon.ico');?>">
    <link href="<?php echo base_url('/vendors/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet">
</head>
<body>
	<?php
		if(isset($adaError)){
	?>
	<script>
		alert('<?php echo $adaError;?>');
	</script>
	<?php
		}
	?>
    <div id="asd"> Index </div>
    <header id="home">

    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url('<?php echo base_url('/vendors/images/slider/1.jpg');?>')">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Fat 'N<span> Curious </span>  </h1>
            <p class="animated fadeInRightBig">Promotion  And Restaurant Search Engine Only.
            <p class = "animated fadeInRightBig textFilterBy"> Filter By : </p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="<?php echo base_url('/index.php/fatncurious/filterByPromo');?>">Biggest Promo</a>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="<?php echo base_url('/index.php/fatncurious/filterByRestoran');?>">Restaurant Names</a>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="<?php echo base_url('/index.php/fatncurious/filterByMenu');?>">Menu</a>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="<?php echo base_url('/index.php/fatncurious/filterByKartu');?>">Credit Cards</a>
          </div>
        </div>
      </div>
      <?php if(!isset($kodeUser)){?>
      <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>
        <div id="menuKiri">
            <div class= "container-fluid palingDepan backgroundMenuTambahan">
			<?php
				echo form_open('fatncurious/register');
			?>
              <div class="form-group">
				<?php
				  $array=['type'=>'email','class'=>'form-control','placeholder'=>'Email','name'=>'txtEmailRegister'];
				  echo form_input($array);
				  //<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
				?>
                <label for="exampleInputEmail1">Email address</label>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
				<?php
				  $array=['type'=>'password','class'=>'form-control','placeholder'=>'Password','name'=>'txtPasswordRegister'];
				  echo form_input($array);
				  //<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				?>
              </div>
              <div class="form-group">
                <label for="exampleInputNama"> Nama</label>
				<?php
				  $array=['type'=>'text','class'=>'form-control','placeholder'=>'Nama','name'=>'txtNamaRegister'];
				  echo form_input($array);
				  //<input type="text" class="form-control" id="exampleInputNama1" placeholder="Nama">
				?>
              </div>
              <div class="form-group">
                <label for="exampleInputDTPicker">Tanggal Lahir</label>
				<?php
				  $array=['type'=>'text','class'=>'form-control','id'=>'exampleInputDTPicker1','placeholder'=>'YYYY-MM-DD','name'=>'txtTglRegister'];
				  echo form_input($array);
				  //<input type="text" class="form-control" id="exampleInputDTPicker1" placeholder="DD/MM/YYYY">
				?>
              </div>
              <div class="form-group">
                <label for="exampleInputNoTelp"> No Telp</label>
				<?php
				  $array=['type'=>'text','class'=>'form-control','placeholder'=>'No Telp','name'=>'txtNoTelpRegister'];
				  echo form_input($array);
				  //<input type="text" class="form-control" id="exampleInputNoTelp1" placeholder="No Telp">
				?>
              </div>
			  <?php
                  $array=['class'=>'btn btn-info','name'=>'btnRegister','value'=>'Register'];
                  echo form_submit($array);
				  //<button type="submit" class="btn btn-info">Register</button>
                ?>
			  <?php
				echo form_close();
			  ?>
            </div>

        </div>
        <div id="menuKanan">
            <div class= "container-fluid palingDepan">
			<?php echo form_open('fatncurious/login')?>
              <div class="form-group">
                <label for="exampleInputEmail2">Email address</label>
				<?php
                  $array=['type'=>'email','class'=>'form-control','placeholder'=>'Email','name'=>'txtEmailLogin'];
                  echo form_input($array);
				  //<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email"/>
                ?>

              </div>
              <div class="form-group">
                <label for="exampleInputPassword2">Password</label>
				<?php
                  $array=['type'=>'password','class'=>'form-control','placeholder'=>'Password','name'=>'txtPasswordLogin'];
                  echo form_input($array);
				  //<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password"/>
                ?>

              </div>
			  <?php
                  $array=['class'=>'btn btn-info','name'=>'btnLogin','value'=>'Login'];
                  echo form_submit($array);
				  //<button type="submit" class="btn btn-info">Login</button>

                ?>

			  <?php echo form_close()?>
            </div>
        </div><?php }?>

    </div><!--/#home-slider-->

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
            <li class="scroll"><a href="#home">Home</a></li>
            <li class="scroll"><a href="#about-us">About Us</a></li>
            <li class="scroll">
    				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    					FilterBy <span class="caret"></span>
    				  </a>
    				  <ul class="dropdown-menu">
    					<li><a href="#" style="padding-top:10px;padding-bottom:10px;">Biggest Promo</a></li>
    					<li><a href="#" style="padding-top:10px;padding-bottom:10px;">Restaurant Names</a></li>
    					<li><a href="#" style="padding-top:10px;padding-bottom:10px;">Menu</a></li>
    					<li><a href="#" style="padding-top:10px;padding-bottom:10px;">Credit Cards</a></li>
    				  </ul>
    			</li>
            <li class="scroll"><a href="#contact">Contact Us</a></li>
			<?php
				if(isset($kodeUser)){
			?>
        <li class="scroll">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?php echo base_url('vendors/images/team/2.jpg'); ?>" class="img-circle displayPictureNavBar"> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('fatncurious/profilUser');?>" style="padding-top:10px;padding-bottom:10px;">Profile</a></li>
            <li><a href="#" style="padding-top:10px;padding-bottom:10px;">Ganti Password</a></li>
            <li><a href="<?php echo site_url('fatncurious/LogOut');?>" style="padding-top:10px;padding-bottom:10px;">Logout</a></li>
            </ul>
        </li>
			<?php
				}
			?>
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
    </header><!--/#home-->

    <section id="contact">
    <div id="google-map" class="wow fadeIn" data-latitude="-7.235306" data-longitude="112.789612" data-wow-duration="500ms" data-wow-delay="200ms"></div>
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Contact Us</h2>
            <p>Get support by phone or chat, set up a repair, or make a Genius Bar </p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="200ms" data-wow-delay="100ms">
          <div class="row">
            <div class="col-sm-6">
              <form id="main-contact-form" name="contact-form" method="post" action="#">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Email Address" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
                </div>
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message" required="required"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn-submit">Send Now</button>
                </div>
              </form>
            </div>
            <div class="col-sm-6">
              <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <p>If you have something to make our website or service, please give us some message to have better quality. </p>
                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span> Address:</span> Pantai Mentari Blok L - 1, Surabaya </li>
                  <li><i class="fa fa-phone"></i> <span> Phone:</span> +928 336 2000  </li>
                  <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:jasoneliann@gmail.com"> support@fnc.com</a></li>
                  <li><i class="fa fa-globe"></i> <span> Website:</span> <a href="#">www.fnc.com</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#contact-->


    <script type="text/javascript" src="<?php echo base_url('/vendors/js/jquery.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/vendors/js/moment.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/vendors/js/transition.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/vendors/js/collapse.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/vendors/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/vendors/js/bootstrap-datetimepicker.min.js');?>"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDqpR9uFr9Cdp4XDNAsrEojh3GTWNmCte8&sensor=true"></script>
    <script type="text/javascript" src="<?php echo base_url('/vendors/js/jquery.inview.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/vendors/js/wow.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/vendors/js/mousescroll.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/vendors/js/smoothscroll.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/vendors/js/jquery.countTo.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/vendors/js/lightbox.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/vendors/js/main.js');?>"></script>


</body>
</html>
