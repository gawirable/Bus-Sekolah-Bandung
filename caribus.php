<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&sensor=false&language=en"></script>
<script type="text/javascript" src="scripts/downloadxml.js"></script>
<script type="text/javascript" src="scripts/globalvariable.js"></script>
<script type="text/javascript" src="scripts/caribus.js"></script>
<script type="text/javascript" src="scripts/waktudatang.js"></script>
<script type="text/javascript" src="scripts/waktudatang2.js"></script>
<link rel="stylesheet" href="css/style.css">
<title>Bus Sekolah Bandung - Beta Version</title>
</head>
<body>
<!-- page tracking -->
<div data-role="page" id="page2" data-theme="b">
	<div data-role="header" data-position="fixed">
		<div data-role="navbar" data-iconpos="right">
			<ul>
				<li>
					<a href="index.php" data-icon="back" data-transition="slidedown">Kembali</a>
				</li>
				<li>
					<a href="#" data-icon="refresh" data-transition="none" onclick="eksekusi(),initialize()">Segarkan Map</a>
				</li>
			</ul>
		</div>
		<!-- /navbar -->
	</div>
	<div data-role="content">
		<!-- /content -->
		<div class="ui-bar-a ui-corner-all ui-shadow" style="padding:1em;">
			<div id="map_canvas" style="height:300px;"></div>
		</div>
		
	</div>
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li>
					<a href="http://www.twitter.com/gawirable"><div id="ruteinfo">Copyleft 2015 Bus Sekolah Bandung</div></a>
				</li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>