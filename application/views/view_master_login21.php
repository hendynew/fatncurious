<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Master Fat n Curious</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Sidebar-Menu1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
</head>

<body>
    <div class="login-clean">

            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <?php
              echo form_open('master/login');
              $username='administrator';
              $password='administrator';
              echo $error
            ?>
            <div class="form-group">
              <?php
                $array=['class'=>'form-control','placeholder'=>'Username','name'=>'txtUsername','required'=>'',"value"=>"administrator"];
                echo form_input($array,$username);
                ?>

            </div>
            <div class="form-group">
                <input class="form-control" name="txtPassword" type="password" placeholder="Password" value=<?php echo $password?>>
            </div>
            <div class="form-group"><?php
              $array=['class'=>'btn btn-primary btn-block','name'=>'btnSubmit','value'=>'Log in'];
              echo form_submit($array);?>
            </div>
        </form>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/Sidebar-Menu.js"></script>
</body>

</html>
