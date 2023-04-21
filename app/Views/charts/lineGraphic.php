<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monitoreo</title>
  <link rel="icon" href="../assets/img/logo-fresnel.png">

  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>

  <link href="../assets/css/cover.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
      <div>
        <h3 class="float-md-start mb-0">Fresnel destilation</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="/">Inicio</a>
          <a class="nav-link fw-bold py-1 px-0 active" href="">Monitoreo</a>
          <a class="nav-link fw-bold py-1 px-0" href="/historialView">Historial</a>
        </nav>
      </div>
    </header>

    <div class="h1" style='margin-top: 45px'>Gráfica de temperatura</div>
    <div id="chart_div" style="width: 100%; height: 80%;"></div>

    <main class="px-3" width="100%" style='margin-top: 50px'>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script src="/assets/js/jquery-3.5.1.min.js" type="text/javascript"></script>
      <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var currentView;

          var data = new google.visualization.DataTable();
          data.addColumn('datetime', 'Tiempo');
          data.addColumn('number', 'Temperatura');

          var options = {
            legend: { position: 'none' },
            vAxis: {
              title: 'Temperatura',
              titleTextStyle: { color: 'white', bold: true },
              textStyle: { color: 'white', italic: false, fontName: 'Consolas', fontSize: 14 },
              gridlines: { color: 'transparent' },
            },
            hAxis: {
              title: 'Tiempo',
              titleTextStyle: { color: 'white', bold: true },
              textStyle: { color: 'white', italic: false, fontName: 'Consolas', fontSize: 14 },
              gridlines: { color: 'transparent' },
              baselineColor: 'white',
              viewWindowMode: 'pretty',
            },
            backgroundColor: 'transparent',
            curveType: 'function',
            animation: { easing: 'out', duration: 1700 },
            animation: { "startup": true },
            explorer: {
              axis: 'horizontal',
              keepInBounds: false,
            },
          };

          var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

          $.ajax({
            url: "/linesQuery",
            type: "GET",
            dataType: "json",
            success: function (datos) {
              data.addRows(jsonArray(datos));
              chart.draw(data, options);
            }
          });
        }

        function jsonArray(obj) {
          var res = [];
          for (var i in obj) {
            var row = [];
            row.push(new Date(obj[i]['fecha']));
            row.push(parseInt(obj[i]['temp']));
            res.push(row);
          }
          return res;
        }

        $(document).ready(function () {
          setInterval(drawChart, 11000);
        });

      </script>
    </main>
    <div>
      <button onclick="location.href='/gaugeView'" class="btn0"><span>></span></button>
    </div>


    <footer class="mt-auto text-white-50">
      <p>Desarrollado por <a href="https://github.com/EduardoC12" target="_blank" class="text-white">@EduardoC12</a>.
      </p>
    </footer>
  </div>

</body>

</html>