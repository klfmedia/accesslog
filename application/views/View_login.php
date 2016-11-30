<!DOCTYPE html>
  <head>
    <meta charset="UTF-8">
    <title>KLF login form </title>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> 
	<link href="<?php echo base_url();?>/CSS/Login_CSS/normalize.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>/CSS/Login_CSS/style.css" rel="stylesheet" type="text/css" /> 
  </head>
<?php 
	$data['title']="Welcome KLF Company";
        $this->load->view('templates/headerLogin', $data);
  ?>
  <body >
    <section class="login-form-wrap">
  <h1>KLF</h1>
  <form class="login-form" method="post" action="<?php echo base_url();?>index.php/user/validate">
    <label>
      <input type="text" name="txtEmail" required placeholder="Email">
    </label>
    <label>
      <input type="password" name="txtPassword" required placeholder="Password">
    </label>
    <input type="submit" value="Login" >
      <input type="button" class="button" value="Sign Up" onclick="Register()"/>
  </form>

</section>
  </body>
  <?php
  $data['company']="KLF Company";;
  $this->load->view('templates/footer', $data);?>
</html>

