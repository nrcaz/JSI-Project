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
