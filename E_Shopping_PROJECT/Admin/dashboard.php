<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['laptops', 10],
  ['Mobiles', 10],
  ['Ipad', 8],
  ['others', 5]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Average selling', 'width':850, 'height':400};
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
</head>
<body>
<div class="slide-container">  
<div id="piechart"></div>
</div>
</body>
</html>
<?php 
include('footer.php');
?>