console.log(`Maverick's Carousel loaded.`);

function mavf_carousel(mavArgs = {
    mavCarouselClass        : '.mav-carousel',
    mavCarouselContainer    : '.mav-carousel-ctn',
    mavCarouselItemClass    : '.mav-carousel-item',
    mavCarouselNavClass     : '.mav-carousel-nav'
}){
    // Select all carousels on page
    const mavCarousels = document.querySelectorAll(mavArgs.mavCarouselClass);
    // If found
    if (mavCarousels.length > 0) {
        for (mavCarousel of mavCarousels) {
            console.log(`Carousel ID ${mavCarousel.id} started.`);

            // Get carousel unique number
            const mavUnique = mavCarousel.dataset.unique;

            // Get carousel container class
            const mavContainerClass = mavArgs.mavCarouselContainer;

            // Get carousel item class
            const mavItemClass = mavArgs.mavCarouselItemClass;

            // Get number of total items
            const mavTotalItems = mavCarousel.dataset.total;

            // Get number of items to display
            let mavItemsToDisplay = mavCarousel.dataset.display;

            const mavInterval = mavCarousel.dataset.interval;

            // Init number items to display
            const mavInitNumberItemToDisplay = mavItemsToDisplay;

            // Select the carousel container
            const mavContainer = mavCarousel.querySelector('[data-container="true"]');

            // Select all carousel items
            const mavCarouselItems = mavContainer.querySelectorAll(mavArgs.mavCarouselItemClass);

            // Get carousel container width
            function mavf_get_container_width(){
                return Number(mavContainer.offsetWidth);
            }

            // Get item width
            function mavf_get_item_width(){
                return Number(mavContainer.querySelector(mavItemClass).offsetWidth);
            }

            // Set item width
            function mavf_set_items_width() {

                let mavTotalWidth = mavf_get_container_width();

                // Set number of display items @ desktop screen size
                if (mavTotalWidth > 1024 ) {
                    mavItemsToDisplay = mavInitNumberItemToDisplay;
                }

                // Set number of display items @ tablet screen size
                if (mavTotalWidth < 1025 && mavTotalWidth > 414 && mavInitNumberItemToDisplay > 1) {
                    mavItemsToDisplay = 2;
                }

                // Set number of display items @ phone screen size
                if (mavTotalWidth < 415 ) {
                    mavItemsToDisplay = 1;
                }

                // Calculate item width
                let mavItemWidth = Math.floor((100 / mavItemsToDisplay) - 1);

                // Calculate item gutter
                let mavGutter = (( 100-(mavItemWidth*mavItemsToDisplay))/(mavItemsToDisplay-1))+'%';

                // Tablet screen size
                if (mavTotalWidth < 1025 && mavTotalWidth > 414 ) {
                    if (mavInitNumberItemToDisplay > 1) {
                        mavItemWidth = 49;
                        mavGutter = '2%';
                    } else {
                        mavItemWidth = 100;
                        mavGutter = '0px';
                    }
                }

                // Apply only on phone screen size
                if (mavTotalWidth < 415 ) {
                    mavItemWidth = 100;
                    mavGutter = '0px';
                }

                if (mavTotalWidth > 1025 && mavInitNumberItemToDisplay < 2) {
                    mavItemWidth = 100;
                    mavGutter = '0px';
                }

                // Set item & gutter size
                for (item of mavCarouselItems) {
                    item.style.width = (mavItemWidth)+'%';
                    item.style.marginRight = mavGutter;
                }
            }
            mavf_set_items_width();

            // Resize items width on window resize;
            let mavResizeItems;

            window.addEventListener('resize',function() {
                clearTimeout(mavResizeItems);
                mavResizeItems = setTimeout(mavf_set_items_width, 1000);
            });

            // Select all nav item
            const mavNavs = mavCarousel.querySelectorAll(mavArgs.mavCarouselNavClass);
            // console.log(mavNavs);

            // Get max steps
            function mavf_get_max_steps(mavTotalItems,mavItemsToDisplay){
                return mavTotalItems - mavItemsToDisplay;
            }

            // Add click event to navs
            function mavf_nav(){
                for (mavNav of mavNavs ) {
                    if(mavTotalItems > mavItemsToDisplay){
                        mavNav.addEventListener('click',mavf_slide);
                    } else {
                        mavNav.classList.add('mav-hide');
                    }
                }
            }
            mavf_nav();

            // Slide carousel
            function mavf_slide(){
                // Get gutter width
                let mavItemGutter;
                if (mavItemsToDisplay > 1) {
                    mavItemGutter = (mavf_get_container_width(mavContainer) - (mavItemsToDisplay * mavf_get_item_width())) / (mavItemsToDisplay-1);
                } else {
                    mavItemGutter = (mavf_get_container_width(mavContainer) - (mavItemsToDisplay * mavf_get_item_width())) / (mavItemsToDisplay);
                }
                // console.log(`Gutter width: ${mavItemGutter}`);

                // Calculate max steps
                let mavMaxSteps = mavf_get_max_steps(mavTotalItems,mavItemsToDisplay);
                // console.log(`Max steps: ${mavMaxSteps}`);

                let mavCurrentStep = Number(this.dataset.currentStep);
                // console.log(`Current step: ${mavCurrentStep}`);

                let mavNewStep = 0;
                let mavDirection = -1;

                if (this.dataset.direction == 'prev' && mavCurrentStep < mavMaxSteps + 1 ) {
                    mavf_nav_display();
                    mavNewStep = mavCurrentStep + 1;
                }

                if (this.dataset.direction == 'next' && mavCurrentStep > 0 ) {
                    mavf_nav_display();
                    mavNewStep = mavCurrentStep - 1;
                }

                function mavf_nav_display(){
                    for (mavNav of mavNavs ) {
                        mavNav.classList.remove('mav-hide');
                    }
                }

                if (mavNewStep >= 0 && mavNewStep <= mavMaxSteps) {
                    let mavScrollAmount = ((mavf_get_item_width() + mavItemGutter)) * mavNewStep * mavDirection;
                    // Scroll the container
                    mavContainer.style.transform = `translateX(${mavScrollAmount}px)`;
                    // Update current step to element
                    for (mavNav of mavNavs ) {
                        mavNav.dataset.currentStep = mavNewStep;
                    }
                    // console.log(`New step: ${mavNewStep}`);
                }

                if (mavNewStep == mavMaxSteps) {
                    mavf_nav_display();
                    this.classList.add('mav-hide');
                    if (this.dataset.currentDirection == 'prev') {
                        for (mavNav of mavNavs ) {
                            mavNav.dataset.currentDirection = 'next';
                        }
                        mavCarousel.dataset.currentDirection = 'next';
                        // console.log('Changed: ' + mavCarousel.dataset.currentDirection);
                    }
                }

                if (mavNewStep == 0) {
                    mavf_nav_display();
                    this.classList.add('mav-hide');
                    if (this.dataset.currentDirection == 'next') {
                        for (mavNav of mavNavs ) {
                            mavNav.dataset.currentDirection = 'prev';
                        }
                        mavCarousel.dataset.currentDirection = 'prev';
                        // console.log('Changed: ' + mavCarousel.dataset.currentDirection);
                    }
                }
            }

            function mavf_auto_slide(){
                // console.log('Auto slide start.');

                let mavCurrentDirection = document.querySelector('#mavid-carousel-'+mavUnique).querySelector(`[data-direction="prev"]`).dataset.currentDirection;
                // console.log(`Current direction ${mavCurrentDirection}`);

                let mavButton;
                if (mavCurrentDirection == 'prev') {
                    mavButton = document.querySelector('#mavid-carousel-'+mavUnique).querySelector(`[data-direction="prev"]`);
                }
                if (mavCurrentDirection == 'next') {
                    mavButton = document.querySelector('#mavid-carousel-'+mavUnique).querySelector(`[data-direction="next"]`);
                }
                // console.log(mavButton);
                mavButton.click();
            }

            if (mavCarousel.dataset.autoSlide == 'true') {

                let mavAutoSlide = setInterval(mavf_auto_slide, mavInterval);

                mavCarousel.addEventListener('mouseover',function(){
                    clearInterval(mavAutoSlide);
                });

                mavCarousel.addEventListener('mouseleave',function(){
                    mavAutoSlide = setInterval(mavf_auto_slide, mavInterval);
                });
            }
        }
    } else {
        console.log('No carousel found.');
    }
}