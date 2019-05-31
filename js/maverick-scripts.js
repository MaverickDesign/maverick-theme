'use strict';

/**
 * Sticky Logo
 */

(function(){
    const mavStickyLogo = document.querySelector('.mavjs-sticky__logo');
    const mavStickyLogoImg = document.querySelector('#mavid-sticky-logo');

    if ( mavStickyLogo == null || mavStickyLogoImg == null ) {
        return;
    }

    const mavHeaderSection = document.querySelector('#mavid-sec-header-menu');

    // Set sticky logo height
    mavStickyLogoImg.setAttribute('height',mavHeaderSection.offsetHeight+'px');

    addMultipleListeners(window,['scroll','resize'],function(){
        if (mavHeaderSection.offsetTop > 80) {
            mavStickyLogo.classList.add('show-logo');
        } else {
            mavStickyLogo.classList.remove('show-logo');
        }
    },false);
})();

/**
 * Toggle Site Search
 */
(function(){
    document.querySelector('.mav-site-search-icon').addEventListener('click', function(){
        document.querySelector('.mav-site-search-wrapper').classList.toggle('mav-collapse');
        this.classList.toggle('fa-search');
        this.classList.toggle('fa-times');
    });
})();

/**
 * Tool Tip
 */
let mavToolTips = document.querySelectorAll('[data-tooltip]');

if ( mavToolTips.length > 0 ) {
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

/**
 * Hide Empty Paginate Links
 */

(function mavHideEmptyPaginate(){
    let mavPaginateLinks = document.getElementById('mavid-paginate-links');
    if (mavPaginateLinks !== null) {
        if (mavPaginateLinks.innerText == '') {
                mavPaginateLinks.style.opacity = 0;
        }
    }
})();

/**
 * Create bottom container for buttons
 */
(function mavf_create_bottom_container(){
    const mavBottomContainer = document.createElement('div');
    mavBottomContainer.classList.add('mav-bottom-container');
    document.body.appendChild(mavBottomContainer);
})();

/**
 * Scroll to Top button
 * Args:
 * mavEle: Element to create
 * mavClass: button class
 * mavTitle: button hover title
 */

function mavf_btn_scroll_to_top(
    mavEle = 'span',
    mavClass = 'mav-btn-top',
    mavTitle = 'Lên đầu trang'
    )
{
    let mavElement = document.createElement(mavEle);

    mavElement.classList.add(mavClass);

    mavElement.setAttribute('title',mavTitle);

    const mavContainer = document.querySelector('.mav-bottom-container');

    if (mavContainer === undefined)
    {
        return;
    }

    mavContainer.appendChild(mavElement);

    const mavButtonTop = document.querySelector('.'+mavClass);

    mavButtonTop.addEventListener( 'click' , function(){
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    })

    window.addEventListener( 'scroll' , mavf_show_btn_to_top );

    function mavf_show_btn_to_top()
    {
        if ( window.pageYOffset > 200 )
        {
            mavButtonTop.style.visibility = 'visible';
            mavButtonTop.style.opacity = 1;
            return;
        }
        else
        {
            mavButtonTop.style.opacity = 0;
            mavButtonTop.style.visibility = 'hidden';
            return;
        }
    }
}

if ( typeof mavf_btn_scroll_to_top === 'function' )
{
    mavf_btn_scroll_to_top( 'span' , 'mav-btn-top' , 'Lên đầu trang');
}

/**
 * Go Back Button
 */
function mavf_go_back_button(mavEle = 'span', mavClass = 'mav-btn-back', mavTitle = 'Trở lại trang trước')
{
    const mavElement = document.createElement(mavEle);

    mavElement.classList.add(mavClass);

    mavElement.setAttribute('title',mavTitle);

    const mavContainer = document.querySelector('.mav-bottom-container');

    if (mavContainer === undefined)
    {
        return;
    }

    mavContainer.insertBefore(mavElement, mavContainer.childNodes[0]);

    const mavButtonBack = document.querySelector('.'+mavClass);

    mavButtonBack.addEventListener('click',function(){
        window.history.back();
    });
}

// if (typeof mavf_go_back_button === 'function') {
//     if (window.history.length > 2) {
//         mavf_go_back_button();
//     }
// }

/**
 * Accordion
 */

function mavf_accordion(e)
{
    const mavTrigger = e;
    // Get trigger current state
    const mavCurrentState = mavTrigger.dataset.state;
    // Query accordion collection data
    const mavCollectionID = mavTrigger.dataset.collection;
    if (mavCollectionID != undefined) {
        const mavCollection = mavTrigger.closest(`#mavid-accordion-collection-${mavCollectionID}`);
        if (mavCollection != undefined) {
            const mavItems = mavCollection.querySelectorAll('.mav-accordion-trigger');
            for (const mavItem of mavItems) {
                mavItem.dataset.state = 'close';
                mavItem.setAttribute('title','Click to expand');
            }
            mavTrigger.dataset.state = (mavCurrentState == 'close') ? 'open' : 'close';
        } else {
            mavTrigger.dataset.state = (mavTrigger.dataset.state == 'close') ? 'open' : 'close';
        }
    } else {
        mavTrigger.dataset.state = (mavTrigger.dataset.state == 'close') ? 'open' : 'close';
    }
    if (mavTrigger.dataset.state == 'close') {
        mavTrigger.setAttribute('title','Click to expand');
    } else {
        mavTrigger.setAttribute('title','Click to collapse');
    }
}

/**
 * Close Button
 */
function mavf_close_btn(mavElement, mavElementToClose = '.mavjs-close')
{
    // Delete element from the DOM
    mavElement.closest(mavElementToClose).remove();
    return;
}

/**
 * Modal Box
 */

function mavf_create_modal_box(mavArgs = {
    header      : '<p class="mav-modal-title">Modal Header</p>',
    body        : '<p>Modal Body</p>',
    footer      : '<p>Modal Footer</p>',
    headerClass : 'mav-modal-header',
    bodyClass   : 'mav-modal-body',
    footerClass : 'mav-modal-footer'
}){
    const mavModal = document.createElement('div');
    mavModal.setAttribute('id','mavid-modal');
    mavModal.classList = 'mav-modal mavjs-close';
    mavModal.innerHTML = `
    <div class="mav-modal-box">
        <header class="${mavArgs.headerClass}">
            ${mavArgs.header}
        </header>
        <div class="${mavArgs.bodyClass}">
            ${mavArgs.body}
        </div>
        <footer class="${mavArgs.footerClass}">
            ${mavArgs.footer}
        </footer>
    </div>
    <span class="mav-modal-close mav-btn-close" title="Click to close"></span>
    `;
    document.body.appendChild(mavModal);
}

function mavf_modal_remove(){
    const mavModal = document.getElementById('mavid-modal');
    if (mavModal != undefined) {
        mavModal.remove();
        console.log('Modal removed.');
    }
    return;
}

/**
 * Remove mobile container
 */
function mavf_remove_mobile_container(e){
    e.classList.remove('mav-mobile-ctn');
}

/**
 * Smooth Scrolling
 */
function mavf_smooth_scroll(e) {
    const mavScrollTo = document.getElementById(e.dataset.scroll);
    const mavBehavior = e.dataset.behavior ? e.dataset.behavior : 'smooth';
    window.scrollTo({
        top: mavScrollTo.offsetTop,
        behavior: mavBehavior
    });
    return;
}

/**
 * Post Tab
 * @param {*} e
 */
function mavf_tab_view(e){
    const mavActiveItem = e;
    const mavItemsContainer = e.parentElement;
    const mavItems = mavItemsContainer.querySelectorAll('.mav-tab-trigger');
    for (const mavItem of mavItems) {
        mavItem.dataset.state = 'inactive';
        mavItem.nextSibling.dataset.state = 'inactive';
    }
    mavActiveItem.dataset.state = 'active';
    mavActiveItem.nextSibling.dataset.state = 'active';
    return;
}

/**
 * Click events on body element
 */

function mavf_body_click_events()
{
    document.body.addEventListener('click', function(e) {
        const mavTarget = e.target;

        /**
         * Accordion
         */
        if (mavTarget.classList.contains('mavjs-accordion__trigger')){
            mavf_accordion(mavTarget);
        }
        if (mavTarget.classList.contains('mav-accordion-trigger-title')){
            mavTarget.parentElement.click();
        }

        /**
         * Close Button
         */
        if (mavTarget.classList.contains('mav-btn-close')){
            mavf_close_btn(mavTarget);
        }

        /**
         * Remove mobile container
         */
        if (mavTarget.classList.contains('mav-mobile-ctn')){
            mavf_remove_mobile_container(mavTarget);
        }

        /**
         * Tab View
         */
        if (mavTarget.classList.contains('mav-tab-trigger')){
            mavf_tab_view(mavTarget);
        }
        if (mavTarget.classList.contains('mav-tab-trigger-title')){
            mavTarget.parentElement.click();
        }

        /**
         * Smooth Scrolling
         */
        if (mavTarget.dataset.scroll != undefined ){
            mavf_smooth_scroll(mavTarget);
        }

        /**
         * Facebook Share Button
         */
        if ( mavTarget.classList.contains('mavjs-fb-share-button') ){
            const mavShareUrl = mavTarget.dataset.href;
            console.log('mavShareUrl: ', mavShareUrl);
            function share(mavShareUrl) {
                FB.ui({
                    method: 'share',
                    href: `${mavShareUrl}`,
                }, function(response){});
            }
            share(mavShareUrl);
        }
    })
};

function mavf_document_key()
{
    document.addEventListener('keydown',function(mavKey){
        switch (mavKey.keyCode) {
            case 27:
                mavf_modal_remove();
            break;
        }
    });
};

// Blog Page List & Card View Toggle

function mavf_blog_page_view_style( mav_args = {
    'setting_container' : '.mavjs-setting-ctn',
    'posts_container'   : '.mavjs-posts-container',
    'button_list'       : '.mavjs-display-list',
    'button_card'       : '.mavjs-display-card'
}) {

    // Query setting container
    const mavSettingContainer = document.querySelector(mav_args['setting_container']);
    // Query posts container
    const mavPostsContainer = document.querySelector(mav_args['posts_container']);

    if ( mavPostsContainer == undefined || mavSettingContainer == undefined) {
        return;
    }
    // Button List
    const mavButtonList = mavSettingContainer.querySelector(mav_args['button_list']);

    mavButtonList.addEventListener('click', function(){
        mavf_update_setting_container('list');
        mavf_card_style();
    });

    // Button Card
    const mavButtonCard = mavSettingContainer.querySelector(mav_args['button_card']);
    mavButtonCard.addEventListener('click', function(){
        mavf_update_setting_container('card');
        mavf_card_style();
    });

    function mavf_update_setting_container(mavView) {
        // mavSettingContainer.dataset.view = mavView;
        mavPostsContainer.dataset.displayStyle = mavView;
    }
}



function mavf_card_style(
    mav_args = {
        'posts_container'   : '.mavjs-posts-container',
        'card_container'    : '.mavjs-card__content--ctn',
        }
    )
{
    const mavPostContainer = document.querySelector(mav_args['posts_container']);

    if ( mavPostContainer == undefined ) {
        return;
    }

    const mavView = mavPostContainer.dataset.displayStyle;
    const mavCards = mavPostContainer.querySelectorAll(mav_args['card_container']);

    for ( const mavCard of mavCards ) {
        mavCard.dataset.style = mavView;
    }
}

/* DOM content loaded functions */
document.addEventListener('DOMContentLoaded', function() {
    mavf_body_click_events();
    mavf_blog_page_view_style();
    mavf_document_key();
},false);