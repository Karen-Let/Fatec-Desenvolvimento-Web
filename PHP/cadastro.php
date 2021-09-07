<?php

    define("Filename", "userRegistered.txt");


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if($_POST["cpf"] == null){
            echo "Campo número do cpf é obrigatório.";
            echo '<br /><a href="cadastro.php">Tente registrar novamente</a>';
            die;
        }

        if(!file_exists(Filename))
            $handle = fopen(Filename, "w");
        else 
            $handle = fopen(Filename, "a");

        fwrite($handle, $_POST['username']." - ".$_POST['cpf']."\n");
        fflush($handle);
        fclose($handle);

        header("location: welcome.php");
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>
    <body>
        <div class="container" style="margin-top: 80px;">
            <div style="width: 300px;">
                <h2>Registrar Usuário</h2>
                <br>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="form-group style="margin-top: 15px;"">
                            <label>Primeiro Nome</label>
                            <input type="text" name="username" class="form-control">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group" style="margin-top: 15px;">
                            <label>Número do CPF</label>
                            <input type="number" name="cpf" class="form-control">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group" style="margin-top: 15px;">
                            <input type="submit" class="btn btn-primary" value="Acessar">
                        </div>
                    </form>
            </div>
        </div>
    </body>
</html>


