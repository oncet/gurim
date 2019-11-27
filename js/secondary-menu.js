jQuery(function() {
  var timeout;
  function toggle(subMenu, type) {
    subMenu.stop();
    if (type === 'mouseenter') {
      subMenu.slideDown(150);
    }
    if (type === 'mouseleave') {
      subMenu.slideUp(150);
    }
  }
  jQuery('.menu-item-has-children:not(.current-menu-parent):not(.current-menu-item)')
    .hover(function(event) {
      clearTimeout(timeout);
      var type = event.type;
      var subMenu = jQuery(this).find('.sub-menu');
      timeout = setTimeout(function() {
        toggle(subMenu, type);
      }, 250);
    });
});