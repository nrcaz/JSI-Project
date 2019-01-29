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

var HomePage = {
  tabSections: [
    (section1 = {
      selecteur: "#services",
      elements: [
        { selecteur: ".view-first img", class: "animation1img" },
        { selecteur: ".view-first mask", class: "animation1mask" },
        { selecteur: ".view-first h2", class: "animation-h2-p-info" },
        { selecteur: ".view-first p", class: "animation-h2-p-info" },
        { selecteur: ".view-first a.info", class: "animation-h2-p-info" }
      ]
    }),
    (section2 = {
      selecteur: "#commercialisation",
      elements: "#commercialisation .card",
      animationType: ["animated", "slideInRight", "slow"]
    })
  ],

  calculerHauteurTopFenetre: function(section) {
    let distanceTopFenetre = document
      .querySelector(section.selecteur)
      .getBoundingClientRect().top;

    return distanceTopFenetre;
  },

  mettreAnimation: function(section) {
    let elements = section.elements;
    let longueurTab = elements.length;
    let index = 0;

    var interval = setInterval(function() {
      elements.forEach(function(element) {
        console.log(
          "Selecteur : " + element.selecteur + " Class " + element.class
        );
        document.querySelector(element.selecteur).classList.add(element.class);
      });
      index++;
      if (index == longueurTab) {
        clearInterval(interval);
      }
    }, 2000);
    HomePage.tabSections.splice(index, 1);
  }
};

// Je boucle sur le tableau, je teste si la position top de l'élèment est inférieur à la taille de la fenêtre :
// Si oui je lance l'animation en prenant la propriété , puis je splice l'élément et je break
// Si non je ne fais rien

document.addEventListener("scroll", function() {
  HomePage.tabSections.forEach(function(section) {
    let hauteurFenetre = window.innerHeight;
    let distanceTopFenetreSection = HomePage.calculerHauteurTopFenetre(section);

    if (distanceTopFenetreSection < hauteurFenetre) {
      HomePage.mettreAnimation(section);
    }
  });
});
