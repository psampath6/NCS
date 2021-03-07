/* ************************************************ */

  function SpinStart()
  {
    var opts = {
      lines: 20, 
      length: 30, 
      width: 20, 
      radius: 5, 
      rotate: 0, 
      color: '#555', 
      speed: 1, 
      trail: 50, 
      shadow: true, 
      hwaccel: false, 
      className: 'spinner', 
      zIndex: 2e9, 
      top: '50%', 
      left: '50%' 
    };

    var target = document.getElementById('spin');
    var spinner = new Spinner(opts).spin(target);

    var target = document.getElementById('SpinSearch');
    var spinner = new Spinner(opts).spin(target);

    var target = document.getElementById('SpinRegister');
    var spinner = new Spinner(opts).spin(target);

    var target = document.getElementById('SpinPost');
    var spinner = new Spinner(opts).spin(target);

    var target = document.getElementById('SpinLoad');
    var spinner = new Spinner(opts).spin(target);

    var target = document.getElementById('SpinUpload');
    var spinner = new Spinner(opts).spin(target);

    var target = document.getElementById('SpinSubmit');
    var spinner = new Spinner(opts).spin(target);

    var target = document.getElementById('SpinProcess');
    var spinner = new Spinner(opts).spin(target);

    var target = document.getElementById('SpinDelete');
    var spinner = new Spinner(opts).spin(target);

  }
  
/* ************************************************ */
// var spinner = new Spinner().spin();
// target.appendChild(spinner.el);
/* ************************************************ */

/* ************************************************ */
/* ************************************************ */

function LoginVal()
{
    if( document.LoginForm.LoginUserName.value == "" )
   {
//     alert( "Please provide your UserName!" );
     document.LoginForm.LoginUserName.focus() ;
     return false;
   }
   if( document.LoginForm.LoginPassWord.value == "" )
   {
//     alert( "Please provide your PassWord!" );
     document.LoginForm.LoginPassWord.focus() ;
     return false;
   }
   LoginModalSpin();
   return ( true );
}


function ForgotPassWordVal()
{
    if( document.ForgotPassWordForm.ForgotPassWordEmailid.value == "" )
   {
//     alert( "Please provide your UserName!" );
     document.ForgotPassWordForm.ForgotPassWordEmailid.focus() ;
     return false;
   }
   return ( true );
}

/* ************************************************ */

/* ************************************************ */

$(document).ready(function() {

	$("#RegistrationForm").validate(
  {
		rules: 
    {
//			fullname: "required",
      FirstName: {
				required: true,
        maxlength: 20
      },
//      Mobile: "required",
			Emailid: {
				required: true,
				email: true,
        maxlength: 40
			},
			PassWord: {
				required: true,
				minlength: 4,
        maxlength: 20
			},
			Confirm: {
				required: true,
				minlength: 4,
        maxlength: 20,
				equalTo: "#PassWord"
			},
      defaultReal: {
				required: true
      }
		},
    
		messages: 
    {
			FirstName: "You cannot leave this Blank.",
//			Mobile: "Enter your Mobile No.",
			Emailid: "Enter a valid Email-ID.",
			PassWord: {
				required: "You cannot leave this Blank.",
//			  minlength: "Your PassWord must be at least 5 characters long"
        minlength: "Password must be at least 4 characters."
			},
			Confirm: {
				required: "You cannot leave this Blank.",
//				minlength: "Your PassWord must be at least 4 characters long",
//				minlength: "Confirm Password must be Min. 4 & Max. 20 characters.",
				minlength: "Password must be at least 4 characters.",
//				equalTo: "Please enter the same PassWord as above."
				equalTo: "Entered Passwords do not match."
			},
      defaultReal: {
//        required: "You can not leave this Blank."
        required: "* Required Field(s)."
      }
		},

    submitHandler: function(form) 
    { 
      $("input[type='submit']").attr("disabled", true).val("Registering, Please Wait...");

      $('#RegisteringSpinModal').modal('show');
      SpinStart();

      $form.submit();
    }

   });



/* ************************************************ */

	$("#ChangePassWordForm").validate({
		rules: {
			ChangePassWord: {
				required: true,
				minlength: 4,
        maxlength: 20
			},
			ConfirmChange: {
				required: true,
				minlength: 4,
        maxlength: 20,
				equalTo: "#ChangePassWord"
			}
		},
		messages: {
			ChangePassWord: {
				required: "You cannot leave this Blank.",
//			  minlength: "Your PassWord must be at least 4 characters long"
        minlength: "PassWord must be at least 4 characters."
			},
			ConfirmChange: {
				required: "You cannot leave this Blank.",
//				minlength: "Your PassWord must be at least 4 characters long",
				minlength: "Password must be at least 4 characters.",
//				equalTo: "Please enter the same PassWord as above."
				equalTo: "Entered Passwords do not match."
			}
		}
	});

/* ************************************************ */

	$("#UserDetailsForm").validate({
		rules: {
//			fullname: "required",
      FirstNameUD: {
				required: true,
        maxlength: 20
      },
//      mobile: "required",
			EmailidUD: {
				required: true,
				email: true,
        maxlength: 40
			}
		},
		messages: {
			FirstNameUD: "You cannot leave this Blank.",
//			mobile: "Enter your Mobile No.",
			EmailidUD: "Enter a valid Email-ID.",
		}
	});

  
});


/* ************************************************ */


$(document).ready(function() {

      $('#Mobile').keypress(function(key) {
        if (key.charCode < 48 || key.charCode > 57) 
          if (key.charCode != 13) return false;
      });

      $('#Emailid').keypress(function(key) {
        if (key.charCode == 32) return false;
      });

      $('#PassWord').keypress(function(key) {
        if (key.charCode == 32) return false;
      });

      $('#Confirm').keypress(function(key) {
        if (key.charCode == 32) return false;
      });
      
      $('#defaultReal').keypress(function(key) {
        if (key.charCode == 32) return false;
      });


/* ************************************************ */


      $('#LoginUserName').keypress(function(key) {
        if (key.charCode == 32) return false;
      });
      
      $('#LoginPassWord').keypress(function(key) {
        if (key.charCode == 32) return false;
      });
      
      $('#ForgotPassEmailid').keypress(function(key) {
        if (key.charCode == 32) return false;
      });


/* ************************************************ */

      $('#SalePostCPNumber').keypress(function(key) {
        if (key.charCode < 48 || key.charCode > 57) 
        if (key.charCode < 40 || key.charCode > 46) 
            if (key.charCode != 13) 
            if (key.charCode != 32) 
            return false;
      });

      $('#RentPostCPNumber').keypress(function(key) {
        if (key.charCode < 48 || key.charCode > 57) 
        if (key.charCode < 40 || key.charCode > 46) 
            if (key.charCode != 13) 
            if (key.charCode != 32) 
            return false;
      });


      $('#SaleEditCPNumber').keypress(function(key) {
        if (key.charCode < 48 || key.charCode > 57) 
        if (key.charCode < 40 || key.charCode > 46) 
            if (key.charCode != 13) 
            if (key.charCode != 32) 
            return false;
      });

      $('#RentEditCPNumber').keypress(function(key) {
        if (key.charCode < 48 || key.charCode > 57) 
        if (key.charCode < 40 || key.charCode > 46) 
            if (key.charCode != 13) 
            if (key.charCode != 32) 
            return false;
      });


});



/* ************************************************ */


/* ************************************************ */

/* ************************************************ */

/* ************************************************ */

var PostSaleSubmitted = 0;
function SalePostSubmitOnce() 
{
   if(!PostSaleSubmitted) 
   {
      PostSaleSubmitted ++;
      document.SalePostForm.SalePostSubmit.value = 'Posting, Please Wait...';
      $('#PostingSpinModal').modal('show');
      SpinStart();
      return true;
   }
   else {
      return false;
   }
}

/* ************************************************ */

var PostRentSubmitted = 0;
function RentPostSubmitOnce() 
{
   if(!PostRentSubmitted) 
   {
      PostRentSubmitted ++;
      document.RentPostForm.RentPostSubmit.value = 'Posting, Please Wait...';
      $('#PostingSpinModal').modal('show');
      SpinStart();
      return true;
   }
   else {
      return false;
   }
}

/* ************************************************ */

/* ************************************************ */

/* ************************************************ */

/* ************************************************ */

/* ************************************************ */



/* ************************************************ */


/* ************************************************ */

/* ************************************************ */


/* ************************************************ */


/* ************************************************ */


/* ************************************************ */


/*
  function SpinStart()
  {
  var opts = {
  lines: 20, // 20 The number of lines to draw 
  length: 20, // 50 The length of each line
  width: 10, // 10 The line thickness
  radius: 5, // 10 The radius of the inner circle
  rotate: 0, // 0 The rotation offset
  color: '#555', // #000 #rgb or #rrggbb
  speed: 1, // 1 Rounds per second
  trail: 50, // 60 Afterglow percentage
  shadow: true, // Whether to render a shadow
  hwaccel: false, // Whether to use hardware acceleration
  className: 'spinner', // The CSS class to assign to the spinner
  zIndex: 2e9, // The z-index (defaults to 2000000000)
  top: 'auto', // 'auto' Top position relative to parent in px
  left: 'auto' // 'auto' Left position relative to parent in px
  /*
  lines: 10, 
  length: 0, 
  width: 15, 
  radius: 5, 
  rotate: 0, 
  color: '#555', 
  speed: 1, 
  trail: 50, 
  shadow: true, 
  hwaccel: false, 
  className: 'spinner', 
  zIndex: 2e9, 
  top: 'auto', 
  left: 'auto' 
  */
  /*
  lines: 10, 
  length: 0, 
  width: 15, 
  radius: 5, 
  rotate: 0, 
  color: '#555', 
  speed: 1, 
  trail: 50, 
  shadow: true, 
  hwaccel: false, 
  className: 'spinner', 
  zIndex: 2e9, 
  top: 'auto', 
  left: 'auto' 
  */
  /*
  };
    var target = document.getElementById('spin');
    var spinner = new Spinner(opts).spin(target);
  }

  function SpinStop()
  {
    spinner.stop();  
  }

  function SpinReStart()
  {
    spinner.spin(target);  
  }

*/

/* ************************************************ */



/*

var RegisterFlag = 0;
function RegisterOnce() 
{
   if(!RegisterFlag) 
   {
      RegisterFlag ++;
      SpinStart();
      document.RegistrationForm.RegistrationFormSubmit.value = 'Registering, Please Wait...';
      return true;
   }
   else {
      return false;
   }
}

*/

/* ************************************************ */

    // onclick = "$('#ProcessingSpinModal').modal('show')"

/* ************************************************ */
/* ************************************************ */
/* ************************************************ */

/*
          if (key.charCode != 41) 
          if (key.charCode != 44) 
          if (key.charCode != 45) 

      $('#fullname').charLimit({limit: 40});
      $('#mobile').charLimit({limit: 10});
      $('#emailid').charLimit({limit: 40}); 
      $('#password').charLimit({limit: 20});
      $('#confirm').charLimit({limit: 20});
*/

/* ************************************************ */


/*
*/

/* ************************************************ */

  
/*
 
$("#RegistrationForm").validate({
  submitHandler: function(form) 
  {
   $("input[type='submit']").attr("disabled", true).val("Please wait...");
   form.submit();
 }
})

            $("input[type='submit']").click(function()
            {
                if($("#RegistrationForm").valid()==true)
                {
                    $("input[type='submit']").attr("disabled", true).val("Submitting, Please wait...");
                    $("#RegistrationForm").submit();
                }
                else
                {
                    $("input[type='submit']").attr("disabled", false);
                }
            });

*/

/*
<script type="text/javascript">
</script>
*/

/* ************************************************ */

