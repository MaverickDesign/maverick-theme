/* 
 * Maverick's Multi Type Writer
 * version: 1.0
 */

console.log('Maverick\'s Multi Type Writter loaded.');

/* 
 * Function: mavf_type_writer
 * Args:
 * - mavContentClass: the content element
 * - mavSplit: Split character at
 * - mavInterval: Interval between character display
 * - mavReverse: true of false
 * - mavDelay: Delay between dipslay and reverse
 */
function mavf_type_writer(mavContent,mavContentClass,mavSplit,mavInterval,mavReverse,mavDelay){

    let mavElements = document.querySelectorAll(mavContentClass);
    if (mavElements == null) {
        return;
    }

    mavElements.forEach(function(e) {
        let mavElement = e;
        let mavArray;
        if ( mavContent == '' ) {
            if (e.dataset.content == null ) {
                mavArray = mavElement.innerText.split(mavSplit);
            } else {
                mavArray = mavElement.dataset.content;
            }
        } else {
            mavArray = mavContent.split(mavSplit);
        }
    
        let mavArrayLength = mavArray.length;
        let i=0;
        let mavDone = false;
        let mavSpacing = mavSplit;
    
        mavElement.innerHTML = '';
        mavElement.classList.add('mav-type-writter-temp');
    
        function mavTyping(){
            if ( i < mavArrayLength ) {
                mavElement.innerHTML += mavArray[i]+mavSpacing;
                setTimeout(mavTyping,mavInterval);
                i++;
            } else {
                mavDone = true;
                mavElement.classList.remove('mav-type-writter-temp');
                if (mavReverse == true && mavDone == true) {
                    function mavPopStr(){
                        mavElement.classList.add('mav-type-writter-temp');    
                        let mavContent = mavElement.innerHTML;
                        if ( mavContent.length > 0 ) {
                            mavElement.innerHTML = mavContent.slice(0,mavContent.length - 1);
                            setTimeout(mavPopStr,mavInterval);                
                        } else {
                            mavElement.innerHTML = '&nbsp;';
                            mavElement.classList.remove('mav-type-writter-temp');
                        }
                    }
                    if (mavDelay == null) {
                        mavDelay = 1000;
                    }
                    setTimeout(mavPopStr,mavDelay);
                }
            }
        }
        if (isVisible(mavElement)) {
            mavTyping();        
        }
    });
}

function mavf_type_multi(mavContent, mavDivider, mavContentClass, mavSplit, mavInterval, mavDelay) {
    let mavArrayOfText;
    if (mavContent == '' ) {
        mavAllContents = document.querySelectorAll(mavContentClass).forEach(function(e){
            mavContent = e.dataset.content.split(mavDivider);
            mavArrayOfText = mavContent;
            if (isVisible(e)) {
                mavDisplay();
            }
        });
    } else {
        mavArrayOfText = mavContent;
        if (isVisible(e)) {
            mavDisplay();
        }
    }

    function mavDisplay(){
        let mavArrayLength = mavArrayOfText.length;
        let i = 0;
        let mavStop = true;
        function mavf_multi() {
            if (i < mavArrayLength){
                if (i == mavArrayLength-1) {
                    mavStop = false;
                }
                mavf_type_writer(mavArrayOfText[i],mavContentClass,mavSplit,mavInterval,mavStop,mavDelay);
                i++;
                setTimeout(mavf_multi,mavDelay * mavArrayLength);
            }
        }
        mavf_multi();
    }
}

function isVisible (ele) {
    const { top, bottom } = ele.getBoundingClientRect();
    const vHeight = (window.innerHeight || document.documentElement.clientHeight);
  
    return (
      (top > 0 || bottom > 0) &&
      top < vHeight
    );
  }