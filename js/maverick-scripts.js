'use strict';
/*
 * Sticky Logo
 **/

(function(){
    let mavStickyLogo = document.querySelector('.mav-sticky-logo');
    if (mavStickyLogo == null) {
        return;
    }
    addMultipleListeners(window,['scroll','resize'],function(){
        const mavHeaderSection = document.querySelector('#mavid-sec-header-menu');
        if (mavHeaderSection.offsetTop > 80) {
            mavStickyLogo.classList.add('show-logo');
        } else {
            mavStickyLogo.classList.remove('show-logo');
        }
    },false);
})();

/*
 * Page Load Functions
 */
// function mavfOnloadFunctions() {
// }

// window.onload = mavfOnloadFunctions;

/*
 * Toggle Site Search
 */
document.querySelector('.mav-site-search-icon').addEventListener('click', function(){
    document.querySelector('.mav-site-search-wrapper').classList.toggle('mav-collapse');
    this.classList.toggle('fa-search');
    this.classList.toggle('fa-times');
});

/*
 * Tool Tip
 **/

let mavToolTips = document.querySelectorAll('[data-tooltip]');

if (mavToolTips.length > 0) {
    let mavToolTipElement = document.createElement('span');
    mavToolTipElement.classList.add('mav-tool-tip');
    document.body.appendChild(mavToolTipElement);

    let mavToolTip = document.querySelector('.mav-tool-tip');

    function mavFade(){
        mavToolTip.style.opacity = 0;
    }

    let mavTimeOut = setTimeout(mavFade, 1500);

    mavToolTips.forEach(function(e){
        // Mouse over
        e.addEventListener('mouseenter',function(e){
            // Xóa nội dung cũ
            mavToolTip.innerText = '';
            clearTimeout(mavTimeOut);
            let mavText = document.createTextNode(e.target.dataset.tooltip);
            // Thay bằng nội dung mới
            mavToolTip.appendChild(mavText);
            mavToolTip.style.opacity = 1;
            mavTimeOut = setTimeout(mavFade, 1500);
        });
        // Mouse leave
        e.addEventListener('mouseleave',function(){
            mavToolTip.style.opacity = 0;
        });
    });

    // document.onmousemove = mavDisplayToolTip;

    function mavDisplayToolTip(e){
        let mavWindowW = window.innerWidth;
        let mavWindowH = window.innerHeight;
        let mavObjW = mavToolTip.offsetWidth;
        let mavObjH = mavToolTip.offsetHeight;
        // console.log(window.innerWidth);
        let mavY = Math.round(e.clientY)+(mavObjH/2);
        let mavX = Math.round(e.clientX)-(mavObjW/2);
        if (e.clientX < mavObjW ) {
            mavX = Math.round(e.clientX);
        }
        if ( e.clientX > (mavWindowW - mavObjW) ) {
            mavX = Math.round(e.clientX - mavObjW);
        }
        mavToolTip.style.top = mavY+'px';
        mavToolTip.style.left = mavX+'px';
    }
}

/*
 * Hide Empty Paginate Links
 **/

(function mavHideEmptyPaginate(){
    let mavPaginateLinks = document.getElementById('mavid-paginate-links');
    if (mavPaginateLinks !== null) {
        if (mavPaginateLinks.innerText == '') {
                mavPaginateLinks.style.opacity = 0;
        }
    }
})();

/*
 * Scroll to Top button
 * Args:
 * mavEle: Element to create
 * mavClass: button class
 * mavTitle: button hover title
 */

function mavf_btn_scroll_to_top(mavEle = 'span', mavClass = 'mav-btn-top', mavTitle = 'Lên đầu trang'){
    let mavElement = document.createElement(mavEle);
    mavElement.classList.add(mavClass);
    mavElement.setAttribute('title',mavTitle);
    document.body.appendChild(mavElement);

    const mavButtonTop = document.querySelector('.'+mavClass);

    mavButtonTop.addEventListener('click',function(){
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    })

    window.addEventListener('scroll',mavf_show_btn_to_top);

    function mavf_show_btn_to_top(){
        if (window.pageYOffset > 200) {
            mavButtonTop.style.visibility = 'visible';
            mavButtonTop.style.opacity = 1;
            return;
        } else {
            mavButtonTop.style.opacity = 0;
            mavButtonTop.style.visibility = 'hidden';
            return;
        }
    }
}

if (typeof mavf_btn_scroll_to_top === 'function') {
    mavf_btn_scroll_to_top('span','mav-btn-top','Lên đầu trang');
}

function mavf_go_back_button(mavEle = 'span', mavClass = 'mav-btn-back', mavTitle = 'Trở lại trang trước') {
    const mavElement = document.createElement(mavEle);
    mavElement.classList.add(mavClass);
    mavElement.setAttribute('title',mavTitle);
    document.body.appendChild(mavElement);

    const mavButtonBack = document.querySelector('.'+mavClass);
    mavButtonBack.addEventListener('click',function(){
        window.history.back();
    })
}
if (typeof mavf_go_back_button === 'function') {
    if (window.history.length > 2) {
        mavf_go_back_button();
    }
}

/*
 * Start Sliders
 */
if (typeof mavf_slider === 'function') {
    mavf_slider();
}
/*
 * Start Carousels
 */
if (typeof mavf_carousel === 'function') {
    mavf_carousel();
}

/*
 * Close button
 */
(function mavf_close_btn(mavButtonClass='.mav-btn-close',mavElementToClose = '.mavjs-close'){
    document.querySelectorAll(mavButtonClass).forEach(function(e){
        e.addEventListener('click', function(){
            this.closest(mavElementToClose).remove();
        });
    });
})();

/*
 * Contact Form
 */
(function mavf_contact_form(){
    const mavContactForm = document.querySelector('#mavid-contact-form');
    if (mavContactForm) {
        mavContactForm.addEventListener('submit',function(e){
            e.preventDefault();
            console.log('Form submited.');
            console.log(this);

            const mavFormName = this.querySelector('#mavid-form-name').value;
            console.log(mavFormName);

            const mavFormEmail = this.querySelector('#mavid-form-email').value;
            console.log(mavFormEmail);

            const mavFormPhone = this.querySelector('#mavid-form-phone').value;
            console.log(mavFormPhone);

            const mavFormMessage = this.querySelector('#mavid-form-message').value;
            console.log(mavFormMessage);

            const mavFormAjaxUrl = this.dataset.url;
            console.log(mavFormAjaxUrl);
        });
    }
})();