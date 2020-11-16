<!DOCTYPE html>
<html>
<head>
	<title>Chart</title>
</head>
<body>
<?php
$con = mysqli_connect("localhost", "root", "", "educo");

if(mysqli_connect_errno()){
	echo mysqli_connect_errno("Our databse server is down");
	exit();
}



?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script>
                    google.charts.load('current', {
  packages: ['corechart', 'line']
});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
  var data = new google.visualization.DataTable();
  data.addColumn('number', 'X');
  data.addColumn('number', 'contributions');

  data.addRows([
    [1, 1],
    [2, 20]

  ]);

  var options = {
  scales: {
    xAxes: [
      {
        type: "time",
        time: {
          displayFormats: {
            hour: "MMM DD"
          },
          tooltipFormat: "MMM D"
        }
      }
    ],
    yAxes: [
      {
        ticks: {
          beginAtZero: true
        }
      }
    ]
  }
};

  /*var options = {
    hAxis: {
      title: 'Time'
    },
    vAxis: {
      title: 'Contributions'
    },
    backgroundColor: '#f1f8e9'
  };*/

  var chart = new google.visualization.LineChart(document.getElementById('graph-graph'));
  chart.draw(data, options);
}

                </script>
                <div id="graph-graph" style="width: 600px; height: 300px"></div>
</body>
</html>