jQuery(function() {
  jQuery('.menu-item-has-children:not(.current-menu-parent):not(.current-menu-item)').hover(function(event) {
    var subMenu = jQuery(this).find('.sub-menu');
    if (event.type === 'mouseenter') {
      subMenu.slideDown(150);
    }
    if (event.type === 'mouseleave') {
      subMenu.slideUp(150);
    }
  });
});