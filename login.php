<?php

  session_start();
  $_SESSION = array();
  session_destroy();


  $vLoginErrorMsg = '';

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    include ('login-user.php');
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Login <?php include ('title-tag.php'); ?></title>

  <?php
    include ('head-tag.php');
  ?>


<script type="text/javascript">
function LoginModalSpin()
{
      $('#LoadingSpinModal').modal('show');
      SpinStart();
}
</script>

</head>

<body>

  <?php
    include ('navbar.php');
  ?>

    <div class="section-colored text-center  center-block ">

      <div class="container">

        <div class="row">

          <div class="col-md-6 col-md-offset-3 " >

            <h2 class="text-center" >User Login</h2>

<!--
            <pre class="prebar"></pre>
onclick="LoginModalSpin();"
-->

            <hr>

            <br>

            <form class="form" id="LoginForm" name="LoginForm" method="post"
                        action="login.php" onsubmit="return(LoginVal()); ">

              <div class="form-group">
                <label for="" class="">Username (Email-ID)</label>
                <input class="form-control input-lg" id="LoginUserName" name="LoginUserName"
                            type="text" placeholder=" Username (Email-ID) " title="Username" autofocus>
              </div>

              <hr>

              <?php
                if (isset($_POST['LoginSubmit']))
                {
              ?>
                <div id="LoginErrorMsg" style="color:red; font-size:12px; margin-top:20px">
                  <?php echo $vLoginErrorMsg; ?>
                  <hr>
                </div>
              <?php
                }
              ?>

              <script type="text/javascript" >
                var fade_out = function() {
                  $("#LoginErrorMsg").fadeOut().empty(); }
                setTimeout(fade_out, 9000);
              </script>

              <div class="form-group">
                <label for="" class="">Password</label>
                <input class="form-control input-lg" id="LoginPassWord" name="LoginPassWord"
                            type="password" placeholder=" Password " title="Password">
              </div>

              <hr>
              <br>

              <div class="form-group  center-block ">
                <div id="" class="btnbgc">
                  <input class="btn btn-primary btn-lg btn-block" name="LoginSubmit"
                              type="submit" value="Sign in" >
                </div>
              </div>

              <hr>

            </form>

            <div class="form-group text-left.">
                <span class="pull-right." >
                  <a href="forgot-password.php">Forgot Password ?</a></span>
                <br>
                <hr>
                <span><a href="register.php">New User Registration</a></span>
            </div>

        <!-- &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; -->

            <hr>

<!--
            <pre class="prebar"></pre>
-->

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
      include ('modal-spin.php');
    ?>

  <?php
    include ('footer.php');
  ?>

</body>

</html>
