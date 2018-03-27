// Add your custom JS code here

/*------------------DEBUT JS pour slide de PUB3----------------------------- */


$('.carousel').carousel({
	interval: 4000,
	pause: false
  })


/*------------------FIN JS pour slide de PUB3----------------------------- */






/*------------------------------Debut Article slide----------------------------------*/


$(document).ready(function(ev){
	var items = $(".nav li").length;
	var leftRight=0;
	if(items>5){
			leftRight=(items-5)*50*-1;
	}
	$('#custom_carousel').on('slide.bs.carousel', function (evt) {
			

		$('#custom_carousel .controls li.active').removeClass('active');
		$('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
	})
	$('.nav').draggable({ 
			axis: "x",
			 stop: function() {
					var ml = parseInt($(this).css('left'));
					if(ml>0)
					$(this).animate({left:"0px"});
							if(ml<leftRight)
									$(this).animate({left:leftRight+"px"});
									
			}
		
	});
});


/**-------------------------------Fin Article Slide----------------------------------*/

//POUR L'Affichage d'article
$(document).ready( function() {
    $('#myCarousel').carousel({
		interval:   4000
	});
	
	var clickEvent = false;
	$('#myCarousel').on('click', '.nav a', function() {
			clickEvent = true;
			$('.nav li').removeClass('active');
			$(this).parent().addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.nav').children().length -1;
			var current = $('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.nav li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
});
//Fin pour l'affichage d'article