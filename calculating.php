<?php 
$Rai = $_GET['r'];
$Ngan = $_GET['n'];
$Square = $_GET['s'];

$getArea = $Rai + ($Ngan / 4) + ($Square / 400); //ขนาดพื้นที่ทั้งหมด

$regId = $_GET['id']; //registerId

//connect database
require_once("database/connect.php");

$sql = "SELECT * FROM tb_registers WHERE registerId = '".$regId."'";
$query = mysqli_query($link,$sql);
$result = mysqli_fetch_array($query);
?>

<html>
<head>
<link rel="icon" href="img/iconweb.ico" type="image/ico">
<link rel="stylesheet" href="https://use.typekit.net/ydq7ilf.css">
    <style>
        * {
            font-family: ibm-plex-thai,sans-serif;
            /* font-weight: 400; */
            font-style: normal;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            margin: auto;
        }
        th, td {
            padding: 5px;
        }
        th, tr, td {
            text-align: center;
        }
        .icon-back a {
            color: #1a1a1a;
            text-decoration: none;
        }
        .note1 {
            margin-left: 150px;
        }
        .note2 ,li {
            margin-left: 100px;
        }
        h2{
            margin-bottom: 0px;
            margin-left: 90px;
        }
        hr {
            border: 1px solid #cae496;
            width: 90%;
        }
        .title {
            margin-left: 100px;
            float: left;
            display: inline;
            font-size: 22px;
            font-weight: bold;
        }
        .print {
            float: right;
            display: inline;
            margin-right: 100px;
            background: #2F8DEB;
            width: 80px;
            color: #fff;
            border-radius: 5px;
            padding: 5px;
            text-align: center;
            cursor: pointer;
        }
        .print:hover {
            background: #1666B5;
        }
        
        
    </style>
    <script src= "https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://use.fontawesome.com/e6db92659f.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="content" id="content">
<div class="icon-back">
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="farmlist.php" style="font-size: 22px">
        <i class="fa fa-chevron-left" aria-hidden="true"></i> ย้อนกลับ
    </a>
</div><br>
<div class="title">
    <a style="font-weight: bold"><?php echo $result['farmName']; ?>  (พื้นที่ <?php echo $getArea;?> ไร่)</a>
</div>
<div class="print">
    <a onclick="window.print()"><i class="fa fa-print" style="font-size:24px"></i> พิมพ์<a> 
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</h2><hr><br>
<a class="note1" style="font-weight: bold">เริ่มต้นการปลูก</a><br>
    <table style="width: 80%">
    <tr>
        <th rowspan="2"></th>
        <th colspan="2" style="background: #DCC88E">ทั้งแบบปุ๋ยเคมี และ น้ำทิ้ง+ปุ๋ยเคมี</th> 
    </tr>
    <tr>
        <th style="background: #DCC88E">ปริมาณที่ใช้</th>
        <th style="background: #DCC88E">ราคา</th>
    </tr>
    <tr>
        <th>ปุ๋ยคอก</th>
        <td style="background: #E4D5AB"><?php echo $manure = 2000 * $getArea ?> กิโลกรัม</td>
        <td style="background: #E4D5AB"><?php echo $priceManure = $manure * 2?> บาท</td>
    </tr>
    <tr>
        <th>ท่อนพันธุ์</th>
        <td style="background: #E4D5AB"><?php echo $seed = 1600 * $getArea?> ท่อน</td>
        <td style="background: #E4D5AB"><?php echo $priceSeed = $seed * 2?> บาท</td>
    </tr>
    <tr>
        <th>ปุ๋ยสูตร 15-15-15</th>
        <td style="background: #E4D5AB"><?php echo $fertilizerNo15 = 50 * $getArea?> กิโลกรัม</td>
        <td style="background: #E4D5AB"><?php echo $priceFertilizerNo15 = $fertilizerNo15 * 20?> บาท</td>
    </tr>
    <tr>
        <td colspan="2">ราคาทั้งหมด</td>
        <td style="background: #E4D5AB"><u><?php echo $allPrice = $priceManure + $priceSeed + $priceFertilizerNo15 ?> บาท</u></td>
    </tr>
    </table>
    <br><br>
    
    <a class="note1" style="font-weight: bold">การปลูกรอบที่ 1</a><br>
    <table style="width: 80%">
    <tr>
        <th rowspan="2"></th>
        <th colspan="2" style="background: #3A6ABC">ปุ๋ยเคมี</th> 
        <th colspan="2" style="background: #66CA5E">น้ำทิ้ง + ปุ๋ยเคมี</th> 
    </tr>
    <tr>
        <th style="background: #3A6ABC">ปริมาณที่ใช้</th>
        <th style="background: #3A6ABC">ราคา</th>
        <th style="background: #66CA5E">ปริมาณที่ใช้</th>
        <th style="background: #66CA5E">ราคา</th>
    </tr>
    <tr>
        <th>ปุ๋ยยูเรีย</th>
        <td style="background: #D1DDF1"><?php echo $urea1 = 20 * $getArea ?> กิโลกรัม</td>
        <td style="background: #D1DDF1"><?php echo $priceUrea1 = $urea1 * 20 ?> บาท</td>
        <td style="background: #BDE4BA"><?php echo $urea2 = 10 * $getArea ?> กิโลกรัม</td>
        <td style="background: #BDE4BA"><?php echo $priceUrea2 = $urea2 * 20 ?> บาท</td>
    </tr>
    <tr>
        <th>น้ำ</th>
        <td style="background: #D1DDF1"><?php echo $water1 = 2400 * $getArea ?> ลบ.ม.</td>
        <td style="background: #D1DDF1"><?php echo $priceWater1 = $water1 * 2 ?> บาท</td>
        <td style="background: #BDE4BA"><?php echo $water2 = 2400 * $getArea ?> ลบ.ม.</td>
        <td style="background: #BDE4BA"><?php echo $priceWater2 = 2 * ($water2 / 300) * 10 ?> บาท</td>
    </tr>
    <tr>
        <td>ผลผลิตน้ำหนักสด (KG)</td>
        <td style="background: #D1DDF1"><?php echo $product1 = 20000 * $getArea ?> กิโลกรัม</td>
        <td style="background: #D1DDF1"></td>
        <td style="background: #BDE4BA"><?php echo $product2 = 14000 * $getArea ?> กิโลกรัม</td>
        <td style="background: #BDE4BA"></td>
    </tr>
    <tr>
        <td>ต้นทุนรวม</td>
        <td style="background: #D1DDF1"></td>
        <td style="background: #D1DDF1"><u><?php echo $cost1 = $priceUrea1 + $priceWater1 + $allPrice ?> บาท</u></td>
        <td style="background: #BDE4BA"></td>
        <td style="background: #BDE4BA"><u><?php echo $cost2 = $priceUrea2 + $priceWater2 + $allPrice ?> บาท</u></td>
    </tr>
    <tr>
        <td>ต้นทุน/กก.</td>
        <td style="background: #D1DDF1"></td>
        <td style="background: #D1DDF1"><?php echo $costPerYear1 = $cost1 / $product1 ?> บาท/กิโลกรัม</td>
        <td style="background: #BDE4BA"></td>
        <td style="background: #BDE4BA"><?php $costPerYear2 = $cost2 / $product2; echo round($costPerYear2, 8); ?> บาท/กิโลกรัม</td>
    </tr>
    </table>
    <a class="note2" style="color: red">
    *หมายเหตุ ต้นทุนของการ<u>เริ่มต้นการปลูก</u>จะเอามารวมกับต้นทุนของ<u>การปลูกรอบที่ 1</u> 
    </a><br><br>    
    <a class="note1" style="font-weight: bold">การปลูกรอบที่ 2-5</a><br>
    <table style="width: 80%">
    <tr>
        <th rowspan="2"></th>
        <th colspan="2" style="background: #3A6ABC">ปุ๋ยเคมี</th> 
        <th colspan="2" style="background: #66CA5E">น้ำทิ้ง + ปุ๋ยเคมี</th> 
    </tr>
    <tr>
        <th style="background: #3A6ABC">ปริมาณที่ใช้</th>
        <th style="background: #3A6ABC">ราคา</th>
        <th style="background: #66CA5E">ปริมาณที่ใช้</th>
        <th style="background: #66CA5E">ราคา</th>
    </tr>
    <tr>
        <th>ปุ๋ยยูเรีย</th>
        <td style="background: #D1DDF1"><?php echo $urea1 = 20 * $getArea ?> กิโลกรัม</td>
        <td style="background: #D1DDF1"><?php echo $priceUrea1 = $urea1 * 20 ?> บาท</td>
        <td style="background: #BDE4BA"><?php echo $urea2 = 10 * $getArea ?> กิโลกรัม</td>
        <td style="background: #BDE4BA"><?php echo $priceUrea2 = $urea2 * 20 ?> บาท</td>
    </tr>
    <tr>
        <th>น้ำ</th>
        <td style="background: #D1DDF1"><?php echo $water1 = 2400 * $getArea ?> ลบ.ม.</td>
        <td style="background: #D1DDF1"><?php echo $priceWater1 = $water1 * 2 ?> บาท</td>
        <td style="background: #BDE4BA"><?php echo $water2 = 2400 * $getArea ?> ลบ.ม.</td>
        <td style="background: #BDE4BA"><?php echo $priceWater2 = 2 * ($water2 / 300) * 10 ?> บาท</td>
    </tr>
    <tr>
        <td>ผลผลิตน้ำหนักสด (KG)</td>
        <td style="background: #D1DDF1"><?php echo $product3 = 20000 * $getArea ?> กิโลกรัม</td>
        <td style="background: #D1DDF1"></td>
        <td style="background: #BDE4BA"><?php echo $product4 = 14000 * $getArea ?> กิโลกรัม</td>
        <td style="background: #BDE4BA"></td>
    </tr>
    <tr>
        <td>ต้นทุนรวม</td>
        <td style="background: #D1DDF1"></td>
        <td style="background: #D1DDF1"><u><?php echo $cost3 = $priceUrea1 + $priceWater1 ?> บาท</u></td>
        <td style="background: #BDE4BA"></td>
        <td style="background: #BDE4BA"><u><?php echo $cost4 = $priceUrea2 + $priceWater2 ?> บาท</u></td>
    </tr>
    <tr>
        <td>ต้นทุน/กก.</td>
        <td style="background: #D1DDF1"></td>
        <td style="background: #D1DDF1"><?php echo $costPerYear1 = $cost3 / $product3 ?> บาท/กิโลกรัม</td>
        <td style="background: #BDE4BA"></td>
        <td style="background: #BDE4BA"><?php $costPerYear2 = $cost4 / $product4; echo round($costPerYear2, 8); ?> บาท/กิโลกรัม</td>
    </tr>
    </table>
    <a class="note2" style="color: red">
    *หมายเหตุ
        <ul>
            <li>ค่าน้ำประปาและน้ำทิ้ง ลูกบาศก์เมตรละ 2 บาท</li>
            <li>อัตราการให้น้ำ ทุก 5 วัน ครั้งละ 300 ลบ.ม / ไร่</li>
            <li>ค่าไฟที่ใช้ในการสูบน้ำทิ้ง ชั่วโมงละ 10 บาท</li>
        </ul>  
    </a><br>
    <a class="note2"><u>สรุป สูตรน้ำทิ้ง + ปุ๋ยเคมี</u></a><br>
    <a class="note2"> ต้นทุนที่ต้องใช้ทั้งหมด (ต่อปี) : <?php echo $cost2 + ($cost4 * 4) ?> บาท </a><a style="color:green">(ใช้ต้นทุนลดลง <?php echo ($cost1 + ($cost3 * 4)) - ($cost2 + ($cost4 * 4)) ?> บาท)</a><br>
    <a class="note2">ผลผลิตน้ำหนักสดที่ได้ทั้งหมด (ต่อปี) : <?php echo $product2 * 5 ?> กิโลกรัม หรือ <?php echo ($product2 * 5) / 1000 ?> ตัน </a><a style="color:red">(ผลผลิตลดลง <?php echo ($product1 * 5) - ($product2 * 5) ?> กิโลกรัม หรือ <?php echo (($product1 * 5) - ($product2 * 5)) / 1000 ?> ตัน)</a>
    <br><br><br>
</div>

    <script>
        document.getElementById('content').style.display = "none";
        let timerInterval
        Swal.fire({
        title: 'กำลังคำนวณ',
        html: 'รอสักครู่',
        timer: 3000,
        timerProgressBar: false,
            onBeforeOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                const content = Swal.getContent()
                if (content) {
                    const b = content.querySelector('b')
                    if (b) {
                        b.textContent = Swal.getTimerLeft()
                    }
                }
            }, 100)
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            document.getElementById('content').style.display = "block";
        }
    })
    </script>
</body>
</html>