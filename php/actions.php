<?php
    // Start the session
    session_start();
    $link = mysqli_connect('localhost','root','','dec');

    
    $user = $_POST['username'];
    $pass = $_POST['pass'];

    $hash = password_hash($pass, PASSWORD_DEFAULT);

      
    $query = " SELECT * from user where `user_name` ='". $user ."' AND user_pass='".$hash."'";
    $result = $link->query($query);
          
        if (mysqli_num_rows($result) == 1) 
        {
            header("Location: gestao.html");
        } 
        else 
        {

            header("Location: auth.html");
            
        }

?>
