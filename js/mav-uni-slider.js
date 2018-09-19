/**
 * Maverick Uni Slider
 */

function mavf_uni_slider(
    mavArgs = {
        'mavSliderClass'                    : '.mavjs-uni-slider',
        'mavSliderClassSlidesContainer'     : '.mavjs-uni-slider__slides--ctn',
        'mavSliderClassSlideItem'           : '.mavjs-uni-slider__slide--item',
        'mavSliderClassNavButton'           : '.mavjs-slider__nav--arrow',
        'mavSliderClassNavDotsContainer'    : '.mavjs-slider__nav__dots--ctn',
        'mavSliderClassNavDot'              : '.mavjs-slider__nav--dot',
    }
) {
    // Select all sliders on page
    const mavAllSliders = document.querySelectorAll(mavArgs['mavSliderClass']);

    // Loop for each slider
    for ( const mavCurrentSlider of mavAllSliders ) {

        // Get Slider Type
        const mavSliderType = mavCurrentSlider.dataset.type;

        // Get total slides
        const mavTotalSlides = mavCurrentSlider.dataset.totalSlides;

        // Get number of slides to display
        const mavSlidesDisplay = mavCurrentSlider.dataset.slidesDisplay;

        // Get Next Button
        const mavButtonNext = mavCurrentSlider.querySelector(`${mavArgs['mavSliderClassNavButton']}[data-direction="next"]`);
        mavButtonNext.addEventListener('click', mavf_nav_button);

        // Get Prev Button
        const mavButtonPrev = mavCurrentSlider.querySelector(`${mavArgs['mavSliderClassNavButton']}[data-direction="prev"]`);
        mavButtonPrev.addEventListener('click', mavf_nav_button);

        // Get slides container
        const mavSlidesContainer = mavCurrentSlider.querySelector(mavArgs['mavSliderClassSlidesContainer']);

        /**
         * Get slide item by number
         * @param {int} mavSlideNumber
         */
        function mavf_get_slide(mavSlideNumber) {
            return mavSlidesContainer.querySelector(`${mavArgs['mavSliderClassSlideItem']}[data-slide-number="${mavSlideNumber}"]`);
        }

        /**
         * Update slider nav buttons slide number attribute
         * @param {int} mavNewSlideNumber
         */
        function mavf_update_nav_slide_number(mavNewSlideNumber) {
            mavButtonNext.dataset.slideNumber = mavNewSlideNumber;
            mavButtonPrev.dataset.slideNumber = mavNewSlideNumber;
        }

        /**
         * Get current active slide
         */
        function mavf_get_active_slide() {
            const mavCurrentActiveSlide = mavSlidesContainer.querySelector(`${mavArgs['mavSliderClassSlideItem']}[data-active-slide]`);
            if (mavCurrentActiveSlide) {
                return mavCurrentActiveSlide;
            }
        }

        /**
         * Set active attribute to slide item by number
         * @param {int} mavSlideNumber
         */
        function mavf_set_active_slide(mavSlideNumber) {
            if ( mavSlideNumber !== undefined ) {
                const mavCurrentActiveSlide = mavf_get_active_slide();
                if (mavCurrentActiveSlide) {
                    mavCurrentActiveSlide.removeAttribute('data-active-slide');
                    const mavNewActiveSlide = mavf_get_slide(mavSlideNumber);
                    mavNewActiveSlide.setAttribute('data-active-slide', '');
                }
            }
        }

        function mavf_translate_slide_container() {
            let mavSlideNumber = mavButtonNext.dataset.slideNumber;
            let mavTranslateAmount = ( Number(mavSlideNumber) - Number(mavSlidesDisplay) ) * (100/Number(mavSlidesDisplay));
            if ( mavTranslateAmount < 0 ) {
                mavTranslateAmount = 0;
            }
            mavSlidesContainer.style.transform = `translateX(-${mavTranslateAmount}%)`;
        }

        /**
         * Slider Nav Buttons Function
         */
        function mavf_nav_button() {
            event.stopPropagation;

            const mavButton = this;

            // Get button direction
            const mavDirection = mavButton.dataset.direction;

            // Get current slide number
            const mavCurrentSlideNumber = Number(mavButton.dataset.slideNumber);

            // Next Button
            if ( mavDirection == 'next' )  {
                // Update slide number
                if ( mavCurrentSlideNumber < mavTotalSlides ) {
                    mavf_update_nav_slide_number(mavCurrentSlideNumber + 1);
                    mavf_set_active_slide(mavCurrentSlideNumber + 1)
                } else if (mavCurrentSlideNumber == mavTotalSlides) {
                    mavf_update_nav_slide_number(mavTotalSlides);
                    mavf_set_active_slide(mavTotalSlides)
                }
            }

            // Prev Button
            if ( mavDirection == 'prev' )  {
                // Update slide number
                if ( mavCurrentSlideNumber > 1 ) {
                    mavf_update_nav_slide_number(mavCurrentSlideNumber - 1);
                    mavf_set_active_slide(mavCurrentSlideNumber - 1);
                } else if ( mavCurrentSlideNumber <= mavSlidesDisplay ) {
                    mavf_update_nav_slide_number(1);
                    mavf_set_active_slide(1);
                }
            }

            // Translate slide container
            mavf_translate_slide_container();
        }

        // Query nav dots container
        const mavNavDotsContainer = mavCurrentSlider.querySelector(mavArgs['mavSliderClassNavDotsContainer']);
        // Query nav dots
        const mavNavDots = mavNavDotsContainer.querySelectorAll(mavArgs['mavSliderClassNavDot']);
        // Add click event to nav dots
        for (const mavNavDot of mavNavDots) {
            mavNavDot.addEventListener('click', mavf_nav_dot);
        }

        /**
         * Slider Dot Function
         */
        function mavf_nav_dot() {
            event.stopPropagation;

            const mavDot = this;

            // Get dot slide number
            const mavSlideNumber = mavDot.dataset.slideNumber;

            // Update slide number to slider navs
            mavf_update_nav_slide_number(mavSlideNumber);

            // Update active slide
            mavf_set_active_slide(mavSlideNumber);

            // Translate slide container
            mavf_translate_slide_container();
        }
    }
}

if ( typeof mavf_uni_slider === 'function' ) {
    mavf_uni_slider();
}
