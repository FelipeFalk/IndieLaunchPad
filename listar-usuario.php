<h1>Listar usuários</h1>
<?php
    $sql = "SELECT * FROM usuarios";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
        print "<th>#</th>";    
        print "<th>Nome</th>";
        print "<th>Apelido</th>";
        print "<th>E-mail</th>";
        print "<th>Ações</th>";
        print "<tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id_usuario."</td>";    
            print "<td>".$row->nome_real_usuario."</td>";
            print "<td>".$row->apelido_usuario."</td>";
            print "<td>".$row->email_usuario."</td>";
            print "<td>
                    <button onclick=\"location.href='?page=editar&id=".$row->id_usuario."';\" 
                    class='btn btn-success'>Editar</button>
                    <button onclick=\"if(confirm('Tem certeza que deseja exluiir?'))
                    {location.href='?page=salvar&acao=excluir&id=".$row->id_usuario."'}else{false;};\" 
                    class='btn btn-danger'>Excluir</button>
                    </td>";
            print "<tr>";
        }
        print "</table>";
    }else{
        print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
    }


?>