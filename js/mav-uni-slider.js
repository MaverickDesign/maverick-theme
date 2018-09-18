/**
 * Maverick Uni Slider
 */

function mavf_uni_slider(
    mavArgs = {
        'mavSliderClass'                    : '.mavjs-uni-slider',
        'mavSliderClassNavButton'           : '.mavjs-slider__nav--arrow',
        'mavSliderClassSlidesContainer'     : '.mavjs-uni-slider__slides--ctn',
        'mavSliderClassSlideItem'           : '.mavjs-uni-slider__slide--item',
        'mavSliderClassNavDotsContainer'    : '.mavjs-slider__nav__dots--ctn',
        'mavSliderClassNavDot'              : '.mavjs-slider__nav--dot',
    }
) {
    // Select all sliders on page
    const mavAllSliders = document.querySelectorAll(mavArgs['mavSliderClass']);
    // console.log('mavAllSliders: ', mavAllSliders);

    // Loop for each slider
    for ( const mavCurrentSlider of mavAllSliders ) {
        console.log('mavCurrentSlider: ', mavCurrentSlider);
        // Get Slider Type
        const mavSliderType = mavCurrentSlider.dataset.type;

        // Get total slides
        const mavTotalSlides = mavCurrentSlider.dataset.totalSlides;

        // Get number of slides to display
        const mavSlidesDisplay = mavCurrentSlider.dataset.slidesDisplay;

        let mavMaxSteps = ( Number(mavTotalSlides) - Number(mavSlidesDisplay) );
        console.log('mavMaxSteps: ', mavMaxSteps);

        // Get Next Button
        const mavButtonNext = mavCurrentSlider.querySelector(`${mavArgs['mavSliderClassNavButton']}[data-direction="next"]`);
        // Update next slide number base on total display items
        mavButtonNext.dataset.nextSlide = Number(mavSlidesDisplay) + 1;
        mavButtonNext.addEventListener('click', mavf_nav_button);

        // Get Prev Button
        const mavButtonPrev = mavCurrentSlider.querySelector(`${mavArgs['mavSliderClassNavButton']}[data-direction="prev"]`);
        mavButtonPrev.addEventListener('click', mavf_nav_button);

        // Get slides container
        const mavSlidesContainer = mavCurrentSlider.querySelector(mavArgs['mavSliderClassSlidesContainer']);


        function mavf_get_slide_width() {
            let mavCurrentActiveSlide = mavf_get_active_slide();
            let mavSlideWidth = mavCurrentActiveSlide.offsetWidth;
            console.log('Active Slide Width: ', mavSlideWidth);
            return mavSlideWidth;
        }

        function mavf_get_active_slide() {
            return mavCurrentActiveSlide = mavSlidesContainer.querySelector(`${mavArgs['mavSliderClassSlideItem']}[data-active-slide]`);
        }

        function mavf_update_current_step(mavCurrentStep) {
            mavButtonNext.dataset.currentStep = mavCurrentStep;
            mavButtonPrev.dataset.currentStep = mavCurrentStep;
        }

        function mavf_translate_slides_container(mavTranslateAmount) {
            mavSlidesContainer.style.transform = `translateX(${mavTranslateAmount}px)`;
        }

        // Slider Nav Arrow
        function mavf_nav_button() {
            event.stopPropagation;

            const mavButton = this;
            console.log('mavButton: ', mavButton);

            // Get button direction
            const mavDirection = mavButton.dataset.direction;

            // Get current step from button data attribute
            let mavCurrentStep = mavButton.dataset.currentStep;
            // Get item width
            let mavItemWidth = mavf_get_slide_width();
            // Calculate max translate amount
            let mavMaxTranslateAmount = Number(mavItemWidth) * ( Number(mavTotalSlides) - Number(mavSlidesDisplay) );

            let mavCurrentActiveSlide = mavf_get_active_slide();
            console.log('mavCurrentActiveSlide: ', mavCurrentActiveSlide);
            let mavCurrentSlideNumber = mavCurrentActiveSlide.dataset.slideNumber;
            console.log('mavCurrentSlideNumber: ', mavCurrentSlideNumber);


            // Update current step
            if ( mavDirection == 'next' &&  mavCurrentStep < mavMaxSteps ) {
                mavCurrentStep = Number(mavCurrentStep) + 1 ;
                mavf_update_current_step(mavCurrentStep);
            }
            if ( mavDirection == 'prev' && mavCurrentStep >= 1 ) {
                mavCurrentStep = Number(mavCurrentStep) - 1;
                mavf_update_current_step(mavCurrentStep);
            }

            // Calculate translate amount
            let mavTranslateAmount = ( Number(mavCurrentStep) * Number(mavItemWidth) );
            if ( mavTranslateAmount <= mavMaxTranslateAmount ) {
                // Translate slides container
                mavf_translate_slides_container(Number(mavTranslateAmount) * -1);
            }
        }
    }
}

if ( typeof mavf_uni_slider === 'function' ) {
    mavf_uni_slider();
}
