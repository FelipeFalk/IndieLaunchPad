<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once('db.php');

// Verifica se o usuário está logado
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: index.php');
}

// Obtém o email do usuário logado
$logado = $_SESSION['email'];

// Busca o papel do usuário logado e seu ID
$sql_user_role = "SELECT id_usuario, cargos_id_cargo FROM usuarios WHERE email_usuario = '$logado'";
$result_user_role = $conn->query($sql_user_role);
$user_role = 0;
$user_id = 0;

if ($result_user_role->num_rows > 0) {
    $row = $result_user_role->fetch_assoc();
    $user_role = $row['cargos_id_cargo'];
    $user_id = $row['id_usuario'];
}

// Consulta SQL para buscar jogos
if ($user_role == 3) {
    // Usuário administrador pode ver todos os jogos
    $sql = "SELECT * FROM jogos";
} elseif ($user_role == 2) {
    // Usuário desenvolvedor só pode ver seus próprios jogos
    $sql = "SELECT * FROM jogos WHERE usuarios_id_usuario = $user_id";
} else {
    echo "<p class='alert alert-danger'>Você não tem permissão para acessar esta página.</p>";
    exit;
}

$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<h1>Listar Jogos</h1>";
    print "<table class='table table-hover table-striped table-bordered'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>Descrição</th>";
    print "<th>Data de Lançamento</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id_jogo . "</td>";
        print "<td>" . $row->nome_jogo . "</td>";
        print "<td>" . $row->descricao_jogo . "</td>";
        print "<td>" . $row->data_lancamento_jogo . "</td>";
        print "<td>";

        // Botão Editar está disponível para todos
        print "<button onclick=\"location.href='?page=editarJogo&id=" . $row->id_jogo . "';\" class='btn btn-success'>Editar</button>";

        // Botão Excluir só está disponível para administradores ou para desenvolvedores que são os donos do jogo
        if ($user_role == 3 || ($user_role == 2 && $row->usuarios_id_usuario == $user_id)) {
            print "<button onclick=\"if(confirm('Tem certeza que deseja excluir?')) {location.href='?page=salvarJogo&acao=excluir&id=" . $row->id_jogo . "';} else {false;};\" class='btn btn-danger'>Excluir</button>";
        }

        print "</td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "<p class='alert alert-danger'>Não foram encontrados resultados!</p>";
}
?>
