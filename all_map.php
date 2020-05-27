<?php 
    session_start();

    require_once("database/connect.php");

    $sql_get_data = "SELECT * FROM tb_registers INNER JOIN tb_members ON tb_registers.loginId = tb_members.loginId";
    $query_get_data = mysqli_query($link,$sql_get_data);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>THAINAPIER เว็บไทยเนเปียร์</title>
    <link rel="icon" href="img/iconweb.ico" type="image/ico">
    <link rel="stylesheet" href="css/tablestyle.css">
    <link rel="stylesheet" href="https://use.typekit.net/qwg8grf.css">
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      * {
        font-family: ibm-plex-thai, sans-serif;
      }  

      .map {
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
        font-size: 13px;
        font-weight: 300;
        padding: 12px;
        width: 400px;
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

    <div class="map" id="map"></div>
    
    <script>

    var markers = [
    <?php 
    while($result_get_data = mysqli_fetch_assoc($query_get_data)) {
        $farmName = $result_get_data['farmName']; // ชื่อไร่
    
        $rawArea = explode("-", $result_get_data['farmArea']); // [ไร่]-[งาน]-[ตารางวา]
    
        $area = $rawArea[0]." ไร่ ".$rawArea[1]." งาน ".$rawArea[2]." ตารางวา "; // x ไร่ y งาน z ตารางวา
    
        $address = $result_get_data['farmHouseNo']
        ." "."หมู่ ".$result_get_data['farmVillageNo']
        ." "."หมู่บ้าน".$result_get_data['farmVillage']
        ." "."ซอย".$result_get_data['farmAlley']
        ." "."ถนน".$result_get_data['farmRoad']
        ." "."ตำบล".$result_get_data['farmSubDistric']
        ." "."อำเภอ".$result_get_data['farmDistrict']
        ." "."จังหวัด".$result_get_data['farmProvince']
        ." ".$result_get_data['farmPostNo']; // ที่อยู่ไร่
    
        $fullname = $result_get_data['memberFirstname']." ".$result_get_data['memberLastname'];
    
        $tel = $result_get_data['memberTel'];
    
        $lat = $result_get_data['lat'];
    
        $lng = $result_get_data['lng'];
        
        echo '{ "title": \''.$farmName.'\', "lat": \''.$lat.'\', "lng": \''.$lng.'\', "description": \'<div class="container"><div class="farmname"><b>'.$farmName.'('.$area.')</b><hr></div><div class="address"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;'.$address.'</div><div class="fullname"><i class="fas fa-user"></i>&nbsp;&nbsp;'.$fullname.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-phone-alt"></i>&nbsp;&nbsp;'.$tel.'</div></div>\' },';
    
    } ?>

    ];
    window.onload = function () {
        LoadMap();
    }
    function LoadMap() {
        var mapOptions = {
            center: new google.maps.LatLng(13.736717, 100.523186),
            zoom: 7,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
 
        //Create and open InfoWindow.
        var infoWindow = new google.maps.InfoWindow();
 
        for (var i = 0; i < markers.length; i++) {
            var data = markers[i];
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });
 
            //Attach click event to the marker.
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                    infoWindow.setContent("<div>" + data.description + "</div>");
                    infoWindow.open(map, marker);
                });
            })(marker, data);
        }
    }
</script>   
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCupYjugVXX0hveSzf_PG8ESMvBstFgNXI&callback=callMap">
    </script>
  </body>
</html>