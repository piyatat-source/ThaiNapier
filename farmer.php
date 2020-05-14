<?php
  session_start();

  
?>
<html>
  <head>
    <title>Thai Napier</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
      #map {
        height: 100%;
        width: 60%
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 80%;
        margin: 0;
        padding: 0;
      }

      #position{
        width: 300px;
      }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
  </head>
  <body>
    <h3>ลงทะเบียนเกษตกร</h3><hr>
              <b><p>ข้อมูลผู้ลงทะเบียน</p></b>


              <label for="Myfname">ชื่อจริง</label><br>
              <input type="text" id="Myfname" name="Myfirstname" value="???" disabled><br>


              <label for="Mylname">นามสกุล</label><br>
              <input type="text" id="Mylname" name="Mylastname" value="???" disabled><br>

              <b><p>ที่อยู่ภูมิลำเนา</p></b>

              <label for="MyhouseNo">บ้านเลขที่</label><br>
              <input type="text" id="MyhouseNo" name="MyhouseNo" value="???" disabled><br>


              <label for="MyvillageNo">หมู่ที่</label><br>
              <input type="text" id="MyvillageNo" name="MyvillageNo" value="???" disabled><br>



              <label for="Myvillage">หมู่บ้าน/อาคาร/ชั้น</label><br>
              <input type="text" id="Myvillage" name="Myvillage" value="???" disabled><br>


              <label for="Myalley">ตรอก/ซอย</label><br>
              <input type="text" id="Myalley" name="Myalley" value="???" disabled><br>

              <label for="Myroad">ถนน</label><br>
              <input type="text" id="Myroad" name="Myroad" value="???" disabled><br>


              <label for="MypostNo">รหัสไปรษณี</label><br>
              <input type="text" id="MypostNo" name="MypostNo" value="???" disabled><br>

              <label for="MySub-district">ตำบล/แขวง</label><br>
              <input type="text" id="MySub-district" name="MySub-district" value="???" disabled><br>
 

              <label for="Mydistrict">อำเภอ</label><br>
              <input type="text" id="Mydistrict" name="Mydistrict" value="???" disabled><br>

              <label for="Myprovince">จังหวัด</label><br>
              <input type="text" id="Myprovince" name="Myprovince" value="???" disabled><br>


  <br><hr>
  <form id="register" method="post" action="regFarmer.php">
  <b><p>ข้อมูลพื้นที่ปลูกหญ้าเนเปียร์</p></b>

              <label for="farmName">ชื่อฟาร์ม/ไร่</label><br>
              <input type="text" id="farmName" name="farmName" required="" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลในช่องนี้ให้ครบถ้วน')" oninput="setCustomValidity('')">

              <b><p>ที่อยู่ที่ทำการเกษตร :</p></b>

              <label for="houseNo">บ้านเลขที่</label><br>
              <input type="text" id="houseNo" name="houseNo" required="" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลในช่องนี้ให้ครบถ้วน')" oninput="setCustomValidity('')"><br>

              <label for="villageNo">หมู่ที่</label><br>
              <input type="text" id="villageNo" name="villageNo" required="" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลในช่องนี้ให้ครบถ้วน')" oninput="setCustomValidity('')"><br>

              <label for="village">หมู่บ้าน/อาคาร/ชั้น</label><br>
              <input type="text" id="village" name="village" required="" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลในช่องนี้ให้ครบถ้วน')" oninput="setCustomValidity('')"><br>

              <label for="alley">ตรอก/ซอย</label><br>
              <input type="text" id="alley" name="alley" required="" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลในช่องนี้ให้ครบถ้วน')" oninput="setCustomValidity('')"><br>

              <label for="road">ถนน</label><br>
              <input type="text" id="road" name="road" required="" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลในช่องนี้ให้ครบถ้วน')" oninput="setCustomValidity('')"><br>

              <label for="postNo">รหัสไปรษณี</label><br>
              <input type="text" id="postNo" name="postNo" required="" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลในช่องนี้ให้ครบถ้วน')" oninput="setCustomValidity('')"><br>

              <label for="sub-District">ตำบล/แขวง</label><br>
              <input type="text" id="sub-District" name="sub-District" required="" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลในช่องนี้ให้ครบถ้วน')" oninput="setCustomValidity('')"><br>

              <label for="district">อำเภอ</label><br>
              <input type="text" id="district" name="district" required="" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลในช่องนี้ให้ครบถ้วน')" oninput="setCustomValidity('')"><br>

              <label for="province">จังหวัด</label><br>
              <input type="text" id="province" name="province" required="" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลในช่องนี้ให้ครบถ้วน')" oninput="setCustomValidity('')"><br>
              <br><br>
              
              
              <!-- ข้อมูลพื้นที่ปลูกหญ้าเนเปียร์ -->
              <b><p>พื้นที่ที่ใช้ปลูกหญ้าเนเปียร์ :</p></b>

              <input type="number" id="Rai" name="Rai" placeholder="-" min="0" max="99" required="" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลในช่องนี้ให้ครบถ้วน')" oninput="setCustomValidity('')">&nbsp;&nbsp;ไร่

              <input type="number" id="Ngan" name="Ngan" value="-" placeholder="-" min="0" max="3" required="" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลในช่องนี้ให้ครบถ้วน')" oninput="setCustomValidity('')">&nbsp;&nbsp;งาน

              <input type="number" id="squareMeter" name="squareMeter" placeholder="-" min="0" max="99" required="" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลในช่องนี้ให้ครบถ้วน')" oninput="setCustomValidity('')">&nbsp;&nbsp;ตารางวา<br><br>
              
              <hr>
              <b><p>พิกัดพื้นที่ทำการเกษตร :</p></b>
              <input type="hidden" id="input-lat" name="input-lat" style="width: 200px;">
              <input type="hidden" id="input-lng" name="input-lng" style="width: 200px;">
              
              <input type="text" id="search" name="search" placeholder="กรอกอำเภอหรือจังหวัดอย่างใดอย่างหนึ่ง" style="text-align:center; width:300px;">&nbsp;&nbsp;
              <button type="button" id="find">ค้นหา</button><br>
              
              <div id="map"></div>
              <label>พิกัดที่คุณเลือก : </label> <p name="ll" id="ll">-</p>
                  
  <br><br>
  <input type="button" value="บันทึกข้อมูล" onclick="warning()">
  </form>
  <script>
    function warning() {
      var status = 0;
      if(document.getElementById("farmName").value == "" ||
          document.getElementById("houseNo").value == "" ||
          document.getElementById("villageNo").value == "" ||
          document.getElementById("village").value == "" ||
          document.getElementById("alley").value == "" ||
          document.getElementById("road").value == "" ||
          document.getElementById("sub-District").value == "" ||
          document.getElementById("district").value == "" ||
          document.getElementById("province").value == "" ||
          document.getElementById("Rai").value == "" ||
          document.getElementById("Ngan").value == "" ||
          document.getElementById("squareMeter").value == "")
        {
          status = 1;
        } 

      var x = document.getElementById("ll").innerHTML;
      if(x != "-" && status == 0){
        alert("ครบ");
        // document.getElementById("register").submit();
      } else {
        alert("กรุณากรอกข้อมูลให้ครบ");
      }
    }
  </script>
  <script>
      var marker = null;
      function initMap() {
      var start = {lat: 13.736717, lng: 100.523186};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: start,
        streetViewControl: false
      });
      map.addListener('click', function(mapsMouseEvent) {
        if(marker){
          marker.setMap(null);
        }
        marker = new google.maps.Marker({
          position: mapsMouseEvent.latLng,
          title: "You are here!",
        });
        marker.setMap(map);
                    
        var x = mapsMouseEvent.latLng.toString();
        var latlong = x;
        latlong = latlong.slice(1, latlong.length-1);
        var info = latlong.split(',');
        var lat = info[0];
        var long =  info[1];

        document.getElementById("ll").innerHTML = lat+", "+long;
        document.getElementById("input-lat").value = lat;
        document.getElementById("input-lng").value = long;

                    // infoWindow.open(map);
        });
                  
                  //Event Search button 
                  var geocoder = new google.maps.Geocoder();
                  document.getElementById('find').addEventListener('click', function() {  
                    geocodeAddress(geocoder, map);
                  });
                }

                function geocodeAddress(geocoder, resultsMap) {

                  var search = document.getElementById('search').value;
                  geocoder.geocode({'address': search}, function(results, status) {
                    if (status === 'OK') {
                      resultsMap.setCenter(results[0].geometry.location);
                  } else {
                    alert('ไม่พบข้อมูล');
                  }
                });
              }
            </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCupYjugVXX0hveSzf_PG8ESMvBstFgNXI&callback=initMap"
    async defer></script>
</body>
</html>