var nama_lokasi = [];
// var kecamatan = [];
// var keterangan = [];
// var kelurahan = [];
// var status_lokasi = [];
var lokasi = [];
var cluster = [];
var cords = '';
var area = [];
var infoWindow;
var jukehi = [];
var jukeba = [];
var jukebb = [];
var jukepre = [];
var jukekp = [];

// function peta_awal(){
	
// }

$(document).ready(function(){
    var ngemplak = new google.maps.LatLng(-7.508700172146749, 110.76398385936673);
    var petaoption = {
        zoom: 13.5,
        center: ngemplak,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
        
    peta = new google.maps.Map(document.getElementById("map-canvas"),petaoption);

    url = "ambildata.php";
    $.ajax({
        url: 'ambildata.php',
        dataType: "json",
        cache: false,
        success: function(msg){
            console.log(msg)
            var polygon;
            var cords = [];
            for(i=0;i<msg.ngemplak.lahan.length;i++){ //looping
                nama_lokasi[i] = msg.ngemplak.lahan[i].nama_lokasi;
                jukehi[i] = msg.ngemplak.lahan[i].jukehi;
                jukeba[i] = msg.ngemplak.lahan[i].jukeba;
                jukebb[i] = msg.ngemplak.lahan[i].jukebb;
                jukepre[i] = msg.ngemplak.lahan[i].jukepre;
                jukekp[i] = msg.ngemplak.lahan[i].jukekp;
                cluster[i] = msg.ngemplak.lahan[i].cluster;
                lokasi[i] = msg.ngemplak.lahan[i].polygon; //wadah db polygon
               
                var str = lokasi[i].split("+"); //pemisah sepasang koordinat lat long adalah tanda +
                
                for (var j=0; j < str.length; j++) { //looping
                    var point = str[j].split(","); //pemisah antara lat long adalah tanda ,
                    var poiny = str[j].split(","); //pemisah antara lat long adalah tanda ,
                    cords.push(new google.maps.LatLng(parseFloat(poiny[1]), parseFloat(point[0])));
                }

                var contentString = '<b>'+'Desa '+nama_lokasi[i]+'</b><br>'+
                'Jumlah Kelahiran Hidup : '+ jukehi[i] +'<br>'
                +'Jumlah Kematian Bayi : '+ jukeba[i] +'<br>'
                +'Jumlah Kasus BBLR : '+ jukebb[i] +'<br>'
                +'Jumlah Kasus Premature : '+ jukepre[i] +'<br>'
                +'Jumlah Kasus Komplikasi Persalinan : '+ jukekp[i] +'<br><b>'
                +'Status Cluster : '+ cluster[i] +'</b><br>';
                //pengaturan warna dan polygon 
                polygon = new google.maps.Polygon({
                    paths: [cords], //cords adalah var penyatu semua lat long
                    strokeColor: '#ffffff',
                    strokeOpacity: 1,
                    strokeWeight: 1,
                    fillColor: msg.ngemplak.lahan[i].warna,
                    fillOpacity: 0.8,
                    html: contentString
                });     

                cords = []; 
                polygon.setMap(peta); 
                infoWindow = new google.maps.InfoWindow();
                google.maps.event.addListener(polygon, 'click', function(event) {
                    infoWindow.setContent(this.html);
                    infoWindow.setPosition(event.latLng);
                    infoWindow.open(peta);
                });
            }               
        }, error: function(data){ 

   console.log(data.responseText);
}
    });
});


 // $("#search").click(function(){
 //        var kecamatan  = $("#kecamatan").val();
 //        var status     = $("#status").val();
 //        $.ajax({
 //            url: "caripeta.php",
 //            data: "kecamatan="+kecamatan+"&status="+status,
 //            dataType: 'json',
 //            cache: false,
 //            success: function(msg) {
 //                var karawang2 = new google.maps.LatLng(-7.3922546,110.8220526);
 //                var petaoption2 = {
 //                    zoom: 11,
 //                    center: karawang2,
 //                    mapTypeId: google.maps.MapTypeId.ROADMAP
 //                };

 //                var peta2 = new google.maps.Map(document.getElementById("map-canvas"),petaoption2);

 //                var polygon;
 //                var cords = [];
 //                for(i=0;i<msg.karawang1.lahan.length;i++){
 //                nama_lokasi[i] = msg.karawang1.lahan[i].nama_lokasi;
 //                kecamatan[i] = msg.karawang1.lahan[i].kecamatan;
 //                kelurahan[i] = msg.karawang1.lahan[i].kelurahan;
 //                keterangan[i] = msg.karawang1.lahan[i].keterangan;
 //                status_lokasi[i] = msg.karawang1.lahan[i].status_lokasi;
 //                lokasi[i] = msg.karawang1.lahan[i].polygon;
               
 //                var str = lokasi[i].split("+"); 
                    
 //                    for (var j=0; j < str.length; j++) { 
 //                        var point = str[j].split(",");
 //                        cords.push(new google.maps.LatLng(parseFloat(point[0]), parseFloat(point[1])));
 //                    }

 //                    var contentString1 = '<b>'+nama_lokasi[i]+'</b><br>' +
 //                                    'Kecamatan: '+ kecamatan[i] +
 //                                    '<br>' +
 //                                    'Keterangan: '+ keterangan[i] +
 //                                    '<br>' +
 //                                    'Kelurahan: '+ kelurahan[i] +
 //                                    '<br>' +
 //                                    'Status: '+ status_lokasi[i] +
 //                                    '<br>';
                                        
 //                    polygon = new google.maps.Polygon({
 //                        paths: [cords],
 //                        strokeColor: msg.karawang1.lahan[i].warna,
 //                        strokeOpacity: 0.2,
 //                        strokeWeight: 1,
 //                        fillColor: msg.karawang1.lahan[i].warna,
 //                        fillOpacity: 0.5,
 //                        html: contentString1
 //                    });     

 //                    cords = [];

 //                    polygon.setMap(peta2); 
 //                    google.maps.event.addListener(polygon, 'click', function(event) {
 //                        infoWindow.setContent(this.html);
 //                        infoWindow.setPosition(event.latLng);
 //                        infoWindow.open(peta2);
 //                    });
 //                }
 //            }
 //        });
 //    });