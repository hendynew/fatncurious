<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Detail Menu</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/Hero-Technology.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/Pretty-Footer.css">
    <link href="<?php echo base_url();?>/build/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-default custom-header">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Fat n <span>Curious </span> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav links">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Tables <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="<?php echo base_url('index.php/master_user')?>">User </a></li>
                            <li role="presentation"><a href="<?php echo base_url('index.php/master_restaurant')?>">Restaurant </a></li>
                            <li role="presentation"><a href="<?php echo base_url('index.php/master_kartu_kredit')?>">Credit Card</a></li>
                            <li role="presentation"><a href="<?php echo base_url('index.php/master_promo')?>">Promo </a></li>
                            <li role="presentation"><a href="<?php echo base_url('index.php/master_menu')?>">Menu </a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">Review <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="<?php echo base_url('index.php/master_review/restaurant')?>">Restaurant </a></li>
                            <li role="presentation"><a href="<?php echo base_url('index.php/master_review/menu')?>">Menu </a></li>
                        </ul>
                    </li>
                    <li role="presentation">
                        <a href="#" class="custom-navbar"> </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <span class="caret"></span><img src="<?php echo base_url() ?>assets/img/avatar.jpg" class="dropdown-image"></a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li role="presentation" class="active"><a href="<?php echo base_url('index.php/master/logout')?>">Logout </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
      <div class="row">
        <h2 class="text-center">Detail Menu <?php echo $nama ?></h2>
        <div class="col-md-1"></div>
        <div class="col-md-10 ">
          <div class="x_content" style="color:black">
            <br />
            <?php
              $array=['class'=>'form-horizontal form-label-left'];
              echo form_open('master_menu',$array);
            ?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Menu</label>
                <label class="control-label col-md-1 col-sm-1 col-xs-12"><?php echo $kode_param ?></label>
                <?php echo form_hidden("kodeMenu",$kode_param);?>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Menu</label>
                <label class="control-label col-md-1 col-sm-1 col-xs-12"><?php echo $jenis ?></label>
                <?php echo form_hidden("kodeJenis",$jenis);?>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Restoran</label>
                <label class="control-label col-md-1 col-sm-1 col-xs-12"><?php echo $restoran ?></label>
                <?php echo form_hidden("kodeRestoran",$restoran);?>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <?php
                    $array=['class'=>'form-control','name'=>'txtNamaMenu'];
                    echo form_input($array,$nama);
                    ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <?php
                    $array=['class'=>'form-control','name'=>'txtDeskripsiMenu'];
                    echo form_textarea($array,$deskripsi);
                    ?>
                </div>
              </div><div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <?php
                    $array=['class'=>'form-control','name'=>'txtHarga'];
                    echo form_input($array,$harga);
                    ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <?php
                    $array=['class'=>'form-control','name'=>'txtKeterangan'];
                    echo form_textarea($array,$keterangan);
                    ?>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <?php
                    $array=['class'=>'btn btn-primary','name'=>'btnInsert'];
                    echo form_submit($array,'Add Menu');
                    $array=['class'=>'btn btn-success','name'=>'btnUpdate'];
                    echo form_submit($array,'Update Info');
                    $array=['class'=>'btn btn-danger','name'=>'btnDelete'];
                    echo form_submit($array,'Delete Menu');
                  ?>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-1"></div>
        <div class="col-md-10 col-sm-10 col-xs-10">
          <div class="x_panel" style="color:black">
            <div class="x_title">
              <h2>List promo <?php echo $nama?></h2>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
                  <?php
                  echo '<div class="table-responsive">';
                  $this->table->set_heading('Promo','Persentase');
                  $tmp = array('table_open'=>'<table class="example table table-striped jambo_table">','heading_row_start'=>'<th class="column-title">','row_start'=>'<tr class="odd pointer"><td></td>','row_alt_start'=> '<tr class="even pointer"><td></td>');
                  $this->table->set_template($tmp);

                  foreach($data2 as $d){
                    $this->table->add_row(anchor('master_user/detail/promo/'.$d->KODE,$d->NAMA),$d->persen);
                  }
                  echo $this->table->generate();
                  echo '</div><br><br>';
                  ?>
                  <h2>Rating <?php echo $nama?></h2>
                  <?php

                  echo '<div class="table-responsive">';
                  $this->table->set_heading('Nama User','Rating');
                  $tmp = array('table_open'=>'<table class="example table table-striped jambo_table">','heading_row_start'=>'<th class="column-title">','row_start'=>'<tr class="odd pointer"><td></td>','row_alt_start'=> '<tr class="even pointer"><td></td>');
                  $this->table->set_template($tmp);

                  foreach($data3 as $d){
                    $this->table->add_row(anchor('master_user/detail/user/'.$d->KODE,$d->NAMA),$d->RATING);
                  }
                  echo $this->table->generate();
                  echo '</div><br><br>';
                  ?>

                  <h2>Review <?php echo $nama?></h2>
                  <?php
                  echo '<div class="table-responsive">';
                  $this->table->set_heading('Nama User','Isi Review','Tanggal','Waktu','Jumlah Like','Keterangan');
                  $tmp = array('table_open'=>'<table class="example table table-striped jambo_table">','heading_row_start'=>'<th class="column-title">','row_start'=>'<tr class="odd pointer"><td></td>','row_alt_start'=> '<tr class="even pointer"><td></td>');
                  $this->table->set_template($tmp);

                  foreach($data4 as $d){
                    $this->table->add_row(anchor('master_user/detail/user/'.$d->KODE,$d->NAMA),$d->DESKRIPSI_REVIEW,$d->TANGGAL,$d->WAKTU,$d->KETERANGAN);
                  }
                  echo $this->table->generate();
                  echo '</div><br><br>';
                  ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>build/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                columnDefs: [ {
                    targets: [ 0 ],
                    orderData: [ 0, 1 ]
                }, {
                    targets: [ 1 ],
                    orderData: [ 1, 0 ]
                }, {
                    targets: [ 4 ],
                    orderData: [ 4, 0 ]
                } ]
            } );
        } );
    </script>
</body>

</html>
