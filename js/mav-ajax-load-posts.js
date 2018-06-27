const mavLoadMorePostButton = document.querySelector('.mavjs-ajax-load-posts');

if (mavLoadMorePostButton != undefined) {
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
        .then(mavRespone => mavRespone.text())
        .then(function(mavResponeData){
            if (mavResponeData != 0) {
                document.querySelector('.mavjs-posts-container').innerHTML += mavResponeData;
                mavLoadMorePostButton.dataset.currentPage = Number(mavCurrentPage) + 1;
            } else {
                mavLoadMorePostButton.classList.add('mav-hide');
            }
        })
        .catch(err => console.log(err));
    });
}