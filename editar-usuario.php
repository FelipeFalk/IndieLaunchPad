<body>
<h1>Editar usuário</h1>
<?php
    $sql = "SELECT * FROM usuarios WHERE id_usuario=".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=salvar-usuario" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->id_usuario?>">
    <div class="mb-3">
        <label>Cargo</label>
        <input type="number" name="cargo" value="<?php print $row->cargos_id_cargo; ?>" class="form-control" > 
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
<script src="js/bootstrap.bundle.min.js"></script>  
</body>
