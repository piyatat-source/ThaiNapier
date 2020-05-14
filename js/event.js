function hideusermenu(x) {
  if (x.matches) {
    // If media query matches
    let bar = document.getElementById("user-control");
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function () {
      var currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        bar.classList.remove("hidden");
        setTimeout(function () {
          bar.classList.remove("visuallyhidden");
        }, 20);

        //document.getElementById("user-control").style.display = "block";
      } else {
        //document.getElementById("user-control").style.display = "none";
        bar.classList.add("visuallyhidden");
        bar.addEventListener(
          "transitionend",
          function (e) {
            if (bar.classList.contains("visuallyhidden")) {
              bar.classList.add("hidden");
            }
          },
          {
            capture: false,
            once: true,
            passive: false,
          }
        );
      }
      prevScrollpos = currentScrollPos;
    };
  } else {
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function () {
      var currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        document.getElementById("user-control").style.display = "block";
      } else {
        document.getElementById("user-control").style.display = "block";
      }
      prevScrollpos = currentScrollPos;
    };
  }
}

var desk_screen = window.matchMedia("(min-width: 936px)");
hideusermenu(desk_screen); // Call listener function at run time
desk_screen.addListener(hideusermenu);
