const mavContactForm = document.querySelector('.mavjs-form-contact');

if ( mavContactForm != undefined ) {
    mavContactForm.addEventListener('submit', function(e) {

        e.preventDefault();

        let mavFormData = new FormData();

        /* Submit button */
        const mavSubmitBtn = this.querySelector('.mavjs-form-submit');
        /* Disable submit button */
        if (mavSubmitBtn != undefined) {
            mavSubmitBtn.disabled = true;
            mavSubmitBtn.classList.add('mav-hide');
        }

        /* Get WordPress Ajax Url */
        const mavAjaxUrl = this.dataset.ajaxUrl;

        /* Get action callback */
        const mavAction = this.dataset.action;

        if (mavAction != undefined) {
            mavFormData.append('action',mavAction);
        }

        /* Name */
        const mavName = this.querySelector('input[type="text"][name="name"]');
        if (mavName != undefined) {
            mavFormData.append('name', mavName.value);
        }

        /* Email */
        const mavEmail = this.querySelector('input[type="email"][name="email"]');
        if (mavEmail != undefined) {
            mavFormData.append('email', mavEmail.value);
        }

        /* Phone */
        const mavPhone = this.querySelector('input[type="phone"][name="phone"]');
        if (mavPhone != undefined) {
            mavFormData.append('phone', mavPhone.value);
        }

        /* Message */
        const mavMessage = this.querySelector('textarea[name="message"]');
        if (mavMessage != undefined) {
            mavFormData.append('message',mavMessage.value);
        }

        if (mavAction !== '' && mavName !== '' && mavEmail !== '' && mavMessage !== '') {

            const xhr = new XMLHttpRequest();

            xhr.open('POST', mavAjaxUrl);

            xhr.onreadystatechange = function(){
                if (xhr.readyState == 4 && xhr.status == 200) {

                    const mavFormStatusContainer = document.querySelector('.mav-form-status-ctn');

                    if (this.responseText != 0) {
                        mavFormStatusContainer.innerHTML += this.responseText;
                        mavf_reset_form_fields(mavContactForm);
                    } else {
                        mavFormStatusContainer.innerHTML += this.responseText;
                    }
                    /* Reenable submit button */
                    mavSubmitBtn.disabled = false;
                    mavSubmitBtn.classList.remove('mav-hide');
                }
            }

            xhr.send(mavFormData);
        } else {
            /* Reenable submit button */
            mavSubmitBtn.disabled = false;
            mavSubmitBtn.classList.remove('mav-hide');
        }
    });
}

function mavf_reset_form_fields(mavForm){
    const mavInputs = mavForm.querySelectorAll('.mavjs-form-input');
    if (mavInputs != undefined) {
        for (mavInput of mavInputs) {
            mavInput.value = '';
        }
    }
}