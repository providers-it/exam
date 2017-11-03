<div id="content" class="testd">
<h1> </h1><br>
<?php
if($value !='[["Quiz Name","Percentage (%)"]]'){
?>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $value;?>);

        var options = {
          title: 'Last 10 quiz results',
          hAxis: {title: 'Quiz vs Percentage', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
		 <div id="chart_div" style="width: 900px; height: 500px;"></div>
		 <?php
		 }else{
		 ?>
		 No result found to plot chart!
		 
		 <?php
		 
		 }
		 ?>
</div>
