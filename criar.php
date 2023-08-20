<?php
    // Start the session
    session_start();
    $link = mysqli_connect('localhost','root','','dec');

    $user = $_POST['userCriar'];
    $pass = $_POST['passCriar'];
    $_SESSION["usuario"] = $user;

    $aceder = $_POST['aceder']; 

    if(isset($_POST['aceder'])){
        try {
            //TODO - Implementar o hash para acesso login
            $hash = password_hash($pass, PASSWORD_DEFAULT);

            $stmt = $link->prepare(" INSERT INTO user (user_name, user_pass) VALUES (?,?)");
            $stmt->bind_param("ss", $user, $hash);
        
            $stmt->execute();

            //Notificacao via e-mail
            $to = "aldair.chutumia@gmail.com";
            $subject = "Novo usuario";
            $txt = "Foi criado um novo usuario para gestao do projectos do website DEC-projectos com nome de: ".$user;
            $msg = wordwrap($txt,70);

            mail($to,$subject,$msg);

            echo '<script type="text/javascript">';
            echo 'alert("Usuario Criado, bem vindo");';
            echo 'window.location.href = "gestao.php";';
            echo '</script>';

        } catch (\Throwable $th) {
            echo '<script type="text/javascript">';
            echo 'alert("usuario existente - cria novo usuario");';
            echo 'window.location.href = "auth.html";';
            echo '</script>';
        } 
    }
 


?>
