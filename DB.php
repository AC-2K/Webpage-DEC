<?php
   session_start();
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "dec";

   // connect the database with the server
   $conn = new mysqli($servername,$username,$password,$dbname);
     
   // if error occurs 
   if ($conn -> connect_error){
      echo "Failed to connect to MySQL: " . $conn -> connect_error;
      exit();
   }
   function phpAlert($msg) {
        echo '<script type="text/javascript">';
        echo 'alert("' . $msg . '");';
        echo '</script>';
    }
?>

<?php 


// Metodos de actualizacao de dados

function updateField($mysqli, $tableName, $fieldName, $newValue, $primaryKey, $primaryKeyValue) {
    try {
        // Check if the connection is closed
        if ($mysqli === null || !$mysqli->ping()) {
            // Close existing connection if not null
            if ($mysqli !== null) {
                $mysqli->close();
            }
            // Reopen the connection
            $mysqli = new mysqli('localhost','root','','dec');

            // Check for connection errors
            if ($mysqli->connect_error) {
                die("Reconnection failed: " . $mysqli->connect_error);
            }
        }
        // Prepare the UPDATE statement
        $mysqli->begin_transaction();
        $sql = "UPDATE $tableName SET $fieldName = ? WHERE $primaryKey = ?";
        $stmt = $mysqli->prepare($sql);
    
        if ($stmt === false) {
            throw new Exception("Prepare failed: " . $mysqli->error);
        }
    
        // Bind parameters
        $stmt->bind_param("ss", $newValue, $primaryKeyValue);

    
        // Execute the UPDATE statement
        if (!$stmt->execute()) {
            throw new Exception("Update failed: " . $stmt->error);
        }

        // Commit the transaction
        $mysqli->commit();

        // Close the statement
        $stmt->close();
    } catch (\Throwable $th) {
        // Roll back the transaction on error
        $mysqli->rollback();

        // Close the statement if it was initialized
        if (isset($stmt) && $stmt !== false) {
            $stmt->close();
        }

        // Re-throw the exception or handle the error
        die("Transaction failed: " . $th->getMessage());
    }

       
}

////////////////////////////////////////////////////////////

$value = $_POST['submit'];

//Metodo de inserir projectos
try {
    if ($value =='submitCriar') {
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $descricao = $_POST['descricao'];
        $tamanho = $_POST['tamanho'];
        $quarto = $_POST['quarto'];
        $wc = $_POST['wc'];
        $garagem = $_POST['garagem'];
        $preco = $_POST['preco'];
        $ID = "PRO".trim(preg_replace('/\s+/', '', $nome)).substr(md5(time() . rand()), 0, 15);

    
        //Validacao de foto
        $img = basename($_FILES['foto']['name']); //Get here extension from image
        $result = explode('.',$img);
        $foto= $result[0].date('dmY').'_'.time().'.'.$result[1]; 

        $tempname = $_FILES["foto"]["tmp_name"];
        $folder = "./assets/DB/" . $foto;
    
        $errors     = array();
        $maxsize    = 2097152;
        $acceptable = array(
            'image/jpeg',
            'image/jpg',
            'image/png'
        );


        if(($_FILES['foto']['size'] >= $maxsize) ) {
            echo '<script type="text/javascript">';
            echo 'alert("Ficheiro grande. Deve ser menor que 2 megabytes.");';
            echo 'window.location.href = "gestao.php";';
            echo '</script>';
        }
    
        if((!in_array($_FILES['foto']['type'], $acceptable)) ) {
            echo '<script type="text/javascript">';
            echo 'alert("Invalid file type. So JPG, e PNG sao permitidos");';
            echo 'window.location.href = "gestao.php";';
            echo '</script>';
        }
        list($width, $height, $type, $attr) = getimagesize($tempname);

        if($width > 1500 || $height > 1000){
            echo '<script type="text/javascript">';
            echo 'alert("Imagem excedeu limites");';
            echo 'alert("Limites - width/largura - 1500 pixeis , heigth/altura - 1000 pixeis");';
            echo 'alert("width - '.$width.' height - '.$height.' ");';
            echo 'window.location.href = "gestao.php";';
            echo '</script>';
        }
    
        $stmt = $conn->prepare(" INSERT INTO projecto (id, nome, tipo, descricao, tamanho, quarto, wc, garagem, preco, img) VALUES (? ,?, ?, ?, ?, ?, ?, ?, ?, ?) ");
        $stmt->bind_param("sssssiiiis",$ID, $nome, $tipo, $descricao, $tamanho, $quarto, $wc, $garagem, $preco, $foto);
    
        if (move_uploaded_file($tempname, $folder)) {
                    
            if ($stmt->execute() ) {
                echo '<script type="text/javascript">';
                echo 'alert("Projecto criado");';
                echo 'window.location.href = "gestao.php";';
                echo '</script>';
            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            } 
        }  
    }
}catch (\Throwable $th) {
        $msg =  " " . $th->getMessage();
        echo '<script type="text/javascript">';
        echo 'alert("'.$msg.'");';
        echo '</script>';
        echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
}

//Metodo de inserir fotos de projectos
try {
    if ($value =='imagemCriar') {
        $nome = preg_replace('/ - .*/', '', $_POST['id']);

        //Validacao de foto
        $img = basename($_FILES['fotoImagem']['name']); //Get here extension from image
        $result = explode('.',$img);
        $foto = $result[0].date('dmY').'_'.time().'.'.$result[1]; 
        
       // $foto = $_FILES["fotoImagem"]["name"];
        $tempname = $_FILES["fotoImagem"]["tmp_name"];
        $folder = "./assets/projectos/" . $foto;
    
        $errors     = array();
        $maxsize    = 9097152;
        $acceptable = array(
            'image/jpeg',
            'image/jpg',
            'image/png'
        );

        if(($_FILES['fotoImagem']['size'] >= $maxsize) ) {
            echo '<script type="text/javascript">';
            echo 'alert("Ficheiro grande. Deve ser menor que 2 megabytes.");';
            echo 'window.location.href = "gestao.php";';
            echo '</script>';
        }
    
        if((!in_array($_FILES['fotoImagem']['type'], $acceptable)) ) {
            echo '<script type="text/javascript">';
            echo 'alert("Invalid file type. So JPG, e PNG sao permitidos");';
            echo 'window.location.href = "gestao.php";';
            echo '</script>';
        }
        list($width, $height, $type, $attr) = getimagesize($tempname);

        if($width > 2000 || $height > 2000){
            echo '<script type="text/javascript">';
            echo 'alert("Imagem excedeu limites");';
            echo 'alert("Limites - width/largura - 1500 pixeis , heigth/altura - 1000 pixeis");';
            echo 'alert("width - '.$width.' height - '.$height.' ");';
            echo 'window.location.href = "gestao.php";';
            echo '</script>';
        }
    
        $stmt = $conn->prepare(" INSERT INTO imagens (id, ficheiro) VALUES (?, ?) ");
        $stmt->bind_param("ss", $nome, $foto);
    
        if (move_uploaded_file($tempname, $folder)) {
                    
            if ($stmt->execute() ) {
                echo '<script type="text/javascript">';
                echo 'alert("Imagem inserido no projecto '.$nome.' ");';
                echo 'window.location.href = "gestao.php";';
                echo '</script>';
            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            } 
        }  
    }
}catch (\Throwable $th) {
        $msg =  " " . $th->getMessage();
        phpAlert($msg);
        echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
}
  

//actualizacao de projectos
try{
    if ($value =='submitActualizar') {
    $id = preg_replace('/(\d+)\s.*/', '$1', $_POST['id']);
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $tamanho = $_POST['tamanho'];
    $quarto = $_POST['quarto'];
    $wc = $_POST['wc'];
    $garagem = $_POST['garagem'];
    $preco = $_POST['preco'];

    $foto = $_FILES["foto"]["name"];

    if(isset($nome) && !empty($nome) ){
        updateField($conn,"projecto","nome",$nome,"id",$id); 
    }
    if(isset($tipo) && !empty($tipo)){
        updateField($conn,"projecto","tipo",$tipo,"id",$id); 
    }
    if(isset($descricao) && !empty($descricao)){
        updateField($conn,"projecto","descricao",$descricao,"id",$id);  
    }
    if(isset($tamanho) && !empty($tamanho)){
        updateField($conn,"projecto","tamanho",$tamanho,"id",$id);  
    }
    if(isset($quarto) && !empty($quarto)){
        updateField($conn,"projecto","quarto",$quarto,"id",$id);    
    }
    if(isset($wc) && !empty($wc)){
        updateField($conn,"projecto","wc",$wc,"id",$id); 
    }
    if(isset($garagem) && !empty($garagem)){
        updateField($conn,"projecto","garagem",$garagem,"id",$id); 
    }
    if(isset($preco) && !empty($preco)){
        updateField($conn,"projecto","preco",$preco,"id",$id); 
    }
    if(isset($foto) && !empty($foto)){
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
  
        //ApagarFotoAntiga
        unlink($foto);

        updateField($conn,"projecto","foto",$foto,"id",$id); 
        
        if (sizeof($errors) > 0) {
            echo $errors[0];
            echo $errors[1];
            throw new Exception("Erro - Inseriu dados invalidos");
        }
    }

    header("Location: gestao.php");
}
}catch (\Throwable $th) {
    $msg =  " " . $th->getMessage();;
    phpAlert($msg);
    echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
}

//Apagar projecto 
try{
    if ($value =='submitApagar') { 
        $id = preg_replace('/ - .*/', '', $_POST['id']);
        
        $stmt = $conn->prepare("DELETE FROM projecto WHERE id = ? ");
        $stmt->bind_param("s", $id);

        $path = './assets/DB/';

            //Apagar foto no ficheiro DB
            $sql = "SELECT img FROM projecto WHERE id = '$id' ";
            $result = ($conn->query($sql));
            //declare array to store the data of database
            $row = []; 
            if ($result->num_rows > 0) 
            {
                // fetch all data from db into array 
                $row = $result->fetch_all(MYSQLI_ASSOC);  
            }  
            foreach($row as $rows){                                                            
                $folder = $path . $rows['img']; 
                unlink($folder);
            }

        if ($stmt->execute()) { 
            header("Location: gestao.php");
            
        }else{
            throw new Exception("Erro - Inseriu dados invalidos");
        } 
    }
} catch (\Throwable $th) {
    $msg =  " " . $th->getMessage();;
    phpAlert($msg);
    echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
}

//Apagar uma das imagens do projecto 
try{
    if ($value =='imagemApagar') {
         
        $nome = preg_replace('/ - .*/', '', $_POST['id']);
        $stmt = $conn->prepare("DELETE FROM imagens WHERE id = ? ");
        $stmt->bind_param("s", $nome);

        $path = './assets/projectos/';

            //Apagar foto no ficheiro DB
            $sql = "SELECT * FROM imagens WHERE id = '$nome' ";
            $result = ($conn->query($sql));
            //declare array to store the data of database
            $row = []; 
            if ($result->num_rows > 0) 
            {
                // fetch all data from db into array 
                $row = $result->fetch_all(MYSQLI_ASSOC);  
            }  
            foreach($row as $rows){                                                            
                $folder = $path . $rows['ficheiro']; 
                unlink($folder);
                header("Location: gestao.php");
            }

        if ($stmt->execute()) { 
            header("Location: gestao.php");
            
        }else{
            throw new Exception("Erro - Inseriu dados invalidos");
        } 
    }
} catch (\Throwable $th) {
    $msg =  " " . $th->getMessage();;
    phpAlert($msg);
    echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
}
?>
    <script>
        function myselect()
        {
            location.replace("gestao.php");
        }
    </script>
<?php   
