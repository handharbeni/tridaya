// Notification JavaScripts

  function showNoty(msg='', type='info', timeout=3000, position='topRight', theme='app-noty') {
    noty({
        text: msg,
        type: type,
        timeout: 3000,
        theme: theme,
        layout: position,
        closeWith: ['button', 'click'],
        animation: {
          open: 'animated bounceInRight',
          close: 'animated bounceOutRight'
          // open: 'noty-animation fadeIn',
          // close: 'noty-animation fadeOut'
        }
    }).show();
  }