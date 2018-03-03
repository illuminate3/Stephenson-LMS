/* Runs when DOM already */
document.addEventListener("DOMContentLoaded", function(event) {
  /* Get object button */
  var btnb = document.getElementById("btnnavbar");
  /* Get object navbar */
  var nb = document.getElementById("navbar");
  /* Get object header article */
  var hrat = document.getElementById("headerArticle");

  /* When button will be clicked */
  btnb.onclick = function() {
      /* console.log(nb.classList.contains("navbar-on")); */
    if (nb.classList.contains("navbar-on")) {
        /* Enable menu and change icon button to X */
      nb.classList.remove("navbar-on");
      btnb.firstElementChild.classList.remove('d-none');
      btnb.lastElementChild.classList.add('d-none');
      this.classList.remove('btn-navbar-on');
      /* console.log('ENABLE'); */
    } else {
        /* Disable menu and change icon to Bar */
      nb.classList.add("navbar-on");
      btnb.lastElementChild.classList.remove('d-none');
      btnb.firstElementChild.classList.add('d-none');
      this.classList.add('btn-navbar-on');
      /* console.log('DISABLE'); */
    }
  };

  /* When windows will be scrolled */
  var lp = window.scrollY;
  window.onscroll = function() {
    if (window.scrollY <= 3) {
      hrat.classList.remove("header-lesson-fixed");
    } else if (window.scrollY < lp) {
      hrat.classList.add("header-lesson-fixed");
    } else {
      hrat.classList.remove("header-lesson-fixed");
    }
    lp = window.scrollY;
  };
});
