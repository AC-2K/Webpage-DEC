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
var pro = [];
var perso = [];
var modi = [];
var exclu = [];


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
    let foto1 = ProjectoPronto[b].pro_img;
    let nome1 = ProjectoPronto[b].pro_nome;
    let tipo1 = ProjectoPronto[b].pro_tipo;

    let tamanho1 = ProjectoPronto[b].pro_tamanho;
    let quarto1 = ProjectoPronto[b].pro_quarto;
    let wc1 = ProjectoPronto[b].pro_wc;
    let garagem1 = ProjectoPronto[b].pro_garagem;
    let preco1 = ProjectoPronto[b].pro_preco;

    pro.push("<div class=\"col-lg-12\">");
      pro.push("<div class=\"listing-item\">");
        
        pro.push("<div class=\"left-image\">"); 
          pro.push("<a href=\"#\"> <img src=" + foto1+ " width=\"200\" height=\"200\" > </a>");
          pro.push("<div class=\"hover-content\">");
            pro.push("<div class=\"main-white-button\">");
              pro.push("<a onclick=\"whatsApp()\"> <i class=\"fa fa-eye\"></i>Estou interessado</a>");
            pro.push("</div>");
          pro.push("</div>");
        pro.push("</div>");


        pro.push("<div class=\"right-content align-self-center\">");
          pro.push("<a href=\"#\"><h4>"+nome1+"</h4> </a>"); 
          pro.push("<span class=\"info\"> <img src=\"assets/images/tape.png\">"+tamanho1+"");
          pro.push("<hr>");

          pro.push("<span class=\"info\"> <img src=\"assets/images/house.png\">"+tipo1+"");
          pro.push("<hr>");

          pro.push("<span class=\"info\"> <img src=\"assets/images/bed.png\">"+quarto1+"");
          pro.push("<hr>");

          pro.push("<span class=\"info\"> <img src=\"assets/images/bathroom.png\">"+wc1+"");
          pro.push("<hr>");

          pro.push("<span class=\"info\"> <img src=\"assets/images/garage.png\">"+garagem1+"");
          pro.push("<hr>");

          pro.push("<span class=\"info\"> <img src=\"assets/images/payment.png\">"+preco1+" - MZN");
          pro.push("<hr>");
        pro.push("</div>");

      pro.push("</div>");
    pro.push("</div>"); 


  }
  document.getElementById("pronto").innerHTML = pro.join("");

}

function listProjectoPersonalizado(){
  for (let index = 0; index < ProjectoPersonalizado.length; index++) {
    var b = Number(index);
    
      //Dados extraido da DB
      let foto2 = ProjectoPersonalizado[b].pro_img;
      let nome2 = ProjectoPersonalizado[b].pro_nome;
      let tipo2 = ProjectoPersonalizado[b].pro_tipo;
    
      let tamanho2 = ProjectoPersonalizado[b].pro_tamanho;
      let quarto2 = ProjectoPersonalizado[b].pro_quarto;
      let wc2 = ProjectoPersonalizado[b].pro_wc;
      let garagem2 = ProjectoPersonalizado[b].pro_garagem;
      let preco2 = ProjectoPersonalizado[b].pro_preco;
    
      perso.push("<div class=\"col-lg-12\">");
        perso.push("<div class=\"listing-item\">");
              
          perso.push("<div class=\"left-image\">"); 
            perso.push("<a href=\"#\"> <img src=" + foto2+ " width=\"200\" height=\"200\" ></a>");
            perso.push("<div class=\"hover-content\">");
              perso.push("<div class=\"main-white-button\">");
                perso.push("<a onclick=\"whatsApp()\"> <i class=\"fa fa-eye\"></i>Estou interessado</a>");
              perso.push("</div>");
            perso.push("</div>");
          perso.push("</div>");
        
          perso.push("<div class=\"right-content align-self-center\">");
            perso.push("<a href=\"#\"><h4>"+nome2+"</h4> </a>"); 
            perso.push("<span class=\"info\"> <img src=\"assets/images/tape.png\">"+tamanho2+"");
            perso.push("<hr>");
        
            perso.push("<span class=\"info\"> <img src=\"assets/images/house.png\">"+tipo2+"");
            perso.push("<hr>");
        
            perso.push("<span class=\"info\"> <img src=\"assets/images/bed.png\">"+quarto2+"");
            perso.push("<hr>");
        
            perso.push("<span class=\"info\"> <img src=\"assets/images/bathroom.png\">"+wc2+"");
            perso.push("<hr>");
        
            perso.push("<span class=\"info\"> <img src=\"assets/images/garage.png\">"+garagem2+"");
            perso.push("<hr>");
        
            perso.push("<span class=\"info\"> <img src=\"assets/images/payment.png\">"+preco2+"- MZN");
            perso.push("<hr>");
          perso.push("</div>");
      
        perso.push("</div>");
      perso.push("</div>"); 
    
    
      }
      document.getElementById("personalizado").innerHTML = perso.join("");  
}
 
function listProjectoModificado(){
  for (let index = 0; index < ProjectoModificado.length; index++) {
    var b = Number(index);

      //Dados extraido da DB
      let foto3 = ProjectoModificado[b].pro_img;
      let nome3 = ProjectoModificado[b].pro_nome;
      let tipo3 = ProjectoModificado[b].pro_tipo;
    
      let tamanho3 = ProjectoModificado[b].pro_tamanho;
      let quarto3 = ProjectoModificado[b].pro_quarto;
      let wc3 = ProjectoModificado[b].pro_wc;
      let garagem3 = ProjectoModificado[b].pro_garagem;
      let preco3 = ProjectoModificado[b].pro_preco;
    
      modi.push("<div class=\"col-lg-12\">");
        modi.push("<div class=\"listing-item\">");
              
          modi.push("<div class=\"left-image\">"); 
            modi.push("<a href=\"#\"> <img src=" + foto3+ " width=\"200\" height=\"200\" ></a>");
            modi.push("<div class=\"hover-content\">");
              modi.push("<div class=\"main-white-button\">");
                modi.push("<a onclick=\"whatsApp()\"> <i class=\"fa fa-eye\"></i>Estou interessado</a>");
              modi.push("</div>");
            modi.push("</div>");
          modi.push("</div>");
        
          modi.push("<div class=\"right-content align-self-center\">");
            modi.push("<a href=\"#\"><h4>"+nome3+"</h4> </a>"); 
            modi.push("<span class=\"info\"> <img src=\"assets/images/tape.png\">"+tamanho3+"");
            modi.push("<hr>");
        
            modi.push("<span class=\"info\"> <img src=\"assets/images/house.png\">"+tipo3+"");
            modi.push("<hr>");
        
            modi.push("<span class=\"info\"> <img src=\"assets/images/bed.png\">"+quarto3+"");
            modi.push("<hr>");
        
            modi.push("<span class=\"info\"> <img src=\"assets/images/bathroom.png\">"+wc3+"");
            modi.push("<hr>");
        
            modi.push("<span class=\"info\"> <img src=\"assets/images/garage.png\">"+garagem3+"");
            modi.push("<hr>");
        
            modi.push("<span class=\"info\"> <img src=\"assets/images/payment.png\">"+preco3+"- MZN");
            modi.push("<hr>");
          modi.push("</div>");
      
        modi.push("</div>");
      modi.push("</div>"); 
    
    
      }
      document.getElementById("modificado").innerHTML = modi.join(""); 
    
    
}
function listProjectoExclusivo(){
  for (let index = 0; index < ProjectoExclusivo.length; index++) {
    var b = Number(index);

      //Dados extraido da DB
      let foto4 = ProjectoExclusivo[b].pro_img;
      let nom4 = ProjectoExclusivo[b].pro_nome;
      let tipo4 = ProjectoExclusivo[b].pro_tipo;
    
      let tamanho4 = ProjectoExclusivo[b].pro_tamanho;
      let quarto4 = ProjectoExclusivo[b].pro_quarto;
      let wc4 = ProjectoExclusivo[b].pro_wc;
      let garagem4 = ProjectoExclusivo[b].pro_garagem;
      let preco4 = ProjectoExclusivo[b].pro_preco;
    
      exclu.push("<div class=\"col-lg-12\">");
        exclu.push("<div class=\"listing-item\">");
              
          exclu.push("<div class=\"left-image\">"); 
            exclu.push("<a href=\"#\"> <img src=" + foto4+ " width=\"200\" height=\"200\" ></a>");
            exclu.push("<div class=\"hover-content\">");
              exclu.push("<div class=\"main-white-button\">");
                exclu.push("<a onclick=\"whatsApp()\"> <i class=\"fa fa-eye\"></i>Estou interessado</a>");
              exclu.push("</div>");
            exclu.push("</div>");
          exclu.push("</div>");
        
          exclu.push("<div class=\"right-content align-self-center\">");
            exclu.push("<a href=\"#\"><h4>"+nome4+"</h4> </a>"); 
            exclu.push("<span class=\"info\"> <img src=\"assets/images/tape.png\">"+tamanho4+"");
            exclu.push("<hr>");
        
            exclu.push("<span class=\"info\"> <img src=\"assets/images/house.png\">"+tipo4+"");
            exclu.push("<hr>");
        
            exclu.push("<span class=\"info\"> <img src=\"assets/images/bed.png\">"+quarto4+"");
            exclu.push("<hr>");
        
            exclu.push("<span class=\"info\"> <img src=\"assets/images/bathroom.png\">"+wc4+"");
            exclu.push("<hr>");
        
            exclu.push("<span class=\"info\"> <img src=\"assets/images/garage.png\">"+garagem4+"");
            exclu.push("<hr>");
        
            exclu.push("<span class=\"info\"> <img src=\"assets/images/payment.png\">"+preco4+"- MZN");
            exclu.push("<hr>");
          exclu.push("</div>");
      
        exclu.push("</div>");
      exclu.push("</div>"); 
    
    
      }
      document.getElementById("exclusivo").innerHTML = exclu.join(""); 
    
   
}




