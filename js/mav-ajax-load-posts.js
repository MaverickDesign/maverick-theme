const mavLoadMorePostButton = document.querySelector('.mavjs-ajax-load-posts');
if (mavLoadMorePostButton) {
    mavLoadMorePostButton.addEventListener('click',function(e){
        e.preventDefault();
        // Load more button
        // const mavLoadMorePostButton = this;
        // Get WordPress Ajax Url
        const mavAjaxUrl = this.dataset.ajaxUrl;
        // Get action callback
        const mavAction = this.dataset.action;
        // Get current page
        const mavCurrentPage = this.dataset.currentPage;

        // Parameters
        let mavArgs = `action=${mavAction}&page=${mavCurrentPage}`;

        fetch(mavAjaxUrl,{
            method: 'POST',
            headers: {
                'Content-type' : 'application/x-www-form-urlencoded'
            },
            body: mavArgs
        })
        .then((mavRespone) => mavRespone.text())
        .then(function(mavResponeData){
            if (mavResponeData != 0) {
                document.querySelector('.mavjs-posts-container').innerHTML += mavResponeData;
                mavLoadMorePostButton.dataset.currentPage = Number(mavCurrentPage) + 1;
            } else {
                mavLoadMorePostButton.classList.add('mav-hide');
            }
        })
        .catch((err)=>console.log(err))
    });
}

// const xhr = new XMLHttpRequest();

// xhr.open('POST', mavAjaxUrl, true);

// Set request header
// xhr.setRequestHeader('Content-type' , 'application/x-www-form-urlencoded');

// Ajax
// xhr.onload = function(){
//     if (this.status == 200) {
//         if (this.responseText != 0) {
//             document.querySelector('.mavjs-posts-container').innerHTML += this.responseText;
//             mavLoadMorePostButton.dataset.currentPage = Number(mavCurrentPage) + 1;
//         } else {
//             mavLoadMorePostButton.classList.add('mav-hide');
//         }
//     }
//     if (this.status == 400 ) {
//         console.log(this.responseText);
//     }
// }

// Send ajax call
// xhr.send(mavArgs);