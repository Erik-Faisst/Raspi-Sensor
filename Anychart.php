<html>
<head>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js?hcode=be5162d915534272a57d0bb781d27f2b"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js?hcode=be5162d915534272a57d0bb781d27f2b"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js?hcode=be5162d915534272a57d0bb781d27f2b"></script>
  <script src="https://cdn.anychart.com/releases/v8/themes/dark_blue.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css?hcode=be5162d915534272a57d0bb781d27f2b" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css?hcode=be5162d915534272a57d0bb781d27f2b" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style type="text/css">

  html, body, #container {
      width: 100%;
      height: 410px;
      margin: 0;
      padding: 0;
      background-color: #37474F;
  }
    #dd {
      position:absolute;
      margin-left:88%;
      margin-top:1%;
      z-index:999;
    }
</style>
</head>
<body>
    <select class="rounded" id="dd" onchange="loadDiagramm()">
      <option value="tag">Tag</option>
      <option value="monat">Monat</option>
      <option value="jahr">Jahr</option>
    </select>
  <div id="container"></div>
  <script>
    anychart.onDocumentReady(function () {    
	// set chart theme
    anychart.theme('darkBlue');

    createChart();
    });

    var chart;
    var dataSet;
    var seriesData_1;

    function createChart(){

    dataSet = anychart.data.set(getData());

    // map data for the first series, take x from the zero column and value from the first column of data set
    seriesData_1 = dataSet.mapAs({'x': 0, 'value': 1});

    // create line chart
    chart = anychart.line();

    // turn on chart animation
    chart.animation(true);

    // set chart padding
    chart.padding([10, 20, 5, 20]);

    // turn on the crosshair
    chart.crosshair()
            .enabled(true)
            .yLabel(false)
            .yStroke(null);

    // set tooltip mode to point
    chart.tooltip().positionMode('point');

    // set chart title text settings
    chart.title('Personenzähler');

    // set yAxis title
    chart.yAxis().title('Anzahl Personen');
    chart.xAxis().labels().padding(5);

    // create first series with mapped data
    var series_1 = chart.line(seriesData_1);
    series_1.name('Personen');
    series_1.hovered().markers()
            .enabled(true)
            .type('circle')
            .size(4);
    series_1.tooltip()
            .position('right')
            .anchor('left-center')
            .offsetX(5)
            .offsetY(5);

    // turn the legend on
    chart.legend()
            .enabled(true)
            .fontSize(13)
            .padding([0, 0, 10, 0]);

    // set container id for the chart
    chart.container('container');
    // initiate chart drawing
    
    chart.draw();

    }

function loadDiagramm() {
   chart.dispose();
   createChart();
}

function getData() {
    var mylist = document.getElementById("dd");

    <?php
    foreach($this-> as $d1){
      
    }
    ?>

    if (mylist.options[mylist.selectedIndex].text == 'Tag') {
        return [
            ['Montag', $d5],
            ['Dienstag', $d4],
            ['Mittwoch', $d3],
            ['Donnerstag', $d2],
            ['Freitag', $d1]
        ]
    }

    if (mylist.options[mylist.selectedIndex].text == 'Monat') {
        return [
            ['Januar', $m5],
            ['Februar', $m4],
            ['März', $m3],
            ['April', $m2],
            ['Mai', $m1]
        ]
    }

    if (mylist.options[mylist.selectedIndex].text == 'Jahr') {
        return [
            ['2015', $y5],
            ['2016', $y4],
            ['2017', $y3],
            ['2018', $y2],
            ['2019', $y1]
        ]
    }
}
</script>
</body>
</html>

                
