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
	<title>Section Editor</title>

	<link type="text/css" href="../Shared/css/style.css" rel="stylesheet">
	<link type="text/css" href="../Shared/css/jquery-ui-1.10.4.min.css" rel="stylesheet">

	<script src="../Shared/js/jquery-1.11.0.min.js"></script>
	<script src="../Shared/js/jquery-ui-1.10.4.min.js"></script>
	<script src="../Shared/dugga.js"></script>
	<script src="diagram.js"></script>
	<script src="diagram_symbol.js"></script>
	<script src="diagram_figure.js"></script>
	 <script src="diagram_example.js"></script>

   <style>

   </style>

</head>
<!-- Reads the content from the js-files -->
<body onload="initcanvas(); Symbol();">

	<?php
		$noup="COURSE";
		include '../Shared/navheader.php';
	?>

	<!-- content START -->
	<div id="content">

	      <button onclick="classmode();">create class</button><button onclick="attrmode();">create attribute</button><br>
	      <canvas id="myCanvas" width="600" height="600" onmousemove="mousemoveevt(event,this);" onmousedown="mousedownevt(event);" onmouseup="mouseupevt(event);"></canvas>
	      <div id="consloe" style="position:fixed;left:0px;right:0px;bottom:0px;height:144px;background:#dfe;border:1px solid #284;z-index:5000;overflow:scroll;color:#4A6;font-family:lucida console;font-size:13px;">Application console</div>

	</div>
	<!-- content END -->

	<?php
		include '../Shared/loginbox.php';
	?>

</body>
</html>