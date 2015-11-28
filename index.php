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
<!-- page home -->
<div data-role="page" id="page1" data-theme="b">
	<div data-role="header" data-position="fixed">
		<div data-role="navbar" data-iconpos="right">
			<ul>
				<li>
					<a href="informasi.php" class="ui-btn ui-icon-info ui-btn-icon-left" data-transition="slideup">Informasi</a>
				</li>
			</ul>
		</div>
		<!-- /navbar -->
	</div>
	<div data-role="content">
		<img id="logo" src="img/24.png"/>
		<a href="caribus.php" data-role="button" data-transition="slideup" class="ui-btn ui-btn-corner-all ui-icon-location ui-btn-icon-left">Cari Bus Sekolah</a>
		<a href="pilbus.php" data-role="button" data-transition="slideup" class="ui-btn ui-btn-corner-all ui-icon-clock ui-btn-icon-left">Waktu Kedatangan</a>
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