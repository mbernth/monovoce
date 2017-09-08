/**
   * Push top instantiation and action.
   */
  var pushTop = new Menu({
    wrapper: '#o-wrapper',
    type: 'push-top',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var pushTopBtn = document.querySelector('#c-button--push-top');
  
  pushTopBtn.addEventListener('click', function(e) {
    e.preventDefault;
    pushTop.open();
  });