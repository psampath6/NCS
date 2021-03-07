<?php
/*
** Copyright (c) 2021 NSD
**
** Name: index.php
**
** Author: Pradeep Sampath ( pradeepsampath@gmail.com )
**         Mar 2021
*/
?>

<style>
/* */

.dp-ico {
	color: #222 ; /* color: #BBB; */
	background-color: #EEE ; /* background-color: #222; */
	border-color: #CCC ; /* border-color: #222 ; */
	/* border-top-color: #333 ; */
	padding: 4px 17px 0px 17px ;
}
.dp-ico:hover {
}

/* */

.dp-inp {
	color: #222 ;  /* color: #BBB ; */
	background-color: #ddd ;  /* background-color: #222 ; */
	border-color: #CCC ; /* border-color: #333 ; */
	/* border-bottom-color: #222 ; */
	/* padding: 30px 0px 30px 10px ; */

}
.dp-inp:hover {
	color: Gold ;  /* color: #FFF ; */
	background-color: #444;  /* background-color: #000; */
}

.sbh {
 display: none;
}

/*
*/
</style>

<li style="margin: 9px 0px 9px 0px;">
	<div class="bootstrap-iso">
		<div class="container-fluid">
			<div class="row">
				<div class=""> <!-- col-md-4 col-sm-4 col-xs-8 -->
<!--
<br>
-->
					<!-- Form code begins -->
					<form id="formdp" name="formdp" method="post" action=".">
						<div class="input-group dp-cal" style="" >
							<span class="input-group-addon dp-ico" id="">
								<label class="control-label" for="date" style="cursor:pointer;" title="Pick a Date" >
									<i class="fa fa-calendar "></i></label>
							</span>
							<input class="form-control dp-inp" id="date" name="date" placeholder="YYYY-MM-DD"
											style="cursor:pointer;" size="22" type="text" title="Change the Date"
											value='<?php echo "$dte"; ?>' required />
						</div>
						<!-- Submit Button Hidden -->
						<div class="form-group0" style="padding0:2px 0px 3px 48px">
							<button class="btn btn-primary sbh" id="submit" name="submit" type="submit">Submit</button>
						</div>
					</form>
					<!-- Form code ends -->
<!--
<br>
-->
				</div>
			</div>
		</div>
	</div>
</li>


<!--
-->

<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		var options={
			autoclose: true,
			container: container,
			format: "yyyy-mm-dd",
			calendarWeeks: false,
			clearBtn: false,
			orientation: "auto",
			title: "",
			todayHighlight: true,
			weekStart: 0,
			zIndexOffset: 10,
		};
		date_input.datepicker(options);
	});
</script>

<script>
$(function() {
   $("#date").change(function() {
     $("#submit").click();
   });
 });
/*
*/
/*
$(document).ready(function(){
   $('#date').change(function(){
       $('#submit').click();
    });
});
*/
</script>

<!--
-->
