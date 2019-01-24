/////////////////////
//// HEADER
/////////////////////

$("header .nav-link").on("click", function() {
    console.log(screen.width + "" + innerWidth);
    $("header .nav-link").css({
        borderBottom: "solid 5px transparent"
    });
    if (screen.width > 990 && innerWidth > 990) {
        $(this).css({
            borderBottom: "solid 5px orange"
        });
    }
});

/////////////////////
//// HOME
/////////////////////

// parallax
$(".home-bg").parallax({
    imageSrc: "assets/img/city.gif",
    speed: 0.5
});

$(".parallax1").parallax({
    imageSrc: "assets/img/background2.jpg",
    speed: 0.3
});
$(".parallax2").parallax({
    imageSrc: "assets/img/background2.jpg",
    speed: 0.3
});

/////////////////////
//// FOOTER
/////////////////////

// hover
$("footer .nav-link").on("mouseover", function() {
    $("footer .nav-link").css({
        color: "white"
    });
    $(this).css({
        color: "orange"
    });
});
$("footer .nav-link").on("mouseleave", function() {
    $("footer .nav-link").css({
        color: "white"
    });
});

// click on references
let clickReferences = false;
$('[href="#references"]').on("click", function(e) {
    e.preventDefault();
    if (!clickReferences) {
        clickReferences = true;
        $("#references").animate({
            height: $("#references img").height()
        });
    } else {
        clickReferences = false;
        $("#references").animate({
            height: 0
        });
    }
});

/////////////////////
//// SIMULATION
/////////////////////

// AJAX
let formSim = document.querySelector("#simulation");
let annonces = [];

if (formSim) {
    formSim.addEventListener("submit", function(e) {
        e.preventDefault();
        // scroll to result
        document.querySelector("#annonces").scrollIntoView({
            behavior: "smooth",
            block: "start"
        });

        // prepare AJAX
        let formData = new FormData(formSim);

        let fetchOption = {
            method: "POST",
            body: formData
        };

        fetch(
                "http://localhost/jsi-project/jsi-symfony/public/ajax",
                fetchOption
            )
            .then(response => response.json())
            .then(response => {
                // message
                if (response.message)
                    document.querySelector("#message").textContent =
                    response.message;
                else
                    document.querySelector("#message").textContent =
                    "Les annonces correspondantes à votre recherche";

                // liste annonce
                annonces = response.annonces;

                let html = "";
                for (annonce of annonces) {
                    html += `
				<article class="card">
					<figure><img src="${
                        annonce.image1
                            ? annonce.image1
                            : "assets/img/selection.jpg"
                    }" class="card-img-top" alt=""></figure>
					<figcaption class="card-body">
						<h5 class="card-title">${annonce.titre}</h5>
						<p class="card-text">${annonce.description}</p>
						<a href="annonce/${annonce.id}" class="btn btn-primary">Voir l'annonce</a>
					</figcaption>
				</article>
				`;
                }
                document.querySelector(".annonceList").innerHTML = html;

                let demande = `
			Surface ${document.querySelector("#surfaceMin").value} - ${
                    document.querySelector("#surfaceMax").value
                }
			| ${document.querySelector("#nbBureaux").value}+ Bureaux
			| ${document.querySelector("#nbOpenSpace").value}+ Open Space
			| ${document.querySelector("#nbSalleReunion").value}+ Salles de Reunion
			| ${document.querySelector("#nbEspaceDetente").value}+ Cuisine / Espace detente
			`;

                document.querySelector("#contact_demande").value = demande;

                document.querySelector("#annonces").scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            });
    });
}

// MODAL
$(function() {
  let divModalWidth = $('#div-modal').width() + parseInt($('#div-modal').css("paddingLeft")) + parseInt($('#div-modal').css("paddingRight"));
  let btnModalWidth = $('#btn-modal').width() + parseInt($('#btn-modal').css("paddingLeft")) + parseInt($('#btn-modal').css("paddingRight"));

  // position out of screen
  $('#div-modal').css({
    top: innerHeight /2 - $('#div-modal').height() / 2,
    left: - divModalWidth,
  });

  // animation on load ( a mettre au moment ou on submit la recherche)
  document.querySelector('#div-modal').animate([
    { transform : 'translateX(0px)'},
    { transform : `translateX(${divModalWidth}px)`}
  ],
  {duration: 300}).onfinish = function () {
    $('#div-modal').css({
      left : 0
    })
  };

  let collapse = false;
  document.querySelector('#collapseModal').addEventListener('click', function () {
      if (!collapse) {
        // animation collapse
        document.querySelector('#div-modal').animate([
          { transform : 'translateX(0px)'},
          { transform : `translateX(${-btnModalWidth}px)`}
        ],
        {duration: 300}).onfinish = function () {
          $('#div-modal').css({
            left : -btnModalWidth
          });
          $('#collapseModal').html('<i class="fas fa-chevron-right"></i>');
          collapse = true;
        };
      }
      // animation uncollapse
      else {
        document.querySelector('#div-modal').animate([
          { transform : 'translateX(0px)'},
          { transform : `translateX(${btnModalWidth}px)`}
        ],
        {duration: 300}).onfinish = function () {
          $('#div-modal').css({
            left : 0
          })
          $('#collapseModal').html('<i class="fas fa-chevron-left"></i>');
          collapse = false;
        };
      }
  })
});



////////////////////////////
//// FORGET PW
////////////////////////////
// adjust height so footer is at bottom of page
if (
    innerHeight >
    $("header").height() + $("footer").height() + $("#forgetpw").height()
) {
    $("#forgetpw").css({
        height: innerHeight - $("header").height() - $("footer").height()
    });
}
////////////////////////////
//// LOGIN
////////////////////////////
if (
    innerHeight >
    $("header").height() + $("footer").height() + $("#login").height()
) {
    $("#login").css({
        height: innerHeight - $("header").height() - $("footer").height()
    });
}
////////////////////////////
//// CONFIRMATION
////////////////////////////
if (
    innerHeight >
    $("header").height() + $("footer").height() + $("#confirmation").height()
) {
    $("#confirmation").css({
        height: innerHeight - $("header").height() - $("footer").height()
    });
}