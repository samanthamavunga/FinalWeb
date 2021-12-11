<?php

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
// Include config file

require_once "config.php";
// Get data from database
$result = query("SELECT name,address FROM employees WHERE id = '?' ORDER BY salary DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Language', 'Rating'],
      <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['name']."', ".$row['address']."],";
          }
      }
    }
    ?>
    
    <script>
    
    var options = {
        title: 'Most Popular Programming Languages',
        width: 900,
        height: 500,
    
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>
</head>


<body>
    <!-- Display the pie chart -->
    <div id="piechart"></div>
</body>
</html>
