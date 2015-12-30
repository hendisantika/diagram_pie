<?php
session_start();

include "koneksi.php";


 $sql = "SELECT jurusan, COUNT( ID ) AS qty FROM  `mahasiswa` GROUP BY jurusan";
	
	
    $hasil = mysql_query($sql);


?>

<html>

   <head>
   
      <!--script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      <script src="http://code.highcharts.com/highcharts.js"></script>
      <script src="http://code.highcharts.com/modules/exporting.js"></script-->
	  
	  <script src="js/jquery-1.9.1.min.js"></script>
      <script src="js/highcharts.js"></script>
      <script src="js/modules/exporting.js"></script>

   
    <script type="text/javascript">
       $(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false,
        },
        title: {
            text: 'Jumlah Mahasiswa Tiap2 Jurusan'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
			<?php
			
			while($data=mysql_fetch_array($hasil))
			{ ?>
                ['<?php echo $data[jurusan]?>',   <?php echo $data[qty]?>],
                
		   <?php
		   }//end while
		   ?>
            ]
        }]
    });
});


    
    
    
    </script> 
   
   </head>

<body>
   <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>


</body>

</html>