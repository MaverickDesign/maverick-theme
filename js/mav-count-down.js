console.log(`Maverick's Count Down loaded.`);

function mavf_count_down_2(mavArgs = {
    expired: '',
    display: ['d','h','m','s'],
    class : '.mavjs-countdown',
    units : {
        d: 'ngày',
        h: 'giờ',
        m: 'phút',
        s: 'giây',
    },
    style: 'mav-countdown',
    message: ''
}){
    const mavCountDowns = document.querySelectorAll(mavArgs.class);
    console.log('mavCountDowns: ', mavCountDowns);
    for (const mavCountDown of mavCountDowns){
        // Get expired date
        const mavExpired = mavArgs.expired != '' ? mavArgs.expired : mavCountDown.dataset.expired;
        console.log('mavExpired: ', mavExpired);

        if (mavExpired != undefined) {
            const mavExpDate = new Date(mavExpired).getTime();
            let mavCountDownStart = setInterval(function(){
                // Get current time
                let mavNow = new Date().getTime();
                // Calculate time remain
                let mavRemain = mavExpDate - mavNow;
                // Convert to Days
                let mavDays     = Math.floor( mavRemain / (1000 * 60 * 60 * 24));
                // Convert to Hour
                let mavHours    = Math.floor((mavRemain % (1000 * 60 * 60 * 24))    / (1000 * 60 * 60));
                mavHours = (mavHours < 10) ? '0'+mavHours : mavHours;
                // Convert to Minutes
                let mavMinutes  = Math.floor((mavRemain % (1000 * 60 * 60))         / (1000 * 60));
                mavMinutes = (mavMinutes < 10) ? '0'+mavMinutes : mavMinutes;
                // Convert to Seconds
                let mavSeconds  = Math.floor((mavRemain % (1000 * 60))              / 1000);
                mavSeconds = (mavSeconds < 10) ? '0'+mavSeconds : mavSeconds;

                let mavOutput       = '';

                if (mavArgs.display && mavArgs.display.length > 0) {
                    for (i=0; i < mavArgs.display.length; i++){
                        mavOutput += `<div class="${mavArgs.style}" data-type="container">`;
                        switch (mavArgs.display[i]) {
                            // Day
                            case 'd':
                                let mavOutputDay    = `
                                    <span class="${mavArgs.style}" data-type="number">${mavDays}</span>
                                    <span class="${mavArgs.style}" data-type="unit" data-unit="day">${mavArgs.units.d}</span>
                                `;
                                mavOutput += mavOutputDay;
                            break;

                            // Hour
                            case 'h':
                                let mavOutputHour    = `
                                    <span class="${mavArgs.style}" data-type="number">${mavHours}</span>
                                    <span class="${mavArgs.style}" data-type="unit" data-unit="hour">${mavArgs.units.h}</span>
                                `;
                                mavOutput += mavOutputHour;
                            break;

                            // Minute
                            case 'm':
                                let mavOutputMinute    = `
                                    <span class="${mavArgs.style}" data-type="number">${mavMinutes}</span>
                                    <span class="${mavArgs.style}" data-type="unit" data-unit="minute">${mavArgs.units.m}</span>
                                `;
                                mavOutput += mavOutputMinute;
                            break;

                            // Second
                            case 's':
                                let mavOutputSecond    = `
                                    <span class="${mavArgs.style}" data-type="number">${mavSeconds}</span>
                                    <span class="${mavArgs.style}" data-type="unit" data-unit="second">${mavArgs.units.s}</span>
                                `;
                                mavOutput += mavOutputSecond;
                            break;
                        }
                        mavOutput += '</div>'
                    }
                }
                // Output to DOM
                mavCountDown.innerHTML = mavOutput;
                // On Expiration
                if (mavRemain <= 0) {
                    clearInterval(mavCountDownStart);
                    if (mavArgs.message) {
                        mavCountDown.innerHTML = mavArgs.message;
                    } else {
                        mavCountDown.innerHTML = 'Expired.';
                    }
                    return;
                }
            }, 1000);
        } else {
            return;
        }
    }
}
mavf_count_down_2();

function mavf_count_down(mavDate, mavClass, mavOutput, mavExpMessage){

    const mavElements = document.querySelectorAll(mavClass);

    mavElements.forEach(function(e){

        let mavElement = e;

        let mavCountDownDate;

        if (mavElement) {
            if (mavDate !== '') {
                mavCountDownDate = new Date(mavDate).getTime();
            } else if ( mavElement.dataset.expired ) {
                mavCountDownDate = new Date(mavElement.dataset.expired).getTime();
            } else {
                return false;
            }
        } else {
            return false;
        }

        let mavCountDown = setInterval(function(){
            let mavNow = new Date().getTime();
            let mavRemain = mavCountDownDate - mavNow;
            let mavDays     = Math.floor( mavRemain / (1000 * 60 * 60 * 24));
            let mavHours    = Math.floor((mavRemain % (1000 * 60 * 60 * 24))    / (1000 * 60 * 60));
            let mavMinutes  = Math.floor((mavRemain % (1000 * 60 * 60))         / (1000 * 60));
            let mavSeconds  = Math.floor((mavRemain % (1000 * 60))              / 1000);

            let mavString   = '';
            let mavDay      = `<span class="mav-date"><span data-type="d">${mavDays}</span> ngày</span>`;
            let mavHour     = `<span class="mav-date"><span data-type="h">${mavHours}</span> giờ</span>`;
            let mavMinute   = `<span class="mav-date"><span data-type="m">${mavMinutes}</span> phút</span>`;
            let mavSecond   = `<span class="mav-date"><span data-type="s">${mavSeconds}</span> giây</span>`;

            if (mavOutput && mavOutput.length > 0) {
                for (i=0; i < mavOutput.length; i++){
                    switch (mavOutput[i]) {
                        case 'd':
                        mavString += mavDay;
                        break;

                        case 'h':
                        mavString += mavHour;
                        break;

                        case 'm':
                        mavString += mavMinute;
                        break;

                        case 's':
                        mavString += mavSecond;
                        break;
                    }
                }
            } else {
                mavString = mavDay + mavHour + mavMinute + mavSecond;
            }

            mavElement.innerHTML = mavString;

            if (mavRemain < 0) {
                clearInterval(mavCountDown);
                if (mavExpMessage) {
                    mavElement.innerHTML = mavExpMessage;
                }
                return true;
            }
        }, 1000);
    });
}
// Run the code
if (typeof mavf_count_down === 'function'){
    // mavf_count_down('','.mav-count-down');
}

function mavf_clock(mavClass){
    let mavElement = document.querySelector(mavClass);
    if (mavElement) {
        let mavDisplayClock = setInterval(function(){
            let mavNow = new Date();
            mavHours    = mavNow.getHours();
            mavMinutes  = mavNow.getMinutes();
            mavSeconds  = mavNow.getSeconds();
            if (mavHours < 10) {
                mavHours = '0'+mavHours;
            }
            if (mavMinutes < 10) {
                mavMinutes = '0'+mavMinutes;
            }
            if (mavSeconds < 10) {
                mavSeconds = '0'+mavSeconds;
            }
            mavElement.innerHTML = `${mavHours}:${mavMinutes}:${mavSeconds}`
        },1000);
    } else {
        return false;
    }
}
if (typeof mavf_clock === 'function'){
    mavf_clock('#mavid-count-down');
}

function mavf_counter(mavElementClass,mavFrom,mavStop,mavHiddenClass){
    let mavElement = document.createElement('span');
    mavElement.classList.add(mavElementClass);
    mavElement.classList.add(mavHiddenClass);
    let i = mavFrom;
    mavElement.dataset.number = i;
    mavElement.innerHTML = i ;
    document.body.appendChild(mavElement);
    let mavDone = false;
    let mavTarget = document.querySelector(mavElementClass);

    let mavCounting = setInterval(mavf_counting,1000);

    function mavf_counting(){
        let mavCurrent = Number(mavElement.dataset.number) + 1;
        mavElement.dataset.number = mavCurrent;
        mavElement.innerHTML = mavCurrent;
        if ( mavCurrent >= mavStop) {
            clearInterval(mavCounting);
        }
    }
}