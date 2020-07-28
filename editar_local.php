<?php
    include 'busca_cep.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Local</title>
    <link rel="stylesheet" href="src/css/bootstrap.css">
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>

    <div class="container w-50">
        <h4>Editar Local</h4>
        <form action="" method="post" onsubmit="return validaCep(this)">
            <div class="form-row mb-3">
                <div class="col-md-3 ">
                    <input type="text" id="cep" placeholder="Digite o CEP" class="form-control " name="cep">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success">buscar</button>
                </div>
            </div>
        </form>
        <span class="required_field" aria-label="Pergunta obrigatória">* Obrigatório</span>
        <form action="update.php" method="post">

            <?php 
                
                $id = $_GET['id'];
                include 'conexao.php';
                $sql = "SELECT * FROM `locais` WHERE id = $id";
                $buscar = mysqli_query($conexao,$sql);

                while ($array = mysqli_fetch_array($buscar)) {
                    
                    $nome = $array['nome'];
                    $cep = $array['cep'];
                    $logradouro = $array['logradouro'];
                    $complemento = $array['complemento'];
                    $numero = $array['numero'];
                    $bairro = $array['bairro'];
                    $uf = $array['uf'];
                    $cidade = $array['cidade'];
                    $dataformatada = new DateTime($data = $array['data']);
                
            ?>
            <div class="form-group">
                <div class="form-group">
                    <label>Nome <span class="required_field" aria-label="Pergunta obrigatória">*</span></label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $nome ?>" required>
                </div>
                <div class="form-group">
                    <label>CEP <span class="required_field" aria-label="Pergunta obrigatória">*</span></label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" value="<?php if (!isset($retorno)) {echo $cep;} else{ echo $retorno->cep;}  ?>" required>
                </div>
                <div class="form-group">
                    <label>Logradouro <span class="required_field" aria-label="Pergunta obrigatória">*</span></label>
                    <input type="text" class="form-control" name="logradouro" placeholder="Logradouro" value="<?php if (!isset($retorno)) {echo $logradouro;} else { echo $retorno->logradouro;} ?>" required>
                </div>
                <div class="form-group">
                    <label>Complemento <span class="required_field" aria-label="Pergunta obrigatória">*</span></label>
                    <input type="text" class="form-control" name="complemento" placeholder="Complemento" value="<?php if (!isset($retorno)) {echo $complemento;} else{ echo $retorno->complemento;}  ?>" required>
                </div>
                <div class="form-row">
                    <div class="col-sm-2">
                        <label>Número <span class="required_field" aria-label="Pergunta obrigatória">*</span></label>
                        <input type="text" class="form-control" name="numero" placeholder="Número" value="<?php echo $numero ?>" required>
                    </div>
                    <div class="col-sm">
                        <label>Bairro <span class="required_field" aria-label="Pergunta obrigatória">*</span></label>
                        <input type="text" class="form-control" name="bairro" placeholder="Bairro" value="<?php if (!isset($retorno)) {echo $bairro;} else{ echo $retorno->bairro;}  ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-2">
                        <label>UF <span class="required_field" aria-label="Pergunta obrigatória">*</span></label>
                        <input type="text" class="form-control" name="uf" placeholder="UF" value="<?php if (!isset($retorno)) {echo $uf;} else{ echo $retorno->uf;}  ?>" required>
                    </div>
                    <div class="col-sm">
                        <label>Cidade <span class="required_field" aria-label="Pergunta obrigatória">*</span></label>
                        <input type="text" class="form-control" name="cidade" placeholder="Cidade" value="<?php if (!isset($retorno)) {echo $cidade;} else{ echo $retorno->localidade;}  ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Data <span class="required_field" aria-label="Pergunta obrigatória">*</span></label>
                        <input type="text" class="form-control" name="data" placeholder="dd-mm-yyyy" value="<?php echo $dataformatada->format('d-m-Y') ?>" required>
                    </div>
                </div>
            </div>
            <?php }?>
            <button class="btn botao_cor" name="insert" type="submit">Enviar</button>
            <a href="index.php" class="btn btn-warning">Voltar</a>
        </form>
    </div>

    <script src="src/js/jquery.js"></script>
    <script src="src/js/jquery.maskedinput.js"></script>
    
    <script>
        function validaCep (){ 
          if (document.getElementById('cep').value == '') {
            alert('Favor informar o CEP para a consulta.');
            return false
          }
        } 
        $(document).ready(function(){
            $("#data").mask("99-99-9999");
        });
    </script>
</body>
</html>