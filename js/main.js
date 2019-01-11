/////////////////////
//// HEADER
/////////////////////

$('header .nav-link').on('click', function() {
	console.log(screen.width + '' + innerWidth);
	$('header .nav-link').css({
		borderBottom : 'solid 5px transparent'
	});
	if (screen.width > 990 && innerWidth > 990) {
		$(this).css({
			borderBottom : 'solid 5px orange'
		});
	}
});

/////////////////////
//// HOME
/////////////////////

$('#home').css({
	marginTop : $('header').height()
});
// parallax
$('#home').parallax({
	imageSrc : 'assets/img/architectural-design-architecture-buildings-936722.jpg',
	speed    : 0.5
});

/////////////////////
//// FOOTER
/////////////////////

// hover
$('footer .nav-link').on('mouseover', function() {
	$('footer .nav-link').css({
		color : 'white'
	});
	$(this).css({
		color : 'orange'
	});
});
$('footer .nav-link').on('mouseleave', function() {
	$('footer .nav-link').css({
		color : 'white'
	});
});

// click on references
let clickReferences = false;
$('[href="#references"]').on('click', function(e) {
	e.preventDefault();
	if (!clickReferences) {
		clickReferences = true;
		$('#references').animate({
			height : $('#references img').height()
		});
	} else {
		clickReferences = false;
		$('#references').animate({
			height : 0
		});
	}
});
