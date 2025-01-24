<?php
include 'csrf.php';
    //Photos insertion/manipulation limits
   const maxSize = 2 * 1024 * 1024;  // 1MB in bytes
   const maxWidth = 1500;            // Max image width
   const maxHeight = 1080;           // Max image height
   const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];  // Allowed MIME types

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

    //Insercao de imagens
    function handleImageUpload($file, $targetDir, $maxSize, $maxWidth, $maxHeight, $allowedTypes,$campoEscolhido) {
        // Check if file upload was successful
        if (!isset($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("File upload failed.");
        }
        if ($file['size'] > $maxSize) {
            throw new Exception("The file is larger than " . ($maxSize / 1024 / 1024) . "MB.", 1);
        }
    
        // Validate that the file is an image
        $fileType = mime_content_type($file['tmp_name']);
        if (!in_array($fileType, $allowedTypes)) {
            throw new Exception("Only JPEG, PNG, and GIF images are allowed.", 1);
        }
    
        // Get image dimensions (width and height)
        list($width, $height) = getimagesize($file['tmp_name']);
    
        // Check if the image dimensions are within the allowed range
        if ($width > $maxWidth || $height > $maxHeight) {
            throw new Exception("The image exceeds the maximum dimensions of $maxWidth x $maxHeight pixels.", 1);
        }
    
        // TODO Define the file name and destination path - verificar se le bem a variavel
        $img = basename($_FILES[$campoEscolhido]['name']); //Get here extension from image
        $result = explode('.',$img);
        $fotoName= $result[0].date('dmY').'_'.time().'.'.$result[1]; 
        $targetFile = $targetDir . $fotoName;
    
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            return $fotoName;
        } else {
            //throw new Exception("Error moving the uploaded file.", 1);                
        }
    }

    //Remocao de imagens
    function handleFileDeletion($fileName, $targetDir) {
        $filePath = $targetDir . $fileName;
    
        // Check if the file exists
        if (file_exists($filePath)) {
            // Delete the file using unlink()
            if (!unlink($filePath)) {
                throw new Exception("Error deleting the file.", 1);
            }
        }
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

        $csrfToken = $_POST['csrf_tokenCreate'];

        if (!verifyCsrfTokenCreate($csrfToken)) {
            throw new Exception("Invalid CSRF token.", 1);

        }

        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $descricao = $_POST['descricao'];
        $tamanho = $_POST['tamanho'];
        $quarto = $_POST['quarto'];
        $wc = $_POST['wc'];
        $garagem = $_POST['garagem'];
        $preco = $_POST['preco'];
        $area = $_POST['area'];
        $ID = "PRO".trim(preg_replace('/\s+/', '', $nome)).substr(md5(time() . rand()), 0, 15);
     
        //--------------------------- Manipulacao de imagens ---------------------------
        if(isset($_FILES['foto']) && !empty($_FILES['foto']['name'])){
            // Directory where the image will be stored
            $targetDirFoto = "assets/DB/";
            $foto = handleImageUpload($_FILES['foto'], $targetDirFoto, maxSize, maxWidth, maxHeight, allowedTypes,'foto');
            //--------------------------- FIM ---------------------------
        }else{
            $foto = " ";
        }

        if(isset($_FILES['planta']) && !empty($_FILES['planta']['name'])){
            // Directory where the image will be stored
            $targetDirPlanta = "assets/DB/";
            $planta = handleImageUpload($_FILES['planta'], $targetDirPlanta, maxSize, maxWidth, maxHeight, allowedTypes,'planta');
            //--------------------------- FIM ---------------------------
        }else{
            $planta = " ";
        }
        //-----------------------------------------------
    
        $stmt = $conn->prepare(" INSERT INTO projecto (id, nome, tipo, descricao, tamanho, quarto, wc, garagem, preco, img, planta, area) VALUES (?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?) ");
        $stmt->bind_param("sssssiiiisss",$ID, $nome, $tipo, $descricao, $tamanho, $quarto, $wc, $garagem, $preco, $foto, $planta, $area);
                
        if ($stmt->execute() ) {
            echo '<script type="text/javascript">';
            echo 'alert("Projecto criado");';
             echo 'window.location.href = "gestao.php";';
            echo '</script>';
        }else{
            throw new Exception("Erro - Inseriu dados invalidos");
        }  
    }
}catch (\Throwable $th) {
        $msg =  " " . $th->getMessage();
        echo '<script type="text/javascript">';
        echo 'alert("'.$msg.'");';
        echo '</script>';
        header("Location: gestao.php");
        exit();
}

//Metodo de inserir fotos de projectos
try {
    if ($value =='imagemCriar') {
        $csrfToken = $_POST['csrf_tokenCreateImage'];

        if (!verifyCsrfTokenCreateImage($csrfToken)) {
            throw new Exception("Invalid CSRF token.", 1);

        }

        $nome = preg_replace('/ - .*/', '', $_POST['id']);

        // Directory where the image will be stored
        $targetDirPlanta = "assets/projectos/";
        $foto = handleImageUpload($_FILES['fotoImagem'], $targetDirPlanta, maxSize, maxWidth, maxHeight, allowedTypes,'fotoImagem');
        //--------------------------- FIM ---------------------------
    
        $stmt = $conn->prepare(" INSERT INTO imagens (id, ficheiro) VALUES (?, ?) ");
        $stmt->bind_param("ss", $nome, $foto);
                        
        if ($stmt->execute() ) {
            echo '<script type="text/javascript">';
            echo 'alert("Imagem inserido no projecto '.$nome.' ");';
            echo 'window.location.href = "gestao.php";';
            echo '</script>';
        }else{
            throw new Exception("Erro - Inseriu dados invalidos");
        } 
          
    }
}catch (\Throwable $th) {
        $msg =  " " . $th->getMessage();
        phpAlert($msg);
        header("Location: gestao.php");
        exit();
}
  

//actualizacao de projectos
try{
    if ($value =='submitActualizar') {

    $csrfToken = $_POST['csrf_tokenUpdate'];

    if (!verifyCsrfTokenUpdate($csrfToken)) {
        throw new Exception("Invalid CSRF token.", 1);

    }

    $nomeActual = $_POST['id'];
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $tamanho = $_POST['tamanho'];
    $quarto = $_POST['quarto'];
    $wc = $_POST['wc'];
    $garagem = $_POST['garagem'];
    $preco = $_POST['preco'];
    $area = $_POST['area'];

    if(isset($nome) && !empty($nome) ){
        updateField($conn,"projecto","nome",$nome,"nome",$nomeActual); 
    }
    if(isset($tipo) && !empty($tipo)){
        updateField($conn,"projecto","tipo",$tipo,"nome",$nomeActual); 
    }
    if(isset($descricao) && !empty($descricao)){
        updateField($conn,"projecto","descricao",$descricao,"nome",$nomeActual);  
    }
    if(isset($tamanho) && !empty($tamanho)){
        updateField($conn,"projecto","tamanho",$tamanho,"nome",$nomeActual);  
    }
    if(isset($quarto) && !empty($quarto)){
        updateField($conn,"projecto","quarto",$quarto,"nome",$nomeActual);    
    }
    if(isset($wc) && !empty($wc)){
        updateField($conn,"projecto","wc",$wc,"nome",$nomeActual); 
    }
    if(isset($garagem) && !empty($garagem)){
        updateField($conn,"projecto","garagem",$garagem,"nome",$nomeActual); 
    }
    if(isset($preco) && !empty($preco)){
        updateField($conn,"projecto","preco",$preco,"nome",$nomeActual); 
    }
    if(isset($area) && !empty($area)){
        updateField($conn,"projecto","area",$area,"nome",$nomeActual); 
    }
    if(isset($_FILES['foto']) && !empty($_FILES['foto']['name'])){ 
        //get file name from DB
        $sql = "SELECT img FROM projecto WHERE nome = '$nomeActual' ";

        $result = $conn->query($sql);

        // Fetch the row data as an associative array
        $row = $result->fetch_assoc();
                        
        // Process of unlinking
        $targetDir = "assets/DB/";
        $fotoDIR = $row['img'];

        //Verificacao reduntante, possivelmente sera removido
        if (!empty($fotoDIR)) {
            handleFileDeletion($fotoDIR,$targetDir);
        }
        
        $foto = handleImageUpload($_FILES['fotoImagem'], $targetDir, maxSize, maxWidth, maxHeight, allowedTypes,'fotoImagem');
        updateField($conn,"projecto","img",$foto,"nome",$nomeActual); 

    }
    if(isset($_FILES['planta']) && !empty($_FILES['planta']['name'])){ 
        //get file name from DB
        $sql = "SELECT planta FROM projecto WHERE nome = '$nomeActual' ";

        $result = $conn->query($sql);

        // Fetch the row data as an associative array
        $row = $result->fetch_assoc();
                        
        // Process of unlinking
        $targetDir = "assets/projectos/";
        $fotoDIR = $row['planta'];

        //Verificacao reduntante, possivelmente sera removido
        if (!empty($fotoDIR)) {
            handleFileDeletion($fotoDIR,$targetDir);
        }
        
        $foto = handleImageUpload($_FILES['planta'], $targetDir, maxSize, maxWidth, maxHeight, allowedTypes,'planta');
        updateField($conn,"projecto","planta",$foto,"nome",$nomeActual); 

    }


    header("Location: gestao.php");
}
}catch (\Throwable $th) {
    $msg =  " " . $th->getMessage();;
    phpAlert($msg);
    header("Location: gestao.php");
    exit();
}

//Apagar projecto 
try{
    if ($value =='submitApagar') {
        
        $csrfToken = $_POST['csrf_tokenDelete'];

        if (!verifyCsrfTokenDelete($csrfToken)) {
            throw new Exception("Invalid CSRF token.", 1);
    
        }
    
        $id = $_POST['id'];
        
        $stmt = $conn->prepare("DELETE FROM projecto WHERE nome = ? ");
        $stmt->bind_param("s", $id);

        $path = './assets/DB/';

            //Apagar foto no ficheiro DB
            $sql = "SELECT img FROM projecto WHERE nome = '$id' ";
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
    header("Location: gestao.php");
    exit();
}

//Apagar uma das imagens do projecto 
try{
    if ($value =='imagemApagar') {

        $csrfToken = $_POST['csrf_tokenDeleteImage'];

        if (!verifyCsrfTokenDeleteImage($csrfToken)) {
            throw new Exception("Invalid CSRF token.", 1);
    
        }

        $nome = $_POST['id'];
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
    header("Location: gestao.php");
    exit();
}
?>
    <script>
        function myselect()
        {
            location.replace("gestao.php");
        }
    </script>
<?php   
