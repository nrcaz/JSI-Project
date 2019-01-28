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

var HomePage = {

  tabSections : [
    (section1 = {
      selecteur: "#services",
      elements: "#services .card",
      animationType : ["animated", "slideInLeft", "slow"],
    }),
    (section2 = {
      selecteur: "#commercialisation",
      elements: "#commercialisation .card",
      animationType :  ["animated", "fadeInRight", "slow"],
    })
  ],

  calculerHauteurTopFenetre : function(section) {
    let distanceTopFenetre = document
      .querySelector(section.selecteur)
      .getBoundingClientRect().top;
  
    return distanceTopFenetre;
  },

  mettreAnimation : function (section) {
  
    let elements = document.querySelectorAll(section.elements);
    let animations = section.animationType;
    let longueurTab = elements.length;
    let index = 0;
  
    var interval = setInterval(function() {
      animations.forEach(function(animation){
        elements[index].classList.add(animation);
      });
      index++;
      if(index == longueurTab) {
        clearInterval(interval);
      }
    },500);
    HomePage.tabSections.splice(index, 1);
  }

}

// Je boucle sur le tableau, je teste si la position top de l'élèment est inférieur à la taille de la fenêtre :
// Si oui je lance l'animation en prenant la propriété , puis je splice l'élément et je break
// Si non je ne fais rien
// Essayer d'optimiser les détections de scroll avec lodash
// Tout placer dans un objet ( méthodes, tableaux )

document.addEventListener("scroll", function() {
  HomePage.tabSections.forEach(function(section) {

    let hauteurFenetre = window.innerHeight;
    let distanceTopFenetreSection = HomePage.calculerHauteurTopFenetre(section);

    if (distanceTopFenetreSection < hauteurFenetre) {
      HomePage.mettreAnimation(section);
    }
  });
});