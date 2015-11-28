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
<!-- page hitung antld-->
<div data-role="page" id="page4" data-theme="b">
	<div data-role="header" data-position="fixed">
		<div data-role="navbar" data-iconpos="right">
			<ul>
				<li>
					<a href="index.php" data-icon="back" data-transition="slidedown">Kembali</a>
				</li>
				<li>
					<a href="#" data-icon="refresh" data-transition="none" onclick="eksekusi(),initialize2()">Segarkan Map</a>
				</li>
			</ul>
		</div>
		<!-- /navbar -->
	</div>
	<div data-role="content">
		<!-- /content -->
		<div class="ui-bar-a ui-corner-all ui-shadow" style="padding:1em;">
			<div id="map_canvas2" style="height:300px;"></div>
		</div>
		<h2>Waktu Keberangkatan</h2>
		<div class="containing-element">
		
			<div id="line"></div>
			
			<div class="ui-field-contain">
				<fieldset data-role="controlgroup">
					<legend>Pilih Rute :</legend>
					<input name="radio-choice-h-1" id="radio-choice-h-1a" value="pergi" checked="checked" type="radio">
					<label for="radio-choice-h-1a">Pergi</label>
					<input name="radio-choice-h-1" id="radio-choice-h-1b" value="pulang" type="radio">
					<label for="radio-choice-h-1b">Pulang</label>
				</fieldset>
			</div>
			
			<div id="line"></div>
			
			<div class="ui-field-contain">
			<fieldset data-role="controlgroup">
				<legend>Pilih Bus Sekolah :</legend>
					<input type="radio" name="radio-choice" id="radio-choice-1" value="1" checked="checked" />
					<label for="radio-choice-1">NOMOR POLISI D7611AD</label>

					<input type="radio" name="radio-choice" id="radio-choice-2" value="2"  />
					<label for="radio-choice-2">NOMOR POLISI D7604AO</label>

					<input type="radio" name="radio-choice" id="radio-choice-3" value="3"  />
					<label for="radio-choice-3">NOMOR POLISI D7606AO</label>

					<input type="radio" name="radio-choice" id="radio-choice-4" value="4"  />
					<label for="radio-choice-4">NOMOR POLISI D7608AO</label>
			</fieldset>
			</div>
			
			<div id="line"></div>
			
		</div>
		<p>
			<img src="img/start.png" class="resize"/> Titik Keberangkatan :
			<p id="keberangkatan" class="itemhitung"></p>
		</p>
		<div id="line"></div>
		<p>
			<img src="img/finish.png" class="resize"/> Tujuan Akhir :
			<p id="tujuanakhir" class="itemhitung"></p>
		</p>
		<div id="line"></div>
		<p>
			<img src="img/terdekat.png" class="resize"/> Titik terdekat dari lokasi kamu :
			<p id="terdekat" class="itemhitung"></p>
		</p>
		<div id="line"></div>
		<p>
			<img src="img/kecepatan.png" class="resize"/> jarak Bus ke lokasi terdekat :
			<p id="jarakbus" class="itemhitung"></p>
		</p>
		<div id="line"></div>
		<p>
			<img src="img/kecepatan.png" class="resize"/> Kecepatan Bus :
			<p id="kecepatan" class="itemhitung"></p>
		</p>
		<div id="line"></div>
		<p>
			<img src="img/kecepatan.png" class="resize"/> Waktu kedatangan Bus :
			<p id="waktu" class="itemhitung"></p>
		</p>
		<div id="line"></div>
		<p>
			<img src="img/kecepatan.png" class="resize"/> jarak Bus ke lokasi kamu :
			<p id="jarak" class="itemhitung"></p>
		</p>
		<div id="line"></div>
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