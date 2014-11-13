<?php
$base_url = $this->config->item('base_url');
?>	

<!DOCTYPE HTML>
<html>

<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Estadisticas InfoUtil</title>

		<script type="text/javascript" src="<?php echo $base_url;?>recursos/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
<script src="<?php echo $base_url;?>recursos/highcharts.js"></script>
<script src="<?php echo $base_url;?>recursos/modules/data.js"></script>
<script src="<?php echo $base_url;?>recursos/modules/drilldown.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>recursos/bootstrap/css/bootstrap.css" />

</head>


<body>
<div class="container">
	<div class="row">