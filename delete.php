<?php 

    include 'conexao.php';

    $id = $_GET['delete'];

    $sql = "DELETE FROM `locais` WHERE id = $id";
    mysqli_query($conexao,$sql);

    header('Location:index.php');
?>