// Smooth scroll from Florian
$(function() {
  $("a[href='#services'], a[href='#commercialisation'], a[href='#contact']").on(
    "click",
    function(e) {
      e.preventDefault();

      let hash = this.hash;
      let hauteurNav = $("header").height();
      let decalage = $(hash).offset().top;

      window.scrollTo({ top: decalage - hauteurNav, behavior: "smooth" });
    }
  );
});

// Quand le top de mon élément est inférieur à la hauteur de mon écran alors je fade in
let tabSections = [
  section1 = { 
    "id" : "section_contact",
    "animatedType" : "animated fadeInLeft slow",
  },
  section2 = { 
    "id" : "section_contact",
    "animatedType" : "animated fadeInLeft slow",
  },
  section3 = { 
    "id" : "section_contact",
    "animatedType" : "animated fadeInLeft slow",
  }
]
// Je boucle sur le tableau, je teste si la position top de l'élèment est inférieur à la taille de la fenêtre : 
// Si oui je lance l'animation en prenant la propriété animatedType, puis je splice l'élément et je break
// Si non je ne fais rien
// Essayer d'optimiser les détections de scroll avec lodash
// Tout placer dans un objet ( méthodes, tableaux )

console.log(tabSections[0].id);
let sectionContact = document.querySelector('#contact_home');

document.addEventListener('scroll', function() {
  let hauteurFenetre = window.innerHeight;
  let distanceTopFenetre = sectionContact.getBoundingClientRect().top;

  if(distanceTopFenetre < hauteurFenetre) {
    console.log("GOOO!");
    sectionContact.classList.add('animated','fadeInLeft', 'slow');
  }
})
