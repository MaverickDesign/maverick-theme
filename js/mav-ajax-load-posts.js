const mavLoadMorePostButton = document.querySelector('.mavjs-ajax-load-posts');

if ( mavLoadMorePostButton != undefined ) {
    mavLoadMorePostButton.addEventListener('click', function(e) {

        e.preventDefault();

        // Get WordPress Ajax Url
        const mavAjaxUrl = this.dataset.ajaxUrl;
        // Get action callback
        const mavAction = this.dataset.action;
        // Get current page
        const mavCurrentPage = this.dataset.currentPage;

        let mavCurrentViewStyle;
        const mavCard = document.querySelector('.mavjs-card__content--ctn');
        if ( mavCard != undefined ) {
            mavCurrentViewStyle = mavCard.dataset.style;
        }

        // Parameters
        let mavArgs = `action=${mavAction}&page=${mavCurrentPage}&style=${mavCurrentViewStyle}`;

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
                // mavf_change_view();
            } else {
                mavLoadMorePostButton.parentElement.remove();
            }
        })
        .catch( err => console.log(err) );

    });
}