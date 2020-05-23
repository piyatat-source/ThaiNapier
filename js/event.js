function topFunction() {
  //Click to Top
  // document.body.scrollTop = 0;
  // document.documentElement.scrollTop = 0;
  $("html, body").animate({ scrollTop: "0" });
}

function hideusermenu(x) {
  var mybuttonTop = document.getElementById("return-to-top");
  if (x.matches) {
    // If media query matches
    let bar = document.getElementById("user-control");
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function () {
      // go to top
      if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
      ) {
        mybuttonTop.style.display = "block";
      } else {
        mybuttonTop.style.display = "none";
      }
      // go to top

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
    window.onscroll = function () {
      // go to top
      if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
      ) {
        mybuttonTop.style.display = "block";
      } else {
        mybuttonTop.style.display = "none";
      }
    };
    document.getElementById("user-control").style.display = "block";
    document.getElementById("user-control").style.display = "block";
    // var prevScrollpos = window.pageYOffset;
    // window.onscroll = function () {
    //   // go to top
    //   if (
    //     document.body.scrollTop > 20 ||
    //     document.documentElement.scrollTop > 20
    //   ) {
    //     mybuttonTop.style.display = "block";
    //   } else {
    //     mybuttonTop.style.display = "none";
    //   }
    //   // go to top
    //   var currentScrollPos = window.pageYOffset;
    //   if (prevScrollpos > currentScrollPos) {
    //     document.getElementById("user-control").style.display = "block";
    //   } else {
    //     document.getElementById("user-control").style.display = "block";
    //   }
    //   prevScrollpos = currentScrollPos;
    // };
  }
}

var desk_screen = window.matchMedia("(min-width: 936px)");
hideusermenu(desk_screen); // Call listener function at run time
desk_screen.addListener(hideusermenu);
