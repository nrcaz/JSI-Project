/////////////////////
//// HOME
/////////////////////

if (innerHeight - $("header").height() > 650) {
  $("#home").css({
    height: innerHeight - $("header").height()
  });
}
// parallax
$(".home-bg").parallax({
  imageSrc: "assets/img/city.gif",
  speed: 1
});

$(".parallax1").parallax({
  imageSrc: "assets/img/background2.jpg",
  speed: 0.3
});
$(".parallax2").parallax({
  imageSrc: "assets/img/background2.jpg",
  speed: 0.3
});
$(".parallax3").parallax({
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
// MODAL
// height of collapse-modal
$("#collapse-modal").css({
  height:
    $("#btn-modal").height() +
    parseInt($("#btn-modal").css("paddingTop")) +
    parseInt($("#btn-modal").css("paddingBottom"))
});
let divModalWidth =
  $("#div-modal").width() +
  parseInt($("#div-modal").css("paddingLeft")) +
  parseInt($("#div-modal").css("paddingRight"));
let btnModalWidth =
  $("#btn-modal").width() +
  parseInt($("#btn-modal").css("paddingLeft")) +
  parseInt($("#btn-modal").css("paddingRight"));

// position out of screen
$("#div-modal").css({
  top: innerHeight / 2 - $("#div-modal").height() / 2,
  left: -divModalWidth
});
let collapse = true;

function modalPop() {
  if (collapse) {
    // animation on submit
    document
      .querySelector("#div-modal")
      .animate(
        [
          { transform: "translateX(0px)" },
          { transform: `translateX(${divModalWidth}px)` }
        ],
        {
          duration: 300
        }
      ).onfinish = function() {
      $("#div-modal").css({
        left: 0
      });
    };
    collapse = false;
  }

  document
    .querySelector("#collapse-modal")
    .addEventListener("click", function(e) {
      e.preventDefault();
      if (!collapse) {
        // animation collapse
        document
          .querySelector("#div-modal")
          .animate(
            [
              { transform: "translateX(0px)" },
              { transform: `translateX(${-btnModalWidth}px)` }
            ],
            {
              duration: 300
            }
          ).onfinish = function() {
          $("#div-modal").css({
            left: -btnModalWidth
          });
          $("#collapse-modal").html('<i class="fas fa-chevron-right"></i>');
          collapse = true;
        };
      } else {
        // animation uncollapse
        document
          .querySelector("#div-modal")
          .animate(
            [
              { transform: "translateX(0px)" },
              { transform: `translateX(${btnModalWidth}px)` }
            ],
            {
              duration: 300
            }
          ).onfinish = function() {
          $("#div-modal").css({
            left: 0
          });
          $("#collapse-modal").html('<i class="fas fa-chevron-left"></i>');
          collapse = false;
        };
      }
    });
}

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

    fetch(window.pathAjax, fetchOption)
      .then(response => response.json())
      .then(response => {
        // message
        if (response.message)
          document.querySelector("#message").textContent = response.message;
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
            annonce.image1 ? annonce.image1 : "assets/img/selection.jpg"
          }" class="card-img-top" alt=""></figure>
					<figcaption class="card-body">
						<h5 class="card-title">${annonce.titre}</h5>
						<p class="card-text">${annonce.description.slice(0, 100)}</p>
						<a href="annonce/${annonce.id}" class="btn btn-info">Voir l'annonce</a>
					</figcaption>
				</article>
				`;
        }
        document.querySelector("#annonceList").innerHTML = html;

        let demande = `Surface ${
          document.querySelector("#surfaceMin").value
        } - ${document.querySelector("#surfaceMax").value} m² \n| ${
          document.querySelector("#nbBureaux").value
            ? document.querySelector("#nbBureaux").value
            : "0"
        }+ Bureaux \n| ${
          document.querySelector("#nbOpenSpace").value
            ? document.querySelector("#nbOpenSpace").value
            : "0"
        }+ Open Space \n| ${
          document.querySelector("#nbSalleReunion").value
            ? document.querySelector("#nbSalleReunion").value
            : "0"
        }+ Salles de Reunion \n| ${
          document.querySelector("#nbEspaceDetente").value
            ? document.querySelector("#nbEspaceDetente").value
            : "0"
        }+ Cuisine / Espace detente`;

        document.querySelector("#contact_demande").value = demande;

        document.querySelector("#annonces").scrollIntoView({
          behavior: "smooth",
          block: "start"
        });
        modalPop();
      });
  });
}

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

////////////////////////////
//// POPOVER
////////////////////////////

$(document).ready(function() {
  $('[data-toggle="popover"]').popover({
    html: true,
    trigger: "focus",
    imageSrc: "assets/img/shorlist.jpg"
  });
});
