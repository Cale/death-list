$( document ).ready(function() {

  colors = Array("#f23009", "#c12505", "#8e1b04");
  
  function getPeople() {
    $.getJSON( "/feed/people.php", {
      format: "json"
    })
    .done(function( data ) {
      $.each( data, function( i, item ) {
        var color = colors[Math.floor(Math.random() * colors.length)];
        $( "ul" ).append('<li style="background-color:'+color+';">'+item+'</li>');
        if (data.length == i+1) {
          fade();
        }
      });
    });
  }
  
  getPeople();

  function restore() {
    $("li").fadeTo(10000, 1);
    setTimeout(fade, 11000);
  }
  
  function fade() {
    var v = $("ul > li");
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

});