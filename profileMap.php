<?php 
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$regid = $_GET['rid'];

require_once("database/connect.php");
$sql = "SELECT * FROM tb_registers 
        INNER JOIN tb_members ON tb_registers.loginId = tb_members.loginId
        WHERE registerId = $regid";
$query = mysqli_query($link,$sql);
$result = mysqli_fetch_array($query);

$farmName = $result['farmName']; // ชื่อไร่

$rawArea = explode("-", $result['farmArea']); // [ไร่]-[งาน]-[ตารางวา]

$area = $rawArea[0]." ไร่ ".$rawArea[1]." งาน ".$rawArea[2]." ตารางวา "; // x ไร่ y งาน z ตารางวา

$address = $result['farmHouseNo']
." "."หมู่ ".$result['farmVillageNo']
." "."หมู่บ้าน".$result['farmVillage']
." "."ซอย".$result['farmAlley']
." "."ถนน".$result['farmRoad']
." "."ตำบล".$result['farmSubDistric']
." "."อำเภอ".$result['farmDistrict']
." "."จังหวัด".$result['farmProvince']
." ".$result['farmPostNo']; // ที่อยู่ไร่

$fullname = $result['memberFirstname']." ".$result['memberLastname'];

$tel = $result['memberTel'];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>THAINAPIER MAP</title>
    <link rel="icon" href="img/iconweb.ico" type="image/ico">
    <link rel="stylesheet" href="css/tablestyle.css">
    <link rel="stylesheet" href="https://use.typekit.net/qwg8grf.css">
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
    <style>
      * {
        font-family: ibm-plex-thai, sans-serif;
      }  
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      .container {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 7px 1px rgba(0,0,0,0.3);
        font-size: 13px;
        font-weight: 300;
        padding: 12px;
        width: 320px;
      }

      .farmname {
          padding-bottom: 10px;
          font-size: 18px;
      }

      .address i {
          font-size: 16px;
          color: #336699;
      }

      .address {
          padding-bottom: 10px;
      }

      .tel i {
          font-size: 16px;
          color: #336699;
      }

      .fullname i {
          font-size: 16px;
          color: #336699;
      }

      .tel {
        color: #336699;
      }

      .fullname {
        color: #336699;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

      function initMap() {
        var myLatLng = {lat: <?php echo $lat;?>, lng: <?php echo $lng;?>};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          streetViewControl: false,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Your farm is here!',
        });

        var contentString = '<div class="container">'+
        '<div class="farmname">'+
        '<b><?php echo $farmName;?> (<?php echo $area;?>)</b><hr>'+
        '</div>'+
        '<div class="address">'+
        '<i class="fas fa-map-marker-alt">&nbsp;&nbsp;</i><?php echo $address;?>'+
        '</div>'+
        '<div class="fullname">'+
        '<i class="fas fa-user"></i>&nbsp;&nbsp;<?php echo $fullname;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
        '<i class="fas fa-phone-alt"></i>&nbsp;&nbsp;</i><?php echo $tel;?>'+
        '</div>'+
        '</div>';

        var infowindow = new google.maps.InfoWindow();
        infowindow.setContent(contentString);
        infowindow.open(map, marker);



      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCupYjugVXX0hveSzf_PG8ESMvBstFgNXI&callback=initMap">
    </script>
  </body>
</html>