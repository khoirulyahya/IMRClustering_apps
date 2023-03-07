<!-- Tabel dan bentukdiabwah ini HANYA sekedar untuk mempermudah dalam memparing XML menjadi bentuk koordinat
Database:googlemap
Tabel : daerah
-------------------------------------------------------------------------------------------------
id 			kelurahan			polygon
1 			Sawahan 			110.7333800006875,-7.517679998932008+110.733310000157....

Hasil xml (dihasilkan oleh pembangkit_xml_polygon.php)
------------------------------------------------------------------------------------------------- -->
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalabel=no" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>PHP/MySQL & Google Maps Example</title>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG7FscIk67I9yY_fiyLc7-_1Aoyerf96E&callback=initialize"></script>
	<script type="text/javascript">
		function load()	{

			var peta = new google.maps.Map(document.getElementById("petaKu"), { 
				center : new google.maps.LatLng(-7.5053416253105905, 110.76390962308929),
				zoom : 13,
				mapTypeId : 'roadmap'
			});

			var infoWindow = new google.maps.InfoWindow;
			//
			//Sesuaikan dengan nama dari file php anda
			downloadUrl("pembangkit_xml_polygon.php", function(data) {
				var xml = data.responseXML;
				var ujung = xml.documentElement.getElementsByTagName("titik");
				var ruteKu = new Array();
				for (var i = 0; i < ujung.length; i++)	{
					ruteKu[i] = new google.maps.LatLng(
						parseFloat(ujung[i].getAttribute("lintang")),
						parseFloat(ujung[i].getAttribute("bujur"))
						);
				} //end for i
				//buat poligon dari titik marker
				var lintasan=new google.maps.Polygon({
					path:ruteKu,
					strokeColor:"#0000FF",
					strokeOpacity:0.8,
					strokeWeight:2,
					fillColor:"#0000FF",
					fillOpacity:0.4
				});
				lintasan.setMap(peta);
				//end polygon
			}); //end download function

			var peta = new google.maps.Map(document.getElementById("petaKu"), {
				center: new google.maps.LatLng(-7.811430, 110.41502),
				zoom : 13,
				mapTypeId : 'roadmap'
			});
		} //end load

		function downloadUrl (url, callback) {
			var jaluk =window.ActiveXObject ?
			new ActiveXObject('Microsoft.XMLHTTP'): new XMLHttpRequest;

			jaluk .onreadystatechange = function()	{
				if (jaluk .readyState == 4) {
					jaluk .onreadystatechange = doNothing;
					callback(jaluk, jaluk.status);
				}
			};
			jaluk .open('GET', url, true);
			jaluk .send(null);
		}

		function doNothing() {}
	</script>
</head>
<body onload="load()">
	<div id="petaKu" style="width: 800px; height:600px"></div>
</body>
</html>