<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        .btn-outline-custom {
            color: #000;
            border-color: #000;
        }
        .btn-outline-custom:hover {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <h1>Login</h1>
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" id="senha" name="senha" class="form-control" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                        <a href="signin.php" class="btn btn-outline-custom">Cadastre-se</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
