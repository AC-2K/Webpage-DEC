<?php
   session_start();
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "dec";

   //$user = $_SESSION["usuario"];
     
   // connect the database with the server
   $conn = new mysqli($servername,$username,$password,$dbname);
     
   // if error occurs 
   if ($conn -> connect_errno)
   {
      echo "Failed to connect to MySQL: " . $conn -> connect_error;
      exit();
   }
?>

<?php 

$value = $_POST['submit'];


if ($value =='submitCriar') {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $tamanho = $_POST['tamanho'];
    $quarto = $_POST['quarto'];
    $wc = $_POST['wc'];
    $garagem = $_POST['garagem'];
    $preco = $_POST['preco'];

    //Validacao de foto
    $foto = $_FILES["foto"]["name"];
    $tempname = $_FILES["foto"]["tmp_name"];
    $folder = "./assets/DB/" . $foto;

    $errors     = array();
    $maxsize    = 2097152;
    $acceptable = array(
        'image/jpeg',
        'image/jpg',
        'image/png'
    );
    if(($_FILES['foto']['size'] >= $maxsize) || ($_FILES["foto"]["size"] == 0)) {
        $errors[] = 'Ficheiro grande. Deve ser menor que 2 megabytes.';
    }

    if((!in_array($_FILES['foto']['type'], $acceptable)) ) {
        $errors[] = 'Invalid file type. So JPG, e PNG sao permitidos';
    }

    $stmt = $conn->prepare("INSERT INTO projecto (pro_id, pro_nome, pro_tipo, pro_categoria, pro_tamanho, pro_quarto, pro_wc, pro_garagem, pro_preco, pro_img) VALUES (`$nome`, `$tipo`, `$categoria`, `$tamanho`, `$tamanho`, `$quarto`, `$wc`, `$garagem`, `$preco`, `$foto`)");
    $stmt->bind_param("ssssiiiis", $nome, $tipo, $categoria, $tamanho, $quarto, $wc, $garagem, $preco, $foto);

    if(count($errors) === 0) {
        if (move_uploaded_file($tempname, $folder)) {
                
            if ($stmt->execute()) {
                header("Location: gestao.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                header("Location: gestao.html");
            }
    
        }
    } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'");</script>';
        }

        header("Location: gestao.html");
    }
     

}
elseif ($value =='submitActualizar') {
    # code...

    
}elseif ($value =='submitApagar') { 
    $nome = $_POST['nome'];
    $stmt = $conn->prepare("DELETE FROM projecto WHERE pro_nome = '$nome' ");
    $stmt->bind_param("s", $nome);

    if ($stmt->execute()) {
        header("Location: gestao.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}else{
    header("Location: gestao.html");
}
?>