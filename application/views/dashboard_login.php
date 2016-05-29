<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
        LOGIN HERE
    </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/login-style.css" />
</head>
<body>

<form action="<?php echo base_url();?>aldl_lg/check_login" method="post">
  <h1>LOG IN HERE</h1>
  <div class="inset">
  <?php 
        $exception = $this->session->userdata('exception');
        if(isset($exception)){
        ?>
          <p>
            <label  style="color:red" for="email"><?php echo $exception; ?></label>
          </p>
        <?php 
          $this->session->unset_userdata('exception');
        }

        $message = $this->session->userdata('message');
        if(isset($message)){
        ?>
          <p>
            <label  style="color:green" for="email"><?php echo $message; ?></label>
          </p>
        <?php 
          $this->session->unset_userdata('message');
      }
  ?>
  
  <p>
    <label for="email">EMAIL ADDRESS</label>
    <input type="text" placeholder="Enter username" name="txtUserName" id="txtUserName">
  </p>
  <p>
    <label for="password">PASSWORD</label>
    <input type="password" placeholder="Enter password" name="txtUserPassword" id="txtUserPassword">
  </p>
  
  <p>
    <!--<input type="checkbox" name="remember" id="remember">
    <label for="remember">Remember me for 14 days</label>-->
  </p>
  </div>
  <p class="p-container">
    <span>Forgot password ?</span>
    <input type="submit" name="submit" id="go" value="Log in">
  </p>
</form>

</body>
</html>
