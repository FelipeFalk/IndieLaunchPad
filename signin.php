<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastre-se</title>
</head>
<h1>Cadastre-se</h1>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control">
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
        <label>Data de Nascimento</label>
        <input type="date" name="data_nasc" class="form-control">
    </div>
    <div class="mb-3">
        <button type="subimit" class="btn btn-primary">Enviar</button>
    </div>    
</form>