<?php
    // Start the session
    session_start();
    $link = mysqli_connect('localhost','root','','dec');

    
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $_SESSION["usuario"] = $user;
    $cont = 0;

    $stmt = $link->prepare(" SELECT username, pass from user where username = ?");
    $stmt->bind_param("s", $user);

    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_array();
        try {
            if (sizeof($data) > 0 ) 
            {
                for ($i=0; $i < sizeof($data); $i++) { 
                    $hashed_password = $data['pass'];

                    if(password_verify($pass, $hashed_password)) {
                        header("Location: gestao.php");
                    }
                }
                if ($cont == 0) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Erro de insercao");';
                    echo 'window.location.href = "login.html";';
                    echo '</script>';
                }               
            } 
            else 
            {
                throw new Exception("Erro - usuario nao encontrado");   
            }
        } catch (\Throwable $th) {
            echo '<script type="text/javascript">';
            echo 'alert("Erro de insercao");';
            echo 'window.location.href = "login.html";';
            echo '</script>';
        }  
?>
