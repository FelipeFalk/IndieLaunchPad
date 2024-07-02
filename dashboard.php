<?php
session_start();
include_once ('db.php');

// Verifica se o usuário está logado
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: index.php');
}

// Obtém o email do usuário logado
$logado = $_SESSION['email'];

// Busca o papel do usuário logado
$sql_user_role = "SELECT cargos_id_cargo FROM usuarios WHERE email_usuario = '$logado'";
$result_user_role = $conn->query($sql_user_role);
$user_role = 0;

if ($result_user_role->num_rows > 0) {
    $row = $result_user_role->fetch_assoc();
    $user_role = $row['cargos_id_cargo'];
}

// Consulta para buscar os jogos com o nome do criador
// Consulta SQL para buscar jogos com filtros
$sql_jogos = 'SELECT j.id_jogo,
    j.descricao_jogo,
    j.links_jogo,
    j.data_lancamento_jogo,
    j.nome_jogo,
    j.qntd_votos_up_jogo,
    j.qntd_votos_down_jogo,
    j.usuarios_id_usuario,
    u.apelido_usuario
    FROM jogos j
    LEFT JOIN usuarios u ON j.usuarios_id_usuario = u.id_usuario
    WHERE 1=1';

// Aplicar filtros
if (!empty($_GET['search_game'])) {
    $search_game = $_GET['search_game'];
    $sql_jogos .= " AND j.nome_jogo LIKE '%$search_game%'";
}
if (!empty($_GET['search_developer'])) {
    $search_developer = $_GET['search_developer'];
    $sql_jogos .= " AND u.apelido_usuario LIKE '%$search_developer%'";
}

$sql_jogos .= " ORDER BY j.data_lancamento_jogo DESC LIMIT 50";

$result_jogos = $conn->query($sql_jogos);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/bootstrap.js"></script>

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

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        h1 {
            text-align: center;
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
                <ul class="navbar-nav">
                    <?php if ($user_role == 2 || $user_role == 3): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="manageGamesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gerenciar Jogos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="manageGamesDropdown">
                                <a class="dropdown-item" href="?page=cadastrarJogo">Novo Jogo</a>
                                <a class="dropdown-item" href="?page=listarJogos">Editar Jogo</a>
                                <?php if ($user_role == 3): ?>
                                    <a class="dropdown-item" href="?page=listarJogos">Adicionar Tag</a>
                                    <a class="dropdown-item" href="?page=listarJogos">Editar Tags</a>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if ($user_role == 3): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Admin
                            </a>
                            <div class="dropdown-menu" aria-labelledby="adminDropdown">
                                <a class="dropdown-item" href="?page=signin">Cadastrar Usuário</a>
                                <a class="dropdown-item" href="?page=listar">Listar Usuários</a>
                            </div>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <?php
                switch (@$_REQUEST["page"]) {
                    case 'calendario':
                        include ("calendario.php");
                        break;
                    case 'admin':
                        // Verifica se o usuário é administrador (papel 3)
                        if ($user_role == 3) {
                            include ("admin.php");
                        } else {
                            echo "<p>Você não tem permissão para acessar esta página.</p>";
                        }
                        break;
                    case 'signin':
                        include ("signin.php");
                        break;
                    case 'listar':
                        // Verifica se o usuário é administrador (papel 3)
                        if ($user_role == 3) {
                            include ("listar-usuario.php");
                        } else {
                            echo "<p>Você não tem permissão para acessar esta página.</p>";
                        }
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
                        // Verifica se o usuário é desenvolvedor (papel 2) ou administrador (papel 3)
                        if ($user_role == 2 || $user_role == 3) {
                            include ('gerenciar-jogos.php');
                        } else {
                            echo "<p>Você não tem permissão para acessar esta página.</p>";
                        }
                        break;
                    case 'cadastrarJogo':
                        // Verifica se o usuário é desenvolvedor (papel 2) ou administrador (papel 3)
                        if ($user_role == 2 || $user_role == 3) {
                            include ('cadastrar-jogo.php');
                        } else {
                            echo "<p>Você não tem permissão para acessar esta página.</p>";
                        }
                        break;
                    case 'editarJogo':
                        // Verifica se o usuário é desenvolvedor (papel 2) ou administrador (papel 3)
                        if ($user_role == 2 || $user_role == 3) {
                            include ('editar-jogo.php');
                        } else {
                            echo "<p>Você não tem permissão para acessar esta página.</p>";
                        }
                        break;
                    case 'excluirJogo':
                        // Verifica se o usuário é desenvolvedor (papel 2) ou administrador (papel 3)
                        if ($user_role == 2 || $user_role == 3) {
                            include ('excluir-jogo.php');
                        } else {
                            echo "<p>Você não tem permissão para acessar esta página.</p>";
                        }
                        break;
                    default:
                        echo "<h1 class='text-center'>Jogos Disponíveis</h1>";
                        ?>
                        <!-- Formulário de Busca -->
                        <form method="GET" action="">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <input type="text" name="search_game" class="form-control" placeholder="Pesquisar por nome do jogo" value="<?php echo isset($_GET['search_game']) ? $_GET['search_game'] : ''; ?>">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="search_developer" class="form-control" placeholder="Pesquisar por nome do desenvolvedor" value="<?php echo isset($_GET['search_developer']) ? $_GET['search_developer'] : ''; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
                        <div class="cards-container" style="display: flex; flex-wrap: wrap;">
                        <?php
                        if ($result_jogos->num_rows > 0) {
                            while ($row = $result_jogos->fetch_assoc()) {
                                $image_path = 'img/' . $row["id_jogo"] . '_imagem.jpg';
                                echo '<div class="card">';
                                echo '<div class="image-container" style="background-image: url(' . $image_path . ');">';
                                echo '<h2>' . $row["nome_jogo"] . '</h2>';
                                echo '</div>';
                                echo '<div class="details">';
                                echo '<p>' . $row["descricao_jogo"] . '</p>';
                                echo '<p>Criador: ' . $row["apelido_usuario"] . '</p>';
                                echo '<p>Data de lançamento: ' . $row["data_lancamento_jogo"] . '</p>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo "Nenhum jogo encontrado.";
                        }
                        ?>
                        </div>
                        <?php
                        break;
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
