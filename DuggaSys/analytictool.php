<?php
session_start();
include_once "../../coursesyspw.php";
include_once "../Shared/sessions.php";
pdoConnect();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/ico" href="../Shared/icons/favicon.ico"/>
	<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Analytic Tool</title>

	<link type="text/css" href="../Shared/css/style.css" rel="stylesheet">
	<link type="text/css" href="../Shared/css/responsive.css" rel="stylesheet">
	<link type="text/css" href="../Shared/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
	
	<script src="../Shared/js/jquery-1.11.0.min.js"></script>
	<script src="../Shared/js/jquery-ui-1.10.4.min.js"></script>
	<script src="../Shared/dugga.js"></script>
	<script src="analytictool.js"></script>
</head>
<body>

<?php

	include '../Shared/navheader.php';

	
	// Show analytics if user is superuser.
	if(isset($_SESSION["superuser"]) && $_SESSION["superuser"] == 1){
?>
	<!-- content START -->
	<div id="content">
		<div class="analytic-buttons">
			<input class="submit-button" style="float:left" type="button" value="General stats" onclick="loadGeneralStats()">
			<input class="submit-button" style="float:left" type="button" value="Password guessing" onclick="loadPasswordGuessing()">
			<input class="submit-button" style="float:left" type="button" value="OS Percentage" onclick="loadOsPercentage()">
			<input class="submit-button" style="float:left" type="button" value="Browser percentage" onclick="loadBrowserPercentage()">
			<input class="submit-button" style="float:left" type="button" value="Service usage" onclick="loadServiceUsage()">
			<input class="submit-button" style="float:left" type="button" value="Service speed" onclick="loadServiceAvgDuration()">
			<input class="submit-button" style="float:left" type="button" value="Service crashes" onclick="loadServiceCrashes()">
		</div>
		<div id="analytic-data" style="clear: both; padding: 15px;">
			
		</div>
		<div>
			<canvas id="analytic-chart"></canvas>
		</div>
	</div>
	<!-- content END -->
	
<?php
	}	
	else{
		header('Location: courseed.php');
	}
?>