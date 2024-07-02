<body>
<h1>Editar Jogo</h1>
<?php
    $sql = "SELECT * FROM jogos WHERE id_jogo=".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=salvar-jogo" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->id_jogo?>">
    <div class="mb-3">
        <label>Nome do Jogo</label>
        <input type="text" name="nomeJogo" value="<?php print $row->nome_jogo; ?>" class="form-control" > 
    </div>
    <div class="mb-3">
        <label>Descrição do Jogo</label>
        <input type="text" name="descricaoJogo" value="<?php print $row->descricao_jogo; ?>" class="form-control" > 
    </div>
    <div class="mb-3">
        <label>Data de Lançamento</label>
        <input type="email" name="dataLancamento" value="<?php print $row->data_lancamento_jogo; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
        
</form> 
<script src="js/bootstrap.bundle.min.js"></script>  
</body>
