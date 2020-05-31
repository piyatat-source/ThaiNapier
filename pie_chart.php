<?php 
    include("database/connect.php");

    $sql_get_small = "SELECT count(*) AS small FROM tb_registers WHERE farmType = 'small'";
    $result_get_small = mysqli_query($link,$sql_get_small);
    $values_small = mysqli_fetch_assoc($result_get_small);
    $small = $values_small['small'];

    $sql_get_large = "SELECT count(*) AS large FROM tb_registers WHERE farmType = 'large'";
    $result_get_large = mysqli_query($link,$sql_get_large);
    $values_large = mysqli_fetch_assoc($result_get_large);
    $large = $values_large['large'];

    $total = $large + $small; //จำนวนทั้งหมด
    //เปอร์เซ็น = (จำนวนที่ต้องการ / จำนวนทั้งหมด) * 100
    $percent_large = number_format((($large / $total) * 100), 2, '.', '');
    $percent_small = number_format((($small / $total) * 100), 2, '.', ''); 
?>

<!DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" type="text/css" href="modules/chartjs/dist/Chart.min.css">
<style>
@import url("https://use.typekit.net/qwg8grf.css");
* {
    padding: 0;
    margin: 0;
    font-size: 16px;
    text-decoration: none;
    list-style: none;
    box-sizing: border-box;
    font-family: ibm-plex-thai, sans-serif;
}
</style>
</head>
<body onload="load()">
<canvas id="myChart" width="400" height="400"></canvas>
<script src="modules/chartjs/dist/Chart.js"></script>
<script>
function load(){
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 14;
Chart.defaults.global.defaultFontFamily = "'ibm-plex-thai'";
var ctx = document.getElementById('myChart')
var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    // type: 'pie',
    data: {
    datasets: [{
        data: [<?php echo $percent_small; ?>,<?php echo $percent_large; ?>],    
        backgroundColor:[
            'rgba(80, 180, 50, 1)',
            'rgba(27, 177, 237, 1)',
    ]
    }],
    labels: [
        'เกษตรกรรายย่อย',
        'เกษตรกรรายใหญ่',
    ],
    
    },
    options: {
        animation: {
            duration: 2500 // general animation time
        },
        tooltips: {
                mode: 'label',
                callbacks: {
                    label: function(tooltipItem, data) { var idx = tooltipItem['index']; var caption = data.labels[idx]; var captionValue = data['datasets'][0]['data'][idx]; return caption+' : '+captionValue+'%'; }
                }
            },
        }

});
}



</script>

</body>
</html>