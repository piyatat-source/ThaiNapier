<?php 
$Rai = $_GET['r'];
$Ngan = $_GET['n'];
$Square = $_GET['s'];

$getArea = $Rai + ($Ngan / 4) + ($Square / 400); //ขนาดพื้นที่ทั้งหมด
?>

<html>
<head>
    <style>
        table, th, td {
        border: 1px solid black;
        }
    </style>
</header>
</head>
<body>
<a>เริ่มต้นการปลูก ต้องใช้...</a><br><br>    
    <table style="width: 40%">
    <tr>
        <th rowspan="2"></th>
        <th colspan="2">ทั้งแบบปุ๋ยเคมี และ น้ำทิ้ง+ปุ๋ยเคมี</th> 
    </tr>
    <tr>
        <th>ปริมาณที่ใช้</th>
        <th>ราคา</th>
    </tr>
    <tr>
        <th>ปุ๋ยคอก</th>
        <td><?php echo $manure = 2000 * $getArea ?> กิโลกรัม</td>
        <td><?php echo $priceManure = $manure * 2?> บาท</td>
    </tr>
    <tr>
        <th>ท่อนพันธุ์</th>
        <td><?php echo $seed = 1600 * $getArea?> ท่อน</td>
        <td><?php echo $priceSeed = $seed * 2?> บาท</td>
    </tr>
    <tr>
        <th>ปุ๋ยสูตร 15-15-15</th>
        <td><?php echo $fertilizerNo15 = 50 * $getArea?> กิโลกรัม</td>
        <td><?php echo $priceFertilizerNo15 = $fertilizerNo15 * 20?> บาท</td>
    </tr>
    <tr>
        <td colspan="2"><center>ราคาทั้งหมด</center></td>
        <td><?php echo $allPrice = $priceManure + $priceSeed + $priceFertilizerNo15 ?> บาท</td>
    </tr>
    </table><br><br>

    <a>ตัดรอบที่ 1 ต้องใช้...</a><br><br>
    <table style="width: 50%">
    <tr>
        <th rowspan="2"></th>
        <th colspan="2">ปุ๋ยเคมี</th> 
        <th colspan="2">น้ำทิ้ง + ปุ๋ยเคมี</th> 
    </tr>
    <tr>
        <th>ปริมาณที่ใช้</th>
        <th>ราคา</th>
        <th>ปริมาณที่ใช้</th>
        <th>ราคา</th>
    </tr>
    <tr>
        <th>ปุ๋ยยูเรีย</th>
        <td><?php echo $urea1 = 20 * $getArea ?> กิโลกรัม</td>
        <td><?php echo $priceUrea1 = $urea1 * 20 ?> บาท</td>
        <td><?php echo $urea2 = 10 * $getArea ?> กิโลกรัม</td>
        <td><?php echo $priceUrea2 = $urea2 * 20 ?> บาท</td>
    </tr>
    <tr>
        <th>น้ำ</th>
        <td><?php echo $water1 = 2400 * $getArea ?> ลบ.ม.</td>
        <td><?php echo $priceWater1 = $water1 * 2 ?> บาท</td>
        <td><?php echo $water2 = 2400 * $getArea ?> ลบ.ม.</td>
        <td><?php echo $priceWater2 = 2 * ($water2 / 300) * 10 ?> บาท</td>
    </tr>
    <tr>
        <td><center>ผลผลิตน้ำหนักสด (KG)</center></td>
        <td><?php echo $product1 = 20000 * $getArea ?> กิโลกรัม</td>
        <td></td>
        <td><?php echo $product2 = 14000 * $getArea ?> กิโลกรัม</td>
        <td></td>
    </tr>
    <tr>
        <td><center>ต้นทุนรวม</center></td>
        <td></td>
        <td><?php echo $cost1 = $priceUrea1 + $priceWater1 + $allPrice ?> บาท</td>
        <td></td>
        <td><?php echo $cost2 = $priceUrea2 + $priceWater2 + $allPrice ?> บาท</td>
    </tr>
    <tr>
        <td><center>ต้นทุน/กก.</center></td>
        <td></td>
        <td><?php echo $costPerYear1 = $cost1 / $product1 ?> บาท/กิโลกรัม</td>
        <td></td>
        <td><?php $costPerYear2 = $cost2 / $product2; echo round($costPerYear2, 8); ?> บาท/กิโลกรัม</td>
    </tr>
    </table><br><br>    

    <a>ตัดรอบที่ 2-5 ต้องใช้...</a><br><br>
    <table style="width: 50%">
    <tr>
        <th rowspan="2"></th>
        <th colspan="2">ปุ๋ยเคมี</th> 
        <th colspan="2">น้ำทิ้ง + ปุ๋ยเคมี</th> 
    </tr>
    <tr>
        <th>ปริมาณที่ใช้</th>
        <th>ราคา</th>
        <th>ปริมาณที่ใช้</th>
        <th>ราคา</th>
    </tr>
    <tr>
        <th>ปุ๋ยยูเรีย</th>
        <td><?php echo $urea1 = 20 * $getArea ?> กิโลกรัม</td>
        <td><?php echo $priceUrea1 = $urea1 * 20 ?> บาท</td>
        <td><?php echo $urea2 = 10 * $getArea ?> กิโลกรัม</td>
        <td><?php echo $priceUrea2 = $urea2 * 20 ?> บาท</td>
    </tr>
    <tr>
        <th>น้ำ</th>
        <td><?php echo $water1 = 2400 * $getArea ?> ลบ.ม.</td>
        <td><?php echo $priceWater1 = $water1 * 2 ?> บาท</td>
        <td><?php echo $water2 = 2400 * $getArea ?> ลบ.ม.</td>
        <td><?php echo $priceWater2 = 2 * ($water2 / 300) * 10 ?> บาท</td>
    </tr>
    <tr>
        <td><center>ผลผลิตน้ำหนักสด (KG)</center></td>
        <td><?php echo $product3 = 20000 * $getArea ?> กิโลกรัม</td>
        <td></td>
        <td><?php echo $product4 = 14000 * $getArea ?> กิโลกรัม</td>
        <td></td>
    </tr>
    <tr>
        <td><center>ต้นทุนรวม</center></td>
        <td></td>
        <td><?php echo $cost3 = $priceUrea1 + $priceWater1 ?> บาท</td>
        <td></td>
        <td><?php echo $cost4 = $priceUrea2 + $priceWater2 ?> บาท</td>
    </tr>
    <tr>
        <td><center>ต้นทุน/กก.</center></td>
        <td></td>
        <td><?php echo $costPerYear1 = $cost3 / $product3 ?> บาท/กิโลกรัม</td>
        <td></td>
        <td><?php $costPerYear2 = $cost4 / $product4; echo round($costPerYear2, 8); ?> บาท/กิโลกรัม</td>
    </tr>
    </table><br>
    
    <a><u>สรุป สูตรร้ำทิ้ง + ปุ๋ยเคมี</u></a><br>
    <a>ต้นทุนที่ต้องใช้ทั้งหมด (ต่อปี) : <?php echo $cost2 + ($cost4 * 4) ?> บาท </a><a style="color:green">(ใช้ต้นทุนลดลง <?php echo ($cost1 + ($cost3 * 4)) - ($cost2 + ($cost4 * 4)) ?> บาท)</a><br>
    <a>ผลผลิตน้ำหนักสดที่ได้ทั้งหมด (ต่อปี) : <?php echo $product2 * 5 ?> กิโลกรัม หรือ <?php echo ($product2 * 5) / 1000 ?> ตัน </a><a style="color:red">(ผลผลิตลดลง <?php echo ($product1 * 5) - ($product2 * 5) ?> กิโลกรัม หรือ <?php echo (($product1 * 5) - ($product2 * 5)) / 1000 ?> ตัน)</a><br><br>
    <button onclick="window.location.href = 'farmlist.php';">ย้อนกลับ</button>
</body>
</html>