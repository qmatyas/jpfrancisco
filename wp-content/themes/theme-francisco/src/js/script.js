'use strict';
var jpf = {};

jpf.nav = {
	init: function(){
    $(document).ready(function(){
      //$('body').scrollspy({target: '.navbar', offset: 50});   
      $('#nav-link a').on('click', function(event) {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
          window.location.hash = hash;
        });
      });
    });
  }
};

$(document).ready(function(){
  jpf.nav.init();
});