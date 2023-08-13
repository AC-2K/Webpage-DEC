(function ($) {
	
	"use strict";

	// Header Type = Fixed
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    var box = $('.header-text').height();
    var header = $('header').height();

    if (scroll >= box - header) {
      $("header").addClass("background-header");
    } else {
      $("header").removeClass("background-header");
    }
  });


  // Acc
    $(document).on("click", ".naccs .menu div", function() {
      var numberIndex = $(this).index();

      if (!$(this).is("active")) {
          $(".naccs .menu div").removeClass("active");
          $(".naccs ul li").removeClass("active");

          $(this).addClass("active");
          $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

          var listItemHeight = $(".naccs ul")
            .find("li:eq(" + numberIndex + ")")
            .innerHeight();
          $(".naccs ul").height(listItemHeight + "px");
        }
    });


	$('.owl-listing').owlCarousel({
		items:1,
		loop:true,
		dots: true,
		nav: false,
		autoplay: true,
		margin:30,
		  responsive:{
			  0:{
				  items:1
			  },
			  600:{
				  items:1
			  },
			  1000:{
				  items:1
			  },
			  1600:{
				  items:1
			  }
		  }
	})
	

	// Menu Dropdown Toggle
  if($('.menu-trigger').length){
    $(".menu-trigger").on('click', function() { 
      $(this).toggleClass('active');
      $('.header-area .nav').slideToggle(200);
    });
  }


	// Page loading animation
	 $(window).on('load', function() {

        $('#js-preloader').addClass('loaded');

    });

})(window.jQuery);

//button whatsApp

// Get the button
let mybutton = document.getElementById("myBtn");


window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function whatsApp() {
  location.replace("https://wa.me/258848100497");
}

function toggleSelect(checkboxId, selectId) {
  var enableSelectCheckbox = document.getElementById(checkboxId);
  var selectElement = document.getElementById(selectId);

  if (enableSelectCheckbox.checked) {
      selectElement.disabled = false;
  } else {
      selectElement.disabled = true;
  }
}


//Object project


let ProjectoPronto = new Array();
let ProjectoPersonalizado = new Array();
let ProjectoModificado = new Array();
let ProjectoExclusivo = new Array();
var html = [];


function definirArray( obejctoArray ){

  for (let index = 0; index < obejctoArray.length; index++) {
    let element = obejctoArray[index];

    let imgAntigo = element["pro_img"];
  
    element["pro_img"] = "./assets/DB/"+imgAntigo;

    if(element["pro_categoria"] == "Pronto"){

      ProjectoPronto.push(element);
      

    }
    if(element["pro_categoria"] == "Modificado"){
      ProjectoModificado.push(element);
    }
    if(element["pro_categoria"] == "Personalizado"){
      ProjectoPersonalizado.push(element);
    }
    if(element["pro_categoria"] == "Exclusivo"){
      ProjectoExclusivo.push(element);
    }
    
}

}
function listProjectoPronto(){
  for (let index = 0; index < ProjectoPronto.length; index++) {
    
    var b = Number(index);
    
    //Dados extraido da DB
    let foto = ProjectoPronto[b].pro_img;
    let nome = ProjectoPronto[b].pro_nome;
    let tipo = ProjectoPronto[b].pro_tipo;

    let tamanho = ProjectoPronto[b].pro_tamanho;
    let quarto = ProjectoPronto[b].pro_quarto;
    let wc = ProjectoPronto[b].pro_wc;
    let garagem = ProjectoPronto[b].pro_garagem;
    let preco = ProjectoPronto[b].pro_preco;

    html.push("<div class=\"col-lg-12\">");
      html.push("<div class=\"listing-item\">");
        
        html.push("<div class=\"left-image\">"); 
          html.push("<a href=\"#\"> <img src=" + foto+" alt=\" \"></a>");
          html.push("<div class=\"hover-content\">");
            html.push("<div class=\"main-white-button\">");
              html.push("<a onclick=\"whatsApp()\"> <i class=\"fa fa-eye\"></i>Estou interessado</a>");
            html.push("</div>");
          html.push("</div>");
        html.push("</div>");


        html.push("<div class=\"right-content align-self-center\">");
          html.push("<a href=\"#\"><h4>"+nome+"</h4> </a>"); 
          html.push("<span class=\"info\"> <img src=\"assets/images/tape.png\">"+tamanho+"");
          html.push("<hr>");

          html.push("<span class=\"info\"> <img src=\"assets/images/house.png\">"+tipo+"");
          html.push("<hr>");

          html.push("<span class=\"info\"> <img src=\"assets/images/bed.png\">"+quarto+"");
          html.push("<hr>");

          html.push("<span class=\"info\"> <img src=\"assets/images/bathroom.png\">"+wc+"");
          html.push("<hr>");

          html.push("<span class=\"info\"> <img src=\"assets/images/garage.png\">"+garagem+"");
          html.push("<hr>");

          html.push("<span class=\"info\"> <img src=\"assets/images/payment.png\">"+preco+"MZN");
          html.push("<hr>");
        html.push("</div>");

      html.push("</div>");
    html.push("</div>"); 


  }
  document.getElementById("container").innerHTML = html.join("");

}

function listProjectoPersonalizado(){
  for (let index = 0; index < ProjectoPersonalizado.length; index++) {
    var b = Number(index);
    
      //Dados extraido da DB
      let foto = ProjectoPersonalizado[b].pro_img;
      let nome = ProjectoPersonalizado[b].pro_nome;
      let tipo = ProjectoPersonalizado[b].pro_tipo;
    
      let tamanho = ProjectoPersonalizado[b].pro_tamanho;
      let quarto = ProjectoPersonalizado[b].pro_quarto;
      let wc = ProjectoPersonalizado[b].pro_wc;
      let garagem = ProjectoPersonalizado[b].pro_garagem;
      let preco = ProjectoPersonalizado[b].pro_preco;
    
      html.push("<div class=\"col-lg-12\">");
        html.push("<div class=\"listing-item\">");
              
          html.push("<div class=\"left-image\">"); 
            html.push("<a href=\"#\"> <img src=" + foto+" alt=\" \"></a>");
            html.push("<div class=\"hover-content\">");
              html.push("<div class=\"main-white-button\">");
                html.push("<a onclick=\"whatsApp()\"> <i class=\"fa fa-eye\"></i>Estou interessado</a>");
              html.push("</div>");
            html.push("</div>");
          html.push("</div>");
        
          html.push("<div class=\"right-content align-self-center\">");
            html.push("<a href=\"#\"><h4>"+nome+"</h4> </a>"); 
            html.push("<span class=\"info\"> <img src=\"assets/images/tape.png\">"+tamanho+"");
            html.push("<hr>");
        
            html.push("<span class=\"info\"> <img src=\"assets/images/house.png\">"+tipo+"");
            html.push("<hr>");
        
            html.push("<span class=\"info\"> <img src=\"assets/images/bed.png\">"+quarto+"");
            html.push("<hr>");
        
            html.push("<span class=\"info\"> <img src=\"assets/images/bathroom.png\">"+wc+"");
            html.push("<hr>");
        
            html.push("<span class=\"info\"> <img src=\"assets/images/garage.png\">"+garagem+"");
            html.push("<hr>");
        
            html.push("<span class=\"info\"> <img src=\"assets/images/payment.png\">"+preco+"MZN");
            html.push("<hr>");
          html.push("</div>");
      
        html.push("</div>");
      html.push("</div>"); 
    
    
      }
      document.getElementById("container").innerHTML = html.join("");  
}
 
function listProjectoModificado(){
  for (let index = 0; index < ProjectoModificado.length; index++) {
    var b = Number(index);

      //Dados extraido da DB
      let foto = ProjectoModificado[b].pro_img;
      let nome = ProjectoModificado[b].pro_nome;
      let tipo = ProjectoModificado[b].pro_tipo;
    
      let tamanho = ProjectoModificado[b].pro_tamanho;
      let quarto = ProjectoModificado[b].pro_quarto;
      let wc = ProjectoModificado[b].pro_wc;
      let garagem = ProjectoModificado[b].pro_garagem;
      let preco = ProjectoModificado[b].pro_preco;
    
      html.push("<div class=\"col-lg-12\">");
        html.push("<div class=\"listing-item\">");
              
          html.push("<div class=\"left-image\">"); 
            html.push("<a href=\"#\"> <img src=" + foto+" alt=\" \"></a>");
            html.push("<div class=\"hover-content\">");
              html.push("<div class=\"main-white-button\">");
                html.push("<a onclick=\"whatsApp()\"> <i class=\"fa fa-eye\"></i>Estou interessado</a>");
              html.push("</div>");
            html.push("</div>");
          html.push("</div>");
        
          html.push("<div class=\"right-content align-self-center\">");
            html.push("<a href=\"#\"><h4>"+nome+"</h4> </a>"); 
            html.push("<span class=\"info\"> <img src=\"assets/images/tape.png\">"+tamanho+"");
            html.push("<hr>");
        
            html.push("<span class=\"info\"> <img src=\"assets/images/house.png\">"+tipo+"");
            html.push("<hr>");
        
            html.push("<span class=\"info\"> <img src=\"assets/images/bed.png\">"+quarto+"");
            html.push("<hr>");
        
            html.push("<span class=\"info\"> <img src=\"assets/images/bathroom.png\">"+wc+"");
            html.push("<hr>");
        
            html.push("<span class=\"info\"> <img src=\"assets/images/garage.png\">"+garagem+"");
            html.push("<hr>");
        
            html.push("<span class=\"info\"> <img src=\"assets/images/payment.png\">"+preco+"MZN");
            html.push("<hr>");
          html.push("</div>");
      
        html.push("</div>");
      html.push("</div>"); 
    
    
      }
      document.getElementById("container").innerHTML = html.join(""); 
    
    
}
function listProjectoExclusivo(){
  for (let index = 0; index < ProjectoExclusivo.length; index++) {
    var b = Number(index);
    let string = ProjectoExclusivo[b].pro_img;
    
  } 
}




