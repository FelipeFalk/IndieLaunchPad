<?php
if (!isset($_SESSION)) {
    session_start();
}
$logado = isset($_SESSION['email']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Novo Usuário</title>
</head>
<?php if (!$logado) {
    echo '


<div class="container">
<div class="row">
    <div class="col mt-5">
    <h1>Cadastre-se</h1>
<form action="salvar-usuario.php" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control">
    </div>
    <div class="mb-3">
        <label>Apelido</label>
        <input type="text" name="apelido" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    </div>
    </div>
    </div>
    ';
} ?>
<?php if ($logado) {
    $sql = "SELECT * FROM cargos";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;
    $options = "";
    while ($row = $res->fetch_object()) {
        $options = $options . '<option value="' . $row->id_cargo . '">' . $row->descricao_cargo . '</option>';
    }
    echo '
    <h1>Cadastrar novo usuário</h1>
    <form action="salvar-usuario.php" method="POST">
    <input type="hidden" name="acao" value="cadastrar-admin">
    <div class="mb-3">
        <label>Cargo</label>
        <select name="cargo" class="form-control">' . $options . '</select>
    </div
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control">
    </div>
    <div class="mb-3">
        <label>Apelido</label>
        <input type="text" name="apelido" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    ';
} ?>
</form>