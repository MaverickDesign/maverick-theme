/**
 * Maverick's Slider
 * Version: 1.0
 */

console.log('Maverick\'s Slider loaded.');

/**
 * @args: mavSliderId - ID of the container
 * @args: mavSlideContainerClass - slider wrapper inside the container
 */

function mavf_slider(mavArgs = {
        mavSliderId             : '',
        mavSlideContainerClass  : ''
    }) {

    const mavSliders = document.querySelectorAll('.mav-slider');

    if (mavSliders != undefined) {
        for (const mavSlider of mavSliders){

            const mavTheSliderObj = mavSlider;
            const mavTheSliderId  = mavSlider.id;
            const mavUnique = mavTheSliderObj.dataset.unique;

            if (!mavTheSliderObj) {
                return;
            }

            let mavSliderType           = mavTheSliderObj.dataset.type       ? mavTheSliderObj.dataset.type       : 2;
            let mavInterval             = mavTheSliderObj.dataset.interval   ? mavTheSliderObj.dataset.interval   : 4000;
            let mavSlideContainerClass  = mavArgs.mavSlideContainerClass     ? mavArgs.mavSlideContainerClass     : `mav-slider-type-${mavSliderType}-ctn`;

            /**
             * Slider Type 1
             */
            if ( mavSliderType == 1 ) {
                // console.log('Slider type ' + mavSliderType + ' started.');

                //  Select all slides inside a container
                const mavAllSlides = mavTheSliderObj.querySelectorAll('.mav-slide');

                // Remove the first slide class
                function mavRemoveFirstSlideClass() {
                    mavAllSlides.forEach(function(el){
                        el.classList.remove('mav-first-slide');
                    });
                }

                /* Add click event to all slides */
                mavAllSlides.forEach(function(e){
                    e.addEventListener('click', mavSlideClick);
                })

                function mavSlideClick(e) {
                    mavRemoveFirstSlideClass();
                    this.classList.add('mav-first-slide');
                }

                /* Start the slider */

                let mavStart = setInterval(mavStartSlider,mavInterval);

                function mavStartSlider() {
                    let mavCurrentSlide = mavTheSliderObj.querySelector('.mav-first-slide');
                    let i = mavCurrentSlide.dataset.slide;
                    if ( i == mavAllSlides.length ) { i = 0; }
                    mavRemoveFirstSlideClass();
                    mavAllSlides[i].classList.add('mav-first-slide');
                    i++;
                }

                // Select the slider wrapper
                let mavSliderWrapperArea = mavTheSliderObj.querySelector('.'+mavSlideContainerClass);

                /* Pause the slider */
                mavSliderWrapperArea.addEventListener('mouseover', function(){
                    clearInterval(mavStart);
                });

                /* Resume the slider */
                mavSliderWrapperArea.addEventListener('mouseleave', function(){
                    mavStart = setInterval(mavStartSlider,mavInterval);
                });
            }

            /**
             * Slider Type 2
             */
            if ( mavSliderType == 2 ) {
                // console.log('Slider type ' + mavSliderType + ' - ID: ' + mavTheSliderId + ' started.');

                let mavSlideInputs = mavTheSliderObj.querySelectorAll('.mav-slide-input');

                let mavSliderCSSNav = mavTheSliderObj.querySelector(`#mavid-slider-css-nav-${mavUnique}`);

                const mavSlides = mavTheSliderObj.querySelectorAll('.mav-slide');

                function mavf_remove_current_slide(){
                    mavSlideInputs.forEach(function(ipnut){
                        ipnut.classList.remove('mav-current-slide');
                    });
                }

                function mavf_remove_active_slide(){
                    mavSlides.forEach(function(ipnut){
                        ipnut.classList.remove('mav-active-slide');
                    });
                }

                const mavNavDots = mavSliderCSSNav.querySelectorAll('.mav-nav-dot');

                function mavf_remove_active_dot(){
                    mavNavDots.forEach(function(e){
                        e.classList.remove('mav-active-dot');
                    });
                }

                mavNavDots.forEach(function(dot){
                    dot.addEventListener('click',function(navdot){
                        mavf_remove_current_slide();
                        mavf_remove_active_slide();
                        mavf_remove_active_dot();
                        navdot.target.classList.add('mav-active-dot');

                        let mavInputId = navdot.target.dataset.input;
                        mavTheSliderObj.querySelector('#'+mavInputId).classList.add('mav-current-slide');

                        let mavContainerId = navdot.target.dataset.container;
                        mavTheSliderObj.querySelector('#'+mavContainerId).classList.add('mav-active-slide');
                    })
                });
                // Select slider navs
                mavSlideNavs = mavTheSliderObj.querySelectorAll('.mav-slide-nav');
                mavSlideNavs.forEach(function(e){
                    e.addEventListener('click', function(navdot){

                        mavf_remove_current_slide();
                        mavf_remove_active_slide();
                        mavf_remove_active_dot();

                        const mavSlideNumber = navdot.target.dataset.number;
                        mavTheSliderObj.querySelector(`#mavid-dot-${mavSlideNumber}-${mavUnique}`).classList.add('mav-active-dot');

                        const mavInputId = navdot.target.dataset.input;
                        mavTheSliderObj.querySelector(`#${mavInputId}`).classList.add('mav-current-slide');

                        const mavContainerId = navdot.target.dataset.container;
                        mavTheSliderObj.querySelector(`#${mavContainerId}`).classList.add('mav-active-slide');
                    });
                });

                /**
                 * Start the Slider
                 */
                let mavStartSliderType2 = setInterval(mavf_Slider_Type_2, mavInterval);

                function mavf_Slider_Type_2() {
                    let mavCurrent = Number(mavTheSliderObj.querySelector('.mav-current-slide').dataset.number);
                    if (mavCurrent == mavNavDots.length) {
                        mavCurrent = 0;
                    }
                    if (mavCurrent < mavNavDots.length) {
                        mavNavDots[mavCurrent].click();
                        mavCurrent++;
                    }
                }
                /**
                 * Pause and Resume Slider
                 */
                const mavSliderArea = mavTheSliderObj;
                // Pause slider
                mavSliderArea.addEventListener('mouseover', function(){
                    clearInterval(mavStartSliderType2);
                });
                // Resume slider
                mavSliderArea.addEventListener('mouseleave', function(){
                    mavCurrent = Number(mavTheSliderObj.querySelector('.mav-current-slide').dataset.number);
                    mavStartSliderType2 = setInterval(mavf_Slider_Type_2, mavInterval);
                });
            }

            /**
             * Slider Type 3
             */
            if ( mavSliderType == 3 ) {
                // console.log('Slider type ' + mavSliderType + ' started.');
                // Important: Adjust the class to slide container
                let mavSlideContainer = mavTheSliderObj.querySelector('.'+mavSlideContainerClass);

                let mavSliderType3 = setInterval(mavf_Slide_Show, mavInterval);

                function mavf_Slide_Show(){
                    let mavAllSlides = mavSlideContainer.querySelectorAll('.mav-slide');
                    mavTemp = mavSlideContainer.removeChild(mavAllSlides[0]);
                    mavSlideContainer.appendChild(mavTemp);
                }
                // Pause slider
                mavTheSliderObj.addEventListener('mouseover', function(){
                    clearInterval(mavSliderType3);
                });
                // Resume slider
                mavTheSliderObj.addEventListener('mouseleave', function(){
                    mavSliderType3 = setInterval(mavf_Slide_Show, mavInterval);
                });
            }
        };
    }
}

/**
 * Start Sliders
 */
if (typeof mavf_slider === 'function') {
    mavf_slider();
}