/**
 * Maverick Uni Slider
 */
function mavf_uni_slider(
    mavArgs = {
        'mavSliderClass'                    : '.mavjs-uni-slider',
        'mavSliderClassSlidesContainer'     : '.mavjs-uni-slider__slides--ctn',
        'mavSliderClassSlideItem'           : '.mavjs-uni-slider__slide--item',
        'mavSliderClassNavButton'           : '.mavjs-uni-slider__nav--arrow',
        'mavSliderClassNavDotsContainer'    : '.mavjs-uni-slider__nav__dots--ctn',
        'mavSliderClassNavDot'              : '.mavjs-uni-slider__nav--dot',
        'mavSliderClassNavArrowTitle'       : '.mavjs-title',
        'mavSliderClassNavArrowThumbnail'   : '.mavjs-featured-image',
    }
)
{
    // Query all sliders on page
    const mavAllSliders = document.querySelectorAll(`${mavArgs['mavSliderClass']}`);

    if ( mavAllSliders.length == 0 ) {
        return;
    }

    // Loop for each slider
    for ( const mavCurrentSlider of mavAllSliders ) {

        // Update number of slides to display based on current device
        mavf_update_slide_display(mavCurrentSlider);

        // Get auto slide setting
        let mavAutoSlide = mavCurrentSlider.dataset.autoSlide;
        if (mavAutoSlide === undefined) {
            mavAutoSlide = true;
        }

        // Get Slider Type
        const mavSliderType = mavCurrentSlider.dataset.type;
        if ( mavSliderType === undefined ) {
            mavSliderType = 1;
        }

        // Get slider interval
        let mavInterval = mavCurrentSlider.dataset.interval;
        if (mavInterval === undefined) {
            mavInterval = 4000;
            console.log('Chú ý: Không tìm thấy dữ kiện cung cấp thời gian vòng lặp (Interval). Sử dụng giá trị mặc định là: ', mavInterval);
        }

        // Get total slides
        let mavTotalSlides = mavCurrentSlider.dataset.totalSlides;
        if ( mavTotalSlides === undefined ) {
            mavTotalSlides = mavCurrentSlider.querySelectorAll(mavArgs['mavSliderClassSlideItem']).length;
            console.log('Chú ý: Không tìm thấy dữ kiện cung cấp tổng số Slide. Sử dụng giá trị đã tính toán được là: ', mavTotalSlides);
        }

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
        function mavf_get_slide(mavSlideNumber)
        {
            return mavSlidesContainer.querySelector(`${mavArgs['mavSliderClassSlideItem']}[data-slide-number="${mavSlideNumber}"]`);
        }

        /**
         * Update slider nav buttons slide number attribute
         * @param {int} mavNewSlideNumber
         */
        function mavf_update_nav_slide_number(mavNewSlideNumber)
        {
            mavButtonNext.dataset.slideNumber = mavNewSlideNumber;
            mavButtonPrev.dataset.slideNumber = mavNewSlideNumber;
        }

        /**
         * Get active slide
         */
        function mavf_get_active_slide()
        {
            const mavCurrentActiveSlide = mavSlidesContainer.querySelector(`${mavArgs['mavSliderClassSlideItem']}[data-active-slide]`);
            if (mavCurrentActiveSlide) {
                return mavCurrentActiveSlide;
            }
        }

        // Get active slide number
        function mavf_get_active_slide_number()
        {
            const mavCurrentActiveSlide = mavSlidesContainer.querySelector(`${mavArgs['mavSliderClassSlideItem']}[data-active-slide]`);
            if (mavCurrentActiveSlide) {
                return mavCurrentActiveSlide.dataset.slideNumber;
            }
        }

        /**
         * Set active attribute to slide item by number
         * @param {int} mavSlideNumber
         */
        function mavf_set_active_slide(mavSlideNumber)
        {
            if ( mavSlideNumber !== undefined ) {
                const mavCurrentActiveSlide = mavf_get_active_slide();
                if (mavCurrentActiveSlide) {
                    mavCurrentActiveSlide.removeAttribute('data-active-slide');
                    const mavNewActiveSlide = mavf_get_slide(mavSlideNumber);
                    mavNewActiveSlide.setAttribute('data-active-slide', '');
                }
            }
        }

        /**
         * Translate slides container
         */
        function mavf_translate_slides_container()
        {
            let mavSlideNumber = mavf_get_active_slide_number();

            // Get current number of slides to display
            const mavSlidesDisplay = mavCurrentSlider.dataset.slidesDisplay;

            let mavTranslateAmount = ( Number(mavSlideNumber) - Number(mavSlidesDisplay) ) * (100/Number(mavSlidesDisplay));

            if ( mavTranslateAmount < 1 ) {
                mavTranslateAmount = 0;
            }

            mavSlidesContainer.style.transform = `translateX(-${mavTranslateAmount}%)`;

            // Toggle navigation
            mavf_toggle_nav(mavCurrentSlider);
            // Updated active dot
            mavf_update_active_dot(mavNavDotsContainer);
        }

        /**
         * Slider Nav Buttons Function
         */
        function mavf_nav_button()
        {
            event.stopPropagation;

            const mavButton = this;

            // Get button direction
            const mavDirection = mavButton.dataset.direction;

            // Get current slide number
            const mavCurrentSlideNumber = Number(mavf_get_active_slide_number());

            // Next Button
            if ( mavDirection == 'next' )  {
                if ( mavCurrentSlideNumber < mavTotalSlides ) {
                    // Update new slide number to nav button
                    mavf_update_nav_slide_number(mavCurrentSlideNumber + 1);
                    // Set active state to new slide
                    mavf_set_active_slide(mavCurrentSlideNumber + 1)
                } else if (mavCurrentSlideNumber == mavTotalSlides) {
                    // Update new slide number to nav button
                    mavf_update_nav_slide_number(mavTotalSlides);
                    // Set active state to new slide
                    mavf_set_active_slide(mavTotalSlides)
                }
            }

            // Prev Button
            if ( mavDirection == 'prev' )  {
                if ( mavCurrentSlideNumber > 1 ) {
                    mavf_update_nav_slide_number(mavCurrentSlideNumber - 1);
                    mavf_set_active_slide(mavCurrentSlideNumber - 1);
                } else if ( mavCurrentSlideNumber <= mavSlidesDisplay ) {
                    mavf_update_nav_slide_number(1);
                    mavf_set_active_slide(1);
                }
            }

            // Translate slide container
            mavf_translate_slides_container();

            mavf_update_nav_thumbnail(mavNavDotsContainer);
        }

        function mavf_update_nav_thumbnail(mavDotsContainer) {
            let mavNewActiveSlide = mavf_get_active_slide();
            let mavCurrentSlideNumber = Number(mavNewActiveSlide.dataset.slideNumber);
            let mavNextNumber = mavCurrentSlideNumber + 1;
            let mavPrevNumber = mavCurrentSlideNumber - 1;

            if (mavCurrentSlideNumber >= mavTotalSlides ) {
                mavNextNumber = mavTotalSlides;
            }

            if (mavCurrentSlideNumber < 2  ) {
                mavPrevNumber = 1;
            }

            /* Button Next */

            // Set thumbnail image
            mavButtonNext.querySelector(mavArgs['mavSliderClassNavArrowThumbnail']).src = mavf_get_dot_img_url(mavDotsContainer, mavNextNumber);

            // Set title
            mavButtonNext.querySelector(mavArgs['mavSliderClassNavArrowTitle']).innerHTML = mavf_get_dot_title(mavDotsContainer, mavNextNumber);

            /* Button Prev */

            // Set thumbnail image
            mavButtonPrev.querySelector(mavArgs['mavSliderClassNavArrowThumbnail']).src = mavf_get_dot_img_url(mavDotsContainer, mavPrevNumber);

            // Set title
            mavButtonPrev.querySelector(mavArgs['mavSliderClassNavArrowTitle']).innerHTML = mavf_get_dot_title(mavDotsContainer, mavPrevNumber);
        }

        function mavf_toggle_nav(mavSlider)
        {
            const mavSlideNumber = mavf_get_active_slide_number();

            const mavNext = mavSlider.querySelector('.mav-slider__nav__arrow--wrp[data-direction="next"]');

            const mavPrev = mavSlider.querySelector('.mav-slider__nav__arrow--wrp[data-direction="prev"]');

            if ( mavSlideNumber == mavTotalSlides ) {
                mavNext.classList.add('mav-hide');
            } else {
                mavNext.classList.remove('mav-hide');
            }

            if ( mavSlideNumber == 1 ) {
                mavPrev.classList.add('mav-hide');
            } else {
                mavPrev.classList.remove('mav-hide');
            }
        }

        // Query nav dots container
        const mavNavDotsContainer = mavCurrentSlider.querySelector(mavArgs['mavSliderClassNavDotsContainer']);
        mavf_update_nav_thumbnail(mavNavDotsContainer);
        mavf_update_active_dot(mavNavDotsContainer);

        // Query nav dots
        const mavNavDots = mavNavDotsContainer.querySelectorAll(mavArgs['mavSliderClassNavDot']);
        // Add click event to nav dots
        for (const mavNavDot of mavNavDots) {
            mavNavDot.addEventListener('click', mavf_nav_dot);
        }

        /**
         * Update active state for thumbnail dot
         * @param {obj} mavNavDotsContainer
         */
        function mavf_update_active_dot(mavNavDotsContainer)
        {
            const mavNavDots = mavNavDotsContainer.querySelectorAll(mavArgs['mavSliderClassNavDot']);
            const mavSlideNumber = mavf_get_active_slide_number();

            for ( const mavNavDot of mavNavDots ) {
                mavNavDot.dataset.active = '0';
            }

            const mavActiveDot = mavNavDotsContainer.querySelector(`${mavArgs['mavSliderClassNavDot']}[data-slide-number="${mavSlideNumber}"]`);
            mavActiveDot.dataset.active = '1';
        }

        /**
         * Slider dot function
         */
        function mavf_nav_dot()
        {
            event.stopPropagation;

            const mavDot = this;

            // Get dot slide number
            const mavSlideNumber = mavDot.dataset.slideNumber;

            // Update slide number to slider navs
            mavf_update_nav_slide_number(mavSlideNumber);

            // Update active slide
            mavf_set_active_slide(mavSlideNumber);

            // Translate slide container
            mavf_translate_slides_container();

            mavf_update_nav_thumbnail(mavNavDotsContainer);
        }

        /**
         * Start slider function
         */
        function mavf_start_slide()
        {
            const mavIndicator = mavCurrentSlider.querySelector('.mavjs-slider__loading--indicator');
            mavf_set_slider_indicator();

            let mavUniSlider = setInterval(mavf_start, mavInterval);
            let mavDirection = 'next';

            // Start Slider
            function mavf_start()
            {
                // Get active slide number
                let mavCurrentSlideNumber = mavf_get_active_slide_number();

                if ( mavCurrentSlideNumber == 1  && mavDirection == 'prev' ) {
                    mavDirection = 'next';
                }
                if ( mavCurrentSlideNumber == mavTotalSlides ) {
                    mavDirection = 'prev';
                }
                if ( mavCurrentSlideNumber < mavTotalSlides && mavDirection == 'next' ) {
                    mavButtonNext.click();
                }
                if ( mavCurrentSlideNumber > 1 && mavDirection == 'prev' ) {
                    mavButtonPrev.click();
                }
            }

            // Pause Slider
            mavCurrentSlider.addEventListener('mouseover', mavf_pause);

            function mavf_pause()
            {
                clearInterval(mavUniSlider);
                mavIndicator.removeAttribute('data-animation');
            }

            // Resume Slider
            mavCurrentSlider.addEventListener('mouseleave', mavf_resume);

            function mavf_resume()
            {
                mavUniSlider = setInterval(mavf_start, mavInterval);
                mavf_set_slider_indicator();
            }

            function mavf_set_slider_indicator()
            {
                mavIndicator.setAttribute('data-animation','');
                mavIndicator.style.animationDuration = Number(mavInterval)/1000 + 's';
            }
        }

        // Start the slider
        if ( mavAutoSlide == 1 ) {
            mavf_start_slide();
        }

    } // End of For Loop each slider

    /**
     * Query a thumbnail dot
     * @param {obj} mavDotsContainer
     * @param {int} mavDotNumber
     */
    function mavf_get_nav_dot(mavDotsContainer, mavDotNumber)
    {
        return mavDotsContainer.querySelector(`${mavArgs['mavSliderClassNavDot']}[data-slide-number="${mavDotNumber}"]`);
    }

    /**
     * Get thunbnail dot image url
     * @param {obj} mavDotsContainer
     * @param {int} mavDotNumber
     */
    function mavf_get_dot_img_url(mavDotsContainer, mavDotNumber)
    {
        const mavDot = mavf_get_nav_dot(mavDotsContainer, mavDotNumber);
        return mavDot.querySelector('img').src;
    }

    /**
     * Get thumbnail dot title
     * @param {obj} mavDotsContainer
     * @param {int} mavDotNumber
     */
    function mavf_get_dot_title(mavDotsContainer, mavDotNumber)
    {
        const mavDot = mavf_get_nav_dot(mavDotsContainer, mavDotNumber);
        return mavDot.title;
    }

    /**
     * Update sliders width when resize window
     */
    function mavf_screen_resize()
    {
        let mavMessage;
        window.addEventListener('resize', function(){
            // Clear setTimeout
            clearTimeout(mavMessage);
            mavMessage = setTimeout(function(){
                // Update sliders width
                mavf_update_sliders_width();
            }, 300);
        });
    }
    mavf_screen_resize();

    function mavf_update_slide_display(mavCurrentSlider)
    {
        // Get slides container
        const mavSlidesContainer = mavCurrentSlider.querySelector(mavArgs['mavSliderClassSlidesContainer']);

        // Get init slides display
        const mavInitSlidesDisplay = mavCurrentSlider.dataset.initSlidesDisplay;

        // Get total slides
        const mavTotalSlides = mavCurrentSlider.dataset.totalSlides;

        // Get slider width after window resized
        let mavCurrentSliderWidth = mavCurrentSlider.offsetWidth;

        // Set slider width data attribute
        mavCurrentSlider.dataset.width = mavCurrentSliderWidth;

        // Check for screen size desktop
        if ( mavCurrentSliderWidth > 1024 ) {
            mavCurrentSlider.dataset.slidesDisplay = mavInitSlidesDisplay;
            const mavPercent = 100 / Number(mavInitSlidesDisplay);
            mavSlidesContainer.style.gridTemplateColumns = `repeat(${mavTotalSlides},${mavPercent}%)`;
        }
        // Check for screen size tablet
        if ( mavCurrentSliderWidth < 1025 && mavCurrentSliderWidth > 414 && mavInitSlidesDisplay > 1 ) {
            mavCurrentSlider.dataset.slidesDisplay = 2;
            mavSlidesContainer.style.gridTemplateColumns = `repeat(${mavTotalSlides},50%)`;
        }
        // Check for screen size phone
        if ( mavCurrentSliderWidth < 415 ) {
            mavCurrentSlider.dataset.slidesDisplay = 1;
            mavSlidesContainer.style.gridTemplateColumns = `repeat(${mavTotalSlides},100%)`;
        }
    }

    /**
     * Update all sliders width on the page
     */
    function mavf_update_sliders_width()
    {
        for ( const mavCurrentSlider of mavAllSliders ) {
            mavf_update_slide_display(mavCurrentSlider);
            // Click next button for slide reposition
            mavCurrentSlider.querySelector(`${mavArgs['mavSliderClassNavButton']}[data-direction="next"]`).click();
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    if ( typeof mavf_uni_slider === 'function' ) {
        mavf_uni_slider();
    }
});