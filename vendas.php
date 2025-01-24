<?php
    include 'connect.php';

?>
<!DOCTYPE html>
<html  >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/dec-white-logo.jpeg-128x128-2.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>vendas</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
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
					<li class="nav-item dropdown">
						<a class="nav-link link dropdown-toggle text-success display-4" href="https://mobiri.se" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">Sobre: Projecto</a><div class="dropdown-menu" aria-labelledby="dropdown-875"><a class="dropdown-item text-success display-4" href="projectoSobre.html">Sobre</a><a class="dropdown-item text-success display-4" href="projectoExclusivo.html">Exclusivo</a><a class="dropdown-item text-success display-4" href="projectoModificado.html">Modificado</a><a class="dropdown-item text-success display-4" href="projectoPronto.html">Pronto</a></div>
					</li><li class="nav-item"><a class="nav-link link show text-success display-4" href="vendas.php">Projectos</a></li><li class="nav-item"><a class="nav-link link text-success display-4" href="contacto.html">Contacto</a></li></ul>
				
				
			</div>
		</div>
	</nav>
</section>

<section data-bs-version="5.1" class="header6 cid-tOF1Cnu1xy" id="header06-3i">
	

	
	

	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-lg-5">
				<div class="card-wrapper">
					<h3 class="mbr-section-cardtitle mbr-fonts-style mb-2 display-5">
						<strong>Muitas opções!!!</strong></h3>

					<p class="mbr-cardtext mbr-fonts-style mb-0 display-7">
					Aqui podes encontrar as várias opções que possam satisfazer a si, desde projectos prontos, modificados e exclusivos.<br></p>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<h1 class="mbr-section-title mbr-fonts-style mb-4 display-2"><strong>Portal de projectos</strong></h1>
				
				
				
			</div>
		</div>
	</div>
</section>

<section data-bs-version="5.1" class="content4 cid-pr4kPps6Nr mbr-fullscreen" id="design-block-pr4kPps6Nr">
    

    
    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="title col-md-12 col-lg-8">
                
</div>

<!-- Portfolio Gallery Grid -->
<div class="container"> 
  <div class="row">
    <?php
      if (!empty($row)) {
        $counter = 0; 
        foreach($row as $rows) {
          if ($counter % 2 == 0 && $counter != 0) {
            echo '</div><div class="row">'; 
          }
          $counter++;
    ?>
      <div class="col-md-6 ">  
        <form action="produto.php" method="POST" enctype="multipart/form-data">
          <div class="column nature">
            <div class="content">
              <img src="assets/DB/<?php echo $rows['img']; ?>" alt="projecto <?php echo $rows['nome']; ?>" 
              style="width: 400px; height: 300px; display: block; margin: 0 auto;" class="mb-6">
              <br>
              <h4 class="item-title mbr-fonts-style display-5" ><strong><?php echo $rows['nome']; ?></strong></h4>
              <p class="mbr-text mbr-fonts-style mt-3 display-7" style="width: 400px; height: 100%; display: block; margin: 0 auto;" class="mb-6" >Casa de <?php echo $rows['tipo']; ?>, <?php echo $rows['quarto']; ?> quartos e garagem para <?php echo $rows['garagem']; ?> veículos</p>
              <hr>
              <input type="hidden" name="ID" value="<?php echo $rows['id']; ?>">
              <p class="mbr-text mbr-fonts-style mt-3 display-7" style="width: 400px; height: 100%; display: block; margin: 0 auto;" class="mb-6" ><?php echo $rows['preco']; ?>,00 MZN</p>
              <hr>
              <div class="mbr-section-btn align-center">
                <button type="submit" class="btn btn-primary display-4" name="submit" value="produto" style="width: 400px; height: 100%; display: block; margin: 0 auto;" class="mb-6"">Estou interessado</button>
              </div>
              <hr>
            </div>
          </div>
        </form>
      </div>
    <?php 
        }
      }
    ?>
  </div> <!-- End of row -->
</div> <!-- End of container -->

<!-- END GRID -->

      <script>
                filterSelection("all") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}</script>   
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="_customHTML cid-uz0Smyi0dn" id="design-block-83">
 
  
     
  <div class="whatapp">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a class="float" target="_blank" href="https://api.whatsapp.com/send?phone=258848100497&text=Cumprimentos, vi o website da DEC Projects e estou interessado nos vossos serviços">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
  </div>
  



 <div style="padding:1rem; background-color:#c1c1c1;" class="hidden">
   <div class="align-center">
       <h10>
          <br>
           <br><br><br><br><br>Whatsapp Button<br><br>Click the "gear" icon to change the layout of the Whatsapp Button. This text will be removed on preview/publish.<br><br>

<svg id="svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="150" viewBox="0, 0, 400,383.33333333333337">
<g id="svgg">
<path id="path0" d="M37.210 6.152 C 35.603 6.521,34.673 7.586,34.092 9.720 C 33.330 12.516,33.825 95.736,34.612 97.241 C 35.870 99.644,28.382 99.467,134.420 99.600 C 199.138 99.681,231.925 99.852,232.882 100.115 C 235.440 100.816,235.350 101.661,230.295 124.449 C 224.368 151.170,212.070 208.952,209.422 222.521 C 207.800 230.833,207.905 232.790,209.971 232.790 C 211.891 232.790,209.325 235.910,254.122 179.099 C 277.812 149.054,289.953 133.596,295.689 126.174 C 297.890 123.327,306.521 112.368,314.870 101.822 C 367.957 34.759,386.363 11.054,386.765 9.224 C 387.073 7.820,386.446 6.596,385.169 6.111 C 383.972 5.656,39.193 5.697,37.210 6.152 M382.917 8.569 C 384.519 9.741,380.855 14.580,323.489 87.057 C 313.389 99.818,299.260 117.766,292.092 126.942 C 279.051 143.636,265.977 160.258,245.456 186.236 C 239.439 193.853,229.856 206.001,224.162 213.231 C 210.292 230.840,210.188 230.897,212.490 219.587 C 217.028 197.295,227.371 148.754,232.598 125.216 C 237.896 101.359,238.065 99.524,235.099 97.991 C 234.120 97.484,228.193 97.405,188.034 97.358 C 75.294 97.227,37.576 96.911,36.978 96.092 C 36.161 94.974,36.161 10.490,36.978 9.373 C 37.513 8.642,38.883 8.626,116.843 8.435 C 301.952 7.984,382.171 8.024,382.917 8.569 M81.622 108.821 C 107.636 108.875,150.091 108.875,175.966 108.821 C 201.840 108.766,180.556 108.722,128.667 108.722 C 76.779 108.722,55.608 108.766,81.622 108.821 M177.885 157.718 C 177.182 158.404,174.020 162.244,170.860 166.251 C 167.700 170.259,164.939 173.732,164.724 173.970 C 164.509 174.207,161.918 177.468,158.965 181.217 C 156.012 184.965,150.834 191.512,147.459 195.767 C 144.084 200.021,139.856 205.359,138.063 207.629 C 129.342 218.668,112.627 239.779,108.533 244.926 C 107.162 246.650,103.624 251.125,100.671 254.870 C 97.718 258.615,93.156 264.369,90.533 267.657 C 87.910 270.944,79.126 282.263,71.012 292.809 C 62.899 303.356,50.820 318.802,44.170 327.133 C 28.112 347.253,23.297 353.336,21.093 356.284 C 20.566 356.990,18.921 359.133,17.439 361.046 C 6.762 374.827,3.520 379.694,4.240 380.859 C 4.652 381.526,352.012 381.883,353.760 381.218 L 354.749 380.843 354.547 336.442 C 354.330 288.424,354.421 291.066,352.956 290.282 C 351.831 289.680,309.260 289.563,226.846 289.934 C 183.386 290.130,157.086 289.826,155.238 289.106 C 153.350 288.370,153.375 288.079,156.655 272.483 C 157.410 268.897,158.183 265.187,158.374 264.238 C 159.208 260.094,161.885 247.419,162.221 246.021 C 162.651 244.231,164.430 235.954,166.258 227.229 C 166.966 223.854,167.895 219.453,168.324 217.450 C 168.753 215.446,169.619 211.390,170.249 208.437 C 170.879 205.484,171.843 200.997,172.391 198.466 C 172.938 195.935,173.542 193.087,173.734 192.138 C 173.925 191.189,174.694 187.478,175.444 183.893 C 181.253 156.107,181.424 154.270,177.885 157.718 M334.899 284.838 C 335.479 284.926,336.429 284.926,337.009 284.838 C 337.589 284.751,337.114 284.679,335.954 284.679 C 334.794 284.679,334.319 284.751,334.899 284.838 " stroke="none" fill="#b3b3b3" fill-rule="evenodd">
</path>
<path id="path1" d="M116.843 8.435 C 38.883 8.626,37.513 8.642,36.978 9.373 C 36.161 10.490,36.161 94.974,36.978 96.092 C 37.576 96.911,75.294 97.227,188.034 97.358 C 228.193 97.405,234.120 97.484,235.099 97.991 C 238.065 99.524,237.896 101.359,232.598 125.216 C 227.371 148.754,217.028 197.295,212.490 219.587 C 210.188 230.897,210.292 230.840,224.162 213.231 C 229.856 206.001,239.439 193.853,245.456 186.236 C 265.977 160.258,279.051 143.636,292.092 126.942 C 299.260 117.766,313.389 99.818,323.489 87.057 C 380.855 14.580,384.519 9.741,382.917 8.569 C 382.171 8.024,301.952 7.984,116.843 8.435 " stroke="none" fill="#4c4c4c" fill-rule="evenodd">
</path>
<path id="path2" d="M24.582 1.208 C 24.285 2.061,24.165 16.987,24.175 52.119 C 24.189 104.381,24.198 104.667,25.856 107.198 C 27.312 109.419,21.600 109.300,126.819 109.300 C 187.817 109.300,223.202 109.435,223.202 109.666 C 223.202 109.868,221.385 118.791,219.165 129.496 C 216.944 140.200,215.208 149.171,215.308 149.431 C 215.408 149.690,215.358 149.957,215.197 150.023 C 214.865 150.160,213.651 155.819,204.600 199.407 C 201.952 212.158,199.872 222.815,199.977 223.088 C 200.082 223.362,199.980 223.586,199.752 223.586 C 199.516 223.586,199.414 223.996,199.516 224.531 C 199.615 225.051,199.582 225.526,199.442 225.586 C 199.151 225.710,198.557 228.337,196.119 240.268 C 195.171 244.909,194.060 250.029,193.650 251.646 C 191.455 260.308,193.965 264.453,200.009 262.145 C 201.966 261.398,201.889 261.486,213.429 246.788 C 220.801 237.399,226.824 229.751,236.050 218.064 C 240.748 212.113,252.094 197.659,269.799 175.072 C 275.255 168.111,284.303 156.570,289.907 149.425 C 295.511 142.279,303.979 131.474,308.725 125.414 C 321.361 109.277,325.827 103.583,336.629 89.833 C 342.331 82.576,346.237 77.280,346.078 77.022 C 345.919 76.764,345.976 76.688,346.216 76.836 C 346.447 76.979,347.760 75.626,349.227 73.732 C 350.658 71.885,353.101 68.781,354.656 66.833 C 356.329 64.739,357.370 63.109,357.206 62.843 C 357.041 62.576,357.094 62.496,357.336 62.646 C 357.872 62.977,368.666 49.199,368.315 48.632 C 368.164 48.388,368.223 48.310,368.450 48.451 C 368.674 48.589,373.706 42.505,379.897 34.608 C 385.973 26.858,392.261 18.965,393.871 17.066 C 395.480 15.168,397.517 12.693,398.398 11.567 L 400.000 9.519 400.000 4.759 L 400.000 0.000 212.502 0.000 L 25.003 0.000 24.582 1.208 M385.169 6.111 C 386.446 6.596,387.073 7.820,386.765 9.224 C 386.363 11.054,367.957 34.759,314.870 101.822 C 306.521 112.368,297.890 123.327,295.689 126.174 C 289.953 133.596,277.812 149.054,254.122 179.099 C 209.325 235.910,211.891 232.790,209.971 232.790 C 207.905 232.790,207.800 230.833,209.422 222.521 C 212.070 208.952,224.368 151.170,230.295 124.449 C 235.350 101.661,235.440 100.816,232.882 100.115 C 231.925 99.852,199.138 99.681,134.420 99.600 C 28.382 99.467,35.870 99.644,34.612 97.241 C 33.825 95.736,33.330 12.516,34.092 9.720 C 34.673 7.586,35.603 6.521,37.210 6.152 C 39.193 5.697,383.972 5.656,385.169 6.111 M175.966 108.821 C 150.091 108.875,107.636 108.875,81.622 108.821 C 55.608 108.766,76.779 108.722,128.667 108.722 C 180.556 108.722,201.840 108.766,175.966 108.821 M180.735 144.991 C 179.413 145.394,178.766 146.116,171.634 155.164 C 166.035 162.266,160.321 169.481,152.304 179.573 C 148.329 184.577,145.792 188.088,145.958 188.357 C 146.118 188.615,146.070 188.703,145.844 188.563 C 145.295 188.224,144.060 189.684,144.413 190.256 C 144.585 190.533,144.541 190.624,144.307 190.478 C 143.770 190.147,136.792 198.920,137.142 199.485 C 137.301 199.742,137.247 199.823,137.013 199.678 C 136.474 199.345,127.972 210.042,128.323 210.610 C 128.476 210.857,128.426 210.944,128.208 210.810 C 127.996 210.679,125.945 212.939,123.650 215.832 C 121.355 218.726,116.830 224.412,113.595 228.469 C 110.061 232.902,107.824 236.025,107.991 236.295 C 108.151 236.554,108.103 236.641,107.877 236.502 C 107.327 236.162,106.092 237.623,106.445 238.194 C 106.613 238.465,106.574 238.562,106.354 238.426 C 106.145 238.297,104.765 239.694,103.288 241.531 C 96.608 249.837,76.645 275.196,70.771 282.838 C 67.204 287.478,62.325 293.824,59.929 296.939 C 57.436 300.180,55.688 302.790,55.842 303.039 C 55.996 303.289,55.941 303.369,55.712 303.227 C 55.170 302.893,54.322 303.975,54.676 304.549 C 54.843 304.818,54.798 304.908,54.569 304.766 C 54.020 304.427,52.785 305.888,53.138 306.459 C 53.307 306.733,53.266 306.827,53.039 306.686 C 52.524 306.368,45.925 314.778,46.261 315.323 C 46.416 315.573,46.348 315.638,46.095 315.482 C 45.595 315.173,22.023 344.549,22.104 345.380 C 22.133 345.675,22.027 345.837,21.868 345.738 C 21.392 345.444,20.226 346.987,20.539 347.494 C 20.712 347.773,20.668 347.862,20.431 347.716 C 20.071 347.493,14.984 353.821,7.143 364.244 C 5.466 366.473,4.298 368.371,4.451 368.618 C 4.610 368.875,4.551 368.949,4.308 368.799 C 4.071 368.653,3.080 369.715,1.982 371.294 L 0.069 374.044 0.025 378.776 L -0.020 383.509 180.335 383.509 L 360.690 383.509 360.580 337.776 C 360.460 288.005,360.498 288.865,358.312 286.446 C 355.732 283.591,359.250 283.754,301.092 283.791 C 272.531 283.809,249.028 283.908,248.862 284.010 C 247.895 284.608,161.482 283.949,160.872 283.340 C 160.729 283.196,161.071 280.888,161.632 278.211 C 162.193 275.534,162.558 273.098,162.443 272.798 C 162.327 272.497,162.365 272.333,162.526 272.433 C 162.687 272.532,163.297 270.255,163.881 267.371 C 164.465 264.488,167.099 252.044,169.734 239.719 C 172.369 227.393,174.442 217.093,174.340 216.829 C 174.239 216.565,174.296 216.294,174.468 216.228 C 174.932 216.048,176.895 206.412,176.573 205.891 C 176.400 205.611,176.462 205.545,176.738 205.716 C 177.004 205.880,177.181 205.740,177.181 205.367 C 177.181 205.025,178.123 200.312,179.274 194.894 C 183.691 174.105,185.667 164.276,185.737 162.744 C 185.777 161.869,185.963 161.247,186.149 161.360 C 186.336 161.474,186.409 161.024,186.312 160.361 C 186.214 159.699,186.256 159.156,186.405 159.156 C 186.650 159.156,187.185 156.010,187.710 151.486 C 188.291 146.478,185.225 143.623,180.735 144.991 M180.249 158.438 C 180.249 160.249,178.966 167.046,175.444 183.893 C 174.694 187.478,173.925 191.189,173.734 192.138 C 173.542 193.087,172.938 195.935,172.391 198.466 C 171.843 200.997,170.879 205.484,170.249 208.437 C 169.619 211.390,168.753 215.446,168.324 217.450 C 167.895 219.453,166.966 223.854,166.258 227.229 C 164.430 235.954,162.651 244.231,162.221 246.021 C 161.885 247.419,159.208 260.094,158.374 264.238 C 158.183 265.187,157.410 268.897,156.655 272.483 C 153.375 288.079,153.350 288.370,155.238 289.106 C 157.086 289.826,183.386 290.130,226.846 289.934 C 309.260 289.563,351.831 289.680,352.956 290.282 C 354.421 291.066,354.330 288.424,354.547 336.442 L 354.749 380.843 353.760 381.218 C 352.012 381.883,4.652 381.526,4.240 380.859 C 3.520 379.694,6.762 374.827,17.439 361.046 C 18.921 359.133,20.566 356.990,21.093 356.284 C 23.297 353.336,28.112 347.253,44.170 327.133 C 50.820 318.802,62.899 303.356,71.012 292.809 C 79.126 282.263,87.910 270.944,90.533 267.657 C 93.156 264.369,97.718 258.615,100.671 254.870 C 103.624 251.125,107.162 246.650,108.533 244.926 C 112.627 239.779,129.342 218.668,138.063 207.629 C 139.856 205.359,144.084 200.021,147.459 195.767 C 150.834 191.512,156.012 184.965,158.965 181.217 C 161.918 177.468,164.509 174.207,164.724 173.970 C 164.939 173.732,167.700 170.259,170.860 166.251 C 179.198 155.678,180.249 154.803,180.249 158.438 M337.009 284.838 C 336.429 284.926,335.479 284.926,334.899 284.838 C 334.319 284.751,334.794 284.679,335.954 284.679 C 337.114 284.679,337.589 284.751,337.009 284.838" stroke="none" fill="#fafafa" fill-rule="evenodd">
</path>
    </g>
           </svg>
           <br><br><br>
       </h10>				
    </div>
  </div>  
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
</section><section><a href="https://mobiri.se"></a><a href="https://mobiri.se"></a></section><script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/ytplayer/index.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/theme/js/script.js"></script>  
  
  
 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
  </body>
</html>