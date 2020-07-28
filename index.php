<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Locais</title>
    <link rel="stylesheet" href="src/css/bootstrap.css">
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    
    <div class="container w-75">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="">Projeto - Meus locais</h1>
            </div>
        </div>

        <table class="table">
            <div>
                <a class="btn btn-md m-2 btn-success" href="cadastrar_local.php"><i class="far fa-edit"></i>&nbsp;Criar novo local</a>
            </div>
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            
            <?php 
                include 'conexao.php';
                $sql = "SELECT `id`, `nome`, `data`, `uf` FROM `locais`";
                $buscar = mysqli_query($conexao,$sql);

                while ($array = mysqli_fetch_array($buscar)) {
                    $id = $array['id'];
                    $nome = $array['nome'];
                    $dataformatada = new DateTime($data = $array['data']);
                    $uf = $array['uf'];
                    
            ?>
                <tr class="<?php if ($uf == 'MG') echo 'row_mg' ?>">
                    <td><?php echo $nome ?></td>
                    <td><?php echo $dataformatada->format('d-m-Y') ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="editar_local.php?id=<?php echo $id?>"><i class="far fa-edit"></i>&nbsp;Editar</a>
                        <a class="btn btn-sm btn-danger" href="delete.php?delete=<?php echo $id?>"><i class="far fa-trash-alt"></i>&nbsp;Apagar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <script src="src/js/jquery.js"></script>
    <script src="src/js/bootstrap.js"></script>
    <script src="src/js/popper.js"></script>
    <script src="src/js/main.js"></script>
</body>
</html>