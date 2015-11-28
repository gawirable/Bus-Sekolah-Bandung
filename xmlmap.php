<!--<meta http-equiv="refresh" content="10"> -->
<html>
    <head>
        <title>Generate XML File</title>
    </head>
    <body>
    <?php
	$kmph = rand(1, 100);
	echo $kmph;


 				// Resources
 				$arr_url = array(
'http://www.id-gpstracker.com/webservice/tracknow.asmx/getDeviceLastPosition?APIKey=2243a9fcdca0f45232fb0f94d99c5a2d&TE_UID=358899052319129', 'http://www.id-gpstracker.com/webservice/tracknow.asmx/getDeviceLastPosition?APIKey=2243a9fcdca0f45232fb0f94d99c5a2d&TE_UID=358899052309294','http://www.id-gpstracker.com/webservice/tracknow.asmx/getDeviceLastPosition?APIKey=2243a9fcdca0f45232fb0f94d99c5a2d&TE_UID=358899052317701','http://www.id-gpstracker.com/webservice/tracknow.asmx/getDeviceLastPosition?APIKey=2243a9fcdca0f45232fb0f94d99c5a2d&TE_UID=13949006950920','http://www.id-gpstracker.com/webservice/tracknow.asmx/getDeviceLastPosition?APIKey=2243a9fcdca0f45232fb0f94d99c5a2d&TE_UID=13949006571593','http://www.id-gpstracker.com/webservice/tracknow.asmx/getDeviceLastPosition?APIKey=2243a9fcdca0f45232fb0f94d99c5a2d&TE_UID=13949006957560','http://www.id-gpstracker.com/webservice/tracknow.asmx/getDeviceLastPosition?APIKey=2243a9fcdca0f45232fb0f94d99c5a2d&TE_UID=358899052361220','http://www.id-gpstracker.com/webservice/tracknow.asmx/getDeviceLastPosition?APIKey=2243a9fcdca0f45232fb0f94d99c5a2d&TE_UID=13949006564044');
                
                // Mengambil Data String dari Resources
				$document = new DOMDocument();
				$root = $document->createElement( "DATA" );
				$document->appendChild( $root );
								
				foreach($arr_url as $key => $url)
				{
                $client = curl_init($url);
                curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec($client);
                curl_close($client);
 
                $xml = simplexml_load_string($response);
 				$dl = $xml->children();
				
				$arr_id = array();
				$arr_state = array();
				$arr_time = array();
				$arr_datetime = array();
				$arr_long = array();
				$arr_lat = array();
				$arr_speed = array();
				$arr_direction = array();
				$arr_mileage = array();
				$arr_carstate = array();
				$arr_alarmstate = array();
				$arr_testate = array();
				$arr_nopol = array(
				'D7616AO',
				'D7611AD',
				'D7604AO',
				'D7606AO',
				'D7608AO',
				'D7612AO',
				'D7615AO',
				'D7607AO');
				
				
				$arr_id[$key]= $dl->TE_UID;
				$arr_state[$key]= $dl->GPS_State;
				$arr_time[$key]= $dl->GPS_Time;
				$arr_datetime[$key]= $dl->GPS_DateTime;
				$arr_long[$key]= $dl->GPS_Longitude;
				$arr_lat[$key]= $dl->GPS_Latitude;
				$arr_speed[$key]= $dl->GPS_Speed;
				$arr_direction[$key]= $dl->GPS_Direction;
				$arr_mileage[$key]= $dl->GPS_Mileage;
				$arr_carstate[$key]= $dl->GPS_CarState;
				$arr_alarm[$key]= $dl->GPS_AlarmState;
				$arr_testate[$key]= $dl->GPS_TEState;
				
						//XML GENERATE	ELEMENT	
						$blok = $document->createElement('BUS');
						$blok->setAttribute("id",$arr_id[$key]);
						$blok->setAttribute("state",$arr_state[$key]);
						$blok->setAttribute("time",$arr_time[$key]);
						$blok->setAttribute("datetime",$arr_datetime[$key]);
						$blok->setAttribute("lat",$arr_lat[$key]);
						$blok->setAttribute("long",$arr_long[$key]);
						$blok->setAttribute("nopol",$arr_nopol[$key]);
						$blok->setAttribute("kecepatan",$arr_speed[$key]);
						
						$root->appendChild( $blok );
						
				}
						$document->save("bussekolah.xml");
						
		
    ?>

    </body>
</html>