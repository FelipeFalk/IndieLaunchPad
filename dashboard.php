<?php
session_start();
include_once ('db.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: index.php');
}
$logado = $_SESSION['email'];
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM usuarios WHERE id_usuario LIKE '%$data%' or nome_real_usuario LIKE '%$data%' or email_usuario LIKE '%$data%' ORDER BY id_usuario DESC";
} else {
    $sql = "SELECT * FROM usuarios ORDER BY id_usuario DESC";
}
$result = $conn->query($sql);

// Consulta para buscar os jogos
$sql_jogos = "SELECT * FROM jogos ORDER BY id_jogo DESC";
$result_jogos = $conn->query($sql_jogos);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>IndieLaunchPad</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 0;
            margin: 20px;
            width: 200px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card .image-container {
            width: 100%;
            height: 200px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .card .image-container h2 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            margin: 0;
            padding: 10px;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            text-align: center;
            box-sizing: border-box;
        }

        .card .details {
            padding: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">IndieLaunchPad</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="?page=calendario">Calendário</a>
                    <a class="nav-link" href="?page=gerenciarJogo">Gerenciar Jogos</a>
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
                include ("db.php");
                switch (@$_REQUEST["page"]) {
                    case 'calendario':
                        include ("calendario.php");
                        break;
                    case 'admin':
                        include ("admin.php");
                        break;
                    case 'signin':
                        include ("signin.php");
                        break;
                    case 'listar':
                        include ("listar-usuario.php");
                        break;
                    case 'listarJogos':
                        include ("listar-jogos.php");
                        break;
                    case 'salvar':
                        include ("salvar-usuario.php");
                        break;
                    case 'salvarJogo':
                        include ("salvar-jogo.php");
                        break;
                    case 'editar':
                        include ("editar-usuario.php");
                        break;
                    case 'gerenciarJogo':
                        include ('gerenciar-jogos.php');
                        break;
                    case 'cadastrarJogo':
                        include ('cadastrar-jogo.php');
                        break;
                    case 'editarJogo':
                        include ('editar-jogo.php');
                        break;
                    case 'excluirJogo':
                        include ('excluir-jogo.php');
                        break;
                    default:
                        print "<h1>Jogos Disponíveis</h1>";
                        print '<div class="cards-container" style="display: flex; flex-wrap: wrap;">';
                        if ($result_jogos->num_rows > 0) {
                            while ($row = $result_jogos->fetch_assoc()) {
                                $image_path = 'img/' . $row["id_jogo"] . '_imagem.jpg';
                                echo '<div class="card">';
                                echo '<div class="image-container" style="background-image: url(' . $image_path . ');">';
                                echo '<h2>' . $row["nome_jogo"] . '</h2>';
                                echo '</div>';
                                echo '<div class="details">';
                                echo '<p>' . $row["descricao_jogo"] . '</p>';
                                echo '<p>Data de lançamento: ' . $row["data_lancamento_jogo"] . '</p>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo "Nenhum jogo encontrado.";
                        }
                        print '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>