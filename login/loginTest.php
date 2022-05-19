<?php

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        include_once('../config.php');

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and pass = '$password'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1) {
            header('Location: index.php');
        } else {
            print_r("Você foi logado com sucesso!");
        }
    } else {
        header('Location: index.php');
    }
    
?>