<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">
  <title>PQRS - Dashboard</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
  <link rel="shortcut icon" href="panne.png">

  <link href="bootstrap.min.css" rel="stylesheet">


  <style>
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }

    .message-box {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      text-align: center;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .message-box h3 {
      font-size: 24px;
      margin-bottom: 15px;
    }

    .message-box button {
      padding: 10px 20px;
      background-color: #8B4513;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .message-box button:hover {
      background-color: #654321;
    }

    .container-fluid {
      padding-top: 70px;
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
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="sign-in.html">Cerrar sesión</a>
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
              <a class="nav-link" href="#">
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
              <a class="nav-link" href="PQRS.html">
                <span data-feather="layers" class="align-text-bottom"></span>
                PQRS
              </a>
            </li>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="overlay" id="overlay" style="display: none;">
        </div>

        <!-- Contenido del dashboard -->
        <h1 class="mt-5">Peticiones, Quejas, Reclamos y Sugerencias</h1>
        <div class="card mt-4">
        <div class="card-body">
          <h5 class="card-title">PQRS</h5>
          <p class="card-text">Aquí puedes ver las Peticiones, Quejas, Reclamos y Sugerencias de tus clientes.</p>
            
                <?php
                include 'PQRS.php';
                  // Realiza la consulta a la base de datos para obtener las PQRS
            
                  // Ejemplo de consulta utilizando MySQLi
                  $conexion = new mysqli("localhost", "root", "", "conection_pane_cafe");
            
                  if ($conexion->connect_error) {
                    die("Error de conexión a la base de datos: " . $conexion->connect_error);
                  }
            
                  $sql = "SELECT * FROM PQRS";
                  $result = $conexion->query($sql);
            
                  // Genera el contenido HTML para mostrar las PQRS
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
      echo "<div class='pqrs-item'>";
      echo "<button class='pqrs-btn' data-toggle='collapse' data-target='#pqrs" . $row['idPQRS'] . "'>";
      echo "Código de PQRS: " . $row['codigo_pqrs'];
      echo "</button>";
      echo "<div id='pqrs" . $row['idPQRS'] . "' class='collapse pqrs-details'>";
      echo "<h6>Tipo de Solicitud: " . $row['tipo_solicitud'] . "</h6>";
      echo "<p>Nombre del Cliente: " . $row['nombre_cliente'] . " " . $row['apellido_cliente'] . "</p>";
      echo "<p>Documento: " . $row['tipo_documento'] . " " . $row['numero_documento'] . "</p>";
      echo "<p>Mensaje: " . $row['mensaje'] . "</p>";
      echo "</div>";
      echo "</div>";
  }
} else {
  echo "No se encontraron PQRS.";
}
            
                  $conexion->close();
                ?>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <style>
  .pqrs-item {
    margin-bottom: 10px;
  }

  .pqrs-btn {
    width: 100%;
    padding: 10px;
    background-color: #f5f5f5;
    border: none;
    text-align: left;
    font-size: 16px;
    cursor: pointer;
    outline: none;
    transition: background-color 0.3s;
  }

  .pqrs-btn:hover {
    background-color: #e0e0e0;
  }

  .pqrs-details {
    padding: 10px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    margin-top: 10px;
  }
</style>
<script>
  // Obtén todos los botones de las PQRS
  const pqrsButtons = document.querySelectorAll('.pqrs-btn');

  // Agrega un evento de clic a cada botón
  pqrsButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Obtén el objetivo del botón (el contenedor de detalles de la PQRS)
      const targetId = button.getAttribute('data-target');
      const target = document.querySelector(targetId);

      // Alterna la clase 'show' en el contenedor para expandir o colapsar los detalles
      target.classList.toggle('show');
    });
  });
</script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>

  <script>
    document.querySelector('form').addEventListener('submit', function(event) {
      event.preventDefault();

      // Mostrar el cuadro de mensaje
      document.getElementById('overlay').style.display = 'flex';
    });
  </script>
</body>
</html>