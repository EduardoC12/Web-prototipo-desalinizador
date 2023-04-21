<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Historial</title>
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
    <link href="../assets/css/scrollbar.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto"> 
    <div>
      <h3 class="float-md-start mb-0">Fresnel destilation</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="/">Inicio</a>
        <a class="nav-link fw-bold py-1 px-0" href="/temperatureGraphic">Monitoreo</a>
        <a class="nav-link fw-bold py-1 px-0 active" href="">Historial</a>
      </nav>
    </div>
  </header>
  <div class="h1">Datos obtenidos</div>
  <br>
  <div class= "tabla-scroll">
    <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Temperatura [°C]</th>
                    <th>Fecha de registro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historial as $dato):?>
                    <tr style = border-bottom: #C0C0C0>
                        <td><?=$dato['id']?></td>
                        <td><?=$dato['temp']?></td>
                        <td><?=$dato['fecha']?></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
    <div>
    <button onclick="location.reload()" class="btn1"><img src="../assets/img/actualizar.png" alt="x"/><span></span></button>
    </div>

  <footer class="mt-auto text-white-50">
    <p>Desarrollado por  <a href="https://github.com/EduardoC12" target="_blank" class="text-white">@EduardoC12</a>.</p>
  </footer>
</div> 
  </body>
</html>