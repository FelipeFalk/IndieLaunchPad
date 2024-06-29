<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col mt-5">
                    <h2>Login</h2>
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" name="email"
                                required><br><br>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password:</label>
                            <input type="password" id="senha" name="senha"
                                required><br><br>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="submit" value="Enviar">
                        </div>

                    </form>
                    <a class="nav-link" href="signin.php">
                        <h3>cadastre-se</h3>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>