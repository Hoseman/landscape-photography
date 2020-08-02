//Main slider resize
jQuery(document).ready(function(e) {
	var the_height2 = $(window).height();
	var the_height3 = $(window).height() / 2.5;
	var pic_width = $(window).height() * 1.04;
	var menu_top = $(window).height() / 3.7;
	//var pic_height = "auto";

	jQuery('.carousel-item').css('height', the_height2);
	jQuery('.carousel-caption').css('top', the_height3);
	jQuery('.ah-picture-container').css('max-width', pic_width);
	jQuery('.main-menu').css('top', menu_top);
	jQuery(".carousel-inner .carousel-item:first").addClass("active");
	jQuery(".carousel-indicators li:first").addClass("active");


	$(".hamburger").click(function(){
		//alert('Hello');
		$("body").toggleClass("ah-99");
		$("body").removeClass("ah-99-search");
		$(".main-menu").toggleClass("menu-active");
		$(".search-button").removeClass("active");
		$(".main-search-menu").removeClass("search-menu-active");

	});

	$(".search-button").click(function() {
		$("body").removeClass("ah-99");
		$("body").toggleClass("ah-99-search");
		$(this).toggleClass("active");
		$(".hamburger").removeClass("is-active");
		$(".main-menu").removeClass("menu-active");
		$(".main-search-menu").toggleClass("search-menu-active");
	});
});

jQuery(window).resize(function(e) {
	
	showViewportSize();
});
  
function showViewportSize() { 
	var the_height = $(window).height();
	var the_height4 = $(window).height() / 2.5;
	var pic_width = $(window).height() * 1.1;
	var menu_top_2 = $(window).height() / 3.7;

	jQuery('.carousel-item').css('height', the_height);
	jQuery('.carousel-caption').css('top', the_height4);
	jQuery('.ah-picture-container').css('max-width', pic_width);
	jQuery('.main-menu').css('top', menu_top_2);

}
//Main slider resize


//Scroll

$('.btn_scroll').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top - 135
    }, 1000);
    return false;
});

function scrollToTop() { 
	$(window).scrollTop(0);
	//window.scrollTo({top: 0, behavior: 'smooth'}); 
}

//Scroll 


//Hamburger animated menu
var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

var hamburgers = document.querySelectorAll(".hamburger");
if (hamburgers.length > 0) {
  forEach(hamburgers, function(hamburger) {
	hamburger.addEventListener("click", function() {
	  this.classList.toggle("is-active");
	}, false);
  });
}
//Hamburger animated menu


// Toggle menu on scroll
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 240) {
		//alert('Hello');
        $("#mainnav").addClass("main-nav-toggle");
		$("#about-generic").addClass("about-toggle");
	}
	else {
		$("#mainnav").removeClass("main-nav-toggle");
		$("#about-generic").removeClass("about-toggle");
	}
});
// Toggle menu on scroll