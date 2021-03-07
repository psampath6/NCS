
<!DOCTYPE html>
<html>

<head>

  <?php
    include ('head-tag.php');
  ?>

<title>Registration <?php include ('title-tag.php'); ?></title>

</head>

<body>

  <?php
    include ('navbar.php');
    if (isset($_POST['RegistrationFormSubmit'])) {
         if (isset($_POST['PassWord'])) {
             $vPassWord = trim($_POST['PassWord']);
         };
    #printf('<br>Password: %s', htmlspecialchars($vPassWord, ENT_QUOTES));
    };
  ?>

  <div class="section-colored center-block text-center">

    <div class="container">

      <div class="row">

        <div class="col-md-6 col-md-offset-3 " >

          <h2 class="text-center">New User Registration</h2>


          <hr>
          <br>

          <h3>
          <p class="greenmybox">
            <br>
            <br> <b>Registration</b> <br>
            <br>
            <br> Completed <br>
            <br>
            <br> <b>Successfully.</b> <br>
            <br>
            <br>
          </p>
          </h3>

          <br>
          <hr>

          <div class="btnbgc">
            <a class="btn btn-success btn-lg btn-block" href="login.php"
                  style="text-decoration:none;">Click here to Login</a>
          </div>

          <hr>


          <br>
          <br>
          <br>

        </div>

      </div>
      <!-- /.row -->

    </div>
        <!-- /.container -->

    </div>
    <!-- /.section-colored -->

  <?php
    include ('footer.php');
  ?>

</body>

</html>
