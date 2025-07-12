


  $(document).ready(function(){

if (localStorage.getItem("cookie_consent") === "true") {
  console.log("Utente ha accettato i cookie");
} else {
  if (confirm("Questo sito utilizza i cookie. Vuoi accettare?")) {
    localStorage.setItem("cookie_consent", "true");
    alert("Grazie per aver accettato i cookie.");
  } else {
    alert("Hai rifiutato i cookie. Alcune funzionalità potrebbero non funzionare.");
  }
}
    $('.reviews-carousel').owlCarousel({
      loop: true,
      margin: 20,
      nav: true,
      dots: true,
      autoplay: true,
      autoplayTimeout: 5000,
      responsive:{
        0:{ items:1 },
        768:{ items:2 },
        992:{ items:3 }
      }
    });
  });