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
    <br/>
    <div class='container navbarSpace'>

      <?php
          echo form_open('fatncurious/searchFilterByRestoran');
            if(isset($kataSearch)){
                echo form_input('txtSearchRestoran',$kataSearch)."<br/>";
            }
            else{
                echo form_input('txtSearchRestoran')."<br/>";
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
            echo form_submit('btnSearch','Search');
          echo form_close();
      ?>


    <div id="output">asdasd</div>
	<?php
	$ctr=0;
		foreach($resto as $key=>$r){
      $restoSebelumnya='';
      $ctrKartu=0;
      $simpanKredit='';
			echo "<div class='media warnaFilterByGanjil img-rounded'>";
        echo '<p id="jarak'.$ctr++.'">Jarak = Undefined</p>';
				echo "<div class='media-left'>";
					echo '<a href = '.site_url('/fatncurious/profilRestoran/'.$key).'>';
          if($resto[$key]['URL_FOTO_RESTORAN'] == ''){
            $url = 'default.jpg';
          }else $url = $resto[$key]['URL_FOTO_RESTORAN'];
          $url_full = base_url('/vendors/images/restoran/' . $url);
          ?>
          <img class="media-object img-rounded gambarRestoran" src="<?php echo $url_full?>" alt="Generic placeholder image">
						<?php
				echo "</div>";
				echo "<div class='media-body jarakMedia'>";
					echo "<h3 class='media-heading jarakMedia'>".$r['NAMA_RESTORAN'].', '.$r['ALAMAT_RESTORAN']."</h3>";
          echo "</a>";
					echo "<h4 class='jarakMedia'>";
          foreach($rating as $key2=>$value){
            if($key2 == $key){
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
					echo "</h4>";
					echo "<h5 class='jarakMedia'>"."No Telp : ".$r['NO_TELEPON_RESTORAN']."</h5>";
					echo "<h5 class='jarakMedia'>"."Jam Buka : ".$r['JAM_BUKA_RESTORAN']."</h5>";
					echo "<h5 class='jarakMedia'>"."Hari Buka : ".$r['HARI_BUKA_RESTORAN']."</h5>";
					if($r['STATUS_RESTORAN']==1){
						$status = 'Buka';
					}
					else if($r['STATUS_RESTORAN']==0){
						$status = 'Tutup';
					}
					echo "<h5 class='jarakMedia'>"."Status : ".$status."</h5>";
					echo "<h5 class='jarakMedia'>"."Deskripsi : ".$r['DESKRIPSI_RESTORAN']."</h5>";

          if($r['KARTU_KREDIT']==' '){
              echo "<h5 class='jarakMedia'> Kartu Kredit yang ada promo : Tidak Ada Promo";
          }
          else{
              echo "<h5 class='jarakMedia'> Kartu Kredit yang ada promo : " . $r['KARTU_KREDIT'];
          }

          echo " </h5>";

          $ctrKartu++;
				echo "</div>";
			echo "</div>";
		}
		echo $links;
	?>
       <!-- <div class="shadow">asdasdsadsd</div>-->
    </div>
    <script>
    function initMap() {
      var bounds = new google.maps.LatLngBounds;
      var markersArray = [];
      if (navigator.geolocation)
      {
      navigator.geolocation.getCurrentPosition(function(position) {

          var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
          };
          //var origin1 = {lat: 55.93, lng: -3.118};

          var origin2 = {lat: pos.lat, lng : pos.lng};
          //var destinationA = 'TEGALSARI 88 SURABAYA Indonesia';
          /*var destinationB = 'JALAN TAMBAK ADI 100 SURABAYA';*/
          var destination = [];
          for (var i = 0; i<=5 ;i++)
          {
            destination[i]='';
          }

          <?php
            $counter = 0;

            foreach($resto as $row)
            {

                echo 'destination['.$counter++.'] = "'.$row['ALAMAT_RESTORAN'].'";';
            }
          ?>
          //alert(destinationA);
          //alert(destination[0]);
          var geocoder = new google.maps.Geocoder;
          var service = new google.maps.DistanceMatrixService;
          service.getDistanceMatrix({
          origins: [origin2],
          destinations: [destination[0],destination[1],destination[2],destination[3],destination[4]],
          travelMode: google.maps.TravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC,
          avoidHighways: false,
          avoidTolls: false
          }, function(response, status) {
          if (status !== google.maps.DistanceMatrixStatus.OK) {
            alert('Error was: ' + status);
          } else {
            console.log(response);
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;

            var outputDiv = document.getElementById('output');
            outputDiv.innerHTML = '';
            deleteMarkers(markersArray);

            for (var i = 0; i < originList.length; i++) {
            var results = response.rows[i].elements;
            geocoder.geocode({'address': originList[i]});
            for (var j = 0; j < results.length; j++) {
              geocoder.geocode({'address': destinationList[j]}
                );
              /*outputDiv.innerHTML += originList[i] + ' to ' + destinationList[j] +
                ': ' + results[j].distance.text + ' in ' +
                results[j].duration.text + '<br>';*/
                if(results[j].status!='ZERO_RESULTS')
                {

                  $('#jarak'+j).text(originList[i] + ' to ' + destinationList[j] +
                    ': ' + results[j].distance.text + ' in ' +
                    results[j].duration.text);
                }
            }
            }
          }
          });

        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      }
    }

    function deleteMarkers(markersArray) {
      for (var i = 0; i < markersArray.length; i++) {
      markersArray[i].setMap(null);
      }
      markersArray = [];
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqpR9uFr9Cdp4XDNAsrEojh3GTWNmCte8&signed_in=true&callback=initMap"
      async defer></script>
</body>
</html>
