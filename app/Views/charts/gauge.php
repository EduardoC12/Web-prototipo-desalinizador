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

    <div class="h1" style='margin-top: 45px'>Medidor de temperatura</div>
    <div id="chart_div" style="margin: 0 auto"></div>

    <main class="px-3" width="100%" style='margin-top: 50px'>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script src="/assets/js/jquery-3.5.1.min.js" type="text/javascript"></script>
      <script type="text/javascript">

        google.charts.load('current', { 'packages': ['gauge'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['°C', 0]
          ]);

          var options = {
            width: 380, height: 220,
            min: 40, max: 250,
            minorTicks: 10,
            redFrom: 100, redTo: 250,
            yellowFrom: 40, yellowTo: 100,
            animation: { easing: 'out', duration: 1700 },
          };

          var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

          chart.draw(data, options);

          setInterval(function () {
            $.ajax({
              url: "/gaugeQuery",
              type: "GET",
              dataType: "json",
              success: function (datos) {

                data.setValue(0, 1, datos.temp);
                chart.draw(data, options);

              }
            })
          }, 1000);
        }
      </script>
    </main>
    <div>
      <button onclick="location.href='/temperatureGraphic'" class="btn1"><span>
          << /span></button>
      <button onclick="location.href='/temperatureGraphic'" class="btn1"><img src="../assets/img/home.png"
          alt="x" /><span></span></button>
      <button onclick="location.href='/areaGraphic'" class="btn1"><span>></span></button>
    </div>

    <footer class="mt-auto text-white-50">
      <p>Desarrollado por <a href="https://github.com/EduardoC12" target="_blank" class="text-white">@EduardoC12</a>.
      </p>
    </footer>
  </div>

</body>
</html>