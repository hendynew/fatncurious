<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Restaurant</title>
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
        <h2 class="text-center">Table Restaurant</h2>
        <div class="col-md-1"></div>
        <div class="col-md-10 ">
          <div class="table-responsive" style="color:white">

              <?php
              $this->table->set_heading('Nama', 'Pemilik','Alamat','Telepon','Jam Buka','Hari Buka','Deskripsi','Jumlah Peringatan','Keterangan','Action');
              $tmp = array('table_open'=>'<table class="table table-striped jambo_table" id="example" style="color:black">','heading_row_start'=>'<th class="column-title">','row_start'=>'<tr class="odd pointer"><td></td>','row_alt_start'=> '<tr class="even pointer" style="color:black"><td></td>');
              $this->table->set_template($tmp);
              foreach($arrObj as $r){
                  $this->table->add_row($r->NAMA_RESTORAN,anchor('master_user/detail/user/'.$r->KODE_USER,$r->NAMA_USER),$r->ALAMAT,$r->TELEPON,$r->JAM_BUKA,$r->HARI_BUKA,$r->DESKRIPSI,$r->JUMLAH_PERINGATAN_RESTORAN,$r->KETERANGAN, anchor('master_user/detail/restaurant/'.$r->KODE_RESTORAN,'Detail'));
              }
              echo $this->table->generate();
              ?>
          </div>
        </div>
      </div>

        <!--div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form method="post" class="bootstrap-form-with-validation">
                    <h2 class="text-center">Form User</h2>
                    <div class="form-group">
                        <label class="control-label" for="text-input">Nama</label>
                        <input class="form-control" type="text" name="text-input" id="text-input">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email-input">Email </label>
                        <input class="form-control" type="email" name="email-input" id="email-input">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email-input">Password </label>
                        <input class="form-control" type="password">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password-input">Tanggal Lahir</label>
                        <input class="form-control input-lg" type="date" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password-input">Telepon </label>
                        <input class="form-control" type="text" name="text-input" id="text-input">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg" type="submit">Insert </button>
                        <button class="btn btn-success btn-lg" type="submit">Update </button>
                        <button class="btn btn-danger btn-lg" type="submit">Delete </button>
                    </div>
                </form>
            </div>
        </div></!-->
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
