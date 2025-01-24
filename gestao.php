<?php
include 'connect.php';
include 'csrf.php';

if (!isset($_SESSION["usuario"])) {
    echo '<script type="text/javascript">';
    echo 'alert("Pagina indisponivel, nao acedeu");';;
    echo 'window.location.href = "index.html";';
    echo '</script>';
}
?>
<!DOCTYPE html>
<html  >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/dec-white-logo.jpeg-128x128-2.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>gestao</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

  
  
  
</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu1 cid-uz0qOnXarF" once="menu" id="menu01-7a">
	

	<nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
		<div class="container">
			<div class="navbar-brand">
				<span class="navbar-logo">
					<a href="https://mobiri.se">
						<img src="assets/images/logo-337x156.png" alt="DEC projects" style="height: 5rem;">
					</a>
				</span>
				
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<div class="hamburger">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item">
						<a class="nav-link link text-success display-4" href="index.html" aria-expanded="false">Home</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link link dropdown-toggle text-success show display-4" href="https://mobiri.se" aria-expanded="false" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside">Saiba mais</a><div class="dropdown-menu show" aria-labelledby="dropdown-205" data-bs-popper="none"><a class="dropdown-item text-success display-4" href="sobre.html">Quem somos?</a><a class="dropdown-item text-success display-4" href="metodologia.html">Metodologia</a><a class="dropdown-item text-success display-4" href="metodosConstrucao.html">Métodos de construção</a><a class="dropdown-item text-success display-4" href="faq.html">FAQ</a></div>
					</li>
					<li class="nav-item dropdown open">
						<a class="nav-link link dropdown-toggle text-success display-4" href="https://mobiri.se" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">Sobre: Projecto</a><div class="dropdown-menu" aria-labelledby="dropdown-875"><a class="dropdown-item text-success display-4" href="projectoSobre.html">Sobre</a><a class="dropdown-item text-success display-4" href="projectoExclusivo.html">Exclusivo</a><a class="dropdown-item text-success display-4" href="projectoModificado.html">Modificado</a><a class="dropdown-item text-success display-4" href="projectoPronto.html">Pronto</a></div>
					</li><li class="nav-item"><a class="nav-link link show text-success display-4" href="vendas.php">Projectos</a></li><li class="nav-item"><a class="nav-link link text-success display-4" href="contacto.html">Contacto</a></li></ul>
				
				
			</div>
		</div>
	</nav>
</section>

<section data-bs-version="5.1" class="form7 cid-tONM8kuJFg" id="form7-4x">
    
    
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Gestão de projectos</strong></h3>
            
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action="DB.php" method="POST" class="mbr-form form-with-styler mx-auto"  enctype="multipart/form-data" >
                <input type="hidden" id="csrf_tokenCreate" name="csrf_tokenCreate" value="<?php echo generateCsrfTokenCreate(); ?>">
                    <div class="dragArea row">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="nome">
                            <input type="text" name="nome" placeholder="Nome projecto" data-form-field="name" class="form-control" value="" id="name-form7-4x" required>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="tipo">
                            <select id="selectedTipo" name="tipo" class="form-control" >
                                <option>Res do chão</option>
                                <option> 1 andar</option>
                                <option> 2 andar</option>
                                <option> 3 andar</option>
                            </select>                       
                        </div>

                        
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="descricao">
                            <textarea  name="descricao" cols="30" rows="10"  class="form-control"  id="pass-form7-4x" required>Descrição</textarea>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="tamanho">
                            <input type="text" name="tamanho" placeholder="tamanho" data-form-field="text" class="form-control"  id="pass-form7-4x" required>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="quarto">
                            <input type="number" name="quarto" placeholder="Nr de quartos" data-form-field="number" class="form-control"  id="pass-form7-4x" required>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="wc">
                            <input type="number" name="wc" placeholder="Nr de WC" data-form-field="number" class="form-control"  id="pass-form7-4x" required>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="garagem">
                            <input type="number" name="garagem" placeholder="Nr de Garagens" data-form-field="number" class="form-control"  id="pass-form7-4x" required>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="preco">
                            <input type="number" name="preco" placeholder="Preço" data-form-field="number" class="form-control"  id="pass-form7-4x" required>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="preco">
                            <input type="number" name="area" placeholder="Area em metros" data-form-field="text" class="form-control"  id="pass-form7-4x" required>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="foto">
                            <label for="foto" class="item-title mbr-fonts-style display-5">Imagem de refência</label>
                            <input type="file" name="foto"  data-form-field="file" class="form-control" id="pass-form7-4x" required>
                        </div>

						<div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="foto">
                            <label for="foto" class="item-title mbr-fonts-style display-5">Planta do projecto</label>
                            <input type="file" name="planta"  data-form-field="file" class="form-control" id="pass-form7-4x" required>
                        </div>

                        <div class="col-auto mbr-section-btn align-center">
                            <button type="submit" class="btn item-btn btn-info display-7" name="submit" value="submitCriar">Criar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<hr>
<section data-bs-version="5.1" class="share3 cid-tONSftbrbu" id="share3-58">
    
    <div class="container">
        <div class="media-container-row">
            <div class="col-12">
                <h3 class="mbr-section-title align-center mb-3 mbr-fonts-style display-2">
                    <strong>Operações adicionais</strong></h3>
                <div class="social-list align-center">
                   
                    <a class="iconfont-wrapper bg-facebook m-2 " href="javascript:OpenModal('Actualizar')">
                            <span class="mobi-mbri-update mobi-mbri" style="color: rgb(255, 255, 255); fill: rgb(255, 255, 255);"></span>
                        </a>
 
                        <a class="iconfont-wrapper bg-youtube m-2" href="javascript:OpenModal('Apagar')">
                            <span class="mobi-mbri-close mobi-mbri"></span>
                        </a>
                        
                </div>
            </div>
        </div>
    </div>
</section>
<hr>
<section data-bs-version="5.1" class="section-table cid-tOPfh4hjuc" id="design-block-5o">      
    <div class="container container-table">      
        <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">Tabela de projectos</h2>            
        <div class="table-wrapper">        
            <div class="container">                  

            </div>        
            <div class="container scroll">          
                <table class="table" cellspacing="0">            
                    <thead>              
                        <tr class="table-heads ">      
                            <th class="head-item mbr-fonts-style display-8" data-sortable="false">Nome</th>
                            <th class="head-item mbr-fonts-style display-8" data-sortable="false">Tipo</th>
                            <th class="head-item mbr-fonts-style display-8" data-sortable="false">Tamanho</th>
                            <th class="head-item mbr-fonts-style display-8" data-sortable="false">Quarto</th>
                            <th class="head-item mbr-fonts-style display-8" data-sortable="false">WC</th>
                            <th class="head-item mbr-fonts-style display-8" data-sortable="false">Garagem</th>
                            <th class="head-item mbr-fonts-style display-8" data-sortable="false">Preço</th>
                            <th class="head-item mbr-fonts-style display-8" data-sortable="false">Descrição</th>
                            <th class="head-item mbr-fonts-style display-8" data-sortable="false">Imagem</th>
                            <th class="head-item mbr-fonts-style display-8" data-sortable="false">Planta</th>
                        </tr>            
                    </thead>            
                    <tbody>     
                        <?php
                            if(!empty($row))
                                foreach($row as $rows)
                                { 
                        ?>                                                                
                        <tr>
                            <td class="body-item mbr-fonts-style display-8"> <?php echo $rows['nome']; ?> </td>
                            <td class="body-item mbr-fonts-style display-8"> <?php echo $rows['tipo']; ?> </td>
                            <td class="body-item mbr-fonts-style display-8"> <?php echo $rows['tamanho']; ?> </td>
                            <td class="body-item mbr-fonts-style display-8"> <?php echo $rows['quarto']; ?> </td>
                            <td class="body-item mbr-fonts-style display-8"> <?php echo $rows['wc']; ?> </td>
                            <td class="body-item mbr-fonts-style display-8"> <?php echo $rows['garagem']; ?> </td>
                            <td class="body-item mbr-fonts-style display-8"> <?php echo $rows['preco']; ?> </td>
                            <td class="body-item mbr-fonts-style display-8"> <?php echo $rows['descricao']; ?> </td>
                            <td class="body-item mbr-fonts-style display-8"> <img src="./assets/DB/<?php echo $rows['img']; ?>"> </td>
                            <td class="body-item mbr-fonts-style display-8"> <img src="./assets/projectos/<?php echo $rows['planta']; ?>"> </td>                                                                                 
                        </tr>
                            <?php } ?>
                    </tbody>          
                </table>        
            </div>        
            <div class="container table-info-container">                  

            </div>      
        </div>    
    </div>
</section>
<hr>
<section data-bs-version="5.1" class="share3 cid-tPrvPKsnyB" id="share3-5x">
    
    <div class="container">
        <div class="media-container-row">
            <div class="col-12">
                <h3 class="mbr-section-title align-center mb-3 mbr-fonts-style display-2"><strong>Gestão de imagens</strong></h3>
                <div class="social-list align-center">
                   
                    
                        
                        <a class="iconfont-wrapper bg-instagram m-2" href="javascript:OpenModal('criarImagem')">
                            <span class="mobi-mbri-edit-2 mobi-mbri" style="color: rgb(255, 255, 255); fill: rgb(255, 255, 255);"></span>
                        </a>
                        
                        
                        
                        
                        
                        
                        <a class="iconfont-wrapper bg-youtube m-2" href="javascript:OpenModal('delimagem')">
                            <span class="mobi-mbri-close mobi-mbri"></span>
                        </a>
                        
                </div>
            </div>
        </div>
    </div>
</section>
<hr>
<section data-bs-version="5.1" class="section-table cid-tPrAa9W4kR" id="design-block-61">      
    <div class="container container-table">      
        <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">Tabela de imagens</h2>            
        <div class="table-wrapper">              
            <div class="container scroll">          
                <table class="table" cellspacing="3">            
                    <thead>              
                        <tr class="table-heads ">                                                                                      
                            <th class="head-item mbr-fonts-style display-6" data-sortable="false" style="width:50%">Projecto</th>
                            <th class="head-item mbr-fonts-style display-6" data-sortable="false" style="height:40px">Imagem</th>
                        </tr>            
                    </thead>            
                    <tbody>                                                                    
                    <?php
                            if(!empty($row2))
                                foreach($row2 as $rows)
                                { 
                        ?>                                                                
                        <tr>
                            <td class="body-item mbr-fonts-style display-8"> <?php echo "<h2>".$rows['nome']."</h2>"; ?> </td>
                            <td class="body-item mbr-fonts-style display-8" > <img src="./assets/projectos/<?php echo $rows['ficheiro']; ?>" height="250"> </td>      
                        </tr>
                            <?php } ?>
                    </tbody>          
                </table>        
            </div>        
            <div class="container table-info-container">                  

            </div>      
        </div>    
    </div>
</section>

<section class="mbr-section" id="witsec-modal-window-block-60" data-rv-view="540">

	<style>
	/* Let's not animate the contents of modal windows */
	.no-anim {
		-webkit-animation: none !important;
		-moz-animation: none !important;
		-o-animation: none !important;
		-ms-animation: none !important;
		animation: none !important;
	}
	</style>

	
	
	<div>
        <form action="DB.php" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="delimagem" tabindex="-1" role="dialog" aria-labelledby="delimagemLabel" aria-hidden="true">  
                <div class="modal-dialog  " style="height:auto" role="document">    
                    <div class="modal-content">
                        <div class="modal-header">  
                            <h5 class="no-anim modal-title display-7" id="delimagemLabel">Remover imagem</h5>  
                            <a href="#" class="no-anim close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></a>
                        </div>
                        <div class="modal-body display-7" id="delimagem_body">
                            <div class="modal-body">    
                            <input type="hidden" id="csrf_tokenDeleteImage" name="csrf_tokenDeleteImage" value="<?php echo generateCsrfTokenDeleteImage(); ?>">                          
                            <label for="id">Projecto</label>
                                <select class="form-control" name="id" id="id" required>
                                    <?php
                                        if(!empty($row2))
                                            foreach($row2 as $rows)
                                            { 
                                        ?>     
                                            <option value="<?php echo $rows['id']?>" ><?php echo $rows['nome'] ?></option>                                                          
                                    <?php } ?>
                                </select>                                                                             
                            </div>
                        </div>
                        <div class="modal-footer">
                                <div class="mbr-section-btn">
                                    <a href="#" class="no-anim btn btn-secondary display-4" data-bs-dismiss="modal" data-dismiss="modal">Sair</a>
                                </div>
                                <div class="mbr-section-btn">
                                    <button type="submit" name="submit" class="no-anim btn btn-primary display-4" value="imagemApagar">Submeter</button>
                                </div>
                        </div>    
                    </div>  
                </div>
            </div>
        </form>
        <script> 
        document.addEventListener("DOMContentLoaded", function() { 
        if(typeof jQuery === "function") {
            $("#delimagem").on("hidden.bs.modal", function () { 
            var html = $( "#delimagem_body" ).html(); 
            $( "#delimagem_body" ).empty(); 
            $( "#delimagem_body" ).append(html); 
            }) 
        } else { 
            var mdw = document.getElementById("#delimagem") 
            mdw.addEventListener("hidden.bs.modal", function(event) { 
                mdw.innerHTML = mdw.innerHTML; 
            }); 
        } 
        }); 
        </script>
    </div>

        <script>
        if (typeof OpenModal === 'undefined') {
            OpenModal = function(modalName) {
                if(typeof jQuery === "function") {
                    if ($('#' + modalName).length)
                        $('#' + modalName).modal('show');
                    else
                        alert("Sorry, but there is no modal for " + modalName);
                } else {
                    let mdw = new bootstrap.Modal(document.getElementById(modalName), {});
                    mdw.show();
                }
            }
        }

        function modalSetCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function modalGetCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        </script>

</section>

<section class="mbr-section" id="witsec-modal-window-block-5z" data-rv-view="539">

	<style>
	/* Let's not animate the contents of modal windows */
	.no-anim {
		-webkit-animation: none !important;
		-moz-animation: none !important;
		-o-animation: none !important;
		-ms-animation: none !important;
		animation: none !important;
	}
	</style>

	
	
	<div>
        <form action="DB.php" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="criarImagem" tabindex="-1" role="dialog" aria-labelledby="criarImagemLabel" aria-hidden="true">  
            <div class="modal-dialog  " style="height:auto" role="document">    
                <div class="modal-content">
                    <div class="modal-header">  
                        <h5 class="no-anim modal-title display-7" id="criarImagemLabel">Anexar imagem adicional</h5>  
                        <a href="#" class="no-anim close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></a>
                    </div>
                    <div class="modal-body display-7" id="criarImagem_body">
                        <div class="modal-body">
                        <input type="hidden" id="csrf_tokenCreateImage" name="csrf_tokenCreateImage" value="<?php echo generateCsrfTokenCreateImage(); ?>">                                          
                        <label for="id">Projecto</label>
                            <select class="form-control" name="id" id="id" required>
                                <?php
                                    if(!empty($row))
                                        foreach($row as $rows)
                                        { 
                                    ?>                                                                   
                                        <option value="<?php echo $rows['id']?>" ><?php echo $rows['nome'] ?></option>
                                <?php } ?>
                            </select>
                                                                                
                        <hr>
                                                            
                        <label for="foto">Foto</label>
                        <input type="file" name="fotoImagem" class="form-control">
                                                            
                    </div>
                </div>
                    <div class="modal-footer">
                            <div class="mbr-section-btn">
                                <a href="#" class="no-anim btn btn-secondary display-4" data-bs-dismiss="modal" data-dismiss="modal">Sair</a>
                            </div>
                            <div class="mbr-section-btn">
                                <button type="submit" name="submit" class="no-anim btn btn-primary display-4" value="imagemCriar">Submeter</button>
                            </div>
                    </div>   
                </div>  
            </div>
        </form>
            </div>
            <script> 
                document.addEventListener("DOMContentLoaded", function() { 
                if(typeof jQuery === "function") {
                    $("#criarImagem").on("hidden.bs.modal", function () { 
                    var html = $( "#criarImagem_body" ).html(); 
                    $( "#criarImagem_body" ).empty(); 
                    $( "#criarImagem_body" ).append(html); 
                    }) 
                } else { 
                    var mdw = document.getElementById("#criarImagem") 
                    mdw.addEventListener("hidden.bs.modal", function(event) { 
                        mdw.innerHTML = mdw.innerHTML; 
                    }); 
                } 
                }); 
            </script>
    </div>
            <script>
            if (typeof OpenModal === 'undefined') {
                OpenModal = function(modalName) {
                    if(typeof jQuery === "function") {
                        if ($('#' + modalName).length)
                            $('#' + modalName).modal('show');
                        else
                            alert("Sorry, but there is no modal for " + modalName);
                    } else {
                        let mdw = new bootstrap.Modal(document.getElementById(modalName), {});
                        mdw.show();
                    }
                }
            }

            function modalSetCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                var expires = "expires="+ d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }

            function modalGetCookie(cname) {
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for(var i = 0; i <ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }
            </script>

</section>

<section class="mbr-section" id="witsec-modal-window-block-53" data-rv-view="41">

<section class="mbr-section" id="witsec-modal-window-block-53" data-rv-view="165">

	<style>
	/* Let's not animate the contents of modal windows */
	.no-anim {
		-webkit-animation: none !important;
		-moz-animation: none !important;
		-o-animation: none !important;
		-ms-animation: none !important;
		animation: none !important;
	}
	</style>

	
	
	<div>
        <form action="DB.php" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="Actualizar" tabindex="-1" role="dialog" aria-labelledby="ActualizarLabel" aria-hidden="true">  
                <div class="modal-dialog modal-lg modal-dialog-centered" style="height:auto" role="document">    
                    <div class="modal-content">
                        <div class="modal-header">  
                            <h5 class="no-anim modal-title display-7" id="ActualizarLabel">Actualizar projecto</h5>  
                            <a href="#" class="no-anim close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                    </div>
                    <div class="modal-body display-7" id="Actualizar_body">
                        <div class="modal-body">
                        <input type="hidden" id="csrf_tokenUpdate" name="csrf_tokenUpdate" value="<?php echo generateCsrfTokenUpdate(); ?>">                                          
                            <label for="id">Projecto</label>
                            <select class="form-control" name="id" id="id" required>
                                <?php
                                    if(!empty($row))
                                        foreach($row as $rows)
                                        { 
                                    ?>                                                                   
                                        <option><?php echo $rows['nome']; ?></option>
                                <?php } ?>
                            </select>
                            <hr>
                            <label for="nome">Nome</label>
                            <input type="name" name="nome" class="form-control">                                                        
                            <hr>
                            <label for="selectedTipo">Tipo</label>
                            <input type="checkbox" id="enableTipo" onclick="toggle('enableTipo', 'selectedTipo')" >
                            <select id="selectedTipo" name="tipo" class="form-control" >
                                <option>Res do chão</option>
                                <option> 1 andar</option>
                                <option> 2 andar</option>
                                <option> 3 andar</option>
                            </select>

                            <hr>


                            <label for="descricao">Descricao</label>
                            <input type="text" name="descricao" class="form-control">

                            <hr>


                            <label for="tamanho">Tamanho</label>
                            <input type="text" name="tamanho" class="form-control">
                                                                
                            <hr>
                                                                
                            <label for="quarto">Quarto</label>
                            <input type="number" name="quarto" class="form-control" min="0">
                                                                
                            <hr>

                            <label for="wc">WC</label>
                            <input type="number" name="wc" class="form-control" min="0">
                                                                
                            <hr>

                            <label for="garagem">Garagem</label>
                            <input type="number" name="garagem" class="form-control" min="0">
                                                                
                            <hr>

                            <label for="preco">Preco</label>
                            <input type="number" name="preco" class="form-control" min="0">
                                                                
                            <label for="area">Area</label>
                            <input type="number" name="area" class="form-control" min="0">
                            
                            <hr>
                                                                
                            <label for="fotoImagem">Foto</label>
                            <input type="file" name="fotoImagem" class="form-control"> 

                            <label for="planta">Planta do projecto</label>
                            <input type="file" name="planta" class="form-control"> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="mbr-section-btn">
                            <a href="#" class="no-anim btn btn-secondary display-4" data-bs-dismiss="modal" data-dismiss="modal">Sair</a>
                            </div>
                        <div class="mbr-section-btn">
                            <button type="submit" name="submit"  class="no-anim btn btn-primary display-4" value="submitActualizar">Submeter</button>
                        </div>
                    </div>      
                </div>  
            </div>
        </form>
    </div>
<script> 
    function toggle(checkboxID, toggleID) {
        var checkbox = document.getElementById(checkboxID);
        var toggle = document.getElementById(toggleID);
        updateToggle = checkbox.checked ? toggle.disabled=false : toggle.disabled=true;
    }
document.addEventListener("DOMContentLoaded", function() { 
  if(typeof jQuery === "function") {
    $("#Actualizar").on("hidden.bs.modal", function () { 
      var html = $( "#Actualizar_body" ).html(); 
      $( "#Actualizar_body" ).empty(); 
      $( "#Actualizar_body" ).append(html); 
    }) 
  } else { 
      var mdw = document.getElementById("#Actualizar") 
      mdw.addEventListener("hidden.bs.modal", function(event) { 
        mdw.innerHTML = mdw.innerHTML; 
      }); 
  } 
}); 
</script></div>

	<script>
	if (typeof OpenModal === 'undefined') {
		OpenModal = function(modalName) {
			if(typeof jQuery === "function") {
				if ($('#' + modalName).length)
					$('#' + modalName).modal('show');
				else
					alert("Sorry, but there is no modal for " + modalName);
			} else {
				let mdw = new bootstrap.Modal(document.getElementById(modalName), {});
				mdw.show();
			}
		}
	}

	function modalSetCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		var expires = "expires="+ d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

	function modalGetCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
	</script>

</section>

<section class="mbr-section" id="witsec-modal-window-block-54" data-rv-view="166">

	<style>
	/* Let's not animate the contents of modal windows */
	.no-anim {
		-webkit-animation: none !important;
		-moz-animation: none !important;
		-o-animation: none !important;
		-ms-animation: none !important;
		animation: none !important;
	}
	</style>

	
	
	<div>
        <form action="DB.php" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="Apagar" tabindex="-1" role="dialog" aria-labelledby="ApagarLabel" aria-hidden="true">  
                <div class="modal-dialog modal-lg modal-dialog-centered" style="height:auto" role="document">    
                    <div class="modal-content">
                        <div class="modal-header">  
                            <h5 class="no-anim modal-title display-7" id="ApagarLabel">Apagar Projecto</h5>  
                            <a href="#" class="no-anim close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body display-7" id="Apagar_body">                                                    
                            <div class="modal-body">
                                <input type="hidden" id="csrf_tokenDelete" name="csrf_tokenDelete" value="<?php echo generateCsrfTokenDelete(); ?>">                                          
                                <label for="id">Projecto</label>
                                <select class="form-control" name="id" id="id" required>
                                    <?php
                                        if(!empty($row))
                                            foreach($row as $rows)
                                            { 
                                        ?>                                                                   
                                            <option><?php echo $rows['nome']; ?></option>
                                    <?php } ?>
                                </select>
                                                        
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="mbr-section-btn">
                                <a href="#" class="no-anim btn btn-secondary display-4" data-bs-dismiss="modal" data-dismiss="modal">Sair</a>
                            </div>
                            <div class="mbr-section-btn">
                                <button type="submit" name="submit" class="no-anim btn btn-primary display-4" value="submitApagar">Submeter</button>
                            </div>
                        </div>    
                    </div>  
                </div>
            </div>                
        </form>
<script> 
document.addEventListener("DOMContentLoaded", function() { 
  if(typeof jQuery === "function") {
    $("#Apagar").on("hidden.bs.modal", function () { 
      var html = $( "#Apagar_body" ).html(); 
      $( "#Apagar_body" ).empty(); 
      $( "#Apagar_body" ).append(html); 
    }) 
  } else { 
      var mdw = document.getElementById("#Apagar") 
      mdw.addEventListener("hidden.bs.modal", function(event) { 
        mdw.innerHTML = mdw.innerHTML; 
      }); 
  } 
}); 
</script></div>

	<script>
	if (typeof OpenModal === 'undefined') {
		OpenModal = function(modalName) {
			if(typeof jQuery === "function") {
				if ($('#' + modalName).length)
					$('#' + modalName).modal('show');
				else
					alert("Sorry, but there is no modal for " + modalName);
			} else {
				let mdw = new bootstrap.Modal(document.getElementById(modalName), {});
				mdw.show();
			}
		}
	}

	function modalSetCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		var expires = "expires="+ d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

	function modalGetCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
	</script>

</section>

<section data-bs-version="5.1" class="footer4 cid-uAs5F2sexD" once="footers" id="footer04-8b">

    

    

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="col-12">
                <p class="mbr-text mb-0 mbr-fonts-style display-7">
                    © Copyright 2025  - All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section><section><a href="https://mobiri.se"></a><a href="https://mobiri.se"></a></section><script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/ytplayer/index.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/theme/js/script.js"></script>  <script src="assets/formoid/formoid.min.js"></script>  
  
  
 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
  </body>
</html>