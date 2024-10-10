<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Cadastrar Aluno</title>
</head>
<?php
if (!empty($_POST)){
    //COLETAR DADOS DO POST
    $nomeAluno        = $_POST['nomeAluno'];
    $sobrenomeAluno   = $_POST['sobrenomeAluno'];
    $idadeAluno       = $_POST['idadeAluno'];
    $telefoneAluno    = $_POST['telefoneAluno'];
    $emailAluno       = $_POST['emailAluno'];

    //VERIFICAR SE TODOS OS DADOS ESTÃO PREENCHIDOS
    if($nomeAluno && $sobrenomeAluno && $idadeAluno && $telefoneAluno && $emailAluno){
        //CONEXÃO COM BANCO DE DADOS
        $user   = "root";
        $pass   = "";
        $server = "localhost";
        $db     = "cadastroaluno";
        $mysqli = mysqli_connect($server, $user, $pass, $db);
        if($mysqli -> connect_error){
            die('Connect Error');
        }
        
        //GRAVAR DADOS NO BANCO DE DADOS
        $sql = "INSERT INTO tbl_aluno(NOME, SOBRENOME, IDADE, TELEFONE, EMAIL) 
                                    VALUES('$nomeAluno','$sobrenomeAluno', '$idadeAluno', '$telefoneAluno', '$emailAluno')";
        if($mysqli -> query($sql)){ 
            echo "<div id='staticBackdrop' class='modal fade'>";
            echo "<div class='modal-dialog'>";
            echo "    <div class='modal-content p-3 mb-2 bg-success-subtle text-success-emphasis'>";
            echo "Cadastro realizado com sucesso!";
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
        //FECHAR CONEXÃO
        mysqli_close($mysqli);
    }else{
        //MENSAGEM DE ERRO CASO FALTE PREENCHER ALGUM DADO
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

?>
<body class="container bg-body-secondary p-3 mt-3">
    <div class="card p-5 m-auto" style="width: 400px;">
        <h3 class="card-title text-center">Cadastrar Aluno</h3>
        <form name="cadastro" method="POST" action="">
            <div class="mb-3">
                <label for="validationServer01" class="form-label">Nome</label>
                <input class="form-control form-control-sm" type="text" id="validationServer01" name="nomeAluno" value="<?php if(!empty($_POST)){echo $_POST['nomeAluno'];}?>" >
            </div>
            <div class="mb-3">
                <label class="form-label">Sobrenome</label>
                <input class="form-control form-control-sm" type="text" id="sobrenomeAluno" name="sobrenomeAluno" value="<?php if(!empty($_POST)){echo $_POST['sobrenomeAluno'];}?>"  >
            </div>
            <div class="mb-3">
                <label class="form-label">Idade</label>
                <input class="form-control form-control-sm" type="number" id="idadeAluno" name="idadeAluno"value="<?php if(!empty($_POST)){echo $_POST['idadeAluno'];}?>" >
            </div>
            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input class="form-control form-control-sm" type="text" id="telefoneAluno" name="telefoneAluno" value="<?php if(!empty($_POST)){echo $_POST['telefoneAluno'];}?>">
            </div>
            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input class="form-control form-control-sm" type="text" id="emailAluno" name="emailAluno"value="<?php if(!empty($_POST)){echo $_POST['emailAluno'];}?>" >
            </div>
            <button type="submit" class="btn btn-primary mb-2 w-100" id="buttonCadastrar" name="buttonCadastrar">CADASTRAR</button>
        </form>
        <a href="./"><button class="btn btn-outline-secondary w-100" id="buttonMostrar" type="submit">MOSTRAR TODOS OS DADOS</button></a>        
    </div>
</body>
</html>