<!DOCTYPE html>
<html lang="en">
<head>
 <title>মেসার্স হাজী আবুল কাশেম এন্ড সন্স</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
        <div class="container">
            <h4 style="color:red;">
                    <?php
                    $exception = $this->session->userdata('exception');
 
                    if (isset($exception)) {
                        echo $exception;
                        $this->session->unset_userdata('exception');
                    }
                    ?>
                </h4>
                <h4 style="color:white;">
                    <?php
                    $loged_out = $this->session->userdata('loged_out');
 
                    if (isset($loged_out)) {
                        echo $loged_out;
                        $this->session->unset_userdata('loged_out');
                    }
                    ?>
        <div class="card card-container">
            <h2 align="center" style="color: cadetblue">Log In</h2>
           
            <p id="profile-name" class="profile-name-card"></p>
            <form action="<?php echo base_url(); ?>admin_login/check_login" method="post" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" name="admin_email_address" class="form-control" placeholder="Email address">
                <input type="password" id="inputPassword" name="admin_password" class="form-control" placeholder="Password" >
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="<?php echo base_url(); ?>welcome/password" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
        </div
</body>
</html>