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

// parallax
$('#home').parallax({
	imageSrc : 'assets/img/architectural-design-architecture-buildings-936722.jpg',
	speed    : 0.5
});

/////////////////////
//// FOOTER
/////////////////////

$('body').css({
	paddingBottom : $('footer').height()
});
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

/////////////////////
//// SIMULATION
/////////////////////

// Rajouter le code Ajax ici en Vanilla JS
// Ne pas oublier de gérer l'ajout du texte dans l'input "demande"
let formSim = document.querySelector('#simulation');
let annonces = [];


formSim.addEventListener('submit',function(e) {
	e.preventDefault();
	// scroll to result
	document.querySelector('#annonces').scrollIntoView({ 
		behavior: 'smooth',
		block: 'start' 
	  });
	
	// prepare AJAX
	let formData = new FormData(formSim);

	let fetchOption = {
		method: 'POST',
		body: formData
	};

	fetch('http://localhost/jsi-project/jsi-symfony/public/ajax', fetchOption).then(response => response.json()).then(response => {
		document.querySelector('#message').textContent = response.message;
		annonces = response.annonces;
		console.log(annonces);

		let html = "";
		for(annonce of annonces) {
			html+=`
			<article class="card">
				<figure><img src="assets/img/visite.jpg" class="card-img-top" alt=""></figure>
				<figcaption class="card-body">
					<h5 class="card-title">${annonce.titre}</h5>
					<p class="card-text">${annonce.description}</p>
					<a href="annonce/${annonce.id}" class="btn btn-primary">Voir l'annonce</a>
				</figcaption>
        	</article>
			`
		}
		document.querySelector('.annonceList').innerHTML = html;

		let demande = `
		Surface ${document.querySelector('#surfaceMin').value} - ${document.querySelector('#surfaceMax').value}
		${document.querySelector('#nbBureaux').value}+ Bureaux
		${document.querySelector('#nbOpenSpace').value}+ Open Space
		${document.querySelector('#nbSalleReunion').value}+ Salles de Reunion
		${document.querySelector('#nbEspaceDetente').value}+ Cuisine / Espace detente
		`;

		document.querySelector('#contact_demande').value = demande;

		document.querySelector('#annonces').scrollIntoView({ 
			behavior: 'smooth',
			block: 'start' 
		  });
	});
})