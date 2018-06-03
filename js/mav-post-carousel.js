/*
 * Post Carousel JS
 * Version : 1.0.0
 * Author: Đoàn Công Minh
 * Email: minh@maverick.vn
 */

const mavArgs = {
    mavCarouselClass : '.mav-post-carousel',
    mavItemClass     : '.mav-card-wrapper',
    mavNavMargin     : 20,
    mavInterval      : 4000
    }

function mavf_post_carousel(mavArgs) {

    // Select all carousel containers
    const mavCarousels = document.querySelectorAll(mavArgs.mavCarouselClass);

    if (mavCarousels) {
        mavCarousels.forEach(function(e){
            /*
             * Settings
             */
            const mavCurrentCarousel = e;

            // Get post item width setting data
            let mavSettingItemWidth = mavCurrentCarousel.dataset.itemWidth;

            // Item spacing
            const mavSettingGutter = Number(e.dataset.gutter);

            const mavWindowWidth = window.innerWidth;

            // Number of items to display
            let mavSettingNumberOfDisplayItem;

            let mavNavMargin = 20;

            // Get nav width
            const mavNavWidth = e.querySelector('.mav-post-carousel-nav').offsetWidth;

            if (mavWindowWidth < 736 ) {
                mavNavMargin = 0;
                mavSettingItemWidth = mavWindowWidth - (mavNavWidth * 2);
            }
            if (mavWindowWidth < 736) {
                mavSettingNumberOfDisplayItem = 1;
            }
            if (mavWindowWidth >= 736 && mavWindowWidth < 1025 ) {
                mavSettingNumberOfDisplayItem = 2;
            }
            if (mavWindowWidth > 1024) {
                mavSettingNumberOfDisplayItem = Number(e.dataset.display);
            }

            // Set margin for carousel outer
            e.querySelector('.mav-post-carousel-outer').style.margin = `0 ${mavNavWidth + mavNavMargin}px`;

            //  Set posts item width
            mavCurrentCarousel.querySelectorAll(mavArgs.mavItemClass).forEach(function(post){
                post.style.width = mavSettingItemWidth+'px';
            });

            const mavSettingCarouselWidth =
            (mavSettingNumberOfDisplayItem * mavSettingItemWidth)
            + ((mavSettingNumberOfDisplayItem) * mavSettingGutter)
            - mavSettingGutter
            + (mavNavWidth * 2)
            + (mavNavMargin * 2);

            e.style.maxWidth = mavSettingCarouselWidth+'px';

            const mavCarouselOuterWidth = e.querySelector('.mav-post-carousel-outer').offsetWidth;

            // Select carousel container
            const mavCarouselContainer = e.querySelector('.mav-post-carousel-ctn');

            let mavCarouselContainerWidth = mavCarouselContainer.offsetWidth;

            let mavMaxOffset = mavCarouselContainerWidth - mavCarouselOuterWidth;

            // Select carousel navs
            const mavCarouselNavs = e.querySelectorAll('.mav-post-carousel-nav');

            // Previous Nav
            const mavPrev = e.querySelector('[data-direction="prev"]');

            // Next Nav
            const mavNext = e.querySelector('[data-direction="next"]');

            const mavItemWidth = mavCarouselContainer.querySelector('.mav-card-wrapper').offsetWidth;

            // Scroll amount
            const mavScrollAmount = Number(mavItemWidth) + Number(mavSettingGutter);

            let mavSteps = Number(mavCarouselContainer.querySelectorAll('.mav-card-wrapper').length);
            console.log('Total items: ' + mavSteps);

            let mavMaxSteps = mavSteps - mavSettingNumberOfDisplayItem;
            console.log('Max steps: ' + mavMaxSteps);

            mavCarouselNavs.forEach(function(mavNav){
                mavNav.addEventListener('click',function(e){

                    const mavTarget = e.target;

                    let mavCurrentStep = Number(mavTarget.dataset.number);

                    if (mavTarget.dataset.direction == 'prev') {
                        let mavNewStep = Number(mavCurrentStep) + 1;
                        let mavAmount = mavNewStep * mavScrollAmount;
                        if (mavCurrentStep < mavMaxSteps){
                            mavScroll(-1 * mavAmount);
                            mavPrev.dataset.number = mavNewStep;
                            mavNext.dataset.number = mavNewStep;
                            mavNext.classList.add('show');
                        }
                        if (mavAmount >= mavMaxOffset) {
                            mavPrev.classList.remove('show');
                        }
                    }

                    if (mavTarget.dataset.direction == 'next') {
                        let mavNewStep = Number(mavCurrentStep) - 1;
                        let mavAmount = mavNewStep * mavScrollAmount;
                        if (mavCurrentStep > 0 ) {
                            mavScroll(-1 * mavAmount);
                            mavPrev.dataset.number = mavNewStep;
                            mavNext.dataset.number = mavNewStep;
                            mavPrev.classList.add('show');
                        }
                        if (mavAmount <= 0 ) {
                            mavNext.classList.remove('show');
                        }
                    }
                    function mavScroll(mavAmount){
                        mavCarouselContainer.style.transform = `translateX(${mavAmount}px)`;
                    }
                });
            });

            if (mavCurrentCarousel.dataset.slider == 'true') {
                let mavInterval = mavCurrentCarousel.dataset.interval ? mavCurrentCarousel.dataset.interval : mavArgs.mavInterval;
                mavCurrentCarousel.addEventListener('mouseenter',function(){
                    clearInterval(mavSlideInterval);
                });
                mavCurrentCarousel.addEventListener('mouseleave',function(){
                    mavSlideInterval = setInterval(mavf_start_slide, mavInterval);
                });

                let mavSlideInterval = setInterval(mavf_start_slide, mavInterval);

                function mavf_start_slide(){
                    const mavDirection = mavCurrentCarousel.dataset.direction;
                    if ( mavDirection == 'prev') {
                        let i = mavPrev.dataset.number;
                        if ( i < mavMaxSteps ) {
                            mavPrev.click();
                        }
                        if ( i == mavMaxSteps ) {
                            mavCurrentCarousel.dataset.direction = 'next';
                        }
                    }
                    if ( mavDirection == 'next') {
                        let i = mavNext.dataset.number;
                        if ( i > 0 ) {
                            mavNext.click();
                        }
                        if ( i == 0 ) {
                            mavCurrentCarousel.dataset.direction = 'prev';
                        }
                    }
                }
            }
        });
    }
}