/*--- Styles Switcher ---*/

jQuery(document).ready(function($) {
	
	$("#color_switcher_preview .stylesheet" ).click(function(){
		$("#colors" ).attr("href", "css/colors_version/style.css" );
		return false;
	});

	$("#color_switcher_preview .stylesheet_1" ).click(function(){
		$("#colors" ).attr("href", "css/colors_version/stylesheet_1.css" );
		return false;
	});
	
	$("#color_switcher_preview .stylesheet_2" ).click(function(){
		$("#colors" ).attr("href", "css/colors_version/stylesheet_2.css" );
		return false;
	});
	
	$("#color_switcher_preview .stylesheet_3" ).click(function(){
		$("#colors" ).attr("href", "css/colors_version/stylesheet_3.css" );
		return false;
	});
	
	$("#color_switcher_preview .stylesheet_4" ).click(function(){
		$("#colors" ).attr("href", "css/colors_version/stylesheet_4.css" );
		return false;
	});
	
	$("#color_switcher_preview .stylesheet_5" ).click(function(){
		$("#colors" ).attr("href", "css/colors_version/stylesheet_5.css" );
		return false;
	});
	
	$("#color_switcher_preview .stylesheet_6" ).click(function(){
		$("#colors" ).attr("href", "css/colors_version/stylesheet_6.css" );
		return false;
	});	
	
	$("#color_switcher_preview h2 a").click(function(e){
		e.preventDefault();
		var div = $("#color_switcher_preview");
		console.log(div.css("right"));
		if (div.css("right") === "-210px") {
			$("#color_switcher_preview").animate({
				right: "0px"
			}); 
		} else {
			$("#color_switcher_preview").animate({
				right: "-210px"
			});
		}
	});

	$(".colors li a").click(function(e){
		e.preventDefault();
		$(this).parent().parent().find("a").removeClass("active");
		$(this).addClass("active");
	});
	
	$("#reset a").click(function(e){
		e.preventDefault();
		$(".colors li a" ).removeClass("active");
		$("#colors" ).attr("href", "css/colors/style.css" );
		$(window).resize();
	});
	
});