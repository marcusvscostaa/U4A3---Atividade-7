<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Todos os dados</title>
</head>
<body class='bg-body-secondary'>
    <div class="container card p-3 mt-5">
    <?php
        $user   = "root";
        $pass   = "";
        $server = "localhost";
        $db     = "cadastroaluno";

        $mysqli = mysqli_connect($server, $user, $pass, $db);

        if($mysqli -> connect_error){
            die('Connect Error');
        }

        if(!empty($_POST['cod_aluno'])){
            $codAluno = $_POST['cod_aluno'];
            $sqlDelete    = "DELETE FROM tbl_aluno WHERE cod_aluno = $codAluno";
            
            if($mysqli -> query($sqlDelete)){ 
                echo "<div id='staticBackdrop' class='modal fade'>";
                echo "<div class='modal-dialog'>";
                echo "    <div class='modal-content p-3 mb-2 bg-success-subtle text-success-emphasis'>";
                echo "Aluno excluido com sucesso";
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

        }
    ?>

    <?php

        $sql = $mysqli -> query("SELECT * FROM tbl_aluno");
        echo "<table class='table table-hover'>";
        echo "<thead>";
        echo    "<tr>";
        echo        "<th scope='col'>Código Aluno</th>";
        echo        "<th scope='col'>Nome</th>";
        echo        "<th scope='col'>Sobrnome</th>";
        echo        "<th scope='col'>Idade</th>";
        echo        "<th scope='col'>Telefone</th>";
        echo        "<th scope='col'>Email</th>";
        echo        "<th scope='col'></th>";
        echo        "<th scope='col'></th>";
        echo    "</tr>";
        echo "</thead>";
        while($aux = mysqli_fetch_assoc($sql)) {
            echo "<tr>";
            echo "<th scope='row'>".$aux["cod_aluno"]."</th>";  
            echo "<td>".$aux["nome"]."</td>"; 
            echo "<td>".$aux["sobrenome"]."</td>"; 
            echo "<td>".$aux["idade"]."</td>"; 
            echo "<td>".$aux["telefone"]."</td>"; 
            echo "<td>".$aux["email"]."</td>";
            echo "<td>";
            //echo "<div style='display: flex;'>";
            echo "<form name='cadastro' method='post' action='editar.php' >";
            echo    "<input style='display: none;' type='text' id='cod_aluno' name='cod_aluno' value=".$aux["cod_aluno"].">";
            echo    "<button class='btn btn-warning btn-sm w-100' type='submit'>EDITAR</button>";
            echo "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form name='cadastro' method='post' action='' >";
            echo    "<input style='display: none;' type='text' id='cod_aluno' name='cod_aluno' value=".$aux["cod_aluno"].">";
            echo    "<button class='btn btn-danger btn-sm w-100' type='submit'>EXCLUIR</button>";
            echo "</form>";
            //echo "</div>";
            echo "</td>";
            echo "</tr>"; 
        }
        echo  "</tbody>";
        echo  "<tfoot>";
        echo  "</tfoot>";
        echo "</table>";
        mysqli_close($mysqli);
        
    ?>
    <div class='w-100 d-flex'>
    <a class='ms-auto' href="./cadastro.php"><button class='btn btn-primary ms-auto'>CADASTRAR NOVO ALUNO</button></a>
    </div>
    </div>
</body>
<footer>
</footer>
</html>