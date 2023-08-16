<h1>Listar usuarios</h1>
<?php
    $sql = "SELECT * FROM usuarios";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
        print"<table class='table table-hover table=striped table-bordered'>";
            print"<tr>";
            print "<th> Id";
            print "<th> Nome";
            print "<th> Email";
            print "<th> Data de Nascimento";
            print "<th> Ações";
            print "</tr>";
        while($row = $res->fetch_object()){
            print"<tr>";
            print "<td>".$row->id;
            print "<td>".$row->nome;
            print "<td>".$row->email;
            print "<td>".$row->data_nasc;
            print "<td>
                    <button onclick=\"location.href='?page=editar&id=".$row->id."';\" class='btn btn-success'>Editar</button>

                    <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false}\" class='btn btn-danger'>Excluir</button>
                </td>";
            print "</tr>";
        }
        print "</table>";
    } else{
        print "<p class='alert alert-danger'>Nao encontrou resultados!</p>";
    }
?>