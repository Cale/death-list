$( document ).ready(function() {

  //$("li").fadeTo("slow", 1);
  
  var v = $("ul > li");
  
  function restore() {
    $("li").fadeTo(10000, 1);
    setTimeout(fade, 11000);
  }
  
  function fade() {
    var cur = 0;
    for(var j, x, i = v.length; i; j = parseInt(Math.random() * i), x = v[--i], v[i] = v[j], v[j] = x);
      function fadeInNextLI() {
        v.eq(cur++).fadeTo(2000, 0);
        if (cur != v.length) {
          setTimeout(fadeInNextLI, 500)
        } else {
          restore();
        }
      }
  fadeInNextLI();
  }

fade();

});