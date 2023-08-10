<?php
    // Start the session
    session_start();
    $link = mysqli_connect('localhost','root','','dec');

    
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    //TODO - Implementar o hash para acesso login
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    $stmt = $link->prepare(" SELECT user_name, user_pass from user where user_name = ? AND user_pass = ? ");
    $stmt->bind_param("ss", $user, $pass);

    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_array();
        try {
            if (sizeof($data) > 0 ) 
            {
                header("Location: gestao.html");
            } 
            else 
            {
    
                header("Location: auth.html");
                
            }
        } catch (\Throwable $th) {
            header("Location: auth.html");
        }  


?>
