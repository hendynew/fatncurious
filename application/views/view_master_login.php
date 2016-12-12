<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Master | Fat 'n Curious | </title>

    <!-- Bootstrap -->
    <!--link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"-->
    <link href="<?php echo base_url();?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1>Master Login</h1>
              <div>
                <?php echo form_open('login'); $username='administrator';$password='administrator';
                  echo $error;
                ?>
                <?php
                  $array=['class'=>'form-control','placeholder'=>'Username','name'=>'txtUsername','required'=>''];
                  echo form_input($array,$username);
                ?>
              </div>
              <div>
                <?php
                  $array=['class'=>'form-control','placeholder'=>'Password','name'=>'txtPassword','required'=>''];
                  echo form_password($array,$password);
                ?>
              </div>
              <div>
                <?php
                  //$array =['class'=>'btn btn-default submit','href'=>'login/$username/$password','value'=>'Log In'];
                  //echo "<a class='btn btn-default submit' href='login/$username/$password'> Log in </a>";
                  $array=['class'=>'btn btn-default submit','name'=>'btnSubmit','value'=>'Log in'];
                  echo form_submit($array);
                  //echo anchor($array);
                ?>

              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Fat 'n Curious!</h1>
                  <p>©2016 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
