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
                  
        <div class="card card-container">
            <h2 align="center" style="color: cadetblue">Change Password!</h2>
          <h4 style="color:red;">
                    <?php
                    $exception = $this->session->userdata('exception');
 
                    if (isset($exception)) {
                        echo $exception;
                        $this->session->unset_userdata('exception');
                    }
                    ?>
                </h4>
            <p id="profile-name" class="profile-name-card"></p>
            <form action="<?php echo base_url(); ?>welcome/change_password" method="post" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" name="admin_email_address" class="form-control" placeholder="Email address">
                <input type="password" id="inputPassword" name="old_admin_password" class="form-control" placeholder="Old Password" >
                <input type="password" id="inputPassword" name="new_admin_password" class="form-control" placeholder="New Password" >
                <div id="remember" class="checkbox">
                    <label>
                       
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Change Password</button>
            </form><!-- /form -->
           
        </div><!-- /card-container -->
        </div
</body>
</html>