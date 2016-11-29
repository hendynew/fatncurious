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
            <li><a href="<?php echo site_url('fatncurious/notification');?>" style="padding-top:10px;padding-bottom:10px;">Notification<span class="glyphicon glyphicon-envelope" aria-hidden="true" style="margin-left:10px;"></span></a></li>
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
  <br/>
  <div class='container navbarSpace'>

      <?php
          echo form_open('fatncurious/searchFilterByMenu');
            if(isset($kataSearch)){
                echo form_input('txtSearchMenu',$kataSearch)."<br/>";
            }
            else{
                echo form_input('txtSearchMenu')."<br/>";
            }
            if(isset($makanan)){
                echo form_checkbox('ckJenisMakanan'," Makanan",true)."Makanan"."<br/>";
            }
            else{
              echo form_checkbox('ckJenisMakanan'," Makanan",false)."Makanan"."<br/>";
            }
            if(isset($minuman)){
              echo form_checkbox('ckJenisMinuman'," Minuman",true)."Minuman"."<br/>";
            }
            else{
              echo form_checkbox('ckJenisMinuman'," Minuman",false)."Minuman"."<br/>";
            }
            if(isset($snack)){
              echo form_checkbox('ckJenisSnack'," Snack",true)."Snack"."<br/>";
            }
            else{
              echo form_checkbox('ckJenisSnack'," Snack",false)."Snack"."<br/>";
            }
            if(isset($dessert)){
              echo form_checkbox('ckJenisDessert'," Dessert",true)."Dessert"."<br/>";
            }
            else{
              echo form_checkbox('ckJenisDessert'," Dessert",false)."Dessert"."<br/>";
            }
            echo form_submit('btnSearch','Search');
          echo form_close();
      ?>



	<?php
	foreach($menu as $r){
		echo "<div class='media warnaFilterByGanjil img-rounded'>";
			echo "<div class='media-left'>";
				echo "<a href='#'>";
        $url = base_url('/vendors/images/menu/default.jpg');
        if($r->URL_FOTO != ''){
          $url = base_url('/vendors/images/menu/'.$r->KODE_RESTORAN.'/'.$r->KODE_MENU . '/' . $r->URL_FOTO);
        }
        ?>
        <img class="media-object displayPicture displayPictureComment"  src="<?php echo $url;?>" alt="..." row-id="">

	<?php
				echo "</a>";
			echo "</div>";
			echo "<div class='media-body jarakMedia'>";

				echo "<h4 class='media-heading jarakMedia'>".$r->NAMA_MENU." - ".'<a href = '.site_url('/fatncurious/profilRestoran/'.$r->KODE_RESTORAN).'>'.$r->NAMA_RESTORAN."</a>"."<br/>";
        echo "<h4 class='jarakMedia'>";
        $ada = false;
        foreach($rating as $key2=>$value){
          if($key2 == $r->KODE_MENU){
            $ada = true;
            $counter = 0;
            for($i = 0; $i < 5; $i++){
              if($counter < $value)
                echo '<span class="glyphicon glyphicon-star"></span>';
              else
                echo '<span class="glyphicon glyphicon-star-empty"></span>';
              $counter++;
            }
          }
        }
        if(!$ada)
        {
          for($i = 0; $i < 5; $i++){
            echo '<span class="glyphicon glyphicon-star-empty"></span>';
          }
        }
        echo "</h4>";
				echo "<p class='jarakMedia'>".$r->DESKRIPSI_MENU.'.'."</p>";

          foreach($review as $key=>$val){
            if($review[$key]['KODE_MENU'] == $r->KODE_MENU){
              echo "<div class='media m-t-2'>";
              echo "<div class='media-left' href='#'>";
              if($review[$key]['URL_FOTO'] == ''){
                $url = 'default.jpg';
              }else $url = $review[$key]['URL_FOTO'];
              $url_full = base_url('/vendors/images/profilepicture/' . $url);
                ?>
                  <img class="media-object displayPictureComment img-circle" src="<?php echo $url_full?>" alt="Generic placeholder image">
    	<?php
    					echo "</div>";
              echo "<div class='media-body'>";
    						echo "<h4 class='media-heading'>"  . $review[$key]['NAMA_USER'] ."</h4>";
    						echo $review[$key]["DESKRIPSI"];
    					echo "</div>";
              echo "</div>";
            }
          }
			echo "</div>";
		echo "</div>";
		echo "<br>";
	}
	echo $links;
	?>


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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqpR9uFr9Cdp4XDNAsrEojh3GTWNmCte8&signed_in=true&callback=initMap"
      async defer></script>
      <script>
        $('.combobox').combobox();
      </script>
</body>
</html>
