jQuery(function() {
  var enteringTimeout;
  var exitingTimeout;
  var slideDuration = 150;
  var delay = 250;
  function toggle(subMenu, type) {
    subMenu.stop();
    if (type === 'enter') subMenu.slideDown(slideDuration);
    if (type === 'leave') subMenu.slideUp(slideDuration);
  }
  jQuery('.menu-item-has-children').mouseenter(function(event) {
    clearTimeout(exitingTimeout);
    var subMenu = jQuery(this).find('.sub-menu');
    enteringTimeout = setTimeout(function() {
      toggle(subMenu, 'enter');
    }, delay);
  });
  jQuery('.menu-item-has-children').mouseleave(function() {
    clearTimeout(enteringTimeout);
  });
  jQuery('.nav').mouseenter(function() {
    clearTimeout(exitingTimeout);
  });
  jQuery('.nav').mouseleave(function(event) {
    clearTimeout(enteringTimeout);
    var subMenu = jQuery(this).find(':not(.current-menu-item):not(.current-menu-parent) > .sub-menu');
    var parent = jQuery(subMenu.parents('.nav-item').get(0));
    if (parent.is('.current-menu-item, .current-menu-ancestor')) return;
    exitingTimeout = setTimeout(function() {
      toggle(subMenu, 'leave');
    }, delay);
  });
});