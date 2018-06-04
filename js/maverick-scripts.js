/*
 * Mobile Menu Checker
 */
function mavf_mobile_menu_checker() {

    const mavWindowWidth = window.innerWidth;
    const mavWindowHeight = window.innerHeight;

    const mavHeaderMenuContainer = document.querySelector('.mav-header-menu-ctn');
    const mavPageMain = document.querySelector('#mavid-page-main-content');
    const mavHeaderHeight = document.querySelector('.mav-header-logo-ctn').offsetHeight;

    if (mavWindowWidth > 1023) {

        /* Show header menu */
        mavHeaderMenuContainer.classList.remove('mav-hide-on-mobile');

        /* Reset page main content top padding */
        mavPageMain.style.paddingTop = null;
        // document.querySelector('#mavid-sec-header-menu').removeAttribute('style' , `padding-top`);
        document.querySelector('#mavid-sec-header-menu').style.paddingTop = 0;

    } else {

        /* Hide menu on mobile devices */
        mavHeaderMenuContainer.classList.add('mav-hide-on-mobile');

        /* Set mobile menu max height */
        let mavMenuMaxHeight = mavWindowHeight - mavHeaderHeight;
        document.querySelector('.mav-header-menu').setAttribute('style' , `max-height: ${mavMenuMaxHeight}px`);

        /* Replace mobile menu icon */
        let mavMenuIcon = document.querySelector('.mav-mobile-menu-icon');
        mavMenuIcon.classList.remove('fa-times');
        mavMenuIcon.classList.add('fa-bars');

    }
}

/*
 * Toggle mobile menu
 */
function mavfReplaceMobileMenuIcon() {
    let mavMenuIcon = document.querySelector('.mav-mobile-menu-icon')
    mavMenuIcon.classList.toggle('fa-bars');
    mavMenuIcon.classList.toggle('fa-times');
}

function mavfToggleMobileMenu(){
    document.querySelector('.mav-header-menu-ctn').classList.toggle('mav-hide-on-mobile');
    mavfReplaceMobileMenuIcon();
}

document.querySelector('.mav-mobile-menu-icon').addEventListener('click', mavfToggleMobileMenu);

/*
 * Page Load Functions
 */
function mavfOnloadFunctions() {
    mavf_mobile_menu_checker();
}

window.onload = mavfOnloadFunctions;

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

    document.onmousemove = mavDisplayToolTip;
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
 * Sticky Logo
 **/

function mavf_sticky_logo(){
    let mavStickyLogo = document.querySelector('.mav-sticky-logo');
    if (mavStickyLogo == null) {
        return;
    }
    const mavHeaderSection = document.querySelector('#mavid-sec-header-menu');
    addMultipleListeners(window,['scroll','resize'],function(){
        if (mavHeaderSection.offsetTop > 80) {
            mavStickyLogo.classList.add('show-logo');
        } else {
            mavStickyLogo.classList.remove('show-logo');
        }
    },false);
}
mavf_sticky_logo();

/*
 * Hide Empty Paginate Links
 **/

function mavHideEmptyPaginate(){
    let mavPaginateLinks = document.getElementById('mavid-paginate-links');
    if (mavPaginateLinks == null) {
        return;
    }
    if (mavPaginateLinks.innerText == '') {
            mavPaginateLinks.style.opacity = 0;
    }
}
mavHideEmptyPaginate();

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
            mavButtonTop.style.opacity = 1;
        } else {
            mavButtonTop.style.opacity = 0;
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
 * Reset header menu on window resize
 */
window.addEventListener('resize', mavf_window_resize_events);
function mavf_window_resize_events(){
    mavf_mobile_menu_checker();
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
function mavf_close_btn(mavButtonClass='.mav-btn-close',mavElementToClose = '.mavjs-close'){
    document.querySelectorAll(mavButtonClass).forEach(function(e){
        e.addEventListener('click', function(){
            this.closest(mavElementToClose).remove();
        });
    });
}
mavf_close_btn();