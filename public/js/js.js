$(document).ready(function() {
    $('#example').DataTable();
} );

$(document).ready(function () {
    $('.leftmenutrigger').on('click', function (e) {
      $('.side-nav').toggleClass("open");
      $('#wrapper').toggleClass("open");
      e.preventDefault();
    });
  });

  function angle() {
	var w = $(window).width();
	var h = $(".shape").height();
	$('.top').css('border-right-width', w - 3);
	$('.top').css('border-bottom-width', h - 3);
}

$(document).ready(function(){

	$(window).bind("load", function(){
		angle();
	});

	$(window).resize(function(){
		angle();
	});

});

