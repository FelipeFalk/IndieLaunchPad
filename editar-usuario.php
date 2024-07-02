<body>
<h1>Editar usuário</h1>
<?php
    $sql = "SELECT * FROM usuarios WHERE id_usuario=".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    $sqlOptions = "SELECT * FROM cargos";

    $resOptions = $conn->query($sqlOptions);

    $qtd = $resOptions->num_rows;
    $options = "";
    while ($rowOptions = $resOptions->fetch_object()) {
        $options = $options . '<option value="' . $rowOptions->id_cargo . '">' . $rowOptions->descricao_cargo . '</option>';
    }
?>

<?php if ($_SESSION['cargos_id_cargo'] == 3) : ?>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->id_usuario?>">
    <div class="mb-3">
            <label>Cargo</label>
            <select name="cargo" class="form-control"><?php print $options?></select>
    </div>
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="<?php print $row->nome_real_usuario; ?>" class="form-control" > 
    </div>
    <div class="mb-3">
        <label>Apelido</label>
        <input type="text" name="apelido" value="<?php print $row->apelido_usuario; ?>" class="form-control" > 
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" value="<?php print $row->email_usuario; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
        
</form> 
<?php endif; ?>
<?php if ($_SESSION['cargos_id_cargo'] != 3) : ?>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editarSimples">
    <input type="hidden" name="id" value="<?php print $row->id_usuario?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="<?php print $row->nome_real_usuario; ?>" class="form-control" > 
    </div>
    <div class="mb-3">
        <label>Apelido</label>
        <input type="text" name="apelido" value="<?php print $row->apelido_usuario; ?>" class="form-control" > 
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" value="<?php print $row->email_usuario; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>  
</form> 
<?php endif; ?>
<script src="js/bootstrap.bundle.min.js"></script>  
</body>
