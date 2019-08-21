<?php
    session_start();

    if(isset($_SESSION['userId'])){
        $email = $_SESSION['userEmail'];
        $id = $_SESSION['userId'];
    }else{
        header("location: login.php?err=102");
        exit;
    }

    if($_POST){
        $conn = mysqli_connect('localhost','root','');
        $banco = mysqli_select_db($conn,'sistemalogin');
        mysqli_set_charset($conn,'utf8');
        
            $email = $_POST['email'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        
            $sql = "INSERT INTO cliente VALUES 
                (default,'{$email}','{$senha}')";
            
            if($senha==""){
                $m = "Preencha a senha";
            }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $m = "Email inválido";
            }else if ($conn->query($sql) === TRUE) {
                $m = "Cadastrado com sucesso";
            } else {
                $m = "Erro ao cadastrar!";
            }
        
        $conn->close();
        }
?>

<html>
<head>
    <title>HOME PAGE</title>
</head>
<body>
<H1>CADASTRO DE USUÁRIO</H1>

<p>
    <a href="home.php">home</a> <br />
    <a href="novo-usuario.php">Novo Usuário</a><br />
        <a href="logoff.php">Logoff</a><br />
    </p>

<form method="post" action="novo-usuario.php">
    <div>
        <label>E-mail</label>
        <input type="text" name="email" size="15" />
    </div>
    <div>
        <label>Senha</label>
        <input type="password" name="senha" size="15" />
    </div>
        <input type="submit" class="btn btn-primary" value="Cadastrar" />
    </form>
    <?php if(isset($m)) echo $m; ?>
</body>
</html>