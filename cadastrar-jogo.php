<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastrar Jogo</title>
</head>
<body>
    <h1>Cadastrar Jogo</h1>
    <form action="salvar-jogo.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="acao" value="cadastrar">
        <input type="hidden" name="id" value="<?php echo $_SESSION['id_usuario']; ?>">
        <div class="mb-3">
            <label>Nome do Jogo</label>
            <input type="text" name="nomeJogo" class="form-control">
        </div>
        <div class="mb-3">
            <label>Descricao do Jogo</label>
            <input type="text" name="descricaoJogo" class="form-control">
        </div>
        <div class="mb-3">
            <label>Data Lançamento (ano/mes/dia)</label>
            <input type="text" name="dataLancamento" class="form-control">
        </div>
        <div class="mb-3">
            <label>Imagem do Jogo</label>
            <input type="file" name="imagemJogo" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</body>

</html>