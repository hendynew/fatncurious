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
              			?>
                      <li class="scroll">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-bell"><sup><sup class="label label-danger" style="font-size:12px;">3</sup></sup></span>
          </a>
          <ul class="dropdown-menu" style="max-height: calc(80vh - 210px);overflow-y: auto;">
            <div>
              <li class="media" style="height:70px;">
                <div class="media-left" style="padding:5px;">
                <a href="#"  style="padding:0px;">
                  <img class="media-object displayPictureNotifikasi img-circle"  src="<?php echo base_url('vendors/images/1.jpg'); ?>" alt = "generic placeholder image"></img>
                </a>
                </div>
                <div class="media-body">
                  <div class="media-heading" style="color:white;max-width: 500px; min-width:300px;"><strong>Jason Elian</strong> mention you on <strong>"@Hendy Lukas asdasd"</strong></div>
                  <h6 style="color:white;">26-5-2012</h6>
                </div>
              </li>
            </div>
            <hr/>
            <div style="background-color:gray;margin-top:-20px;margin-bottom: -20px;">
              <li class="media" style="height:70px;background-color:gray;padding-top:10px;padding-bottom: 85px;">
                <div class="media-left" style="padding:5px;">
                <a href="#"  style="padding:0px;">
                  <img class="media-object displayPictureNotifikasi img-circle"  src="<?php echo base_url('vendors/images/1.jpg'); ?>" alt = "generic placeholder image"></img>
                </a>
                </div>
                <div class="media-body">
                  <div class="media-heading" style="color:white;max-width: 500px; min-width:300px;"><strong>Jason Elian</strong> mention you on <strong>"@Hendy Lukas asdasd"</strong></div>
                  <h6 style="color:white;">26-5-2012</h6>
                </div>
              </li>
            </div>
            <hr/>
            <div style="background-color:gray;margin-top:-20px;margin-bottom: -20px;">
              <li class="media" style="height:70px;background-color:gray;padding-top:10px;padding-bottom: 85px;">
                <div class="media-left" style="padding:5px;">
                <a href="#"  style="padding:0px;">
                  <img class="media-object displayPictureNotifikasi img-circle"  src="<?php echo base_url('vendors/images/1.jpg'); ?>" alt = "generic placeholder image"></img>
                </a>
                </div>
                <div class="media-body">
                  <div class="media-heading" style="color:white;max-width: 500px; min-width:300px;"><strong>Jason Elian</strong> mention you on <strong>"@Hendy Lukas asdasd"</strong></div>
                  <h6 style="color:white;">26-5-2012</h6>
                </div>
              </li>
            </div>
            <hr/>
            <div style="background-color:gray;margin-top:-20px;margin-bottom: -20px;">
              <li class="media" style="height:70px;background-color:gray;padding-top:10px;padding-bottom: 85px;">
                <div class="media-left" style="padding:5px;">
                <a href="#"  style="padding:0px;">
                  <img class="media-object displayPictureNotifikasi img-circle"  src="<?php echo base_url('vendors/images/1.jpg'); ?>" alt = "generic placeholder image"></img>
                </a>
                </div>
                <div class="media-body">
                  <div class="media-heading" style="color:white;max-width: 500px; min-width:300px;"><strong>Jason Elian</strong> mention you on <strong>"@Hendy Lukas asdasd"</strong></div>
                  <h6 style="color:white;">26-5-2012</h6>
                </div>
              </li>
            </div>
            <hr/>
          </ul>

        </li>
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
                <?php
              }
                ?>
          </ul>
        </div>
      </div>
    </div>
  </header><!--/#home-->
    <br>
    <?php
      echo form_open('fatncurious/searchFilterByKredit');
    ?>
    <div class='container navbarSpace diperkecil'>
      <div class="row">
              <div class="form-group">
                <div class="combobox-container" style="display:none;">
              <input type="hidden" name="inline" value="">
                <div class="input-group">
                  <input type="text" autocomplete="off" placeholder="Pilih Kartu Kredit" class="combobox form-control">
                  	<ul class="typeahead typeahead-long dropdown-menu" style="top: 34px; left: 0px;">
                  </ul>
                  <span class="input-group-addon dropdown-toggle" data-dropdown="dropdown">
                    <span class="caret"></span>
                  <span class="glyphicon glyphicon-remove"></span>
                  </span>
                </div>
              </div>
        			<select name="namaKartu" class="form-control" style="display: inherit;">
                <?php
                  if(isset($namaKartu)){
                    echo "<option value='".$namaKartu."' selected>".$namaKartu."</option>";
                  }
                  else{
                    echo "<option value='' selected>Pilih Kartu Kredit</option>";
                  }
                ?>

        			<?php
                foreach($semuaKartu as $k){
                    echo "<option value='".$k->NAMA_KARTU_KREDIT."'>".$k->NAMA_KARTU_KREDIT."</option>";
                }
              ?>
              </select>
            </div>
        </div>
    <?php echo form_submit('btnSearch','Search');?>
    <?php echo form_close();?>


      <?php
      /*
          echo form_open('fatncurious/searchFilterByKredit');
            if(isset($kataSearch)){
                echo form_input('txtSearchKredit',$kataSearch)."<br/>";
            }
            else{
                echo form_input('txtSearchKredit')."<br/>";
            }
            if(isset($namaKartu)){
              echo form_checkbox('ckKartuKredit'," kartuKredit",true)."Kartu Kredit"."<br/>";
            }
            else{
              echo form_checkbox('ckKartuKredit'," kartuKredit",false)."Kartu Kredit"."<br/>";
            }
            if(isset($namaPromo)){
              echo form_checkbox('ckNamaPromo'," namaPromo",true)."Nama Promo"."<br/>";
            }
            else{
              echo form_checkbox('ckNamaPromo'," namaPromo",false)."Nama Promo"."<br/>";
            }
            echo form_submit('btnSearch','Search');
          echo form_close();*/
      ?>

	<?php
		foreach($kartu as $r){
			echo "<div class='media warnaFilterByGanjil img-rounded'>";
				echo "<div class='media-left'>";
					echo '<a href = '.site_url('/fatncurious/profilRestoran/'.$r->KODE_RESTORAN).'>';
          if($r->URL_FOTO_KARTU_KREDIT == ''){
            $url = 'default.jpg';
          }else $url = $r->URL_FOTO_KARTU_KREDIT;
          $url_full = base_url('/vendors/images/kredit/' . $url);
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
					echo "<h5 class='jarakMedia'>"."Masa Berlaku : ".$r->MASABERLAKU_PROMO."</h5>";
				echo "</div>";
			echo "</div>";
		}
		echo $links;
	?>
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
    <script type="text/javascript" src="<?php echo base_url('/vendors/js/bootstrap-combobox.js'); ?>"></script>
    <script>
  $('.combobox').combobox();
</script>
</body>
</html>
