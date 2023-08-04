$(document).ready(function() {

   $(".close").click(function(e){
   	e.preventDefault();
   	$(".registro-section").addClass('hide');
   });
   $(".button-help").click(function(e){
	e.preventDefault();
	e.stopPropagation();
	$(".modal-contact").toggleClass('show-help');
   });
   $(".button-help-2").click(function(e){
	e.preventDefault();
	e.stopPropagation();
	$(".modal-contact").toggleClass('show-help');
   });
   $(".modal-contact").click(function(e){
	e.stopPropagation();
   });
   $("body").click(function(e){
	$(".modal-contact").removeClass('show-help');
   });

   $("#showAll_1").click(function(e){
   	e.preventDefault();
   	$("#show_row_1").toggleClass("all");
   });

   $("#showAll_3").click(function(e){
   	e.preventDefault();
   	$("#show_row_3").toggleClass("all");
   });

   $("#files").change(function(e){
   	$("#file_label").html("Archivos cargados...");
   });

    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
    

	function formatDate(date) {
	     var d = new Date(date),
	         month = '' + (d.getMonth() + 1),
	         day = '' + d.getDate(),
	         year = d.getFullYear();

	     if (month.length < 2) month = '0' + month;
	     if (day.length < 2) day = '0' + day;

	     return [year, month, day].join('-');
	 }

	 $(".copy").click(function(e) {
	    e.preventDefault();
	    navigator.clipboard.writeText(e.target.getAttribute('href')).then(() => {
      
	    }, () => {
	      
	    });
	});
var st2 = $("body").scrollTop();
                   if (st2 == 0){
                       //$('.menu-heads').addClass('top-imagen-head');
                       $(".banner-anuncio").removeClass("d-none");
                       $("main").addClass("main-baner");
                   } else {
                      //$('.menu-heads').removeClass('top-imagen-head');
                      $(".banner-anuncio").addClass("d-none");
                      $("main").removeClass("main-baner");
                   }
var lastScrollTop = 0;
                $(window).scroll(function(event){
                    console.log($(this).scrollTop());
                   var st = $(this).scrollTop();
                   if (st <= 0){
                       //$('.menu-heads').addClass('top-imagen-head');
                       $(".banner-anuncio").removeClass("d-none");
                       $("main").addClass("main-baner");
                   } else {
                      //$('.menu-heads').removeClass('top-imagen-head');
                      $(".banner-anuncio").addClass("d-none");
                      $("main").removeClass("main-baner");
                   }
                   lastScrollTop = st;
                });
	
 

  
});