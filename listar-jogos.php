<h1>Listar Jogos</h1>
<?php

    //if(){ usuario adm
    $sql = "SELECT * FROM jogos";
    //}
    //if(){} usuario programador
    //$sql = "SELECT * FROM jogos where usuarios_id_usuario = da sessao

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
        print "<th>#</th>";    
        print "<th>Nome</th>";
        print "<th>Descrição</th>";
        print "<th>Data de Lançamento</th>";
        print "<tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id_jogo."</td>";    
            print "<td>".$row->descricao_jogo."</td>";
            print "<td>".$row->data_lancamento_jogo."</td>";
            print "<td>
                    <button onclick=\"location.href='?page=editarJogo&id=".$row->id_jogo."';\" 
                    class='btn btn-success'>Editar</button>
                    <button onclick=\"if(confirm('Tem certeza que deseja exluiir?'))
                    {location.href='?page=salvar&acao=excluir&id=".$row->id_jogo."'}else{false;};\" 
                    class='btn btn-danger'>Excluir</button>
                    </td>";
            print "<tr>";
        }
        print "</table>";
    }else{
        print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
    }


?>