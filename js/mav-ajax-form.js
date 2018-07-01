const mavForms = document.querySelectorAll('.mavjs-form');

if (mavForms != undefined) {
    for (mavForm of mavForms) {
        mavForm.addEventListener('submit',function(e){
            e.preventDefault();

            // Disable submit button
            const mavSubmitBtn = this.querySelector('.mavjs-form-submit');
            mavSubmitBtn.disabled = true;

            // Get WordPress Ajax Url
            const mavAjaxUrl = this.dataset.ajaxUrl;

            let mavFormData = new FormData();

            // Get action callback
            const mavAction = this.dataset.action;
            mavFormData.append('action',mavAction);

            // Get Name value
            const mavName = this.querySelector('input[type="text"][name="name"]').value;
            mavFormData.append('name',mavName);

            // Get email value
            const mavEmail = this.querySelector('input[type="email"][name="email"]').value;
            mavFormData.append('email',mavEmail);

            // Get phone value
            const mavPhone = this.querySelector('input[type="phone"][name="phone"]').value;
            if (mavPhone != undefined) {
                mavFormData.append('phone',mavPhone);
            }

            // Get message
            const mavMessage = this.querySelector('textarea[name="message"]').value;
            mavFormData.append('message',mavMessage);

            if (mavName !== '' && mavEmail !== '' && mavMessage !== '') {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', mavAjaxUrl);
                xhr.onreadystatechange = function(){
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        const mavContactFormContainer = document.querySelector('.mav-contact-form-ctn');
                        if (this.responseText != 0) {
                            mavContactFormContainer.innerHTML += this.responseText;
                        } else {
                            mavContactFormContainer.innerHTML += this.responseText;
                            // Reenable submit button
                            mavSubmitBtn.disabled = false;
                        }
                    }
                }
                xhr.send(mavFormData);
            } else {
                // Reenable submit button
                mavSubmitBtn.disabled = false;
            }
        });
    }
}