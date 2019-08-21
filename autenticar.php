<?php
    if($_POST){
        session_start();
        $conn = mysqli_connect('localhost','root','');
        $banco = mysqli_select_db($conn,'sistemalogin');
        mysqli_set_charset($conn,'utf8');

        // recebendo email e senha de login.php
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //FILTER_VALIDATE_EMAIL -> Varifica e-mail válido
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // Verifico se algum cliente possui email e senha informados
        $query = $conn->query("SELECT * FROM cliente WHERE email = '{$email}'");

        // Transformo $query em um array
        $row = $query->fetch_assoc();
        // Se houver, retornou um registro

        $count = $query->num_rows;
        if ($count > 0){

            if (password_verify($senha, $row['senha'])) {
                $_SESSION['userEmail'] = $row['email'];
                $_SESSION['userId'] = $row['id'];
                header("location: home.php");
            }
            else {
                header("location: login.php?err=101");
            }
           
        }else{
            
            header("location: login.php?err=101");
        }
    }else{
        // email incorreto
        header("location: login.php?err=103");
    }

    }else{
        // acesso não autorizado (direto no arquivo)
        header("location: login.php?err=102");
    }


?>