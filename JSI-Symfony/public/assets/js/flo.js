// Smooth scroll from Florian
$(function() {
  $("a[href='#services'], a[href='#commercialisation'], a[href='#contact']").on(
    "click",
    function(e) {
      e.preventDefault();
      var hash = this.hash;

      $("body,html").animate(
        { scrollTop: $(hash).offset().top },
        900,
        function() {
          window.location.hash = hash;
        }
      );
    }
  );
});
