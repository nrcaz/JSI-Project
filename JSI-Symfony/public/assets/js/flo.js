// Smooth scroll from Florian
$(function() {
  $(
    "a[href='#services'], a[href='#commercialisation'], a[href='#contact_home']"
  ).on("click", function(e) {
    e.preventDefault();

    let hash = this.hash;
    let hauteurNav = $("header").height();
    let decalage = $(hash).offset().top;

    window.scrollTo({ top: decalage - hauteurNav, behavior: "smooth" });
  });
});

// Quand le top de mon élément est inférieur à la hauteur de mon écran alors je fade in
let tabSections = [
  (section1 = {
    selecteur: "#services",
    elements: [
      ".view-first",
      ".view-third",
      ".view-fourth",
      ".view-sixth",
      ".view-seventh",
      ".view-eighth"
    ],
    animatedType: "animated fadeInLeft slow"
  }),
  (section2 = {
    selecteur: "#commercialisation",
    animatedType: "animated fadeInRight slow"
  })
];

function calculerHauteurTopFenetre(section) {
  let distanceTopFenetre = document
    .querySelector(section.selecteur)
    .getBoundingClientRect().top;

  return distanceTopFenetre;
}
function mettreAnimation(section) {
  console.log(section);
  section.elements.forEach(function(element) {
    console.log(element);
    document
      .querySelector(element)
      .classList.add("animated", "fadeInLeft", "slow");
  });
}
// Je boucle sur le tableau, je teste si la position top de l'élèment est inférieur à la taille de la fenêtre :
// Si oui je lance l'animation en prenant la propriété animatedType, puis je splice l'élément et je break
// Si non je ne fais rien
// Essayer d'optimiser les détections de scroll avec lodash
// Tout placer dans un objet ( méthodes, tableaux )

document.addEventListener("scroll", function() {
  tabSections.forEach(function(section, index) {
    let hauteurFenetre = window.innerHeight;
    let distanceTopFenetreSection = calculerHauteurTopFenetre(section);

    if (distanceTopFenetreSection < hauteurFenetre) {
      mettreAnimation(section);
      tabSections.splice(index, 1);
    }
  });
});

class HomePage {}
