<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">
  <title>Panne e caffé</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

  <link rel="shortcut icon" href="panne.png">

  <link href="bootstrap.min.css" rel="stylesheet">

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


  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">
</head>
<body>


  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="index.html">
      <img src="panne.png" alt="" width="40%" width="40%">
    </a>

    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Buscar" aria-label="Buscar">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="sign-in.html">Cerrar sesion</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <div id="opciones"></div>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">
                <span data-feather="home" class="align-text-bottom"></span>
                Inicio
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ordenes.html">
                <span data-feather="file" class="align-text-bottom"></span>
                Ordenes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard_admin.html">
                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                Productos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                Reporte de ventas
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="PQRS.php">
                <span data-feather="layers" class="align-text-bottom"></span>
                PQRS
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">

          </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Inventario</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
              </div>
              <div class="btn-group me-2">
              <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#agregarProductoModal" onclick="window.location.href = '/formulario_agregar_producto.php'">Agregar Producto</button>


              </div>
            </div>
          </div>

          <h2>Inventario Productos</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                <th scope="col">Nombre Producto</th>
                  <th scope="col">Valor Producto</th>
                  <th scope="col">Tipo de Producto</th>
                  <th scope="col">Fecha Caducidad</th>
                  <th scope="col">id producto</th>
                  <th scope="col">fecha_produccion</th>
                  <th scope="col">cantidad</th>
                  <th scope="col">idSalidas</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // conexion base de datos
                $conn = mysqli_connect("localhost", "root", "","conection_pane_cafe" );
                
                // verificar conexion 
                if (!$conn){
                  die("error al conectar a la base de datos:" . mysqli_connect_error());
                }

                //consultar tabla productos 
                $query = "SELECT * FROM Inventario_Productos";
                $result = mysqli_query($conn, $query);

                //mostrar los registros en la tabla 
                while ($row = mysqli_fetch_assoc($result)){
                  echo "<tr>";
                  echo "<td>" . $row ['nom_producto'] . "</td>";
                  echo "<td>" . $row ['valor_producto'] . "</td>";
                  echo "<td>" . $row ['tipo_producto'] . "</td>";
                  echo "<td>" . $row ['fecha_caducidad'] . "</td>";
                  echo "<td>" . $row ['idProducto'] . "</td>";
                  echo "<td>" . $row ['fecha_produccion'] . "</td>";
                  echo "<td>" . $row ['cantidad'] . "</td>";
                  echo "<td>" . $row ['idSalidas'] . "</td>";
                  echo "<th><a class='btn btn-sm btn-outline-secondary' href='editar_producto.php?codigo=" . $row['idProducto'] . "'>Editar</a>  <a class='btn btn-sm btn-outline-secondary' href='eliminar_producto.php?codigo=" . $row['idProducto'] . "'>Eliminar</a></td>";
                  echo "</tr>";  
                }
                ?>
              
      </div>
    </div>

 

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6BdGpe9k9QR9SPFZhlVDBpsKaPOrXlKo" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
  </html>
