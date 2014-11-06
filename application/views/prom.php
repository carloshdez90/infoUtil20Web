
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
		console.log("<?php echo $calisalud.$caliedu;?>");
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Promedio Mesual'
            },
            subtitle: {
                text: 'Calificaciones'
            },
            xAxis: {
                categories: [
                    'Salud',
                    'Educación',
                    'Finanzas',
                    'Directorios',
                    'Deportes'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Calificacion Promedio',
                data: [parseFloat("<?php echo $calisalud;?>"),parseFloat("<?php echo $caliedu;?>"),parseFloat("<?php echo $califina;?>"),parseFloat("<?php echo $calidirec;?>"),parseFloat("<?php echo $calicult;?>")]
   
        	
    
            }]
        });
    });
    

		</script>


	
<div id="container"  class="col-md-4"></div>

