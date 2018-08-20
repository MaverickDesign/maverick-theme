function mavf_lightbox(mavArgs = {
    mavGalleryClass: '.gallery'
}){
    // Define Image pattern
    const mavImagePattern = /\.(jpg)|(png)|(svg)|(gif)$/i;

    // Select all galleries on the page
    const mavGalleries = document.querySelectorAll(mavArgs.mavGalleryClass);

    if (mavGalleries.length > 0) {

        for (const mavGallery of mavGalleries) {

            // Generate collection ID
            const mavCollectionID = mavf_make_id(8);

            // Gallery item links
            const mavGalleryItems =  mavGallery.querySelectorAll('a');

            // Create lightbox wrapper
            const mavLightbox = document.createElement('div');

            // Set lightbox id
            mavLightbox.setAttribute('id',`mavid-lightbox-${mavCollectionID}`);
            mavLightbox.dataset.collection = mavCollectionID;
            mavLightbox.setAttribute('data-total',mavGalleryItems.length);


            // Add classes
            mavLightbox.classList.add('mav-lightbox');
            mavLightbox.classList.add('mav-lightbox-wrapper');
            mavLightbox.classList.add('mav-hide');

            // Append lightbox to the DOM
            document.body.appendChild(mavLightbox);

            const mavLightboxNavPrev = (mavGalleryItems.length > 1) ? `<nav data-direction="prev" data-collection="${mavCollectionID}" class="mav-lightbox-nav"></nav>` : '';

            const mavLightboxNavNext = (mavGalleryItems.length > 1) ? `<nav data-direction="next" data-collection="${mavCollectionID}" class="mav-lightbox-nav"></nav>` : '';

            const mavLightboxThumbnails = (mavGalleryItems.length > 1) ? `
            <div class="mav-lightbox-thumbnail-wrapper">
                <div data-collection="${mavCollectionID}" class="mav-lightbox-thumbnail-ctn">
                </div>
            </div>
            ` : '';

            const mavContent = `
            <div class="mav-lightbox-header"></div>
            <div class="mav-lightbox-ctn">
                ${mavLightboxNavPrev}
                <figure class="mav-lightbox-image-ctn">
                    <img src="" data-current="" data-max="${mavGalleryItems.length}" title="" class="mav-lightbox-image">
                </figure>
                ${mavLightboxNavNext}
            </div>
            ${mavLightboxThumbnails}
            <div class="mav-lightbox-close" title="Click to close">&times;</div>
            `;

            mavLightbox.innerHTML  = mavContent;

            mavLightbox.addEventListener('click',mavf_close_lightbox);
            mavLightbox.querySelector('.mav-lightbox-close').addEventListener('click',mavf_close_lightbox);

            function mavf_close_lightbox(){
                event.stopPropagation();

                mavLightbox.classList.add('mav-hide');
                mavLightbox.classList.remove('mav-lightbox-current');

            }

            let i = 1;

            for (const mavGalleryItem of mavGalleryItems) {

                let mavNumber = i++;

                let mavImageUrl = mavGalleryItem.getAttribute('href');

                // Check if target is image url
                if (mavImageUrl.search(mavImagePattern) > 0) {

                    // Get the image thumbnail
                    let mavThumbnailImageUrl = mavGalleryItem.querySelector('img').src;
                    // Set the collection ID
                    mavGalleryItem.setAttribute('data-collection',mavCollectionID);
                    // Set full image url
                    mavGalleryItem.setAttribute('data-url',mavImageUrl);
                    // Set item number
                    mavGalleryItem.setAttribute('data-number',mavNumber);
                    // Add lightbox data attribute to item
                    mavGalleryItem.setAttribute('data-lightbox-item','');

                    // Query caption element
                    const mavGalleryItemClass = mavGalleryItem.closest('.gallery-item');
                    if (mavGalleryItemClass != undefined) {
                        var mavCaptionElement = mavGalleryItemClass.querySelector('figcaption');
                    }

                    let mavCaption = '';

                    if (mavCaptionElement != undefined) {
                        mavCaption = mavCaptionElement.innerText;
                        mavGalleryItem.setAttribute('data-caption',mavCaption);
                    }

                    mavGalleryItem.setAttribute('title','Click to enlarge');

                    // Remove href attribute
                    mavGalleryItem.removeAttribute('href');

                    // Add click event to element
                    mavGalleryItem.addEventListener('click',mavf_lightbox);

                    // Create the image thumbnail element
                    let mavCloneItem = document.createElement('div');

                    mavCloneItem.setAttribute('data-collection',mavCollectionID);

                    mavCloneItem.setAttribute('data-url',mavImageUrl);

                    mavCloneItem.setAttribute('data-number',mavNumber)

                    if (mavCaptionElement != undefined) {
                        mavCloneItem.setAttribute('data-caption',mavCaption);
                    }

                    mavCloneItem.classList.add('mav-lightbox-thumbnail');

                    mavCloneItem.style.background = `url(${mavThumbnailImageUrl})`;

                    mavCloneItem.addEventListener('click',mavf_lightbox);

                    // Append to thumbnail list
                    if (mavGalleryItems.length > 1){
                        mavLightbox.querySelector('.mav-lightbox-thumbnail-ctn').appendChild(mavCloneItem);
                    }
                }
            }

            const mavLightboxNavs = mavLightbox.querySelectorAll(`nav[data-collection="${mavCollectionID}"]`).forEach(function(mavNavItem){
                mavNavItem.addEventListener('click',mavf_lightbox_slide_image);
            });
        }
    } else {
        console.log(`No gallery found.`);
    }

    function mavf_lightbox() {
        event.stopPropagation();

        // Get collection ID of clicked image
        const mavCollectionID = this.dataset.collection;

        // Get image url
        const mavImageUrl = this.dataset.url;
        // console.log(mavImageUrl);

        const mavNumber = this.dataset.number;

        // Image pattern
        // Check if target has image url
        if (mavImageUrl.search(mavImagePattern) > 0) {

            // Select the lightbox with collection ID
            const mavLightbox = document.querySelector(`#mavid-lightbox-${mavCollectionID}`);

            // Lightbox Header
            const mavLightboxHeader = mavLightbox.querySelector('.mav-lightbox-header');

            const mavCaption = this.dataset.caption;
            const mavTotalItems = mavLightbox.dataset.total;
            const mavCurrentNumber = this.dataset.number;

            let mavHeaderContent = `
                <span class="mav-lightbox-number" data-current title="Current item">${mavCurrentNumber}</span>/<span class="mav-lightbox-number" data-total title="Total items">${mavTotalItems}</span>
            `;

            mavLightboxHeader.innerHTML = mavHeaderContent;

            if (mavCaption != undefined) {
                mavLightboxHeader.innerHTML += `<figcaption class="mav-lightbox-caption">${mavCaption}</figcaption>`;
            }

            // Show the lightbox
            mavLightbox.classList.remove('mav-hide');
            // Add current lightbox class
            mavLightbox.classList.add('mav-lightbox-current');

            const mavLightboxImage = mavLightbox.querySelector('.mav-lightbox-image');

            // Change image source
            mavLightboxImage.src = mavImageUrl;
            mavLightboxImage.dataset.number = mavNumber;
        }
    }

    function mavf_lightbox_slide_image() {

        event.stopPropagation();

        const mavCollectionID = this.dataset.collection;

        const mavLightbox = document.querySelector(`#mavid-lightbox-${mavCollectionID}`);

        const mavLightboxImage = mavLightbox.querySelector('.mav-lightbox-image');

        const mavCurrentNumber = Number(mavLightboxImage.dataset.number);

        let mavNextNumber;
        if (this.dataset.direction == 'prev' && mavCurrentNumber > 1) {
            mavNextNumber = mavCurrentNumber - 1;
        }
        if (this.dataset.direction == 'prev' && mavCurrentNumber == 1) {
            mavNextNumber = mavLightboxImage.dataset.max;
        }
        if (this.dataset.direction == 'next' && mavCurrentNumber < mavLightboxImage.dataset.max) {
            mavNextNumber = mavCurrentNumber + 1;
        }
        if (this.dataset.direction == 'next' && mavCurrentNumber == mavLightboxImage.dataset.max) {
            mavNextNumber = 1;
        }

        if (mavNextNumber > 1 || mavNextNumber < mavLightboxImage.dataset.max) {
            const mavThumbnailItem = mavLightbox.querySelector(`.mav-lightbox-thumbnail[data-collection="${mavCollectionID}"][data-number="${mavNextNumber}"]`);
            mavThumbnailItem.click();
        }
    }
}
// Init lightbox
if (typeof mavf_lightbox === 'function') {

    const mavGalleries      = document.querySelectorAll('.gallery');
    const mavAttachments    = document.querySelectorAll('.attachment');

    if (mavGalleries.length > 0 || mavAttachments.length > 0) {

        // console.log(`Maverick's Lightbox loaded.`);
        if (mavGalleries.length > 0) {
            mavf_lightbox({
                mavGalleryClass: '.gallery'
            });
        }
        if (mavAttachments.length > 0) {
            mavf_lightbox({
                mavGalleryClass: '.attachment'
            })
        }

        document.addEventListener('keydown',function(event){
            switch (event.keyCode) {
                // Left arrow key
                case 37:
                    mavf_arrow_key('prev');
                break;
                // Right arrow key
                case 39:
                    mavf_arrow_key('next');
                break;
                // Esc key
                case 27:
                    const mavLightbox = document.querySelector('.mav-lightbox-current');
                    if (mavLightbox) {
                        mavLightbox.querySelector('.mav-lightbox-close').click();
                    }
                break;
            }
        });

        function mavf_arrow_key(mavKey){
            let mavCollection = document.querySelector('.mav-lightbox-current').dataset.collection;

            const mavNav = document.querySelector(`nav[data-collection="${mavCollection}"][data-direction="${mavKey}"]`);

            mavNav.click();
        }
    }
}