<html>
    <head>
        <title>PÁGINA LOGIN</title>
        <link rel="stylesheet" href="estilo.css" />
    </head>
    <body>

    <h1>Efetue o Login</h1>
    <form method="post" action="autenticar.php">
        <label>E-mail</label>
        <input type="text" name="email" size="20" /> <br />
        <label>Senha</label>
        <input type="password" name="senha" size="20" /> <br />
        <input type="submit" value="Entrar" />
    </form>

    <?php
        if(isset($_GET['err'])){

            if($_GET['err']==101){
                echo "Login Inválido";
            }else  if($_GET['err']==102){
                echo "Necessário Efetuar o Login";
            }else  if($_GET['err']==103){
                echo "E-mail inválido!";
            }
        }
    ?>

    </body>
</html>