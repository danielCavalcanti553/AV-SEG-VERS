<?php
    session_start();

    if(isset($_SESSION['userId'])){
        $email = $_SESSION['userEmail'];
        $id = $_SESSION['userId'];
    }else{
        header("location: login.php?err=102");
        exit;
    }
    
?>

<html>
<head>
    <title>Contato PAGE</title>
</head>
<body>
    <h1>CONTATO</h1>
    <p>
        Olá <?php echo $email; ?>
    </p>
    <p>
        <a href="home.php">home</a>
    </p>
    <p>
        <a href="novo-usuario.php">Novo Usuário</a>
    </p>
    <p>
        <a href="logoff.php">Logoff</a>
    </p>
</body>
</html>