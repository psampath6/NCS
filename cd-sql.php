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
/*
*/
	if (isset($_POST['date']))
	{
		$dte = $_POST['date'];
	}
	else
	if (isset($_POST['dte']))
	{
		$dte = $_POST['dte'];
	}
	else
	{
		$dte = date('Y-m-d');
	}
?>

<?php
// Display - Direct
$result_display_advantage = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'ADVANTAGE' ORDER BY start DESC");
$row_display_advantage = mysqli_fetch_array($result_display_advantage);

$result_display_cap = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'CAP' ORDER BY start DESC");
$row_display_cap = mysqli_fetch_array($result_display_cap);

$result_display_ctt = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'CTT' ORDER BY start DESC");
$row_display_ctt = mysqli_fetch_array($result_display_ctt);

$result_display_extranet = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'EXTRANET' ORDER BY start DESC");
$row_display_extranet = mysqli_fetch_array($result_display_extranet);

$result_display_guardian3 = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'GUARDIAN3' ORDER BY start DESC");
$row_display_guardian3 = mysqli_fetch_array($result_display_guardian3);

$result_display_zisa = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'ZISA' ORDER BY start DESC");
$row_display_zisa = mysqli_fetch_array($result_display_zisa);

$result_mobile_direct = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'MOBILE' && application = 'MOBILE_DIRECT' ORDER BY start DESC");
$row_mobile_direct = mysqli_fetch_array($result_mobile_direct);

$result_display_workbench = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'WORKBENCH' ORDER BY start DESC");
$row_display_workbench = mysqli_fetch_array($result_display_workbench);
//

// Display - Media
$result_display_alchemy = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'ALCHEMY' ORDER BY start DESC");
$row_display_alchemy = mysqli_fetch_array($result_display_alchemy) ;

$result_display_cobalt_api = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'COBALT_API' ORDER BY start DESC");
$row_display_cobalt_api = mysqli_fetch_array($result_display_cobalt_api) ;

$result_display_cobalt_ui = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'COBALT_UI' ORDER BY start DESC");
$row_display_cobalt_ui = mysqli_fetch_array($result_display_cobalt_ui) ;

$result_display_pub_admin = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'PUB_ADMIN' ORDER BY start DESC");
$row_display_pub_admin = mysqli_fetch_array($result_display_pub_admin) ;

$result_display_pub_ui = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'PUB_UI' ORDER BY start DESC");
$row_display_pub_ui = mysqli_fetch_array($result_display_pub_ui) ;

$result_display_tag_manager = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'TAG_MANAGER' ORDER BY start DESC");
$row_display_tag_manager = mysqli_fetch_array($result_display_tag_manager) ;

$result_video_cvus = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'VIDEO' && application = 'CVUS' ORDER BY start DESC");
$row_video_cvus = mysqli_fetch_array($result_video_cvus) ;

$result_video_pvs = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'VIDEO' && application = 'PVS' ORDER BY start DESC");
$row_video_pvs = mysqli_fetch_array($result_video_pvs) ;

$result_video_vbox = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'VIDEO' && application = 'VBOX' ORDER BY start DESC");
$row_video_vbox = mysqli_fetch_array($result_video_vbox) ;
//

// Media Plex
$result_display_adserver = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'ADSERVER' ORDER BY start DESC");
$row_display_adserver = mysqli_fetch_array($result_display_adserver) ;

$result_display_adserver_ui = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'ADSERVER_UI' ORDER BY start DESC");
$row_display_adserver_ui = mysqli_fetch_array($result_display_adserver_ui) ;

$result_video_contextual = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'VIDEO' && application = 'CONTEXTUAL' ORDER BY start DESC");
$row_video_contextual = mysqli_fetch_array($result_video_contextual) ;

$result_video_contextual = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'VIDEO' && application = 'CONTEXTUAL' ORDER BY start DESC");
$row_video_contextual = mysqli_fetch_array($result_video_contextual) ;

$result_display_forecast = mysqli_query($dbc,
"SELECT * FROM builds WHERE platform = 'FRETTA' && application = 'FORECAST' ORDER BY start DESC");
$row_display_forecast = mysqli_fetch_array($result_display_forecast) ;
//

// Summary Table
$result_summary_gnmi_msdc1 = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'GNMI-MSDC1' ");
$row_summary_gnmi_msdc1 = mysqli_fetch_array($result_summary_gnmi_msdc1) ;

$result_summary_gnmi_msdc2 = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'GNMI-MSDC2' ");
$row_summary_gnmi_msdc2 = mysqli_fetch_array($result_summary_gnmi_msdc2) ;

$result_summary_gnmi_l2l3 = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'GNMI-L2L3' ");
$row_summary_gnmi_l2l3 = mysqli_fetch_array($result_summary_gnmi_l2l3) ;

$result_summary_gnmi_redcastle = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'GNMI-REDCASTLE' ");
$row_summary_gnmi_redcastle = mysqli_fetch_array($result_summary_gnmi_redcastle) ;

$result_summary_netconf_msdc1 = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'NETCONF-MSDC1' ");
$row_summary_netconf_msdc1 = mysqli_fetch_array($result_summary_netconf_msdc1) ;

$result_summary_netconf_msdc2 = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'NETCONF-MSDC2' ");
$row_summary_netconf_msdc2 = mysqli_fetch_array($result_summary_netconf_msdc2) ;

$result_summary_netconf_mpls = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'NETCONF-MPLS' ");
$row_summary_netconf_mpls = mysqli_fetch_array($result_summary_netconf_mpls) ;

$result_summary_netconf_l2l3 = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'NETCONF-L2L3' ");
$row_summary_netconf_l2l3 = mysqli_fetch_array($result_summary_netconf_l2l3) ;

$result_summary_netconf_vxlan_r = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'NETCONF-VXLAN-R' ");
$row_summary_netconf_vxlan_r = mysqli_fetch_array($result_summary_netconf_vxlan_r) ;

$result_summary_netconf_redcastle = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'NETCONF-REDCASTLE' ");
$row_summary_netconf_redcastle = mysqli_fetch_array($result_summary_netconf_redcastle) ;

$result_summary_netconf_vxlan = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'NETCONF-VXLAN' ");
$row_summary_netconf_vxlan = mysqli_fetch_array($result_summary_netconf_vxlan) ;

$result_summary_rest = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'REST-MSDC2' ");
$row_summary_rest1 = mysqli_fetch_array($result_summary_rest) ;

$result_summary_rest = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'REST-REDCASTLE' ");
$row_summary_rest2 = mysqli_fetch_array($result_summary_rest) ;
$result_summary_rest = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'REST-VXLAN' ");
$row_summary_rest3 = mysqli_fetch_array($result_summary_rest) ;
$result_summary_rest = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'REST-MSDC1' ");
$row_summary_rest4 = mysqli_fetch_array($result_summary_rest) ;
$result_summary_rest = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'REST-MPLS' ");
$row_summary_rest5 = mysqli_fetch_array($result_summary_rest) ;

$result_summary_rest6 = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'REST-L2L3' ");
$row_summary_rest6 = mysqli_fetch_array($result_summary_rest6) ;

$result_summary_rest7 = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'REST-VXLAN-R' ");
$row_summary_rest7 = mysqli_fetch_array($result_summary_rest7) ;

$result_summary_l2l3 = mysqli_query($dbc, "SELECT * FROM summary WHERE application = 'L2L3' ");
$row_summary_l2l3 = mysqli_fetch_array($result_summary_l2l3) ;
//

// Summation
$summary_test_totals = mysqli_query($dbc, "SELECT SUM(total) FROM summary ");
$sum_test_totals = mysqli_fetch_row($summary_test_totals);

$summary_test_automated = mysqli_query($dbc, "SELECT SUM(automated) FROM summary ");
$sum_test_automated = mysqli_fetch_row($summary_test_automated);

$summary_test_percent = mysqli_query($dbc, "SELECT SUM(percent) FROM summary ");
$sum_test_percent = mysqli_fetch_row($summary_test_percent);

//  commented because we have 0 records $summary_totals_percent = $sum_test_automated[0] / $sum_test_totals[0] * 100 ;
$summary_totals_percent = 0 ;
$summary_totals_percent = round($summary_totals_percent);
//

// Detailed Table
$detailed_smoke_alchemy = mysqli_query($dbc, "SELECT automated FROM detailed WHERE application = 'ALCHEMY' && type = 'Smoke'");
$smoke_alchemy = mysqli_fetch_row($detailed_smoke_alchemy) ;
$detailed_regression_alchemy = mysqli_query($dbc, "SELECT automated FROM detailed WHERE application = 'ALCHEMY' && type = 'Regression' ");
$regression_alchemy = mysqli_fetch_row($detailed_regression_alchemy) ;
$detailed_api_alchemy = mysqli_query($dbc, "SELECT automated FROM detailed WHERE application = 'ALCHEMY' && type = 'API' ");
$api_alchemy = mysqli_fetch_row($detailed_api_alchemy) ;
$detailed_automated_alchemy = mysqli_query($dbc, "SELECT SUM(automated) FROM detailed WHERE application = 'ALCHEMY' ");
$automated_alchemy = mysqli_fetch_row($detailed_automated_alchemy) ;

$detailed_smoke_zisa = mysqli_query($dbc, "SELECT automated FROM detailed WHERE application = 'ZISA' && type = 'Smoke'");
$smoke_zisa = mysqli_fetch_row($detailed_smoke_zisa) ;
$detailed_api_zisa = mysqli_query($dbc, "SELECT automated FROM detailed WHERE application = 'ZISA' && type = 'API' ");
$api_zisa = mysqli_fetch_row($detailed_api_zisa) ;
$detailed_automated_zisa = mysqli_query($dbc, "SELECT SUM(automated) FROM detailed WHERE application = 'ZISA' ");
$automated_zisa = mysqli_fetch_row($detailed_automated_zisa) ;

$detailed_smoke_cap = mysqli_query($dbc, "SELECT automated FROM detailed WHERE application = 'CAP' && type = 'Smoke'");
$smoke_cap = mysqli_fetch_row($detailed_smoke_cap) ;
$detailed_automated_cap = mysqli_query($dbc, "SELECT SUM(automated) FROM detailed WHERE application = 'CAP' ");
$automated_cap = mysqli_fetch_row($detailed_automated_cap) ;

$detailed_smoke_cobalt = mysqli_query($dbc, "SELECT automated FROM detailed WHERE application = 'COBALT' && type = 'Smoke'");
$smoke_cobalt = mysqli_fetch_row($detailed_smoke_cobalt) ;
$detailed_regression_cobalt = mysqli_query($dbc, "SELECT automated FROM detailed WHERE application = 'COBALT' && type = 'Regression' ");
$regression_cobalt = mysqli_fetch_row($detailed_regression_cobalt) ;
$detailed_api_cobalt = mysqli_query($dbc, "SELECT automated FROM detailed WHERE application = 'COBALT' && type = 'API' ");
$api_cobalt = mysqli_fetch_row($detailed_api_cobalt) ;
$detailed_automated_cobalt = mysqli_query($dbc, "SELECT SUM(automated) FROM detailed WHERE application = 'COBALT' ");
$automated_cobalt = mysqli_fetch_row($detailed_automated_cobalt) ;

$detailed_smoke_ctm = mysqli_query($dbc, "SELECT automated FROM detailed WHERE application = 'CTM' && type = 'Smoke'");
$smoke_ctm = mysqli_fetch_row($detailed_smoke_ctm) ;
$detailed_automated_ctm = mysqli_query($dbc, "SELECT SUM(automated) FROM detailed WHERE application = 'CTM' ");
$automated_ctm = mysqli_fetch_row($detailed_automated_ctm) ;

$detailed_regression_guardian = mysqli_query($dbc, "SELECT automated FROM detailed WHERE application = 'GUARDIAN3' && type = 'Regression'");
$regression_guardian = mysqli_fetch_row($detailed_regression_guardian) ;
$detailed_automated_guardian = mysqli_query($dbc, "SELECT SUM(automated) FROM detailed WHERE application = 'GUARDIAN3' ");
$automated_guardian = mysqli_fetch_row($detailed_automated_guardian) ;

$detailed_api_forecast = mysqli_query($dbc, "SELECT automated FROM detailed WHERE application = 'FORECAST' && type = 'API' ");
$api_forecast = mysqli_fetch_row($detailed_api_forecast) ;

/*
*/
?>
