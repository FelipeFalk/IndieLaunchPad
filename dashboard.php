<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>IndieLaunchPad</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="dashboard.php">IndieLaunchPad</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" href="?page=calendario">Calendário</a>
              <a class="nav-link" href="?page=admin">Admin</a>
              <a class="nav-link" href="logout.php">Sair</a>
            </div>
          </div>
        </div>
      </nav>
        
      <div class="container">
        <div class="row">
          <div class="col mt-5">
          <?php
              include("db.php");
              switch (@$_REQUEST["page"]) {
                  case 'calendario':
                      include("calendario.php");
                      break;
                  case 'admin':
                      include("admin.php");
                      break;
                  case 'signin':
                      include("signin.php");
                      break;
                  case 'listar':
                      include("listar-usuario.php");
                      break;
                  case 'salvar':
                      include("salvar-usuario.php");
                      break;
                  case 'editar':
                      include("editar-usuario.php");
                      break;                                               
                  default:
                      print "<h1>Bem vindo!</h1>";
              }
          ?>
          </div>
        </div>
      </div>

      <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>

