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
            font-style: normal;
        }
        table {
            text-align: left;
            line-height: 40px;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #dadada;
            margin: 20px auto;
            border-radius: .25rem;
            
            }

        thead tr:first-child {
            background: #ed1c40;
            color: #fff;
            border: none;
            }

        th:first-child,
        td:first-child {
            padding: 0 15px 0 20px;
            border-bottom: 1px solid #f1f1f1;
            border-right: 1px solid #f1f1f1;
            }

        th {
            font-weight: 500;
            border-bottom: 1px solid #f1f1f1;
            border-right: 1px solid #f1f1f1;
            }

        thead tr:last-child th {
            border-bottom: 3px solid #f1f1f1;
            }

        tbody tr:hover {
            cursor: default;
            }

        tbody tr:last-child td {
            border: none;
            }

        tbody td {
            border-bottom: 1px solid #f1f1f1;
            border-right: 1px solid #f1f1f1;
            padding-left: 10px;
            text-align:right;
            }

        td:last-child {
            text-align: right;
            padding-right: 10px;
            }

        .button {
            color: #aaa;
            cursor: pointer;
            vertical-align: middle;
            margin-top: -4px;
            }   
        .icon-back a {
            padding-left:15px;
            color: #1a1a1a;
            text-decoration: none;
        }
        .containernote{
            width:70%;
            margin:auto;   
        }
        .note1 {
            
            font-size:20;
            font-weight: 600;  
            color:#121212; 
        }
        
        li {
            margin-left: 50px;
        }
        h2{
            margin-bottom: 0px;
            margin-left: 90px;
        }
        hr {
            padding-top:2px;
            width: 90%;
            background:#f1f1f1;
            border:0;
        }
        .title {
            margin-left: 100px;
            float: left;
            display: inline;
            font-size: 22px;
            font-weight: bold;
            padding-bottom:15px;
        }
        .print {
            float: right;
            display: inline;
           
            background: #2F8DEB;
            width: 80px;
            color: #fff;
            border-radius: 5px;
            padding: 5px;
        
            cursor: pointer;
            border :0;
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
    <br>
    <a href="farmlist.php" style="font-size: 18px"><i class="fa fa-chevron-left" aria-hidden="true"></i> &nbsp;&nbsp;ย้อนกลับ</a>
</div><br>
<div class="containernote" style="text-align:center"> <div class="print" onclick="printDiv('printableArea')" ><i class="fa fa-print" aria-hidden="true"></i> พิมพ์</div></div>
<div id="printableArea">
<div class="title">
    <a style="font-weight: 600;color:#608097;">ผลการคํานวณต้นทุนของไร่ </a> :
    <a style="font-weight: 600;color:#323232;"> <?php echo $result['farmName']; ?>  (พื้นที่ <?php if($Rai>0){
            echo $Rai." ไร่ ";
        }if($Ngan>0){
            echo $Ngan." งาน ";
        }if($Square>0){
            echo $Square." ตารางวา "; 
        } ?>)
                    
    </a>                 
    
</div>



</h2><hr><br>
<div class="containernote"><a class="note1">เริ่มต้นการปลูก</a></div>
    <table id="start" style="width: 70%">
    <tr>
        <th rowspan="2" style="background:#f9f9f9;"></th>
        <th colspan="2" style="background:#b4dbed;text-align:center;">ทั้งแบบปุ๋ยเคมี และ น้ำทิ้ง+ปุ๋ยเคมี</th> 
    </tr>
    <tr>
        <th style="background:#f5f9fb;text-align:center;">ปริมาณที่ใช้</th>
        <th style="background:#f5f9fb;text-align:center;">ราคา</th>
    </tr>
    <tr>
        <th>ปุ๋ยคอก</th>
        <td><?php echo number_format($manure = 2000 * $getArea,0,'.',',') ?> กก.</td>
        <td><?php echo number_format($priceManure = $manure * 2,0,'.',',')?> บาท</td>
    </tr>
    <tr>
        <th style="background:#f9f9f9;">ท่อนพันธุ์</th>
        <td style="background:#f9f9f9;"><?php echo number_format($seed = 1600 * $getArea,0,'.',',')?> ท่อน</td>
        <td style="background:#f9f9f9;"><?php echo number_format($priceSeed = $seed * 2,0,'.',',')?> บาท</td>
    </tr>
    <tr>
        <th>ปุ๋ยสูตร 15-15-15</th>
        <td><?php echo number_format($fertilizerNo15 = 50 * $getArea,0,'.',',')?> กก.</td>
        <td><?php echo number_format($priceFertilizerNo15 = $fertilizerNo15 * 20,0,'.',',')?> บาท</td>
    </tr>
    <tr>
        <td colspan="2" style="background:#b4dbed;">ราคาทั้งหมด</td>
        <td style="font-size:20px;background:#b4dbed;color:#2264a7;"><b><?php echo number_format($allPrice = $priceManure + $priceSeed + $priceFertilizerNo15,0,'.',',') ?> บาท</b></td>
    </tr>
    </table><br><br>
    
    
    <div class="containernote"><a class="note1" style="font-size:20;font-weight: 600">การปลูกรอบที่ 1</a></div>
    <table style="width: 70%">
    <tr>
        <th rowspan="2" style="background:#f9f9f9;"></th>
        <th colspan="2" style="background:#e0e0e0;text-align:center;">ปุ๋ยเคมี</th> 
        <th colspan="2" style="background:#b4dbed;text-align:center;">น้ำทิ้ง + ปุ๋ยเคมี</th> 
    </tr>
    <tr>
        <th style="background:#f3f3f3;text-align:center;">ปริมาณที่ใช้</th>
        <th style="background:#f3f3f3;text-align:center;">ราคา</th>
        <th style="background:#f5f9fb;text-align:center;">ปริมาณที่ใช้</th>
        <th style="background:#f5f9fb;text-align:center;">ราคา</th>
    </tr>
    <tr>
        <th>ปุ๋ยยูเรีย</th>
        <td><?php echo number_format($urea1 = 20 * $getArea,0,'.',',') ?> กก.</td>
        <td><?php echo number_format($priceUrea1 = $urea1 * 20,0,'.',',') ?> บาท</td>
        <td><?php echo number_format($urea2 = 10 * $getArea,0,'.',',') ?> กก.</td>
        <td><?php echo number_format($priceUrea2 = $urea2 * 20,0,'.',',') ?> บาท</td>
    </tr>
    <tr>
        <th style="background:#f9f9f9;">น้ำ</th>
        <td style="background:#f9f9f9;"><?php echo number_format($water1 = 2400 * $getArea,0,'.',',') ?> ลบ.ม.</td>
        <td style="background:#f9f9f9;"><?php echo number_format($priceWater1 = $water1 * 2,0,'.',',') ?> บาท</td>
        <td style="background:#f9f9f9;"><?php echo number_format($water2 = 2400 * $getArea,0,'.',',') ?> ลบ.ม.</td>
        <td style="background:#f9f9f9;"><?php echo number_format($priceWater2 = 2 * ($water2 / 300) * 10,0,'.',',') ?> บาท</td>
    </tr>
    <tr>
        <th>ผลผลิต</th>
        <td><?php echo number_format($product1 = 20000 * $getArea,0,'.',',') ?> กก.</td>
        <td></td>
        <td><?php echo number_format($product2 = 14000 * $getArea,0,'.',',') ?> กก.</td>
        <td></td>
    </tr>
    <tr>
        <td style="background:#b4dbed;">ต้นทุนรวม</td>
        <td style="background:#b4dbed;"></td>
        <td style="font-size:20px;background:#b4dbed;color:#d04444;"><b><?php echo number_format($cost1 = $priceUrea1 + $priceWater1 + $allPrice,0,'.',',') ?> บาท</b></td>
        <td style="background:#b4dbed;"></td>
        <td style="font-size:20px;background:#b4dbed;color:#2264a7;"><b><?php echo number_format($cost2 = $priceUrea2 + $priceWater2 + $allPrice,0,'.',',') ?> บาท</b></td>
    </tr>
    
    </table>
    <div class="containernote">
    <a class="note2" style="color: #565656">
    หมายเหตุ : ต้นทุนรวม เป็นผลรวมของ 'เริ่มต้นการปลูก' และ 'การปลูกรอบที่ 1'  
    </a>
    </div>
    
    <br><br><br> 
    <div class="containernote"><a class="note1" style="font-size:20;font-weight: 600">การปลูกรอบที่ 2-5</a></div>
    <table style="width: 70%">
    <tr>
        <th rowspan="2" style="background:#f9f9f9;"></th>
        <th colspan="2" style="background:#e0e0e0;text-align:center;">ปุ๋ยเคมี</th> 
        <th colspan="2" style="background:#b4dbed;text-align:center;">น้ำทิ้ง + ปุ๋ยเคมี</th> 
    </tr>
    <tr>
        <th style="background:#f3f3f3;text-align:center;">ปริมาณที่ใช้</th>
        <th style="background:#f3f3f3;text-align:center;">ราคา</th>
        <th style="background:#f5f9fb;text-align:center;">ปริมาณที่ใช้</th>
        <th style="background:#f5f9fb;text-align:center;">ราคา</th>
    </tr>
    <tr>
        <th>ปุ๋ยยูเรีย</th>
        <td><?php echo number_format($urea1 = 20 * $getArea,0,'.',',') ?> กก.</td>
        <td><?php echo number_format($priceUrea1 = $urea1 * 20,0,'.',',') ?> บาท</td>
        <td><?php echo number_format($urea2 = 10 * $getArea,0,'.',',') ?> กก.</td>
        <td><?php echo number_format($priceUrea2 = $urea2 * 20,0,'.',',') ?> บาท</td>
    </tr>
    <tr>
        <th style="background:#f9f9f9;">น้ำ</th>
        <td style="background:#f9f9f9;"><?php echo number_format($water1 = 2400 * $getArea,0,'.',',') ?> ลบ.ม.</td>
        <td style="background:#f9f9f9;"><?php echo number_format($priceWater1 = $water1 * 2,0,'.',',') ?> บาท</td>
        <td style="background:#f9f9f9;"><?php echo number_format($water2 = 2400 * $getArea,0,'.',',') ?> ลบ.ม.</td>
        <td style="background:#f9f9f9;"><?php echo number_format($priceWater2 = 2 * ($water2 / 300) * 10,0,'.',',') ?> บาท</td>
    </tr>
    <tr>
        <th>ผลผลิต</th>
        <td><?php echo number_format($product3 = 20000 * $getArea,0,'.',',') ?> กก.</td>
        <td></td>
        <td><?php echo number_format($product4 = 14000 * $getArea,0,'.',',') ?> กก.</td>
        <td></td>
    </tr>
    <tr>
        <td style="background:#b4dbed;">ต้นทุนรวม</td>
        <td style="background:#b4dbed;"></td>
        <td style="font-size:20px;background:#b4dbed;color:#d04444;"><b><?php echo number_format($cost3 = $priceUrea1 + $priceWater1,0,'.',',') ?> บาท</></td>
        <td style="background:#b4dbed;"></td>
        <td style="font-size:20px;background:#b4dbed;color:#2264a7;"><b><?php echo number_format($cost4 = $priceUrea2 + $priceWater2,0,'.',',') ?> บาท</b></td>
    </tr>
    
    </table>
    <br><br>

    <div class="containernote"><a class="note1" style="font-size:20;font-weight: 600">สรุปต้นทุนทั้งหมด</a></div>
    <table style="width: 70%">
    <tr>
        <th colspan="1"  style="background:#e0e0e0;text-align:center;">ปุ๋ยเคมี</th> 
        <th colspan="1"  style="background:#b4dbed;text-align:center;">น้ำทิ้ง + ปุ๋ยเคมี</th> 
    </tr>
    <tr>
        <td style="font-size:20px;background:#ffffff;text-align:center;font-weight: 800;color:#d04444;"><?php echo number_format($cost1 + ($cost3 * 4),0,'.',',') ?> บาท/ปี</td>
        <td style="font-size:20px;background:#ffffff;text-align:center;font-weight: 800;color:#2264a7;"><?php echo number_format($cost2 + ($cost4 * 4),0,'.',',') ?> บาท/ปี</td>
    </tr>
    
    
    </table>
    <div class="containernote">
    <a class="note2" style="color: #565656">
    หมายเหตุ
        <ul>
            <li>ค่าน้ำประปาลูกบาศก์เมตรละ 2 บาท</li>
            <li>อัตราการให้น้ำ ทุก 5 วัน ครั้งละ 300 ลบ.ม / ไร่</li>
            <li>ค่าไฟที่ใช้ในการสูบน้ำทิ้ง ชั่วโมงละ 10 บาท</li>
        </ul>  
    </a>
    </div>

    </div>
    <br>
    
   
    <script>
        document.getElementById('content').style.display = "none";
        let timerInterval
        Swal.fire({
        title: 'กำลังคำนวณ',
        html: 'รอสักครู่',
        timer: 5000,
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
    <script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}

    </script>
</body>
</html>