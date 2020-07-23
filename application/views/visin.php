<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Visin Google Charts</title>
<link rel="stylesheet" href="<?php echo base_url('vendor/css/'); ?>uikit.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    // Mengambil API visualisasi.
    google.charts.load('current', {'packages':['corechart']});
    //mengambil data dari variabel PHP
    var sales=[];
    sales['dataStr'] = '<?php echo $sales;?>';        
    sales['dataArray'] = JSON.parse(sales['dataStr']); 

    var produk=[];
    produk['dataStr'] = '<?php echo $produk;?>';        
    produk['dataArray'] = JSON.parse(produk['dataStr']); 

    var bulanan=[];
    bulanan['dataStr'] = '<?php echo $bulanan;?>';        
    bulanan['dataArray'] = JSON.parse(bulanan['dataStr']); 

    var tahunan=[];
    tahunan['dataStr'] = '<?php echo $tahunan;?>';        
    tahunan['dataArray'] = JSON.parse(tahunan['dataStr']); 

    // var visualization = new google.charts.Line(container);
    //menggambar grafik
    google.charts.setOnLoadCallback(function(){ 
        drawChart(sales['dataArray'],'bar','sales'); 
        drawChart(produk['dataArray'],'bar','produk');    
        drawChart(bulanan['dataArray'],'bar','bulanan');   
        drawChart(tahunan['dataArray'],'line','tahunan');                 

    });

    // Menentukan data yang akan ditampilkan
    function drawChart(dataArray,type,container) {
        // Membuat data tabel yang sesuai dengan format google chart dari sumber data array javascript
        var data = new google.visualization.arrayToDataTable(dataArray,false);      
        // Tentukan pengaturan chart
        var options = {
            legend:'bottom',            
            titlePosition:'none',
            titleTextStyle:{fontSize:18},
            chartArea:{width:'80%',height:'70%'}                      
            };
        if(type == 'pie')
        {
            var chart = new google.visualization.PieChart(document.getElementById(container));
        }
        if(type == 'column')
        {
            var chart = new google.visualization.ColumnChart(document.getElementById(container));
        }
        if(type == 'bar')
        {
            var chart = new google.visualization.BarChart(document.getElementById(container));
        }
        if(type == 'line')
        {
            var chart = new google.visualization.LineChart(document.getElementById(container));
        }
        chart.draw(data, options);
    }
</script>  
</head>
<body style="background :#3798ff;">
<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">


<nav class="uk-navbar-container uk-margin" style="box-shadow: 0px 2px 15px 0px red;"  uk-navbar>
    <div class="uk-navbar-left" style="padding:20px;">
        <img style="width:100px; " class="uk-navbar-left" src="assets/logo.png" alt="">
        <div class"uk-navbar-center>
        <h1 style="color:red; font-weight:bold; margin-left:300px;">Analisis Penjualan Mobil Dayhatsu</h1>
        </div>
        
    </div>
</nav>
</div>
<br><br>
<div class="uk-container">
    <div uk-filter="target: .js-filter">

        
        <div>
            <div class="uk-button-group">
                <button uk-filter-control=".tag-white" class="uk-button uk-button-danger">Hasil Penjualan Oleh Agen <span class="uk-badge">1</span></button>
                <button uk-filter-control=".tag-blue" class="uk-button uk-button-danger">Penjualan Terlaris <span class="uk-badge">1</span></button>
                <button uk-filter-control=".tag-black" class="uk-button uk-button-danger">Penjualan Bulanan <span class="uk-badge">2</span></button>
            </div>
        </div>

        <ul class="js-filter uk-child-width-1-2 uk-child-width-1-1@m uk-text-center" uk-grid>
            <li class="tag-white">
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title">Hasil Penjualan Oleh Agen</h3>
                    <div id="sales" style="height:350px;"></div>
                </div>
            </li>
            <li class="tag-blue">
                <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">Produk Terlaris</h3>
                    <div id="produk" style="height:350px;"></div>
                </div>
            </li>
            <li class="tag-black">
                <div class="uk-child-width-1 uk-card uk-card-default uk-card-body"><h3 class="uk-card-title">Penjualan Bulanan</h3>
                <div id="bulanan" style="height:350px;"></div></div>
            </li>
            <li class="tag-black">
                <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">Penjualan Bulanan</h3>
                <div id="tahunan" style="height:350px;"></div>
                </div>
            </li>
        </ul>

    </div>
</div>
<br>
<script src="<?php echo base_url('vendor/js/'); ?>uikit.js"></script>
</body>
</html>