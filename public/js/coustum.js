$(function(){

	'use strict';
     
     
	$(window).scroll(function(){
		var $t=$(".header").offset().top;
		console.log($t);
		if($(window).scrollTop() > $(".header").offset().top ){
			$(".navbar").addClass('navbar-fixed-top');


		}
		else{
			$(".navbar").removeClass('navbar-fixed-top');
		}
	})

	$(".dropdown-submenu a.test").click(function(e){
       $(this).next('ul').toggle();e.stopPropagation();
		e.preventDefault();
		

	})
}) 