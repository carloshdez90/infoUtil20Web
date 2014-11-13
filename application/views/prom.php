
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
		
		
$(function () {
	

	
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text:  '<?php echo $titleprom;?>'
            },
            subtitle: {
                text:  '<?php echo $subtitleprom;?>'
            },
            xAxis: {
                categories: 
               <?php 
				print_r(json_encode($categoria));
             ;?>
            },
            yAxis: {
                min: 0,
                title: {
                    text:  '<?php echo $titleprom2;?>'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
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
                data:  <?php 
				print_r(json_encode($notas));
             ;?>
   
        	
    
            }]
        });
    });
    

		</script>


	
<div id="container"  class="col-md-4">


</div>


