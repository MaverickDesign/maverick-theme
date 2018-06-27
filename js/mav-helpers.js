// events and args should be of type Array
function addMultipleListeners(element,events,handler,useCapture,args){
    if (!(events instanceof Array)){
      throw 'addMultipleListeners: '+
            'please supply an array of eventstrings '+
            '(like ["onblur","oninput"])';
    }
    //create a wrapper for to be able to use additional arguments
    var handlerFn = function(e){
      handler.apply(this, args && args instanceof Array ? args : []);
    }
    for (var i=0;i<events.length;i+=1){
      element.addEventListener(events[i],handlerFn,useCapture);
    }
}

function mavf_make_id(mavLength = 6) {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < mavLength; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}

function mavf_test(){
  const text = 'Test';
  return text;
}

function mavf_close_btn(mavButtonClass='.mav-btn-close', mavElementToClose = '.mavjs-close'){

  const mavCloseButtons = document.querySelectorAll(mavButtonClass);

  for (mavCloseButton of mavCloseButtons) {
      mavCloseButton.addEventListener('click', function(){
      this.closest(mavElementToClose).remove();
      });
  }
}
mavf_close_btn();

function go_full_screen(){
    var elem = document.documentElement;
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
      elem.webkitRequestFullscreen();
    }
}