<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/Hero-Technology.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/Pretty-Footer.css">
</head>

<body>
    <h1 class="text-nowrap text-center text-primary show">Master Fat n Curious</h1>
    <div class="login-card"><img src="<?php echo base_url() ?>assets/img/avatar_2x.png" class="profile-img-card">
        <p class="profile-name-card"> </p>
        <?php
          $arr = ['class'=>"form-signin"];
          echo form_open("master/login",$arr);
        ?>
          <span class="reauth-email"> </span>
            <input class="form-control" required="" placeholder="Email address" autofocus="" name="txtUsername">
            <input class="form-control" type="password" required="" placeholder="Password" name="txtPassword">
            <div class="checkbox">
                <div class="checkbox">
                    <label class="hidden">
                        <input type="checkbox">Remember me</label>
                </div>
            </div>
            <?php
              $array=['class'=>'btn btn-primary btn-block btn-lg btn-signin','name'=>'btnSubmit','value'=>'Sign in'];
              echo form_submit($array);
            ?>
        </form><a class="hidden forgot-password" href="#">Forgot your password?</a></div>
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
