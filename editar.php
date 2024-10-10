<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Cadastrar Aluno</title>
</head>
<body class="container bg-body-secondary p-3 mt-3">
<?php
    $user   = "root";
    $pass   = "";
    $server = "localhost";
    $db     = "cadastroaluno";
    $Id     = $_POST['cod_aluno'];
        
    $mysqli = mysqli_connect($server, $user, $pass, $db);
    $Id     = $_POST['cod_aluno'];

    if($mysqli -> connect_error){
        die('Connect Error');
    }
    $sql    = $mysqli -> query("SELECT * FROM tbl_aluno
                                WHERE cod_aluno = $Id");
    $aux    = mysqli_fetch_assoc($sql);
?>
<?php
if (!empty($_POST['novoPost'])){
    $vId               = $_POST['cod_aluno'];
    $vnomeAluno        = $_POST['nomeAluno'];
    $vsobrenomeAluno   = $_POST['sobrenomeAluno'];
    $vidadeAluno       = $_POST['idadeAluno'];
    $vtelefoneAluno    = $_POST['telefoneAluno'];
    $vemailAluno       = $_POST['emailAluno'];

    if($vnomeAluno && $vsobrenomeAluno && $vidadeAluno && $vtelefoneAluno && $vemailAluno){
        $sqlAtualizar    = "UPDATE tbl_aluno
                                    SET nome      = '$vnomeAluno',
                                        sobrenome = '$vsobrenomeAluno',
                                        idade     = '$vidadeAluno',
                                        telefone  = '$vtelefoneAluno',
                                        email     = '$vemailAluno'
                                    WHERE cod_aluno = $vId";
        
        if($mysqli -> query($sqlAtualizar)){ 
            echo "<div id='staticBackdrop' class='modal fade'>";
            echo "<div class='modal-dialog'>";
            echo "    <div class='modal-content p-3 mb-2 bg-success-subtle text-success-emphasis'>";
            echo "Dados atualizados com sucesso!";
            echo "    </div>";
            echo "</div>";
            echo "</div>";
            echo "<script>";
            echo "const myModal = new bootstrap.Modal('#staticBackdrop');";
            echo "myModal.show();";
            echo "    setTimeout(function() {";
            echo "myModal.hide();";
            echo "window.location.href ='/U4A3%20-%20Atividade%207/'";
            echo "}, 3000);";
            echo "</script>";  
        }
    }else{
        echo "<div id='staticBackdrop' class='modal fade''>";
        echo "<div class='modal-dialog'>";
        echo "    <div class='modal-content p-3 mb-2 bg-danger-subtle text-danger-emphasis'>";
        echo "É necessário preencher todos os campos !";
        echo "    </div>";
        echo "</div>";
        echo "</div>";
        echo "<script>";
        echo "const myModal = new bootstrap.Modal('#staticBackdrop');";
        echo "myModal.show();";
        echo "    setTimeout(function() {";
        echo "myModal.hide();";
        echo "}, 3000);";
        echo "</script>";
    }
}
mysqli_close($mysqli);
?>
<div class="card p-3 m-auto" style="width: 350px;">
    <h3 class="card-title text-center">Editar Dados</h3>
    <form name="cadastro" method="post" action="" >
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <?php
            echo  "<input style='display: none;' type='text' id='cod_aluno' name='cod_aluno' value=".$aux["cod_aluno"].">"; 
            echo  "<input style='display: none;' type='text' id='novoPost' name='novoPost' value='novoPost'>"; 
            echo "<input class='form-control form-control-sm' type='text' id='nomeAluno' value=".$aux["nome"]." name='nomeAluno'></div>"
            ?>
        <div class="mb-3">
            <label class="form-label">Sobrenome</label>
            <?php 
            echo "<input class='form-control form-control-sm' type='text' id='sobrenomeAluno' value=".$aux["sobrenome"]." name='sobrenomeAluno'>"
            ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Idade</label>
            <?php 
            echo "<input class='form-control form-control-sm' type='number' id='idadeAluno' value=".$aux["idade"]." name='idadeAluno'>"
            ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <?php 
            echo "<div><input class='form-control form-control-sm' type='text' id='telefoneAluno' value=".$aux["telefone"]." name='telefoneAluno'></div>"
            ?> 
        </div>
        <div class="mb-3">            
            <label class="form-label">E-mail</label>
            <?php 
            echo "<div><input class='form-control form-control-sm' type='text' id='emailAluno' value=".$aux["email"]." name='emailAluno'></div>"
            ?> 
        </div>
        <button class="btn btn-primary mb-2 w-100" id="buttonCadastrar"type="submit">ATUALIZAR DADOS</button>
    </form>
    <a href="./">
        <button class="btn btn-outline-secondary w-100" id="buttonMostrar"type="submit">VOLTAR</button>
    </a>
    </div>  
</body>
</html>