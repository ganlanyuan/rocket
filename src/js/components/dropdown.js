ready(function () {

  // dropdown
  k('[data-dropdown-toggle]').click(function() {
    k(this).parent().toggleClass('dropdown-open');
  });
  
});