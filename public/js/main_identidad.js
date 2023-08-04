$(document).ready(function() {
    $('.download_img').click(function(e) {
        e.preventDefault();
        var files = $("#presentacion_firma").attr('src');
         window.open(files);
    });
    $(".copy_img").click(function(e) {
	    e.preventDefault();
	     $(".alert_copy").removeClass("d-none");
        var files = $("#presentacion_firma").attr('src');
	    navigator.clipboard.writeText(files).then(() => {
      
	    }, () => {
	      
	    });
	});
    $('.download_img_2').click(function(e) {
        e.preventDefault();
        var files = $("#presentacion_firma_2").attr('src');
         window.open(files);
    });
    $(".copy_img_2").click(function(e) {
	    e.preventDefault();
	    $(".alert_copy_2").removeClass("d-none");
        var files = $("#presentacion_firma_2").attr('src');
	    navigator.clipboard.writeText(files).then(() => {
      
	    }, () => {
	      
	    });
	});
	$('.custom-control-input').change(function(){
		selected_value = $("input[name='customRadio']:checked").val();
		if (selected_value == "si") {
			$(".redes-sec").removeClass("d-none");
		}else{
			$(".redes-sec").addClass("d-none");
		}
	});
});
