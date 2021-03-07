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

<?php
?>

	<li style="border-top:1px solid #333; " >
		<a data-toggle="collapse" data-target="#demovm2" style="cursor:pointer;" >
		<i class="fa fa-fw fa-arrows-v"></i> DISPLAY_MEDIA <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="demovm2" class="collapse">

			<li>
				<form name="form-alchemy" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_alchemy[build]";?>' />
					<input type="hidden" name="app" value='ALCHEMY' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-alchemy'].submit();" style="cursor:pointer;" >
				Alchemy</a>
			</li>


			<li>
				<form name="form-cobalt-api" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_cobalt_api[build]";?>' />
					<input type="hidden" name="app" value='COBALT_API' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-cobalt-api'].submit();" style="cursor:pointer;" >
				Cobalt API</a>
			</li>

			<li>
				<form name="form-cobalt-ui" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_cobalt_ui[build]";?>' />
					<input type="hidden" name="app" value='COBALT_UI' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-cobalt-ui'].submit();" style="cursor:pointer;" >
				Cobalt UI</a>
			</li>

			<li>
				<form name="form-pub-admin" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_pub_admin[build]";?>' />
					<input type="hidden" name="app" value='PUB_ADMIN' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-pub-admin'].submit();" style="cursor:pointer;" >
				Pub Admin</a>
			</li>

			<li>
				<form name="form-pub-ui" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_pub_ui[build]";?>' />
					<input type="hidden" name="app" value='PUB_UI' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-pub-ui'].submit();" style="cursor:pointer;" >
				Pub UI</a>
			</li>


			<li>
				<form name="form-tag-manager" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_tag_manager[build]";?>' />
					<input type="hidden" name="app" value='TAG_MANAGER' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-tag-manager'].submit();" style="cursor:pointer;" >
				Tag Manager</a>
			</li>

			<li>
				<form name="form-cvus" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_video_cvus[build]";?>' />
					<input type="hidden" name="app" value='CVUS' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-cvus'].submit();" style="cursor:pointer;" >
				Creative Video Upload Ser.</a>
			</li>

			<li>
				<form name="form-pvs" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_video_pvs[build]";?>' />
					<input type="hidden" name="app" value='PVS' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-pvs'].submit();" style="cursor:pointer;" >
				Personalised Video Ser.</a>
			</li>

			<li>
				<form name="form-vbox" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_video_vbox[build]";?>' />
					<input type="hidden" name="app" value='VBOX' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-vbox'].submit();" style="cursor:pointer;" >
				VBOX</a>
			</li>

		</ul>
	</li>



<!--
<style>
</style>
-->
<!--
-->

<?php
/*
*/
?>
