<!-- <html>
<head> 
    <script type="text/javascript">
    var dumet = "110.7333800006875,-7.517679998932008+110.7333100001574,-7.517409999970718";
    var hasil1 = dumet.split(",",[1]);
    var hasil2 = dumet.split("");
    var hasil3 = dumet.split(" ", 4);
    var hasil4 = dumet.split("o");
    document.write(hasil1 + "<br>" + hasil2 + "<br>" + hasil3 + "<br>" + hasil4);
</script>
<script type="text/javascript">
var string = "Belajar Pemrograman di rachmat.ID";
var explode = string.split(" ");
console.log(explode);
</script>
</head>
<body> </body>
</html>  -->

<HTML>
<HEAD>
    <TITLE>Belajar HTML</TITLE>
</HEAD>
<BODY>
    <Script>
        function reverseString(str) {
 // 1. split string menjadi array substring
 var splitString = str.split(',');
 // hasilnya: [ 'h', 'e', 'l', 'l', 'o' ]
 
 // 2. reverse array
 var reverseArray = splitString.reverse();
 // hasilnya: [ 'o', 'l', 'l', 'e', 'h' ]
// 3. gabungkan semua element array menjadi string
var joinArray = reverseArray.join(',');
 // hasilny: olleh
 
 return joinArray;
}
var enjoy = '110.7773100003572,-7.512460000128101';
var uhuy = reverseString(enjoy);
console.log(parseFloat(uhuy));
    </Script>
</BODY>
</HTML>


