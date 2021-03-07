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
.huge {
    font-size: 27px;
		font-weight: bold;
}
.sumTable {
border: 4px solid #eeee00;
}
</style>

	<!-- Page Heading -->

	<h3>
		&nbsp;
		<i class="fa fa-dashboard">&nbsp;&nbsp;</i>
		<b><i>NCS - SYSTEM Integration Team - Dashboard</i></b>
	</h3>

<!--
-->

	<hr style="border-color:#BBB;">

	<!-- /.row -->
	<div class="panel" style="background-color: rgb(240,248,255); border: 1px solid rgb(204, 204, 204);">
		<div class="panelHeader"
					style="border-bottom: 1px solid rgb(204, 204, 204);
									background-color: rgb(221, 216, 230); padding:5px;">
			<b>&nbsp; Summary of Programmability SIT Testcase details and Automation Coverage</b>
		</div>

		<div class="panelContent" style="background-color: #F0F8FF;">
			<div class='table-responsive'>
				<table width="100%">
					<tr>
						<th>Application</th>
						<th>MSDC1 Fretta Profile</th>
						<th>MSDC2 Fretta Profile</th>
						<th>MSDC2 Fretta Profile</th>
						<th>MSDC1 Fretta Profile</th>
						<th>L2L3 Fretta Profile</th>
						<th>VXLAN Fretta Profile</th>
						<th>MPLS Fretta Profile</th>
						<th>REDCASTLE Fretta Profile</th>
						<th>VXLAN N9K Profile</th>

						<th>MSDC2 Fretta Profile</th>
						<th>MSDC1 Fretta Profile</th>
						<th>L2L3 Fretta Profile</th>
						<th>VXLAN Fretta Profile</th>
						<th>MPLS Fretta Profile</th>
						<th>REDCASTLE Fretta Profile</th>
						<th>VXLAN N9K Profile</th>

						<th>Totals</th>
					</tr>

					<tr>
						<td></td>
						<td colspan="2"><B>GNMI SUBSCRIPTIONS</B></td>
						<td colspan="7"><B>REST DME Services</B></td>
						<td colspan="7"><B>NETCONF DEVICE YANG</B></td>
						<td></td>
					</tr>

					<tr>
						<td>Total Test Cases</td>
						<td class="sumTable"><?php echo "$row_summary_gnmi_msdc1[total]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_gnmi_msdc2[total]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest1[total]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest4[total]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest6[total]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest7[total]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest5[total]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest2[total]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest3[total]"; ?></td>

						<td class="sumTable"><?php echo "$row_summary_netconf_msdc2[total]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_netconf_msdc1[total]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_netconf_l2l3[total]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_netconf_vxlan_r[total]"; ?></td>
					 	<td class="sumTable"><?php echo "$row_summary_netconf_mpls[total]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_netconf_redcastle[total]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_netconf_vxlan[total]"; ?></td>


						<td><b><?php echo "$sum_test_totals[0]"; ?></b></td>
					</tr>

					<tr>
						<td>Total Testcases Automated </td>
						<td class="sumTable"><?php echo "$row_summary_gnmi_msdc1[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_gnmi_msdc2[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest1[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest4[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest6[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest7[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest5[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest2[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_rest3[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_netconf_msdc2[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_netconf_msdc1[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_netconf_l2l3[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_netconf_vxlan_r[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_netconf_mpls[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_netconf_redcastle[automated]"; ?></td>
						<td class="sumTable"><?php echo "$row_summary_netconf_vxlan[automated]"; ?></td>

						<td><b><?php echo "$sum_test_automated[0]"; ?></b></td
					</tr>
					<tr>
						<td>Percentage Automated</td>
						<td><?php echo "$row_summary_gnmi_msdc1[percent]"; ?>%</td>
						<td><?php echo "$row_summary_gnmi_msdc2[percent]"; ?>%</td>
						<td><?php echo "$row_summary_rest1[percent]"; ?>%</td>
						<td><?php echo "$row_summary_rest4[percent]"; ?>%</td>
						<td><?php echo "$row_summary_rest6[percent]"; ?>%</td>
						<td><?php echo "$row_summary_rest7[percent]"; ?>%</td>
						<td><?php echo "$row_summary_rest5[percent]"; ?>%</td>
						<td><?php echo "$row_summary_rest2[percent]"; ?>%</td>
						<td><?php echo "$row_summary_rest3[percent]"; ?>%</td>
						<td><?php echo "$row_summary_netconf_msdc2[percent]"; ?>%</td>
						<td><?php echo "$row_summary_netconf_msdc1[percent]"; ?>%</td>
						<td><?php echo "$row_summary_netconf_l2l3[percent]"; ?>%</td>
						<td><?php echo "$row_summary_netconf_vxlan_r[percent]"; ?>%</td>
						<td><?php echo "$row_summary_netconf_mpls[percent]"; ?>%</td>
						<td><?php echo "$row_summary_netconf_redcastle[percent]"; ?>%</td>
						<td><?php echo "$row_summary_netconf_vxlan[percent]"; ?>%</td>

						<td><b><?php echo "$summary_totals_percent"; ?>%</b></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<hr style="border-color:#BBB;">
<!--
-->
	<div class="row">

		<div class="col-lg-3 col-md-3">
			<div class="panel panel-green">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">GNMI SUB MSDC1 Profile</b>
						</div>
					</div>
				</div>
				<a href="tg21.php">
					<div class="panel-footer">
						<span class="pull-left huge"><?php echo "$row_summary_gnmi_msdc1[automated]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3">
			<div class="panel panel-yellow">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">GNMI SUB MSDC2 Profile</b>
						</div>
					</div>
				</div>
				<a href="tg20.php">
					<div class="panel-footer">
						<span class="pull-left huge"><?php echo "$row_summary_gnmi_msdc2[automated]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3">
			<div class="panel panel-yellow">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">REST MSDC2 Profile</b>
						</div>
					</div>
				</div>
				<a href="tg6.php">
					<div class="panel-footer">
						<span class="pull-left huge"><?php echo "$row_summary_rest1[automated]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">REST MSDC1 Profile</b>
						</div>
					</div>
				</div>
				<a href="tg14.php">
					<div class="panel-footer ">
						<span class="pull-left huge"><?php echo "$row_summary_rest4[automated]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-md-3">
			<div class="panel panel-red">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">REST REDCASTLE Profile</b>
						</div>
					</div>
				</div>
				<a href="tg8.php">
					<div class="panel-footer ">
						<span class="pull-left huge"><?php echo "$row_summary_rest2[automated]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-md-3">
			<div class="panel panel-green">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">REST VXLAN Fretta Profile</b>
						</div>
					</div>
				</div>
				<a href="tg9.php">
					<div class="panel-footer">
						<span class="pull-left huge"><?php echo "$row_summary_rest7[automated]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-md-3">
			<div class="panel panel-yellow">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">NETCONF MSDC2 Profile</b>
						</div>
					</div>
				</div>
				<a href="tg10.php">
					<div class="panel-footer">
						<span class="pull-left huge"><?php echo "$row_summary_netconf_msdc2[automated]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">NETCONF MSDC1 Profile</b>
						</div>
					</div>
				</div>
				<a href="tg15.php">
					<div class="panel-footer">
						<span class="pull-left huge"><?php echo "$row_summary_netconf_msdc1[automated]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-md-3">
			<div class="panel panel-red">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">NETCONF REDCASTLE Profile</b>
						</div>
					</div>
				</div>
				<a href="tg12.php">
					<div class="panel-footer">
						<span class="pull-left huge"><?php echo "$row_summary_netconf_redcastle[automated]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-md-3">
			<div class="panel panel-green">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">NETCONF VXLAN Fretta Profile</b>
						</div>
					</div>
				</div>
				<a href="tg13.php">
					<div class="panel-footer">
						<span class="pull-left huge"><?php echo "$row_summary_netconf_vxlan_r[automated]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>


		<div class="col-lg-3 col-md-3">
			<div class="panel panel-red">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">REST MPLS Profile</b>
						</div>
					</div>
				</div>
				<a href="tg17.php">
					<div class="panel-footer">
						<span class="pull-left huge"><?php echo "$row_summary_netconf_mpls[total]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-md-3">
			<div class="panel panel-red">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">NETCONF MPLS Profile</b>
						</div>
					</div>
				</div>
				<a href="tg16.php">
					<div class="panel-footer">
						<span class="pull-left huge"><?php echo "$row_summary_rest5[total]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">REST L2L3 Profile</b>
						</div>
					</div>
				</div>
				<a href="tg18.php">
					<div class="panel-footer">
						<span class="pull-left huge"><?php echo "$row_summary_rest6[total]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">NETCONF L2L3 Profile</b>
						</div>
					</div>
				</div>
				<a href="tg19.php">
					<div class="panel-footer">
						<span class="pull-left huge"><?php echo "$row_summary_netconf_l2l3[total]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3">
			<div class="panel panel-green">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 ">
							<b class="">L2L3 Profile</b>
						</div>
					</div>
				</div>
				<a href="tg3.php">
					<div class="panel-footer">
						<span class="pull-left huge"><?php echo "$row_summary_l2l3[automated]"; ?></span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-12 col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-9 ">
							<b class="">All Totals</b>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<span class="huge"><?php echo "$sum_test_totals[0]"; ?></span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	</div>

<!--
-->

	<hr style="border-color:#BBB;">

<!--
-->



		<div class="panel" style="background-color: rgb(240,248,255); border: 1px solid rgb(204, 204, 204);">
			<div class="panelHeader"
				style="border-bottom: 1px solid rgb(204, 204, 204); background-color: rgb(221, 216, 230); padding:5px;">
				<b>&nbsp; Detailed Info of the SIT QA Team Metrics for Automation Coverage</b>
			</div>

			<div class="panelContent" style="background-color: #F0F8FF;">
				<div class='table-responsive'>
					<table width="100%">
						<tr>
							<th>Breakdown</th>
							<th>MSDC-1</th>
							<th>MSDC-2</th>
							<th>L2L3</th>
							<th>VXLAN-R</th>
							<th>MPLS</th>
							<th>Redcastle</th>
							<th>VXLAN</th>
							<th>Totals</th>
						</tr>
						<tr>
							<td>Netconf Tests</td>
							<td><?php echo "$row_summary_netconf_msdc1[automated]"; ?></td>
							<td><?php echo "$row_summary_netconf_msdc2[automated]"; ?></td>
							<td><?php echo "$row_summary_netconf_l2l3[automated]"; ?></td>
							<td><?php echo "$row_summary_netconf_vxlan_r[automated]"; ?></td>
							<td><?php echo "$row_summary_netconf_mpls[automated]"; ?></td>
							<td><?php echo "$row_summary_netconf_redcastle[automated]"; ?></td>
							<td><?php echo "$row_summary_netconf_vxlan[automated]"; ?></td>
							<td>342</td>
						</tr>
						<tr>
							<td>REST API Tests</td>
							<td><?php echo "$row_summary_rest4[automated]"; ?></td>
							<td><?php echo "$row_summary_rest1[automated]"; ?></td>
							<td><?php echo "$row_summary_rest6[automated]"; ?></td>
							<td><?php echo "$row_summary_rest7[automated]"; ?></td>
							<td><?php echo "$row_summary_rest5[automated]"; ?></td>
							<td><?php echo "$row_summary_rest2[automated]"; ?></td>
							<td><?php echo "$row_summary_rest3[automated]"; ?></td>
							<td>583</td>
						</tr>
						<tr>
							<td>GNMI Subscription Tests</td>
							<td><?php echo "$row_summary_gnmi_msdc1[automated]"; ?></td>
							<td><?php echo "$row_summary_gnmi_msdc2[automated]"; ?></td>
							<td><?php echo "$row_summary_gnmi_l2l3[automated]"; ?></td>
							<td>TBD</td>
							<td>TBD</td>
							<td><?php echo "$row_summary_gnmi_redcastle[automated]"; ?></td>
							<td>TBD</td>
							<td>134</td>
						</tr>
						<tr>
							<td>Total Test Automated</td>
							<td>137</td>
							<td>140</td>
							<td>165</td>
							<td>90</td>
							<td>144</td>
							<td>165</td>
							<td>39</td>
							<td><?php echo "$sum_test_totals[0]"; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>



		<!-- /.row -->

		<br />


<!--
-->

<!--
-->
