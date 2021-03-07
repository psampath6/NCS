<?php
  session_start();

/*
  $_SESSION = array();
  session_destroy();
*/

if (isset($_SESSION['SESSION_NKPUID'])) { unset($_SESSION['SESSION_NKPUID']); }
if (isset($_SESSION['SESSION_EMAILID'])) { unset($_SESSION['SESSION_EMAILID']); }
if (isset($_SESSION['SESSION_FIRSTNAME'])) { unset($_SESSION['SESSION_FIRSTNAME']); }
if (isset($_SESSION['SESSION_LASTNAME'])) { unset($_SESSION['SESSION_LASTNAME']); }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    include ('head-tag.php');
  ?>

<title>Registration <?php include ('title-tag.php'); ?></title>


<style type="text/css">
label { display: inline-block; zwidth: 20%; }
.realperson-challenge { display: inline-block }
</style>

<script type="text/javascript">
$(function() {
	$('#defaultReal').realperson();
});
</script>


<script type="text/javascript">
/*
var RegSubmitted = 0;
function RegSubmitOnce()
{
   if(!RegSubmitted)
   {
      RegSubmitted ++;
      document.RegistrationForm.RegistrationFormSubmit.value = 'Registering, Please Wait...';
      $('#RegisteringSpinModal').modal('show');
      SpinStart();
      return true;
   }
   else {
      return false;
   }
}
*/
</script>

<script type="text/javascript">
//   onsubmit="return RegSubmitOnce(); "
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

          <h2 class="text-center" >New User Registration</h2>

          <hr>

          <form class="form" id="RegistrationForm" name="RegistrationForm"
                      method="post" action="registration.php"  >


            <div class="form-group">
              <label for="" class="">Email-ID (Username)</label>
              <input type="text" class="form-control input-lg" id="Emailid" name="Emailid"
                      placeholder=" Email-ID (Username) * " title="Email-ID (Username)"
                      value="<?php if (isset($_SESSION['SESSION_RegEmailid'])) { echo htmlentities($_SESSION['SESSION_RegEmailid']) ; } ?>"
                      maxlength="40"  required autofocus >
            </div>

            <hr>

            <div class="form-group">
              <label for="" class="">Create Password</label>
              <input type="password" class="form-control input-lg"
                      id="PassWord" name="PassWord" maxlength="20"
                      placeholder=" Create Password (Min 4 chars.) * "
                      value="<?php if (isset($_SESSION['SESSION_RegPassWord'])) { echo htmlentities($_SESSION['SESSION_RegPassWord']) ; } ?>"
                      title="Password (Min 4 chars. & Max 20 chars.)" required >
            </div>

            <hr>

            <div class="form-group">
              <label for="" class="">Confirm Password</label>
              <input type="password" class="form-control input-lg"
                      id="Confirm" name="Confirm" maxlength="20"
                      placeholder=" Confirm Password * "
                      value="<?php if (isset($_SESSION['SESSION_RegPassWord'])) { echo htmlentities($_SESSION['SESSION_RegPassWord']) ; } ?>"
                      title="Confirm PassWord" required >
            </div>

            <hr>

            <div class="form-group">
              <label for="" class="">First Name</label>
              <input type="text" class="form-control input-lg "
                      id="FirstName" name="FirstName"
                      placeholder=" First Name * " title="First Name"
                      value="<?php if (isset($_SESSION['SESSION_RegFirstName'])) { echo htmlentities($_SESSION['SESSION_RegFirstName']) ; } ?>"
                      maxlength="20"  required >
            </div>

            <hr>

            <div class="form-group">
              <label for="" class="">Last Name</label>
              <input type="text" class="form-control input-lg "
                      id="LastName" name="LastName"
                      placeholder=" Last Name " title="Last Name"
                      value="<?php if (isset($_SESSION['SESSION_RegLastName'])) { echo htmlentities($_SESSION['SESSION_RegLastName']) ; } ?>"
                      maxlength="20"  >
            </div>

            <hr>

            <div class="form-group">
              <label for="" class="">Mobile Number</label>
                <div class="input-group">
                  <span class="input-group-addon">+1</span>
                  <input type="text" class="form-control input-lg "
                          id="Mobile" name="Mobile" maxlength="10"
                          value="<?php if (isset($_SESSION['SESSION_RegMobile'])) { echo htmlentities($_SESSION['SESSION_RegMobile']) ; } ?>"
                          placeholder=" Mobile Number " title="Mobile No."  >
                </div>
            </div>

            <hr>

            <div class="form-group">
              <label for="" class="">CAPTCHA Text</label> <br>
                <input type="text" class="form-control input-lg"
                        id="defaultReal" name="defaultReal"  maxlength="6"
                        placeholder=" CAPTCHA Text *" title="CAPTCHA" required >
                <span style="font-size:12px">Type the CAPTCHA Text displayed above.
                <br>
                <b>CAPTCHA => C</b>ompletely <b>A</b>utomated <b>P</b>ublic <b>T</b>uring
                            test to tell <b>C</b>omputers and <b>H</b>umans <b>A</b>part.
                </span>
            </div>

            <hr>

            <div class="form-group">
              <div id="" class="btnbgc">
                <input type="submit" class="btn btn-success btn-lg btn-block"
                            name="RegistrationFormSubmit" value="Submit to Register" >
              </div>
            </div>

          </form>

          <hr>

          <br>

        </div>

  <?php
    include ('modal-spin.php');
  ?>

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
