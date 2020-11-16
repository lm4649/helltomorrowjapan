(function($){
  // change dynamically (ajax) bckd banner color without refreshing the whole page
  wp.customize('banner_background_color', function(value) {
    value.bind(function(newValue){
      $('#customizable-bckgd-color').css('background', newValue)
    })
  });
  // change dynamically (ajax) tagline banner color without refreshing the whole page
  wp.customize('banner_tagline_color', function(value) {
    value.bind(function(newValue){
      $('#customizable-tagline-color').css('color', newValue)
    })
  })
})(jQuery);
