function mavf_header_menu(){

    const mavMobileMenuIcon     = document.querySelector('#mavid-mobile-menu-icon');
    const mavHeaderMenuSection  = document.querySelector('#mavid-sec-header-menu');
    // Select header menu
    const mavHeaderMenu         = document.querySelector('.mav-header-menu');
    const mavSubmenuIcons       = mavHeaderMenu.querySelectorAll('.mav-submenu-icon');
    const mavSubMenus           = mavHeaderMenu.querySelectorAll('.mav-sub-menu');

    const mavHeaderBreadcrumbs  = document.querySelector('.mav-site-breadcrumbs-ctn');
    const mavPageMainContent    = document.querySelector('#mavid-page-main-content');

    for (const mavSubmenuIcon of mavSubmenuIcons) {
        if (mavSubmenuIcon.dataset.lvl == 2 || window.innerWidth < 1024) {
            mavSubmenuIcon.setAttribute('title','Click to expand');
        }
        // Add click event
        mavSubmenuIcon.addEventListener('click', function(e){
            e.preventDefault();
            if (window.innerWidth < 1024 || this.dataset.lvl == 2) {
                if (this.dataset.state == 'close') {
                    this.dataset.state = 'open'
                    this.setAttribute('title','Click to close');
                } else {
                    this.dataset.state = 'close'
                    this.setAttribute('title','Click to expand');
                }
                const mavSubMenu = this.parentElement.nextElementSibling;

                mavSubMenu.dataset.state = this.dataset.state;

                mavSubMenu.classList.toggle('open');
            }
        });
    }

    mavMobileMenuIcon.addEventListener('click',function(){
        mavHeaderMenuSection.classList.toggle('mav-hide-on-mobile');
        if (this.dataset.state == 'close') {
            this.dataset.state = 'open';
            this.classList.remove('fa-bars');
            this.classList.add('fa-times');
        } else {
            this.dataset.state = 'close';
            this.classList.add('fa-bars');
            this.classList.remove('fa-times');
        }
    });

    function mavf_resize(){
        if (window.innerWidth > 1023) {
            if (mavHeaderBreadcrumbs) {
                mavHeaderBreadcrumbs.style.marginTop = mavHeaderMenu.offsetHeight+'px';
            } else {
                mavPageMainContent.style.marginTop = mavHeaderMenu.offsetHeight+'px';
            }
        } else if (window.innerWidth < 1024) {
            if (mavHeaderBreadcrumbs) {
                mavHeaderBreadcrumbs.style.marginTop = 0;
            } else {
                mavPageMainContent.style.marginTop = 0;
            }
        }
    };
    // mavf_resize();

    function mavf_close_all_sub_menus(){
        for (const mavSubMenuIcon of mavSubmenuIcons) {
            mavSubMenuIcon.dataset.state = 'close';
        }
        for (const mavSubMenu of mavSubMenus) {
            mavSubMenu.classList.remove('open');
            mavSubMenu.dataset.state = 'close';
        }
        mavMobileMenuIcon.dataset.state = 'close';
        mavHeaderMenuSection.classList.add('mav-hide-on-mobile');
    }

    // Add resize event to window
    window.addEventListener('resize',function(){
        mavMobileMenuIcon.classList.add('fa-bars');
        mavMobileMenuIcon.classList.remove('fa-times');
        mavf_close_all_sub_menus();
        // mavf_resize();
    });
};
mavf_header_menu();